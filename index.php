<?php
	session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Open Food Facts</title>
        <meta name="description" content="A crowdfounding web application">
        <link rel="shortcut icon" href="public/images/bar_code.png"/>
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/font-awesome-4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <?php
            require ('controllers/controller.php');

            if (isset($_GET['action']))
            {
                switch ($_GET['action'])
                {
                    case 'products':
                        getProducts();
                    break;
                    case 'details':
                        getDetails();
                    break;
                    case 'edit':
                        edit();
                    break;
                    default:
                        getProducts();
                    break;
                }
            }
            else
            {
                getProducts();
            }
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="public/js/style.js"></script>
        <script type="text/javascript" src="public/js/smoothScroll.js"></script>
    </body>

    <footer>
		<div>Site réalisé par <a href="http://www.clara-cassel.fr" target="_blank">Clara Cassel</a> et <a href="http://justine-szevoczyk.pagesperso-orange.fr/" target="_blank">Justine Szevoczyk</a></div>
    </footer>
</html>
