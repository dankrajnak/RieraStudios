<div class="section" id="donationsection">
<div style="display:none;">
    <div id="ninja-slider">
        <div class="slider-inner">
            <ul>
                <li>
                    <a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations1.jpg"></a> 
                </li>
                <li>
                    <a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations2.jpg"></a>
                </li>
                <li>
                    <a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations3.jpg"></a>
                </li>
                <li>
                    <a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations4.jpg"></a>
                </li>
                <li>
                    <a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations5.jpg"></a>
                </li>
                <li>
                	<a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations6.jpg"></a>
                </li>
                <li>
                	<a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations7.jpg"></a>
                </li>
                <li>
                	<a class="ns-img" href="<?php echo ROOT_PATH ?>assets/images/donations/donations8.jpg"></a>
                </li>
            </ul>
            <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
        </div>
	</div>
</div>
<div style="width: 100%; margin: 40px auto; background-color:#191919;"> 	
	<div style="max-width:900px; margin: auto; padding-top: 40px;">
		<div class="gallery">
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations1.jpg" onclick="lightbox(0)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations2.jpg" onclick="lightbox(1)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations3.jpg" onclick="lightbox(2)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations4.jpg" onclick="lightbox(3)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations5.jpg" onclick="lightbox(4)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations6.jpg" onclick="lightbox(4)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations7.jpg" onclick="lightbox(4)" style="width:auto; height:140px; cursor: pointer;"/>
		    <img src="<?php echo ROOT_PATH ?>assets/images/donations/donations8.jpg" onclick="lightbox(4)" style="width:auto; height:140px; cursor: pointer;"/>
		</div>
	</div>
</div>
<div class="sectionmenu" id="donationssectionmenu" style="margin-top: 40px">
	<ul>
		<li><a href="<?php echo ROOT_PATH ?>artbrut/">ART BRUT PROJECT</a></li>
	</ul>
</div>
<div class="sectiontext" id="donationssectiontext" style="margin-top: 20px">
		<div class="sectiontitle" id="donationssectiontitle">
		DONATIONS
		</div>
		<div class="sectionbody" id="donationsectionbody">
			<p>
		Purchasing artworks is just one way you can help to support our project and make possible the insertion of more creators, most of them people with mental disorders or serious health conditions.  Our project doesn't only support their work but also their lives. The artists get the 80% of the sales and the rest goes to promotion costs, marketing, exhibition-related elements and purchase of art supplies. Since Art Brut Project Cuba is outside the scope of government support, we depend completely on the generous support of individuals and associations. 
		<br>
		<br>
		You can be part of it through your donations. You can help us buy art supplies, provide conditions to carry out workshops, for work residencies, prepare exhibitions and create many other opportunities for many of our creators with special needs. You can also send us donations of art supplies or contribute in the way you think would be appropriate.
		Please, if you wish to contribute to our project in the ways you prefer, just email us at: samuelriera@cubarte.cult.cu and let us know your intentions. 
		<br>
		<br>
		<br>
		<span style="font-weight: bold">Donors and collaborators of Art Brut Project Cuba (alphabetical order)</span>
		<ul>
		<li>Ada Azor (Circuito Líquido, Cuba)</li>
		<li>Anne Marie Stock</li>
		<li>Antoine de Galbert (La Maison Rouge, France)</li>
		<li>Arlene Ladaga (Galeria Casa 8, Cuba)</li>
		<li>Bryn Freedman</li>
		<li>Carol Colby Tanenbaum</li>
		<li>Christine Garde (Could You? USA)</li>
		<li>Ciel Liu</li>
		<li>Claudia González Marrero</li>
		<li>Daniel Klein | Christian Berst (Christian Berst Gallery, France)</li>
		<li>Eduardo Digen Bolet</li>
		<li>Eliza Murphy</li>
		<li>Georgia A. Henkel</li>
		<li>Harold Renzoli</li>
		<li>Henry Obispo (Born Inc. USA)</li>
		<li>Irina Echarry (Havana Times magazine, Cuba)</li>
		<li>Lloyd Sutton</li>
		<li>María A. Felipe García</li>
		<li>María de los Ángeles Matienzo</li>
		<li>Moraima Clavijo</li>
		<li>Nathan To</li>
		<li>National Art Exhibitions of the Mentally Ill (USA)</li>
		<li>Nico van der Endt (Galerie Hamer, The Netherlands)</li>
		<li>Nora Rodriguez Calzadilla</li>
		<li>Pablo Platas Casteleiros</li>
		<li>Peggy Callahan (AnonymousGood.org, USA)</li>
		<li>Phillip March Jones (Institute 193, USA)</li>
		<li>Raquel Carrera</li>
		<li>Raw Vision magazine (UK)</li>
		<li>Rita M González Denis (Cultural Agency Paradiso, Cuba)</li>
		<li>Roslyn Bernstein</li>
		<li>Sandra Ceballos (Espacio Aglutinador, Cuba)</li>
		<li>Sandra Fuentes (National Academy of Fine Arts “San Alejandro”, Cuba)</li>
		<li>Tamara Park </li>
		<li>Whynde Kuehn (Metanoia Global Inc. USA)</li>
		<li>William Riera</li>
		</ul>
		</p>
		</div>
	</div>
</div>
<script>
    function lightbox(idx) {
        //Show the slider wrapper
        var ninjaSldr = document.getElementById("ninja-slider");
        ninjaSldr.parentNode.style.display = "block";

        //Then init the slider
        //Note: The { initSliderByCallingInitFunc: true } option in the 
        // ninja-slider.js tells the page not to initiate the slider
        // unless the following init(idx) function is called.
        nslider.init(idx);

        //Then mimic clicking the fullscreen button to popup the modal
        var fsBtn = document.getElementById("fsBtn");
        fsBtn.click();
    }

    function fsIconClick(isFullscreen) {
        //Note: fsIconClick is the default event handler of the fullscreen button
        var ninjaSldr = document.getElementById("ninja-slider");
        ninjaSldr.parentNode.style.display = isFullscreen ? "block" : "none";
    }
</script>

