<div class="page-wrap">
    <nav class="navbar navbar-default" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="https://fr.openfoodfacts.org/" target="_blank" id="linkOpenFoodFacts">Open Food Facts</a>
          <form id="searchForm" method="post" action="index.php?action=products">
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                      <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="ex: Huile d'olive" aria-describedby="basic-addon1" name="research" id="validateButtonFiled">
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
            <img class="crossImage" src="public/images/cross.png"/>
        </button>

        <div class="filters">

            <h2>Filtrer par :</h2>

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
                <h2>Ajout d'un produit</h2>
                <form>
                    <h3>Informations générales</h3>

                    <label>Nom du créateur (*) :</label>
                    <input type="text" name="addProductCreatorName"/>

                    <label>Nom du produit (*) :</label>
                    <input type="text" name="addProductProductName"/>

                    <label>Marque :</label>
                    <input type="text" name="addProductBrand"/>

                    <label>Poids :</label>
                    <input type="text" name="addProductWeight"/>

                    <label>Note nutritionnelle :</label>
                    <select type="text" name="addProductNutritionalGrade">
                        <option>Aucune</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                    </select>

                    <label>Energie :</label>
                    <input type="text" name="addProductEnergy"/>

                    <p>(*) Saisie obligatoire</p>

                    <hr>

                    <h3>Composition du produit</h3>

                    <label>Graisse :</label>
                    <input type="text" name="addProductFat"/>

                    <label>Graisse saturée :</label>
                    <input type="text" name="addProductSaturatedFat"/>

                    <label>Sucres :</label>
                    <input type="text" name="addProductSugar"/>

                    <label>Carbohydrate :</label>
                    <input type="text" name="addProductCarbohydrate"/>

                    <label>Protéines :</label>
                    <input type="text" name="addProductProteines"/>

                    <label>Sel :</label>
                    <input type="text" name="addProductSalt"/>

                    <label>Sodium :</label>
                    <input type="text" name="addProductSodium"/>

                    <label>Vitamine A :</label>
                    <input type="text" name="addProductAVitamin"/>

                    <label>Vitamine C :</label>
                    <input type="text" name="addProductCVitamin"/>

                    <label>Calcium :</label>
                    <input type="text" name="addProductCalcium"/>

                    <label>Fer :</label>
                    <input type="text" name="addProductIron"/>

                    <label>Ingrédients :</label>
                    <input type="text" name="addProductIngredients"/>


                    <input type="submit" value="OK"/>
                    <input type="button" value="Annuler"/>
                </form>
            </div>

        </div>

        <!-- Affichage du tableau des produits -->
        <div class="tableContainer">
            <?php
                if(count($products) == 0)
                {
                    echo '<p>Aucun produit</p>';
                }
                else
                {
            ?>
                <table>
                    <caption align="top">50 derniers produits ajoutés</caption>
                    <thead>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Marque</th>
                        <th>Ingrédients</th>
                        <th>Note nutritionnelle</th>
                        <th>Plus de détails</th>
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
                            echo '<td><a href="index.php?action=details&chosenProductId='.$product['productId'].'" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a></td>';
                            echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>