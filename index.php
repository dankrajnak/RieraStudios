<?php


// Include Config
require('config.php');

// Include Classes
require('classes/Bootstrap.php');
require('classes/Section.php');

//Include sections
require('sections/home.php');
require('sections/about.php');
require('sections/artbrut.php');
require('sections/artbrutArtists.php');
require('sections/outsiderartartists.php');
require('sections/exhibitions.php');
require('sections/press.php');
require('sections/contact.php');




$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createSection();

if($controller){
	$controller->index();
}

?>