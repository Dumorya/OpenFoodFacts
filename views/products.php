<?php
    // TODO affichage du "50 derniers produits ajoutés", ajouter un bouton back to top, ajouter smooth scroll
?>

<div class="page-wrap">
    <nav class="navbar navbar-default" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php" id="linkOpenFoodFacts">Open Food Facts</a>
          <form id="searchForm" method="post" action="index.php?action=products">
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                      <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="ex: Huile d'olive" aria-describedby="basic-addon1" name="research" id="validateButtonFiled">
                  <input type="submit" value="Rechercher" class="validateButton btn" id="validateButton"/>

              </div>
          </form>
        </div>
    </nav>

    <div id="filterButtonContainer">
        <button id="filterButton" onclick="showFiltersBlock()">Filtrer</button>
    </div>

    <div id="filtersBlock">
        <button id="crossButton" class="crossButton" onclick="closeFiltersBlock()">
            <img class="crossImage" src="public/images/cross.png"/>
        </button>

        <div class="filters">

            <h2 class="filterLabel">Filtrer par :</h2>

            <form method="post" action="index.php?action=products">
                <?php
                    foreach($filterCarac as $filterCaracRow)
                    {
                ?>
                <div class="filterDiv">
                    <div  class="blockCenter">
                        <?php
                            echo '<label class="filterLabel" for="'.$filterCaracRow['filterId'].'">'.$filterCaracRow['displayName'].'</label>';
                            echo '<input list="'.$filterCaracRow['filtersList'].'" type="text" id="'.$filterCaracRow['filterId'].'" class="form-control filterInput" name="'.$filterCaracRow['filterId'].'" placeholder="Tous"/>';
                            echo '<datalist id="'.$filterCaracRow['filtersList'].'">';
                            foreach($filterCaracRow['requestOptions'] as $row2)
                            {
                                echo '<option value="'.$row2[$filterCaracRow['columnName']].'"/>';
                            }
                            echo '</datalist>';
                        ?>
                    </div>
                </div>
                <hr>
                <?php
                    }
                ?>
                <div class="blockCenter">
                    <div class="filterLabel">
                        <label>Le produit </label>
                        <input type="radio" name="radioButton" value="contains"/>
                        <label for="contains"> contient </label>
                        <input type="radio" name="radioButton"value="notContains"/>
                        <label for="notContains"> ne contient pas </label>
                    </div>
					<input class="form-control" type="text" name="contains" placeholder="ex: Banane"/>
                </div>

                <div class="filtersValidateButtonContainer">
                    <input value="Valider" type="submit" class="filtersValidateButton" id="filtersValidateButton" onclick="closeFiltersBlock()"/>
                </div>

            </form>
        </div>

    </div>
    <div id="content">

        <div class="addProductButtonContainer">
            <button class="addProductButton" id="myBtn">Ajouter un produit</button>
        </div>

        <!-- fenêtre modale -->

        <div id="myModal" class="modal">

            <div class="modal-content">
                <button id="crossButton" class="crossButton close">
                    <img class="crossImage" src="public/images/cross.png"/>
                </button>
                <h2 class="modalTitle">Ajout d'un produit</h2>
                
                <form method="post" action="index.php?action=addProducts" id="modalForm">

                    <div class="wrapper">
                        <div class="firstGrid">
                            <h3>Informations générales</h3>

                            <label>Nom du créateur (*) :</label>
                            <input class="form-control" type="text" name="addProductCreatorName" required/>

                            <label>Nom du produit (*) :</label>
                            <input class="form-control" type="text" name="addProductProductName" required/>

                            <label>Marque (*) :</label>
                            <input class="form-control" type="text" name="addProductBrand" required/>

                            <label>Pays (*) :</label>
                            <p>Séparez les pays par un espace <br/> Insérez un "_" à la place des espaces pour les pays à plusieurs mots</p>
                            <input class="form-control" type="text" name="addProductCountry" placeholder="ex: Allemagne Polynésie_Française" required/>

                            <label>Poids :</label>
                            <input class="form-control" type="number" min="0" name="addProductWeight"/>

                            <label>Note nutritionnelle :</label>
                            <select class="form-control" name="addProductNutritionalGrade">
                                <option>Aucune</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>

                            <label>Energie :</label>
                            <input class="form-control" type="text" name="addProductEnergy"/>

                            <p>(*) Saisie obligatoire</p>
                        </div>

                        <div class="secondGrid">
                            <h3>Composition du produit</h3>

                            <label>Graisse :</label>
                            <input class="form-control" type="number" min="0" name="addProductFat"/>

                            <label>Graisse saturée :</label>
                            <input class="form-control" type="number" min="0" name="addProductSaturatedFat"/>

                            <label>Sucres :</label>
                            <input class="form-control" type="number" min="0" name="addProductSugar"/>

                            <label>Carbohydrate :</label>
                            <input class="form-control" type="number" min="0" name="addProductCarbohydrate"/>

                            <label>Protéines :</label>
                            <input class="form-control" type="number" min="0" name="addProductProteines"/>

                            <label>Sel :</label>
                            <input class="form-control" type="number" min="0" name="addProductSalt"/>

                            <label>Sodium :</label>
                            <input class="form-control" type="number" min="0" name="addProductSodium"/>

                            <label>Vitamine A :</label>
                            <input class="form-control" type="number" min="0" name="addProductAVitamin"/>

                            <label>Vitamine C :</label>
                            <input class="form-control" type="number" min="0" name="addProductCVitamin"/>

                            <label>Calcium :</label>
                            <input class="form-control" type="number" min="0" name="addProductCalcium"/>

                            <label>Fer :</label>
                            <input class="form-control" type="number" min="0" name="addProductIron"/>

                            <label>Fibres :</label>
                            <input class="form-control" type="number" min="0" name="addProductFibers"/>

                            <label>Ingrédients :</label>
                            <textarea class="form-control" name="addProductIngredients"></textarea>

                            <label>Valeur nutritionnelle :</label>
                            <input class="form-control" type="number" min="0" name="addProductNutritionScore"/>
                        </div>
                    </div>
                </form>
                <div class="buttonModalContainer">
                    <input form="modalForm" type="submit" value="OK" class="okayButtonModal"/>
                    <input form="modalForm" type="button" value="Annuler" id="modalCancel" class="cancelButtonModal"/>
                </div>
            </div>

        </div>

        <!-- Affichage du tableau des produits -->
        <div class="tableContainer">
            <?php
                if(count($products) == 0)
                {
                    echo '<p class="filterLabel">Aucun produit</p>';
                }
                else
                {
            ?>
                <table>
                    <caption align="top"><?php echo $tableTitle ?></caption>
                    <thead>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Marque</th>
                        <th>Ingrédients</th>
                        <th>Note nutritionnelle</th>
                        <th>Plus de détails</th>
                        <th>Editer le produit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($products as $product)
                        {
                            echo '<tr>';
                            echo '<td>'.$product['name'].'</td>';
                            echo '<td>'.$product['brand'].'</td>';
                            echo '<td>'.$product['ingredients'].'</td>';
                            echo '<td class="uppercase">'.$product['nutritionalGrade'].'</td>';
                            echo '<td><a href="index.php?action=details&chosenProductId='.$product['productId'].'"><i class="fa fa-plus" aria-hidden="true"></i></a></td>';
                            echo '<td><a href="index.php?action=getOldValues&chosenProductId='.$product['productId'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
                            echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

    <a id="backToTopButton" class="cInvisible" href="#filtersValidateButton"><i class="fa fa-chevron-up fa-2x" aria-hidden="true"></i></a>

</div>