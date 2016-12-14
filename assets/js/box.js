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
	//exploded is true when the window is clicked
	if(Dot.prototype.exploded){
		//Delete Click if exists
		var findClickSpan = document.querySelector('.click');
		if(findClickSpan){
			findClickSpan.setAttribute("style", "display: none");
		}
		//Change the pointer
		select("canvas").addClass("changePointer");
		select(".header").addClass("changePointer");
		select("#mainmenu").addClass("changePointer");

		//Draw the dots
		stroke(255, 0, 0);
		for(i=0; i<dots.length; i++){
			dots[i].update();
			ellipse(dots[i].getXPos(), dots[i].getYPos(), dotD, dotD);
		}

		//Connect the dots
		stroke(0);
		Dot.prototype.drawLine(dots);
		var header = select('.header');
		var title = select('#title');
		var subtitle = select('#subtitle');
		var menu = select('#mainmenu');
		title.position(20, 20);
		subtitle.position(24, 80);
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
			ellipse(dots[i].getXPos(), dots[i].getYPos(), dotD, dotD);
		}

		if(frameCount>200){
			stroke(0);
			Dot.prototype.drawLine(dots.slice(0, Math.min((frameCount-200), dots.length)));	
		}
		if(frameCount==600){
			var clickSpan = createSpan('(click)');
			clickSpan.addClass("click");
		}		
		
	}
}

function mousePressed(){
	Dot.prototype.explode(dots);
}

function Dot(){
	//Initial variables.  Give dots random position in box and random velocity
	Dot.prototype.exploded = false;
	var xpos = Math.random() * (boxW-dotD+1) + boxX+dotD/2;
	var ypos = Math.random() * (boxW-dotD+1)+ boxY+dotD/2;

	var velocityX = Math.random()*10-5;
	var velocityY = Math.random()*10-5;

	//Function to be executed in draw function
	this.update = function(){
		xpos += velocityX;
		if((xpos<(boxX+dotD/2) || xpos>(boxX+boxW-dotD/2))&&!Dot.prototype.exploded){
			xpos -= velocityX;
			velocityX = -velocityX;
		}
		ypos +=velocityY;
		if((ypos<(boxY+dotD/2) || ypos>(boxY+boxW-dotD/2))&&!Dot.prototype.exploded){
			ypos -=velocityY;
			velocityY = -velocityY;
		}

		if(xpos>windowWidth+80){
			xpos=-80;
		}
		if(xpos<-80){
			xpos=windowWidth+80;
		}
		if(ypos>windowHeight+80){
			ypos=-80;
		}
		if(ypos<-80){
			ypos=windowHeight+80;
		}
	}

	//Getters and setters
	this.getXPos = function(){
		return xpos;
	}

	this.getYPos =function(){
		return ypos;
	}

	this.getXVelocity = function(){
		return velocityX;
	}

	this.getYVelocity = function(){
		return velocityY;
	}

	this.setXVelocity = function(setX){
		velocityX = setX;
	}

	this.setYVelocity = function(setY){
		velocityY = setY;
	}

	//Function is executed when window is clicked
	Dot.prototype.explode = function(){
		for(i=0; i<dots.length; i++){
			dots[i].setXVelocity(Math.random()*40-20);
			dots[i].setYVelocity(Math.random()*40-20);
		}
		Dot.prototype.exploded = true;
		boxW = 0;
		boxX = 0;
		boxY = 0;
	}

	//Function to draw the lines between the dots
	
	Dot.prototype.drawLine = function(dotsArray){
		
		//Sort the dots by their xposition
		dotsArray.sort(function(a, b){
			return a.getXPos() - b.getXPos();
		});
		
		//Iterate over the sorted array to find dots close enough in proximity, stopping when a dot is 
		//too far to the right.  Lines are only drawn from the left to the right to avoid duplicates.
		for(var i=0; i<dotsArray.length-1; i++){
			var j=i+1;
		 	while(j<dotsArray.length && dotsArray[j].getXPos()-dotsArray[i].getXPos()<80){
				if(sqrt(sq(dotsArray[j].getXPos()-dotsArray[i].getXPos())+sq(dotsArray[j].getYPos()-dotsArray[i].getYPos()))<80){
						
					stroke((sq(dotsArray[j].getXPos()-dotsArray[i].getXPos())+sq(dotsArray[j].getYPos()-dotsArray[i].getYPos()))/1280*51);
					line(dotsArray[j].getXPos(), dotsArray[j].getYPos(), dotsArray[i].getXPos(), dotsArray[i].getYPos());
						
					//Weighted average of new velocity.  Groups and slows the dotsArray 
					if(Math.abs(dotsArray[i].getXVelocity()-dotsArray[j].getXVelocity())>.1){
						dotsArray[i].setXVelocity((dotsArray[i].getXVelocity()*500+dotsArray[j].getXVelocity())/501);
						dotsArray[j].setXVelocity((dotsArray[j].getXVelocity()*500+dotsArray[i].getXVelocity())/501);
					}

					if(Math.abs(dotsArray[i].getYVelocity()-dotsArray[j].getYVelocity())>.1){
						dotsArray[i].setYVelocity((dotsArray[i].getYVelocity()*500+dotsArray[j].getYVelocity())/501);			
						dotsArray[j].setYVelocity((dotsArray[j].getYVelocity()*500+dotsArray[i].getYVelocity())/501);
					}
				}
			j++;
			}
		}
		

	}

}


