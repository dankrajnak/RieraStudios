<HTML>
	<head>
		
	<title> Riera Studio - Havana, Cuba </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH;?>build/css/all.css" />
	<script src="<?php echo ROOT_PATH;?>build/js/all.min.js"></script>

	</head>
	
	<body>
		<div class="header">
			<h1 id="title">RIERA STUDIO</h1>
			<h3 id="subtitle">CUBAN ART | ART BRUT | OUTSIDER ART</h3>
		</div>
		<nav class = "navbar navbar-default navbar-fixed-top hide" id="mainmenu">
	<div class="containter-fluid">
		<div class ="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">MENU
			<span class="sr-only">Toggle navigation</span>
			</button>
			<a id="menu-title" class= "navbar-brand" href="<?php echo ROOT_PATH ?>">RIERA STUDIO</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class= "nav navbar-nav">
				<li class="dropdown">
          			<a href="#" id="nav-dropdown-button" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ABOUT US
          			</a>
					<ul class = "dropdown-menu">
						<li><a href="<?php echo ROOT_PATH ?>about/">OUR STUDIO</a></li>
						<li><a href="<?php echo ROOT_PATH ?>artbrut/">ART BRUT PROJECT CUBA</a></li>
					</ul>
				</li>
				<li class = "dropdown">
					<a href="#" id="nav-dropdown-button" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ARTISTS</a>
					<ul class = "dropdown-menu">
						<li><a href="<?php echo ROOT_PATH ?>artbrutartists/">ART BRUT</a></li>
						<li><a href="<?php echo ROOT_PATH ?>outsiderartartists/">OUTSIDER ART</a></li>
					</ul>
				</li>
				<li><a href="<?php echo ROOT_PATH ?>exhibitions/">EXHIBITIONS</a></li>
				<li><a href="http://rierastudioart.cubava.cu">BLOG</a></li>
				<li><a href="<?php echo ROOT_PATH ?>press/">PRESS RELEASE</a></li>
				<li><a href="<?php echo ROOT_PATH ?>contact/">CONTACT</a></li>
			</ul>
		</div>
	</div>
</nav>

<script>
//Box by Daniel Krajnak
var boxX;
var boxY;
var boxW;
var dots = [];
var dotD;
var oldFrameCount=0;

function setup(){
	createCanvas(windowWidth, windowHeight);


	var isMobile = false; //initiate as false
	// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	//Create dot objects and dots array
	if(isMobile){
		boxW=windowWidth;
		dotD = 4;
		boxX = (windowWidth-boxW)/2;
		boxY = (height-boxW)/2;
		for(i=0; i<80; i++){
			var dot = new Dot();
			dots.push(dot);
		}
	}
	else{
		dotD = 7;
		boxW = windowWidth/2;
		boxX = (windowWidth-boxW)/2;
		boxY = (height-boxW)/2;
		for(i=0; i<200; i++){
			var dot = new Dot();
			dots.push(dot);
		}
	}
	//Box X and Y position
	boxX = (windowWidth-boxW)/2;
	boxY = (height-boxW)/2;
	
}

function draw(){
	background(255);
	$('canvas, .click').click(function(){
		dots.forEach(function(dot){
			dot.explode();
		});
		Dot.prototype.exploded = true;
		boxW = 0;
		boxX = 0;
		boxY = 0;
	});

	//exploded is true when the window is clicked
	if(Dot.prototype.exploded){
		//Delete Click if exists
		$('.click').addClass('hide');

		//Change the pointer
		$("canvas").addClass("changePointer");
		$(".header").addClass("changePointer");
		$("#mainmenu").addClass("changePointer");

		//Draw the dots
		stroke(255, 0, 0);
		for(i=0; i<dots.length; i++){
			dots[i].update();
			ellipse(dots[i].xpos, dots[i].ypos, dotD, dotD);
		}

		//Connect the dots
		stroke(0);
		Dot.prototype.drawLine(dots);
		var header = $('.header');
		var title = $('#title');
		var subtitle = $('#subtitle');
		var menu = $('#mainmenu');
		title.addClass('title-move');
		subtitle.addClass('subtitle-move');
		header.addClass('hide');
		menu.removeClass('hide');
		
	}
	else{
		//Shrink the box
		boxX += (boxW-Math.max(boxW*.999, 100))/2;
		boxY += (boxW-Math.max(boxW*.999, 100))/2;
		boxW = Math.max(boxW*.999, 100);
	
		//Draw the box
		rect(boxX, boxY, boxW, boxW);
		
		//Draw dots
		fill(255,0,0);
		noStroke();
		for(i=0; i<dots.length; i++){
			dots[i].update();
			ellipse(dots[i].xpos, dots[i].ypos, dotD, dotD);
		}

		if(frameCount>200){
			stroke(0);
			Dot.prototype.drawLine(dots.slice(0, Math.min((frameCount-200), dots.length)));	
		}
		if(frameCount==600){
			$('body').append("<span>(click)</span");
			$('body span').addClass("click");
		}		
		
	}
}


function Dot(){
	//Initial variables.  Give dots random position in box and random velocity
	Dot.prototype.exploded = false;
	this.xpos = Math.random() * (boxW-dotD+1) + boxX+dotD/2;
	this.ypos = Math.random() * (boxW-dotD+1)+ boxY+dotD/2;

	this.velocityX = Math.random()*10-5;
	this.velocityY = Math.random()*10-5;

	//Function to be executed in draw function
	this.update = function(){
		this.xpos += this.velocityX;

		if((this.xpos<(boxX+dotD/2) || this.xpos>(boxX+boxW-dotD/2))&& !Dot.prototype.exploded){
			this.xpos -= this.velocityX;
			this.velocityX = -this.velocityX;
		}

		this.ypos += this.velocityY;
		if((this.ypos<(boxY+dotD/2) || this.ypos>(boxY+boxW-dotD/2))&& !Dot.prototype.exploded){
			this.ypos -=this.velocityY;
			this.velocityY = -this.velocityY;
		}

		if(this.xpos>windowWidth+80){
			this.xpos=-80;
		}
		if(this.xpos<-80){
			this.xpos=windowWidth+80;
		}
		if(this.ypos>windowHeight+80){
			this.ypos=-80;
		}
		if(this.ypos<-80){
			this.ypos=windowHeight+80;
		}
	}
	
	//Function is executed when window is clicked
	this.explode = function(){
		this.velocityX = Math.random()*40-20;
		this.velocityY = Math.random()*40-20;
	}

	//Function to draw the lines between the dots
	
	Dot.prototype.drawLine = function(dotsArray){
		
		//Sort the dots by their xposition
		dotsArray.sort(function(a, b){
			return a.xpos - b.xpos;
		});
		
		//Iterate over the sorted array to find dots close enough in proximity, stopping when a dot is 
		//too far to the right.  Lines are only drawn from the left to the right to avoid duplicates.
		for(var i=0; i<dotsArray.length-1; i++){
			var j=i+1;
		 	while(j<dotsArray.length && dotsArray[j].xpos-dotsArray[i].xpos<80){

				if(sqrt(sq(dotsArray[j].xpos-dotsArray[i].xpos)+sq(dotsArray[j].ypos-dotsArray[i].ypos))<80){
						
					stroke((sq(dotsArray[j].xpos-dotsArray[i].xpos)+sq(dotsArray[j].ypos-dotsArray[i].ypos))/1280*51);
					line(dotsArray[j].xpos, dotsArray[j].ypos, dotsArray[i].xpos, dotsArray[i].ypos);
						
					//Weighted average of new velocity.  Groups and slows the dotsArray 
					if(Math.abs(dotsArray[i].velocityX-dotsArray[j].velocityX)>.1){
						dotsArray[i].velocityX = (dotsArray[i].velocityX*500+dotsArray[j].velocityX)/501;
						dotsArray[j].velocityY = (dotsArray[j].velocityY*500+dotsArray[i].velocityY)/501;
					}

					if(Math.abs(dotsArray[i].velocityY-dotsArray[j].velocityY)>.1){
						dotsArray[i].velocityX = (dotsArray[i].velocityX*500+dotsArray[j].velocityX)/501;			
						dotsArray[j].velocityY = (dotsArray[j].velocityY*500+dotsArray[i].velocityY)/501;
					}
				}
			j++;
			}
		}
		

	}

}
    </script>
	</body>
</HTML>