<HTML>
	<head>
	<link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH.STANDARD_CSS;?>"/>	

	<title> Riera Studio - Havana, Cuba </title>
	<script src="<?php echo ROOT_PATH ?>assets/js/libraries/p5.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_PATH ?>assets/js/libraries/p5.dom.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_PATH ?>assets/js/Box.js" type="text/javascript"></script>
	</head>
	
	<body>
		<div class="header">
			<h1 id="title">RIERA STUDIO</h1>
			<h3 id="subtitle">CUBAN ART | ART BRUT | OUTSIDER ART</h3>
		</div>
		<div id="mainmenu">
			<ul id="mainmenuitems">
				<li>
					<a href="about/">ABOUT US</a>
				</li>
				<li>
					<a href="<?php echo ROOT_PATH ?>artbrut/">ART BRUT PROJECT CUBA</a></li>
				<li class = "dropdown" id="main-dropdown">
					ARTISTS <image src="<?php echo ROOT_PATH ?>views/home/triangle.jpg" class="dropdownimage" id="maindropdownimage" width="8" height="9""></image>
					<div class="dropdown-content" id="main-dropdown-content">
						<a href="<?php echo ROOT_PATH ?>artbrutartists/">ART BRUT</a>
						<a href="<?php echo ROOT_PATH ?>outsiderartartists/">OUTSIDER ART</a>
					</div>
				</li>
				<li><a href="<?php echo ROOT_PATH ?>exhibitions/">EXHIBITIONS</a></li>
				<li><a href="http://rierastudioart.cubava.cu">BLOG</a></li>
				<li><a href="<?php echo ROOT_PATH ?>press/">PRESS RELEASE</a></li>
				<li><a href="<?php echo ROOT_PATH ?>contact/">CONTACT</a></li>
			</ul>
		</div>	
	</body>
</HTML>