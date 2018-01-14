<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 06/01/2018
 * Time: 18:45
 */

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
    public function getProducts($creatorFilters, $brandFilters, $nutritionalScoreFilters, $ingredientFilters, $research, $limit)
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
                       FROM 
                          open_food_facts.produit
                       ';

            //construction condition
            $params = [];

            // utilisation des filtres
            if ($creatorFilters !== null)
            {
                $query .= 'WHERE createur LIKE ?';
                $params[] = '%'.$creatorFilters.'%';
                $multiFilter = true;
            }

            if ($brandFilters !== null)
            {
                if (true === $multiFilter)
                {
                    $query .= ' AND ';
                }
                else
                {
                    $query .= ' WHERE ';
                }
                $query .= ' marque LIKE ?';
                $params[] = '%'.$brandFilters.'%';
                $multiFilter = true;
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
                $query .= ' note_nutritionnelle LIKE ?';
                $params[] = '%'.$nutritionalScoreFilters.'%';
                $multiFilter = true;
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
                $query .= ' ingredients LIKE ?';
                $params[] = '%'.$ingredientFilters.'%';

            }

            //fonction de recherche
            if ($research !== null)
            {
                $query .= 'WHERE nom_produit LIKE ?';
                $params[] = '%'.$research.'%';
            }

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
                if($filter['nom'] == 'createur')
                {
                    $columnName     = 'createur';
                    $displayName    = 'Créateur';
                    $filterId       = 'creatorFilters';
                    $filtersList    = 'creatorFiltersList';

                }
                else if($filter['nom'] == 'marque')
                {
                    $columnName     = 'marque';
                    $displayName    = 'Marque';
                    $filterId       = 'brandFilters';
                    $filtersList    = 'brandFiltersList';
                }
                else if($filter['nom'] == 'ingredients')
                {
                    $columnName     = 'ingredients';
                    $displayName    = 'Ingrédients';
                    $filterId       = 'ingredientFilters';
                    $filtersList    = 'ingredientFiltersList';
                }
                else if($filter['nom'] == 'note_nutritionnelle')
                {
                    $columnName     = 'note_nutritionnelle';
                    $displayName    = 'Note nutritionnelle';
                    $filterId       = 'nutritionalScoreFilters';
                    $filtersList    = 'nutritionalScoreFiltersList';
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

        //retourne les caractéristique de chaque filtre pour l'autocomplete de l'input
        return $filterCarac;
    }

    function getDetails($chosenProductId)
    {
        $result = null;

        $query = '
            SELECT
                DISTINCT id_produit,
                nom_produit,
                marque,
                poids,
                note_nutritionnelle,
                date_creation,
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
                calcium,
                fer,
                nutrition_score
            FROM
                open_food_facts.produit
            WHERE
                id_produit = ?;';
        $params = [$chosenProductId];

        if ($this->_dbh !== null)
        {
            $prep = $this->_dbh->prepare($query);
            $prep->execute($params);
            $result = $prep->fetch();
        }

        return $result;
    }
}