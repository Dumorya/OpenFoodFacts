
<?php
    echo '<h2>Détails de '.$detail1['nom_produit'].' :</h2>';
        //echo '<input type="hidden" name="chosenProductId" value="'.$detail1['id_produit'].'"/>';
        echo '<a href="index.php?action=products"><i class="fa fa-long-arrow-left fa-4x" aria-hidden="true"></i></a>';
        echo '<div class="tableContainer">';
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
            echo 	'<th>Créateur</th>';
            echo 	'<td>'.$detail1['createur'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Pays</th>';
            echo 	'<td>';

            $i = 0;
            foreach($detail2 as $country)
            {
                echo $country['pays'];
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
            echo 	'<td>'.$detail1['ingredients'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Poids</th>';
            echo 	'<td>'.$detail1['poids'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Note nutritionnelle</th>';
            echo 	'<td>'.$detail1['note_nutritionnelle'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Date de création</th>';
            echo 	'<td>'.$detail1['date_creation'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Energie</th>';
            echo 	'<td>'.$detail1['energie'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Graisse</th>';
            echo 	'<td>'.$detail1['graisse'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Graisse saturée</th>';
            echo 	'<td>'.$detail1['graisse_sature'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Carbohydrate</th>';
            echo 	'<td>'.$detail1['carbohydrate'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Sucres</th>';
            echo 	'<td>'.$detail1['sucres'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Fibres</th>';
            echo 	'<td>'.$detail1['fibres'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Proteines</th>';
            echo 	'<td>'.$detail1['proteines'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Sel</th>';
            echo 	'<td>'.$detail1['sel'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Sodium</th>';
            echo 	'<td>'.$detail1['sodium'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Vitamine A</th>';
            echo 	'<td>'.$detail1['vitamin_a'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Vitamine C</th>';
            echo 	'<td>'.$detail1['vitamin_c'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Calcium</th>';
            echo 	'<td>'.$detail1['calcium'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Fer</th>';
            echo 	'<td>'.$detail1['fer'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Score de nutrition</th>';
            echo 	'<td>'.$detail1['nutrition_score'].'</td>';
            echo '</tr>';
    echo'</tbody></table>';
        echo '</div>';

?>

