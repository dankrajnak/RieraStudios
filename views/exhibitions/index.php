<div class="section" id="exhibitionsection">
	<div class="sectiontable" id="exhibitiontable">
		<div class="sectiontitle" id="exhibitionsectiontitle" style="text-align: center; padding-top:40px;">
			EXHIBITIONS
		</div>
		<table class="sectiontablecontent" id="exhibitionsectiontablecontent">
			<tbody>
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/3x21/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/3x21.jpg">
						</image>
						<span id="exhibitiontitle">3 X 21 <br><div id="exhibitiondate"> OCTOBER 2015</div></span>
					</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/parallelexpressions/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/parallelexpressions.jpg">
						</image>
						<span id="exhibitiontitle">PARALLEL EXPRESSIONS <div id="exhibitiondate">MAY 2015</div></span>
					</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/Cities-In-My-Mind/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/citiesinmymind.jpg"></image>
						<span id="exhibitiontitle">CITIES IN MY MIND <div id="exhibitiondate">MARCH 2015</div></span>
					</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/InterstelArt/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/interestelart.jpg"></image>
						<span id="exhibitiontitle">InterstelART<div id="exhibitiondate">FEBRUARY 2015</div></span>
					</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/Prince/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/prince.jpg">
						</image>
						<span id="exhibitiontitle">PRINCE<div id="exhibitiondate">JULY 2014</div></span>
					</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/Outsider-2/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/outsider2.jpg">
						</image>
						<span id="exhibitiontitle">OUTSIDER 2<div id="exhibitiondate">MARCH 2014</div></span>
					</a>
					</td>
				</tr>
				
				<tr>
					<td>
					<a href="<?php echo ROOT_PATH ?>exhibitions/Simple-Art/">
						<image class="tablepicture" id="exhibitiontablepicture" src="<?php echo ROOT_PATH ?>assets/images/exhibitions/simpleart.jpg">
						</image>
						<span id="exhibitiontitle">SIMPLE ART<div id="exhibitiondate">JUNE 2013</div></span>
					</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">

	var pictures = document.querySelectorAll(".tablepicture, .tablepicturered");
	var tds = document.querySelectorAll("tr, td");
	var spans = document.querySelectorAll(".sectiontablecontent span");

	document.addEventListener("DOMContentLoaded", function(event){
	
	if(window.innerWidth>980){
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", window.innerWidth*.2);	
		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", window.innerWidth*.2+30);
		}
		for(var i=0; i<spans.length; i++){
			spans[i].setAttribute("style", "bottom: "+(window.innerWidth*.1+30)+"px");
		}

	}
	else{
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", 980*.2);	

		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", 980*.2+30);
		}
		for(var i=0; i<spans.length; i++){
			spans[i].setAttribute("style", "bottom: "+(window.innerWidth*.1+30)+"px");
		}


	}
	});

	window.addEventListener("resize", function(){
	if(window.innerWidth>980){
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", window.innerWidth*.2);	
		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", window.innerWidth*.2+30);
		}
		for(var i=0; i<spans.length; i++){
			spans[i].setAttribute("style", "bottom: "+(window.innerWidth*.1+30)+"px");
		}

	}
	else{
		for(var i=0; i<pictures.length; i++){
			pictures[i].setAttribute("height", 980*.22);	

		}
		for(var i=0; i<tds.length; i++){
			tds[i].setAttribute("height", 980*.2+30);
		}
		for(var i=0; i<spans.length; i++){
			spans[i].setAttribute("style", "bottom: "+(window.innerWidth*.1+30)+"px");
		}

	}
	})

</script>