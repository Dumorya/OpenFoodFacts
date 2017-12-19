<?php

	try{
		$dbh = new PDO($driver.':host='.$hostname.';port='.$port.';dbname='.$dbname,$user,$pass);
		$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		echo "Connexion OK\n";
	} catch (PDOException $e) {
		$dbh = null;
		echo 'ERREUR DB: '.$e->getMessage();
	}

?>
