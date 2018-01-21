
<?php
    echo '<h2>Edition de '.$detail1['nom_produit'].' :</h2>';
    echo '<form method="post" action="index.php?action=edit">';
        echo '
            <table>
                <tbody>';
                    echo '<tr>';
                    echo 	'<th>Nom du produit</th>';
                    echo 	'<td>'.$detail1['nom_produit'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Marque</th>';
                    echo 	'<td>'.$detail1['marque'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Pays</th>';
                    echo 	'<td>';

                    $i = 0;
                    foreach($detail2 as $country)
                    {
                        echo '<input class="form-control" value="'.$country['pays'].'"/>';
                        if((count($detail2) > 1) && ($i < (count($detail2) - 1)))
                        {
                            echo ", ";
                        }
                        $i++;
                    }
                    echo    '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Ingrédients</th>';
                    echo 	'<td><textarea class="form-control">'.$detail1['ingredients'].'</textarea></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Poids</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['poids'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Note nutritionnelle</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['note_nutritionnelle'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Date de création</th>';
                    echo 	'<td>'.$detail1['date_creation'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Energie</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['energie'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Graisse</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['graisse'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Graisse saturée</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['graisse_sature'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Carbohydrate</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['carbohydrate'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Sucres</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['sucres'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Fibres</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['fibres'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Proteines</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['proteines'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Sel</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['sel'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Sodium</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['sodium'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Vitamine A</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['vitamin_a'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Calcium</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['calcium'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Fer</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['fer'].'"/></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo 	'<th>Score de nutrition</th>';
                    echo 	'<td><input class="form-control" value="'.$detail1['nutrition_score'].'"/></td>';
                    echo '</tr>';


        echo'   </tbody>
            </table>';

        echo '<div class="validateEditButtonContainer">
                 <input type="submit" class="validateEditButton" id="myBtn" value="Valider"/>
              </div>';
    echo '</form>';


?>

