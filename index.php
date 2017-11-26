<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Open Food Facts</title>
        <meta name="description" content="A crowdfounding web application">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>
		<nav class="navbar navbar-default" id="nav">
			<div class="container-fluid">
			  <a class="navbar-brand" href="https://fr.openfoodfacts.org/" target="_blank" id="linkOpenFoodFacts">Open Food Facts</a>
			  <form id="searchForm">
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                          <i class="fa fa-search" aria-hidden="true"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="ex: Huile d'olive" aria-describedby="basic-addon1">
                  </div>
				  <input type="submit" value="Valider" class="validateButton btn" id="validateButton"/>
			  </form>
			</div>
		</nav>
        <div id="filterButtonContainer">
            <button id="filterButton">Filtrer</button>
        </div>

        <div id="content">
            <p>C'est notre projet !</p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis pretium arcu, sit amet tempor metus dictum in. Sed sapien mi, consectetur dapibus enim non, suscipit varius urna. Praesent ut sapien volutpat, porttitor arcu vitae, euismod mi. Praesent in sem id nisi commodo imperdiet. Phasellus ac efficitur purus. Vivamus lacinia laoreet tempor. Donec ultrices fringilla metus facilisis posuere. Ut quis nulla urna. Morbi scelerisque, nisl in venenatis finibus, ligula leo porttitor ipsum, bibendum tempus magna nisl in tellus. Sed a orci a urna gravida pharetra a sit amet mauris.

                Vivamus malesuada vel enim ac vulputate. Nullam at eleifend ligula. Integer faucibus, felis eget egestas placerat, nisl quam sollicitudin diam, et congue velit tellus non neque. Aliquam ligula tortor, ultrices id rutrum eget, vehicula interdum lorem. Pellentesque consequat, tortor vel scelerisque tempus, dolor libero maximus metus, vitae varius nibh lacus vulputate orci. Cras luctus imperdiet mauris, ornare venenatis elit pulvinar ut. Integer fringilla dignissim diam eu posuere.

                Phasellus pharetra a tellus in facilisis. In lorem sem, condimentum at eros non, pulvinar laoreet justo. Suspendisse ultrices sem nec neque finibus suscipit. Fusce sit amet ullamcorper ante. Morbi sollicitudin tempus risus in tristique. Maecenas varius, metus lobortis facilisis facilisis, nisl magna blandit est, ac mattis nibh dui vitae est. Nunc eu nulla laoreet, porttitor dui quis, imperdiet nibh. Vivamus congue aliquet lacinia.

                Morbi sit amet vestibulum ante, eget vestibulum sem. Cras a ex et nisi convallis malesuada vitae id metus. Pellentesque bibendum, nisl ac convallis pretium, ligula quam maximus eros, at pellentesque lorem tellus in purus. Nulla finibus ac felis in semper. Pellentesque a arcu fermentum, viverra ante et, posuere ex. Nunc et libero congue, pulvinar dolor at, feugiat est. Sed pretium posuere massa sit amet imperdiet. Nam ultrices vestibulum turpis, vitae sagittis neque efficitur eu. Nunc rutrum mauris vehicula auctor sollicitudin. Fusce vitae vestibulum augue. Etiam a tellus ante.

                Donec egestas varius nibh ac tincidunt. Morbi molestie fringilla aliquet. Aliquam vitae volutpat velit. Proin pharetra augue nec justo feugiat, sed congue ex eleifend. Duis in nisl at sapien condimentum iaculis in et eros. Nullam auctor tortor commodo, scelerisque dui id, placerat lorem. Fusce eget ultrices libero, ac aliquet dolor. Quisque vel porttitor ipsum, id tristique libero. Aenean odio magna, varius in viverra sit amet, sollicitudin eu est. Integer ex tellus, volutpat in iaculis vitae, finibus vel nibh. Duis aliquam nulla eget ante tincidunt, vitae tempus magna pulvinar. Vivamus scelerisque condimentum sapien eu luctus. Cras sapien urna, cursus non feugiat ac, venenatis vel nisl. Phasellus elit metus, interdum sit amet faucibus quis, faucibus sed quam. Quisque tincidunt, tellus feugiat feugiat faucibus, ligula arcu tincidunt urna, in vulputate metus odio porttitor nisl.
            </p>
        </div>

        <script type="text/javascript" src="style.js"></script>
    </body>
</html>
