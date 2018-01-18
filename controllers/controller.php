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
    $countryFilter		  	  = null;
    $research                 = null;
    $limit                    = null;
    $contains				  = null;
    $radioButton			  = null;

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
    if(isset($_POST['countryFilter']))
    {
        $countryFilter = ($_POST['countryFilter'] != '') ? $_POST['countryFilter'] : null;
    }
    if(isset($_POST['research']))
    {
        $research = ($_POST['research'] != '') ? $_POST['research'] : null;
    }
    if(isset($_POST['contains']))
    {
        $contains = ($_POST['contains'] != '') ? $_POST['contains'] : null;
    }
    if(isset($_POST['radioButton']))
    {
        $radioButton = ($_POST['radioButton'] != '') ? $_POST['radioButton'] : null;
    }

    //si aucune action n'a été réalisée, 50 produits sont affichés
    if(null === $brandFilters &&
       null === $creatorFilters &&
       null === $nutritionalScoreFilters &&
       null === $ingredientFilters &&
       null === $countryFilter &&
       null === $research
      )
    {
        $limit = 50;
    }
            
    /**
     *  Ajout d'un produit
     */

    $addProductCreatorName 		= null;
    $addProductProductName		= null;
    $addProductBrand			= null;
    $addProductCountry			= null;
    $addProductWeight			= null;
    $addProductNutritionalGrade = null;
    $addProductEnergy			= null;
    $addProductFat				= null;
    $addProductSaturatedFat		= null;
    $addProductSugar			= null;
    $addProductCarbohydrate		= null;
    $addProductProteines		= null;
    $addProductSalt				= null;
    $addProductSodium			= null;
    $addProductAVitamin			= null;
    $addProductCVitamin			= null;
    $addProductCalcium			= null;
    $addProductIron				= null;
    $addProductIngredients		= null;
    $addProductFibers			= null;
    $addProductNutritionScore	= null;

    if(isset($_POST['addProductCreatorName']))
    {
        $addProductCreatorName = ($_POST['addProductCreatorName'] != '') ? $_POST['addProductCreatorName'] : null;
    }
    if(isset($_POST['addProductProductName']))
    {
        $addProductProductName = ($_POST['addProductProductName'] != '') ? $_POST['addProductProductName'] : null;
    }
    if(isset($_POST['addProductBrand']))
    {
        $addProductBrand = ($_POST['addProductBrand'] != '') ? $_POST['addProductBrand'] : null;
    }
    if(isset($_POST['addProductWeight']))
    {
        $addProductWeight = ($_POST['addProductWeight'] != '') ? $_POST['addProductWeight'] : null;
    }
    if(isset($_POST['addProductCountry']))
    {
        $addProductCountry = ($_POST['addProductCountry'] != '') ? $_POST['addProductCountry'] : null;
    }
    if(isset($_POST['addProductNutritionalGrade']))
    {
        $addProductNutritionalGrade = ($_POST['addProductNutritionalGrade'] != '') ? $_POST['addProductNutritionalGrade'] : null;
    }
    if(isset($_POST['addProductEnergy']))
    {
        $addProductEnergy = ($_POST['addProductEnergy'] != '') ? $_POST['addProductEnergy'] : null;
    }
    if(isset($_POST['addProductFat']))
    {
        $addProductFat = ($_POST['addProductFat'] != '') ? $_POST['addProductFat'] : null;
    }
    if(isset($_POST['addProductSaturatedFat']))
    {
        $addProductSaturatedFat = ($_POST['addProductSaturatedFat'] != '') ? $_POST['addProductSaturatedFat'] : null;
    }
    if(isset($_POST['addProductSugar']))
    {
        $addProductSugar = ($_POST['addProductSugar'] != '') ? $_POST['addProductSugar'] : null;
    }
    if(isset($_POST['addProductCarbohydrate']))
    {
        $addProductCarbohydrate = ($_POST['addProductCarbohydrate'] != '') ? $_POST['addProductCarbohydrate'] : null;
    }
    if(isset($_POST['addProductProteines']))
    {
        $addProductProteines = ($_POST['addProductProteines'] != '') ? $_POST['addProductProteines'] : null;
    }
    if(isset($_POST['addProductSalt']))
    {
        $addProductSalt	 = ($_POST['addProductSalt'] != '') ? $_POST['addProductSalt'] : null;
    }
    if(isset($_POST['addProductSodium']))
    {
        $addProductSodium = ($_POST['addProductSodium'] != '') ? $_POST['addProductSodium'] : null;
    }
    if(isset($_POST['addProductAVitamin']))
    {
        $addProductAVitamin = ($_POST['addProductAVitamin'] != '') ? $_POST['addProductAVitamin'] : null;
    }
    if(isset($_POST['addProductCVitamin']))
    {
        $addProductCVitamin = ($_POST['addProductCVitamin'] != '') ? $_POST['addProductCVitamin'] : null;
    }
    if(isset($_POST['addProductCalcium']))
    {
        $addProductCalcium	 = ($_POST['addProductCalcium'] != '') ? $_POST['addProductCalcium'] : null;
    }
    if(isset($_POST['addProductIron']))
    {
        $addProductIron = ($_POST['addProductIron'] != '') ? $_POST['addProductIron'] : null;
    }
    if(isset($_POST['addProductIngredients']))
    {
        $addProductIngredients = ($_POST['addProductIngredients'] != '') ? $_POST['addProductIngredients'] : null;
    }
    if(isset($_POST['addProductFibers']))
    {
        $addProductFibers = ($_POST['addProductFibers'] != '') ? $_POST['addProductFibers'] : null;
    }
    if(isset($_POST['addProductNutritionScore']))
    {
        $addProductNutritionScore = ($_POST['addProductNutritionScore'] != '') ? $_POST['addProductNutritionScore'] : null;
    }

    /*$addProductCreatorName 		= $_POST['addProductCreatorName'];
	$addProductProductName		= $_POST['addProductProductName'];
	$addProductBrand			= $_POST['addProductBrand'];
	$addProductCountry			= $_POST['addProductCountry'];
	$addProductWeight			= $_POST['addProductWeight'];
	$addProductNutritionalGrade = $_POST['addProductNutritionalGrade'];
	$addProductEnergy			= $_POST['addProductEnergy'];
	$addProductFat				= $_POST['addProductFat'];
	$addProductSaturatedFat		= $_POST['addProductSaturatedFat'];
	$addProductSugar			= $_POST['addProductSugar'];
	$addProductCarbohydrate		= $_POST['addProductCarbohydrate'];
	$addProductProteines		= $_POST['addProductProteines'];
	$addProductSalt				= $_POST['addProductSalt'];
	$addProductSodium			= $_POST['addProductSodium'];
	$addProductAVitamin			= $_POST['addProductAVitamin'];
	$addProductCVitamin			= $_POST['addProductCVitamin'];
	$addProductCalcium			= $_POST['addProductCalcium'];
	$addProductIron				= $_POST['addProductIron'];
	$addProductIngredients		= $_POST['addProductIngredients'];
	$addProductFibers			= $_POST['addProductFibers'];
	$addProductNutritionScore	= $_POST['addProductNutritionScore'];*/
    

    if($addProductNutritionalGrade === 'Aucune')
    {
        $addProductNutritionalGrade = '';
    }
    if($addProductEnergy === '')
    {
        $addProductEnergy = 'null';
    }
    if($addProductFat === '')
    {
        $addProductFat = 'null';
    }
    if($addProductSaturatedFat === '')
    {
        $addProductSaturatedFat = 'null';
    }
    if($addProductSugar === '')
    {
        $addProductSugar = 'null';
    }
    if($addProductCarbohydrate === '')
    {
        $addProductCarbohydrate = 'null';
    }
    if($addProductProteines === '')
    {
        $addProductProteines = 'null';
    }
    if($addProductSalt === '')
    {
        $addProductSalt = 'null';
    }
    if($addProductSodium === '')
    {
        $addProductSodium = 'null';
    }
    if($addProductAVitamin === '')
    {
        $addProductAVitamin = 'null';
    }
    if($addProductCVitamin === '')
    {
        $addProductCVitamin = 'null';
    }
    if($addProductCalcium === '')
    {
        $addProductCalcium = 'null';
    }
    if($addProductIron === '')
    {
        $addProductIron = 'null';
    }
    if($addProductFibers === '')
    {
        $addProductFibers = 'null';
    }
    if($addProductNutritionScore === '')
    {
        $addProductNutritionScore = 'null';
    }
	
    $model       = new Model();
    $rows        = $model->getProducts(
		$creatorFilters,
		$brandFilters,
		$nutritionalScoreFilters,
		$ingredientFilters,
		$countryFilter,
		$research,
		$limit,
		$contains,
		$radioButton,
		$addProductCreatorName,
		$addProductProductName,
		$addProductBrand,
        $addProductCountry,
		$addProductWeight,
		$addProductNutritionalGrade,
		$addProductEnergy,
		$addProductFat,
		$addProductSaturatedFat,
		$addProductSugar,
		$addProductCarbohydrate,
		$addProductProteines,
		$addProductSalt,
		$addProductSodium,
		$addProductAVitamin,
		$addProductCVitamin,
		$addProductCalcium,
		$addProductIron,
		$addProductIngredients,
		$addProductFibers,
		$addProductNutritionScore
	);
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
