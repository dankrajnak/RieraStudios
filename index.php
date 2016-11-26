<?php


// Include Config
require('config.php');

// Include Classes
require('classes/Bootstrap.php');
require('classes/Section.php');


//Include sections
require('sections/home.php');
require('sections/fourofour.php');
require('sections/about.php');
require('sections/artbrut.php');
require('sections/artbrutartists.php');
require('sections/outsiderartartists.php');
require('sections/exhibitions.php');
require('sections/press.php');
require('sections/contact.php');
require('sections/mobile.php');




$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createSection();

if($controller){
	$controller->index();
}

?>