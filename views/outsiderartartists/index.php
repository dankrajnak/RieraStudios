<div class="section" id="artbrutartistssection">
	<div class="sectiontable" id="artbrutartiststable">
		<div class="sectiontitle" id="artbrutartistssectiontitle" style="text-align: center; padding-top:40px;">
			OUTSIDER ART ARTISTS
		</div>
		<div class = "container artisttable text">
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Bernardo-Sarria-Almoguea/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/bernardoartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/bernardoartistred.jpg"></image>
				<h4>BERNARDO SARRIA</h4>
				</a>
			</div>
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Federico-Garcia-Cortizas/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/federicoartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/federicoartistred.jpg"></image>
				<h4>FEDERICO GARCIA CORTIZAS</h4>
				</a>
			</div>
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Isabel-Aleman-Corrales/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/isabelartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/isabelartistred.jpg"></image>
				<h4>ISABEL ALEMAN CORRALES</h4>
				</a>
			</div>

			<div class="clearfix"></div>

			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Luis-M-Otero-Alcantara/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/luismanuelartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/luismanuelartistred.jpg"></image>
				<h4>LUIS MANUEL OTERO ALCANTARA</h4>
				</a>
			</div>
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Ramon-Moya-Hernandez/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/moyaartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/moyaartistred.jpg"></image>
				<h4>RAMON MOYA HERNANDEZ</h4>
				</a>
			</div>
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Pavel-Alvarez-Mesa/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/pavelartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/pavelartistred.jpg"></image>
				<h4>PAVEL ALVAREZ MESA</h4>
				</a>
			</div>

			<div class="clearfix"></div>

			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Pedro-Oses-Diaz/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/pedroosesartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/pedroosesartistred.jpg"></image>
				<h4>PEDRO OSES DIAZ</h4>
				</a>
			</div>
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Ruben-G-Guerrero-Garrido/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/rubenartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/rubenartistred.jpg"></image>
				<h4>RUBEN GERARDO GUERRERO GARRIDO</h4>
				</a>
			</div>
			<div class= "col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo ROOT_PATH ?>outsiderartartists/Victor-M-Moreno-Pineiro/">
				<image class="tablepicture" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/victormorenoartist.jpg"></image>
				<image class="tablepicturered" id="artisttablepicture" src="<?php echo ROOT_PATH ?>assets/images/outsiderartartists/victormorenoartistred.jpg"></image>
				<h4>VICTOR M. MORENO PINEIRO</h4>
				</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var pictures = document.querySelectorAll(".tablepicture, .tablepicturered");
	var tds = document.querySelectorAll("tr td");
	var h4s = document.querySelectorAll(".sectiontablecontent h4");


	document.addEventListener("DOMContentLoaded", function(event){
	
	if(window.innerWidth>980){
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", window.innerWidth*.27."px");
			pictures[i].setAttribute("width", window.innerWidth*.27."px");
		}
		
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", window.innerWidth*.27+30."px");
			tds[i].setAttribute("width", window.innerWidth*.27+30."px");
			

		}


	}
	else{
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", 980*.27."px");
			pictures[i].setAttribute("width", 980*.27."px");	

		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", 980*.27+30."px");
			tds[i].setAttribute("width", 980*.27+30."px");
		}



	}
	});

	window.addEventListener("resize", function(){
	if(window.innerWidth>980){
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", window.innerWidth*.27."px");
			pictures[i].setAttribute("width", window.innerWidth*.27."px");	
		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", window.innerWidth*.27+30."px");
			tds[i].setAttribute("width", window.innerWidth*.27+30."px");
		}


	}
	else{
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", 980*.27."px");
			pictures[i].setAttribute("width", 980*.27."px");	

		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", 980*.27+30."px");
			tds[i].setAttribute("width", 980*.27+30."px");
		}


	}
	})

</script>