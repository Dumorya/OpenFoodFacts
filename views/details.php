
<?php
    echo '<h2>Détails de '.$detail['nom_produit'].' :</h2>';
    echo '
    <table>
        <tbody>';
            echo '<tr>';
            echo 	'<th>Nom du produit</th>';
            echo 	'<td>'.$detail['nom_produit'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Marque</th>';
            echo 	'<td>'.$detail['marque'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Poids</th>';
            echo 	'<td>'.$detail['poids'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Note nutritionnelle</th>';
            echo 	'<td>'.$detail['note_nutritionnelle'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Date de création</th>';
            echo 	'<td>'.$detail['date_creation'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Energie</th>';
            echo 	'<td>'.$detail['energie'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Graisse</th>';
            echo 	'<td>'.$detail['graisse'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Graisse saturée</th>';
            echo 	'<td>'.$detail['graisse_sature'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Carbohydrate</th>';
            echo 	'<td>'.$detail['carbohydrate'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Sucres</th>';
            echo 	'<td>'.$detail['sucres'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Fibres</th>';
            echo 	'<td>'.$detail['fibres'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Proteines</th>';
            echo 	'<td>'.$detail['proteines'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo 	'<th>Sel</th>';
            echo 	'<td>'.$detail['sel'].'</td>';
            echo '</tr>';
            echo 	'<th>Sodium</th>';
            echo 	'<td>'.$detail['sodium'].'</td>';
            echo '</tr>';
            echo 	'<th>Vitamine A</th>';
            echo 	'<td>'.$detail['vitamin_a'].'</td>';
            echo '</tr>';
            echo 	'<th>Calcium</th>';
            echo 	'<td>'.$detail['calcium'].'</td>';
            echo '</tr>';
            echo 	'<th>Fer</th>';
            echo 	'<td>'.$detail['fer'].'</td>';
            echo '</tr>';
            echo '</tr>';
            echo 	'<th>Score de nutrition</th>';
            echo 	'<td>'.$detail['nutrition_score'].'</td>';
            echo '</tr>';
    echo'</tbody></table>';

?>

