<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 06/01/2018
 * Time: 18:45
 */

require ('models/model.php');

function getProducts()
{


    $brandFilters             = null;
    $creatorFilters           = null;
    $nutritionalScoreFilters  = null;
    $ingredientFilters        = null;
    $research                 = null;
    $limit                    = null;

    //init valeur
    if(isset($_POST['brandFilters']))
    {
        $brandFilters = ($_POST['brandFilters'] != '') ? $_POST['brandFilters'] : null;
    }
    if(isset($_POST['creatorFilters']))
    {
        $creatorFilters = ($_POST['creatorFilters'] != '') ? $_POST['creatorFilters'] : null;
    }
    if(isset($_POST['nutritionalScoreFilters']))
    {
        $nutritionalScoreFilters = ($_POST['nutritionalScoreFilters'] != '') ? $_POST['nutritionalScoreFilters'] : null;
    }
    if(isset($_POST['ingredientFilters']))
    {
        $ingredientFilters = ($_POST['ingredientFilters'] != '') ? $_POST['ingredientFilters'] : null;
    }
    if(isset($_POST['research']))
    {
        $research = ($_POST['research'] != '') ? $_POST['research'] : null;
    }

    if(null === $brandFilters &&
       null === $creatorFilters &&
       null === $nutritionalScoreFilters &&
       null === $ingredientFilters &&
       null === $research
    )
    {
        $limit = 50;
    }

    $model       = new Model();
    $rows        = $model->getProducts($creatorFilters, $brandFilters, $nutritionalScoreFilters, $ingredientFilters, $research, $limit);
    $filterCarac = $model->getFilters();

    $products = array();
    if (count($rows) > 0)
    {
        foreach ($rows as $row)
        {
            $products[] = array(
                'productId'        => $row['id_produit'],
                'ingredients'      => $row['ingredients'],
                'brand'            => $row['marque'],
                'name'             => $row['nom_produit'],
                'nutritionalGrade' => $row['note_nutritionnelle']
            );
        }
    }

    require ('views/products.php');
}

function getDetails()
{
    $chosenProductId = $_GET['chosenProductId'];
    $model = new Model();
    $detail = $model->getDetails($chosenProductId);

    require ('views/details.php');

}