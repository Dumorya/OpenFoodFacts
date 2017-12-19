<?php
	session_start();
	$_SESSION['productChosen'];
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Open Food Facts</title>
        <meta name="description" content="A crowdfounding web application">
        <link rel="shortcut icon" href="images/bar_code.png"/>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    </head>
    <body>
		
		<?php
			include('connect.php');
			
			try{
				$dbh = new PDO($driver.':host='.$hostname.';port='.$port.';dbname='.$dbname,$user,$pass);
				$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				$dbh = null;
				echo 'ERREUR DB: '.$e->getMessage();
			}
		?>
		
		<div class="page-wrap">
			<nav class="navbar navbar-default" id="nav">
				<div class="container-fluid">
				  <a class="navbar-brand" href="https://fr.openfoodfacts.org/" target="_blank" id="linkOpenFoodFacts">Open Food Facts</a>
				  <form id="searchForm" method="post" action="search.php">
					  <div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">
							  <i class="fa fa-search" aria-hidden="true"></i>
						  </span>
						  <input type="text" class="form-control" placeholder="ex: Huile d'olive" aria-describedby="basic-addon1" id="validateButtonFiled">
						  <input type="submit" value="Rechercher" class="validateButton btn" id="validateButton" onclick="getValidateButtonFiled()"/>

					  </div>
				  </form>
				</div>
			</nav>
			<div id="filterButtonContainer">
				<button id="filterButton" onclick="showFiltersBlock()">Filtrer</button>
			</div>
			<div id="filtersBlock">
				<button id="crossButton" class="crossButton" onclick="closeFiltersBlock()">
					<img class="crossImage" src="images/cross.png"/>
				</button>
				
				<div class="filters">
					
					<?php
						// Récupération des filtres
						
						$filters = array();
						$options = array();

						function getFilters($dbh)
						{
							foreach($dbh->query('SELECT nom FROM open_food_facts.filtre WHERE utilise = 1 ; ') as $row)
							{
								$filters[$row['nom']] = array();
								
								echo '<div>
										<label>'.$row['nom'].'</label>';
								echo' <select class="form-control">';
								echo '<option>Aucune</option>';
								
								if($row['nom'] == 'createur')
								{
									$requestOptions = 'SELECT distinct createur FROM open_food_facts.produit WHERE createur is not null';
									$columnName = 'createur';
								}
								else if($row['nom'] == 'marque')
								{
									$requestOptions = 'SELECT distinct marque FROM open_food_facts.produit WHERE marque is not null';
									$columnName = 'marque';
								}
								else if($row['nom'] == 'poids')
								{
									$requestOptions = 'SELECT distinct poids FROM open_food_facts.produit WHERE poids is not null';
									$columnName = 'poids';
								}
								else if($row['nom'] == 'note_nutritionnelle')
								{
									$requestOptions = 'SELECT distinct note_nutritionnelle FROM open_food_facts.produit WHERE note_nutritionnelle is not null';
									$columnName = 'note_nutritionnelle';
								}
								
								foreach($dbh->query($requestOptions) as $row)
								{
										$filters[$row[$columnName]] = array();

										echo '<option>'.$row[$columnName].'</option>';
								}
								
								echo '</select>';		
								echo '</div>';
							}						
							
													
						}
						
						getFilters($dbh);
					?>
					
				</div>

				<div class="filtersValidateButtonContainer">
					<input value="Valider" type="submit" class="filtersValidateButton" id="filtersValidateButton" action="filter.php" onclick="closeFiltersBlock()"/>
				</div>
			</div>

			<div id="content">
				
				<div class="tableContainer">
					<?php
						
						// Récupération des noms de produits
						
						$products = array();
						$details = array();
						$i = 0;

						function getProducts($dbh)
						{
							foreach($dbh->query('SELECT id_produit,nom_produit,marque,poids,note_nutritionnelle FROM open_food_facts.produit FETCH FIRST 50 ROWS ONLY') as $row)
							{
								
								$products[$row['nom_produit']] = array(
									"productId" => $row['id_produit'],
									"brand" => $row['marque'],
									"weight" => $row['poids'],
									"nutritionalGrade" => $row['note_nutritionnelle']
								);
								
								echo '<tr>';
								echo '<td>'.$row['nom_produit'].'</td>';
								echo '<td>'.$row['marque'].'</td>';
								echo '<td>'.$row['poids'].'</td>';
								echo '<td class="uppercase">'.$row['note_nutritionnelle'].'</td>';
								echo '<td><a href="details.php?chosenProduct='.$row['id_produit'].'" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a></td>';
								echo '</tr>';
								
								$i++;
								
							}						
							
						}
						
						
						echo '
						<table>
							<thead>
								<tr>
									<th>Nom du produit</th>
									<th>Marque</th>
									<th>Poids</th>
									<th>Note nutritionnelle</th>
									<th>Plus de détails</th>
								</tr>
							</thead>
							<tbody>';
							getProducts($dbh);
						echo'</tbody></table>';
					
						
					?>
				</div>
				
				
			</div>

        </div>
        <script type="text/javascript" src="style.js"></script>
    </body>
    
    <footer>
		<div>Site réalisé par <a href="http://www.clara-cassel.fr" target="_blank">Clara Cassel</a> et <a href="http://justine-szevoczyk.pagesperso-orange.fr/" target="_blank">Justine Szevoczyk</a></div>
    </footer>
</html>
