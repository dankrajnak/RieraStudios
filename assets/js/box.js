//Box by Daniel Krajnak

var boxX;
var boxY;
var boxW;
var dots = [];
var dotD;
var oldFrameCount=0;

function setup(){
	createCanvas(windowWidth, windowHeight);
	//Box Width
	boxW = windowWidth/2;
	//Box X and Y position
	boxX = (windowWidth-boxW)/2;
	boxY = (height-boxW)/2;
	//Dot diameter
	dotD = 7;

	//Create dot objects and dots array
	for(i=0; i<200; i++){
		var dot = new Dot();
		dots.push(dot);
	}
	
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


