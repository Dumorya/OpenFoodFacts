<?php session_start();?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Open Food Facts | Détails </title>
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

		<?php
		
			// affichage du titre de la page
		
			function getProductName($dbh)
			{
				$productName =  array();
				
				foreach($dbh->query('SELECT nom_produit,id_produit FROM open_food_facts.produit WHERE id_produit = '.$_GET['chosenProduct'].';') as $row)
				{
					$productName[$row['nom_produit']] = array(
						"productId" => $row['id_produit']
					);
				}
				
				echo $row['nom_produit'];
			}
			
			echo '<h2> Détails de ';
			getProductName($dbh);
			echo '</h2>';
			
			//affichage du tableau avec les détails du produits
		
			$details = array();
			
			
			

			function getDetails($dbh)
			{
				
				
				
				foreach($dbh->query('SELECT DISTINCT id_produit,nom_produit,marque,poids,note_nutritionnelle,date_creation,energie,graisse,graisse_sature,carbohydrate,sucres,fibres,proteines,sel,sodium,vitamin_a,calcium,fer,nutrition_score FROM open_food_facts.produit WHERE id_produit = '.$_GET['chosenProduct'].';') as $row)
				{
					$details[$row['nom_produit']] = array(
						"productId" => $row['id_produit'],
						"brand" => $row['marque'],
						"weight" => $row['poids'],
						"nutritionalGrade" => $row['note_nutritionnelle'],
						"creationDate" => $row['date_creation'],
						"energy" => $row['energie'],
						"fat" => $row['graisse'],
						"saturatedFat" => $row['graisse_sature'],
						"carbohydrate" => $row['carbohydrate'],
						"sugars" => $row['sucres'],
						"fibers" => $row['fibres'],
						"proteines" => $row['proteines'],
						"salt" => $row['sel'],
						"sodium" => $row['sodium'],
						"vitamin_a" => $row['vitamin_a'],
						"calcium" => $row['calcium'],
						"iron" => $row['fer'],
						"nutritionScore" => $row['nutrition_score']
					);
					
					/*$tableRowNames = array(
						'Nom du produit',
						'Marque',
						'Poids',
						'Note nutritionnelle',
						'Date de création',
						'Energie',
						'Graisse',
						'Graisse saturée',
						'Carbohydrate',
						'Sucres',
						'Fibres',
						'Proteines',
						'Sel',
						'Sodium',
						'Vitamine A',
						'Calcium',
						'Fer',
						'Score de nutrition'
					);
					
					foreach($tableRowNames as $row2)
					{
						echo '<tr>';
						echo 	'<th>'.$row2.'</th>';
						echo	'<th>coucou</th>';
						echo '</tr>';
					}*/
					
					echo '<tr>';
					echo 	'<th>Nom du produit</th>';
					echo 	'<td>'.$row['nom_produit'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Marque</th>';
					echo 	'<td>'.$row['marque'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Poids</th>';
					echo 	'<td>'.$row['poids'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Note nutritionnelle</th>';
					echo 	'<td>'.$row['note_nutritionnelle'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Date de création</th>';
					echo 	'<td>'.$row['date_creation'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Energie</th>';
					echo 	'<td>'.$row['energie'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Graisse</th>';
					echo 	'<td>'.$row['graisse'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Graisse saturée</th>';
					echo 	'<td>'.$row['graisse_sature'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Carbohydrate</th>';
					echo 	'<td>'.$row['carbohydrate'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Sucres</th>';
					echo 	'<td>'.$row['sucres'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Fibres</th>';
					echo 	'<td>'.$row['fibres'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Proteines</th>';
					echo 	'<td>'.$row['proteines'].'</td>';
					echo '</tr>';
					echo '<tr>';
					echo 	'<th>Sel</th>';
					echo 	'<td>'.$row['sel'].'</td>';
					echo '</tr>';
					echo 	'<th>Sodium</th>';
					echo 	'<td>'.$row['sodium'].'</td>';
					echo '</tr>';
					echo 	'<th>Vitamine A</th>';
					echo 	'<td>'.$row['vitamin_a'].'</td>';
					echo '</tr>';
					echo 	'<th>Calcium</th>';
					echo 	'<td>'.$row['calcium'].'</td>';
					echo '</tr>';
					echo 	'<th>Fer</th>';
					echo 	'<td>'.$row['fer'].'</td>';
					echo '</tr>';
					echo '</tr>';
					echo 	'<th>Score de nutrition</th>';
					echo 	'<td>'.$row['nutrition_score'].'</td>';
					echo '</tr>';
					
				}
				
			}
			
			echo '
			<table>
				<tbody>';
				getDetails($dbh);
			echo'</tbody></table>';
			
		?>

		<script type="text/javascript" src="style.js"></script>
    </body>
    
    <footer>
		<div>Site réalisé par <a href="http://www.clara-cassel.fr" target="_blank">Clara Cassel</a> et <a href="http://justine-szevoczyk.pagesperso-orange.fr/" target="_blank">Justine Szevoczyk</a></div>
    </footer>
</html>
