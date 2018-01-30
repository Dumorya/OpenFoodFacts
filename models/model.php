<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 06/01/2018
 * Time: 18:45
 */

// Pour voir l'entierté d'un var dump
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

include_once ('connect.php');

class Model
{

    private $_dbh;

    /**
     * model constructor.
     */
    function __construct()
    {
        try
        {
            $this->_dbh = new PDO(DRIVER.':host='.HOSTNAME.';port='.PORT.';dbname='.DBNAME, USER, PASS);
            $this->_dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            $this->_dbh = null;
        }
    }

    /**
     * get les produits suivant les criteres
     *
     * @param string  $creatorFilters           filtre sur les createurs
     * @param string  $brandFilters             filtre sur les marques
     * @param string  $nutritionalScoreFilters  filtre sur la note
     * @param string  $ingredientFilters        filtre sur les ingredients
     * @param string  $limit                    met une limite sur le nb de produits à afficher
     *
     * @return array|null
     */
    public function getProducts(
		$creatorFilters,
		$brandFilters,
		$nutritionalScoreFilters,
		$ingredientFilters,
		$countryFilter,
		$research,
		$limit,
		$contains,
		$radioButton,
        &$tableTitle
        )
    {

        $rows = null;
        
        if ($this->_dbh !== null)
        {
            $multiFilter = false;

            //init query
            // requête de base, affiche tous les produits
            $query = 'SELECT
                          id_produit,
                          nom_produit,
                          marque,
                          ingredients,
                          note_nutritionnelle
                      FROM open_food_facts.produit
                       ';

            //construction condition
            $params = [];

            // utilisation des filtres
            if ($creatorFilters !== null)
            {
                $query .= ' WHERE LOWER(createur) LIKE ?';
                $params[] = strtolower('%'.$creatorFilters.'%');
                $multiFilter = true;
                $tableTitle = 'Résultat de la recherche';
            }

            if ($brandFilters !== null)
            {
                if (true == $multiFilter)
                {
                    $query .= ' AND ';
                }
                else
                {
                    $query .= ' WHERE ';
                }
                $query .= ' LOWER(marque) LIKE ?';
                $params[] = strtolower('%'.$brandFilters.'%');
                $multiFilter = true;
                $tableTitle = 'Résultat de la recherche';
            }

            if ($nutritionalScoreFilters !== null)
            {
                if (true === $multiFilter)
                {
                    $query .= ' AND ';
                }
                else
                {
                    $query .= ' WHERE ';
                }
                $query .= ' LOWER(note_nutritionnelle) LIKE ?';
                $params[] = strtolower('%'.$nutritionalScoreFilters.'%');
                $multiFilter = true;
                $tableTitle = 'Résultat de la recherche';
            }

            if ($ingredientFilters !== null)
            {
                if (true === $multiFilter)
                {
                    $query .= ' AND ';
                }
                else
                {
                    $query .= ' WHERE ';
                }
                $query .= ' LOWER(ingredients) LIKE ?';
                $params[] = strtolower('%'.$ingredientFilters.'%');
				$multiFilter = true;
                $tableTitle = 'Résultat de la recherche';
            }

            if ($countryFilter !== null)
            {
                if (true === $multiFilter)
                {
                    $query .= ' AND ';
                }
                else
                {
                    $query .= ' WHERE ';
                }
                $query .= ' LOWER(pays) LIKE ?';
                $params[] = strtolower('%'.$countryFilter.'%');
				$multiFilter = true;
                $tableTitle = 'Résultat de la recherche';
            }
                        
            if ($contains != null)
            {
				if ($radioButton != null)
				{
					if($radioButton === 'contains')
					{
						if (true === $multiFilter)
						{
							$query .= ' AND ';
						}
						else
						{
							$query .= ' WHERE ';
						}
						$query .= ' LOWER(ingredients) LIKE ?';
						$params[] = strtolower('%'.$contains.'%');
                        $tableTitle = 'Résultat de la recherche';
					}
					else if($radioButton === 'notContains')
					{
						if (true === $multiFilter)
						{
							$query .= ' AND ';
						}
						else
						{
							$query .= ' WHERE ';
						}
						$query .= ' LOWER(ingredients) NOT LIKE ?';
						$params[] = strtolower('%'.$contains.'%');
                        $tableTitle = 'Résultat de la recherche';
					}
				}

            }

            //fonction de recherche
            if ($research !== null)
            {
                $researchTable = str_word_count($research, 1);
                if(count($researchTable) > 1)
                {
                    $i = 0;
                    $query .= ' WHERE ';
                    foreach($researchTable as $rT)
                    {
                        $query .= 'LOWER(nom_produit) LIKE ?';
                        $params[] = strtolower('%'.$rT.'%');
                        $i++;
                        if($i < count($researchTable))
                        {
                            $query .= ' AND ';
                        }
                    }
                }
                else
                {
                    $query .= ' WHERE LOWER(nom_produit) LIKE ?';
                    $params[] = strtolower('%'.$research.'%');
                }
                $tableTitle = 'Résultat de la recherche';
            }
            
            $query .= ' ORDER BY id_produit DESC ';

            //ajout d'une limite pour l'affichage du résultat
            if(isset($limit))
            {
                $query .= ' LIMIT ? ';
                $params[] = $limit;
            }

            if ($this->_dbh !== null)
            {
                $prep = $this->_dbh->prepare($query);
                $prep->execute($params);
                $rows = $prep->fetchAll();
            }

        }

        return $rows;
    }

    public function addProducts(
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
    )
    {

        //Ajout produit sans pays

        $queryAddProduct = '
        INSERT INTO 
            open_food_facts.produit
            (createur,
            nom_produit,
            marque,
            poids,
            note_nutritionnelle,
            energie,
            graisse,
            graisse_sature,
            carbohydrate,
            sucres,
            fibres,
            proteines,
            sel,
            sodium,
            vitamin_a,
            vitamin_c,
            calcium,
            fer,
            nutrition_score,
            ingredients,
            date_creation,
            date_modification) 
        SELECT 
            \''.$addProductCreatorName.'\',
            \''.$addProductProductName.'\',
            \''.$addProductBrand.'\',
            \''.$addProductWeight.'\',
            \''.$addProductNutritionalGrade.'\',
            '.$addProductEnergy.',
            '.$addProductFat.',
            '.$addProductSaturatedFat.',
            '.$addProductCarbohydrate.',
            '.$addProductSugar.',
            '.$addProductFibers.',
            '.$addProductProteines.',
            '.$addProductSalt.',
            '.$addProductSodium.',
            '.$addProductAVitamin.',
            '.$addProductCVitamin.',
            '.$addProductCalcium.',
            '.$addProductIron.',
            '.$addProductNutritionScore.',
            \''.$addProductIngredients.'\',
             now(),
             now()
        FROM 
            open_food_facts.produit
        WHERE NOT EXISTS
            (SELECT 
                1
            FROM 
                open_food_facts.produit 
            WHERE 
                LOWER(createur) = \''.strtolower($addProductCreatorName).'\' 
            AND 
                LOWER(nom_produit) = \''.strtolower($addProductProductName).'\' 
            AND 
                LOWER(marque) = \''.strtolower($addProductBrand).'\'
            ) 
        LIMIT 1';

        if ($this->_dbh !== null)
        {
            $res = $this->_dbh->query($queryAddProduct);
        }



        // Ajout produit avec pays

        $countriesResQuery = array();
        $countriesResQuery = str_word_count($addProductCountry, 1);

        foreach($countriesResQuery as $country)
        {
            $countryQuery = '
            INSERT INTO
              open_food_facts.pays(nom)
            SELECT
              \''.$country.'\'
            FROM
              open_food_facts.pays
            WHERE NOT EXISTS
              (SELECT
                  *
              FROM
                  open_food_facts.pays
              WHERE
                  LOWER(nom) = LOWER(\''.$country.'\'))
            LIMIT 1;';

            $hasCountryQuery = '
            INSERT INTO
              open_food_facts.possede_pays(id_pays,id_produit)
            SELECT
              (SELECT
                id_pays
              FROM
                open_food_facts.pays
              WHERE
                LOWER(nom) = LOWER(\''.$country.'\')
              LIMIT 1),
            (SELECT
              id_produit
            FROM
              open_food_facts.produit
            ORDER BY
              id_produit
            DESC
            LIMIT 1)';

            if ($this->_dbh !== null)
            {
                $res1 = $this->_dbh->query($countryQuery);
                $res2 = $this->_dbh->query($hasCountryQuery);
            }

        }

    }

    /**
     * retourne les filtres utilisés
     * @return array
     */
    function getFilters()
    {
        $displayName    = '';
        $filtersList    = '';
        $requestOptions = '';
        $columnName     = '';
        $filterId       = '';

        $filterCarac    = array();
        $filters        = $this->_dbh->query('
            SELECT DISTINCT 
                nom
            FROM
                open_food_facts.filtre
            WHERE
                utilise = 1 ; 
        ');

        if ($this->_dbh !== null)
        {
            // Récupération des filtres
            foreach($filters as $filter)
            {
                if($filter['nom'] === 'createur')
                {
                    $columnName     = 'createur';
                    $displayName    = 'Créateur';
                    $filterId       = 'creatorFilters';
                    $filtersList    = 'creatorFiltersList';

                }
                else if($filter['nom'] === 'marque')
                {
                    $columnName     = 'marque';
                    $displayName    = 'Marque';
                    $filterId       = 'brandFilters';
                    $filtersList    = 'brandFiltersList';
                }
                else if($filter['nom'] === 'ingredients')
                {
                    $columnName     = 'ingredients';
                    $displayName    = 'Ingrédients';
                    $filterId       = 'ingredientFilters';
                    $filtersList    = 'ingredientFiltersList';
                }
                else if($filter['nom'] === 'note_nutritionnelle')
                {
                    $columnName     = 'note_nutritionnelle';
                    $displayName    = 'Note nutritionnelle';
                    $filterId       = 'nutritionalScoreFilters';
                    $filtersList    = 'nutritionalScoreFiltersList';
                }
                else if($filter['nom'] === 'pays')
                {
                    $columnName     = 'pays';
                    $displayName    = 'Pays';
                    $filterId       = 'countryFilters';
                    $filtersList    = 'countryFiltersList';
                }

                $requestOptions = $this->_dbh->query('
                        SELECT
                          DISTINCT ' . $columnName. '
                        FROM open_food_facts.produit
                        WHERE ' . $columnName . ' IS NOT NULL
                        ORDER BY ' . $columnName . ' ASC;
                ');

                array_push($filterCarac, array(
                    "requestOptions"    => $requestOptions,
                    "columnName"        => $columnName,
                    "displayName"       => $displayName,
                    "filterId"          => $filterId,
                    "filtersList"       => $filtersList
                ));

            }

        }

        //retourne les caractéristiques de chaque filtre pour l'autocomplete de l'input
        return $filterCarac;
    }

    function getDetails($chosenProductId)
    {
        $result = null;

        $query = '
            SELECT
				id_produit,
                nom_produit,
                marque,
                createur,
                ingredients,
                poids,
                note_nutritionnelle,
                TO_CHAR(date_creation, \'DD/MM/YYYY\') AS date_creation,
                energie,
                graisse,
                graisse_sature,
                carbohydrate,
                sucres,
                fibres,
                proteines,
                sel,
                sodium,
                vitamin_a,
                vitamin_c,
                calcium,
                fer,
                nutrition_score
			FROM
				open_food_facts.produit
			WHERE id_produit = ? ;
		';

        $params = [$chosenProductId];

        if ($this->_dbh !== null)
        {
            $prep = $this->_dbh->prepare($query);
            $prep->execute($params);
            $result = $prep->fetch();
        }
        
        return $result;
    }

    function getCountryDetails($chosenProductId)
    {
        $result2 = null;

        $countryQuery = '
            SELECT
              pa.nom AS pays				
            FROM
              open_food_facts.produit po
            INNER JOIN
              open_food_facts.possede_pays pp
            ON
              po.id_produit = pp.id_produit
            INNER JOIN
              open_food_facts.pays pa
            ON
              pp.id_pays = pa.id_pays
            WHERE po.id_produit = ?            
        ';

        $params = [$chosenProductId];

        if ($this->_dbh !== null)
        {
            $prep2 = $this->_dbh->prepare($countryQuery);
            $prep2->execute($params);
            $result2 = $prep2->fetchAll();
        }

        return $result2;
    }

    function edit(
        $editProductWeight,
        $editProductNutritionalGrade,
        $editProductEnergy,
        $editProductFat,
        $editProductSaturatedFat,
        $editProductSugar,
        $editProductCarbohydrate,
        $editProductProteines,
        $editProductSalt,
        $editProductSodium,
        $editProductAVitamin,
        $editProductCVitamin,
        $editProductCalcium,
        $editProductIron,
        $editProductIngredients,
        $editProductFibers,
        $editProductNutritionScore,
        $chosenProductId
    )
    {
        $editQuery = '
            UPDATE
              open_food_facts.produit
            SET
              poids = \''.$editProductWeight.'\',
              note_nutritionnelle = \''.$editProductNutritionalGrade.'\',
              energie = '.$editProductEnergy.',
              graisse = '.$editProductFat.',
              graisse_sature = '.$editProductSaturatedFat.',
              carbohydrate = '.$editProductCarbohydrate.',
              sucres = '.$editProductSugar.',
              fibres = '.$editProductFibers.',
              proteines = '.$editProductProteines.',
              sel = '.$editProductSalt.',
              sodium = '.$editProductSodium.',
              vitamin_a = '.$editProductAVitamin.',
              vitamin_c = '.$editProductCVitamin.',
              calcium = '.$editProductCalcium.',
              fer = '.$editProductIron.',
              nutrition_score = '.$editProductNutritionScore.',
              ingredients = \''.$editProductIngredients.'\',
              date_modification = now()
            WHERE
              id_produit = '.$chosenProductId.';
        ';

        if ($this->_dbh !== null)
        {
            $res1 = $this->_dbh->query($editQuery);
        }

    }

//    function editCountry($editProductCountry,$chosenProductId)
//    {
//        $editCountryQuery1 = '
//            DELETE FROM
//              open_food_facts.possede_pays
//            WHERE
//              id_produit = \''.$chosenProductId.'\';
//        ';
//
//        $editCountryQuery2 = '
//            INSERT INTO
//              open_food_facts.pays(nom)
//            SELECT
//              nom_pays
//            FROM
//              open_food_facts.pays
//            WHERE NOT EXISTS
//              (SELECT
//                *
//              FROM
//                open_food_facts.pays
//              WHERE
//                LOWER(nom) = LOWER(nom_pays)
//              )
//            LIMIT 1;
//        ';
//
//        if ($this->_dbh !== null)
//        {
//            $res1 = $this->_dbh->query($editCountryQuery1);
//            $res2 = $this->_dbh->query($editCountryQuery2);
//        }
//    }

}
