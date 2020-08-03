<?php 
	/* Template Name: desktop */

get_header(); ?>


<style>
		/* font */
		@font-face {
			font-family: 'PF-Ronda-Seven';
			src:url('font/PF-Ronda-Seven.ttf.woff') format('woff'),
				url('font/PF-Ronda-Seven.ttf.svg#PF-Ronda-Seven') format('svg'),
				url('font/PF-Ronda-Seven.ttf.eot'),
				url('font/PF-Ronda-Seven.ttf.eot?#iefix') format('embedded-opentype'); 
			font-weight: normal;
			font-style: normal;
		}

		/* basic reset */
		html, body, canvas {
			box-sizing: border-box;
			margin: 0; padding: 0;
			background-color: black;
			font-family: 'PF-Ronda-Seven';
		}
		/* you'll need to define a width && height to make it work */
		#p5 { 
			display: block;
			margin: 0;
			position: absolute;
			/* top: 50%;
			left: 50%;
			transform: translate(-50%, -50%); */
			width: 100vw;
			height: 100vh;
		}

		.border-top {
			display: grid;
			grid-template-columns: repeat(9, 1fr);
			grid-template-rows: 1fr;
			width: 100vw;
			height: 10px;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 4000;
			/* transform: rotate(90deg); */
		}

		.border-top div {
			border-right: 1px solid white;
		}

		.border-right {
			display: grid;
			grid-template-columns: repeat(11, 1fr);
			grid-template-rows: 1fr;
			width: 50vw;
			height: 10px;
			position: fixed;
			top: 40vh;
			right: -49vh;
			z-index: 4000;
			transform: rotate(90deg);
		}

		.border-right div {
			border-right: 1px solid white;
		}


		header {
			width: auto;
			height: 10vh;
			margin: 2%; padding: 0;
			position: fixed;
			top: 0;
			left: 0;
			background-color: transparent;
			z-index: 3000;
		}

		header img {
			width: auto;
			width: 170px;
			height: auto;
		}

		#openModal:hover {
			cursor: pointer;
		}
		
		/* The Modal (background) */
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			background-color: #ffffff;
			margin: auto;
			padding: 20px;
			border: 2px solid #D31D1D;
			width: 275px;
			position: absolute;
			top: 28vh;
			left: 2%;
		}

		.modal-content p {
			font-size: 10px;
		}

		/* The Close Button */
		.close {
			position: absolute;
			color: #D31D1D;
			/* float: right; */
			font-size: 16px;
			font-weight: bold;
			top: 5px;
			right: 10px;

		}

		.close:hover,
		.close:focus {
			color: #4467A7;
			text-decoration: none;
			cursor: pointer;
		}
	</style>

<body>
	<header>
		<img src="logos/buycloud-logo.png" alt="buycloud logo">
	</header>
	<div id="p5"><!-- This div is the container in which P5.js will place a canvas element --></div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
	<!-- <script src="js/clouds.js"></script> Choose either .js file -->
	<script>
      /*
    velocity basedd image selection
    */

    // directory where images of Clouds are
    var assetDirectory = '../img/';

    /* all names of cloud image files
      sorted slowest →  fastest
      (fastest at bottom) */
    var assets = [
      'Cumulus-Mediocris.png',
      'cloud.png',
      'Altocumulus-Castellanus.png',
    ];

    var buyClouds = {
      'targetElementId' : 'p5', // Container element id for p5 canvas (now: 'div#p5')
      'backgroundColor' : '#4467A7', // Background color
      'quantity' : 30, // The amount of Clouds to be drawn
      'radius' : 10, // Radius of Clouds
      'velocityScale' : 1, // Max. initial velocity (px/frame)
      'expectedVmax' : 2, 
      'safeareaFactor' : 1.4, // How far the clouds can drift off-screen, before returning to the oppposite side (recommended values between 1.4 and 2.0)
      'hitzoneDisplay' : false, // For debugging: dipslay ellipse geometry [true | false]

      'targetElement' : function(){ return document.getElementById(this.targetElementId) },
      'targetElementDimensions' : function(){ return [this.targetElement().clientWidth, this.targetElement().clientHeight] },
      'Clouds' : [], // Cloud objects
      'newClouds' : [], // temporary array, this is where new Clouds are born
      'images' : [], // This is where all the image() objects are stored
    };

    function setup() {
      createCanvas( buyClouds.targetElementDimensions()[0], buyClouds.targetElementDimensions()[1] ).parent(buyClouds.targetElementId);

      // Ready the images
      assets.map( asset => {
        var path = assetDirectory.concat(asset); // Get the paths
        var image = loadImage(path); // Load the image temporarily
        buyClouds.images.push( image ); // Push them to the images array
      });

      // Initialize the Clouds
      for( var i = 0; i < buyClouds.quantity; i++ ) {
        var location = createVector( random(0, width), random(0, height) );
        var velocity = createVector( random(-buyClouds.velocityScale, buyClouds.velocityScale), random(-buyClouds.velocityScale, buyClouds.velocityScale) );
        var radius = buyClouds.radius * random(0.97, 1.03);

        buyClouds.Clouds.push( new Cloud( location, velocity, radius, image) );
        
      }
      
    }

    function draw() {
      background( buyClouds.backgroundColor);

      var i = 0;
      while ( i < buyClouds.Clouds.length ) {
        var wolkje_1 = buyClouds.Clouds[i];

        var j = i + 1;
        while ( j < buyClouds.Clouds.length ) {
          var wolkje_2 = buyClouds.Clouds[j];
          var deltaVector = createVector(wolkje_1.location.x - wolkje_2.location.x, wolkje_1.location.y - wolkje_2.location.y );	
          var distance = deltaVector.mag();

          function returnLargest(array) {
            var values = [ array[0].radius, array[1].radius ];
            var value = max(values);
            
            return array[ values.indexOf(value) ];
          }

          if ( distance < (wolkje_1.radius + wolkje_2.radius) && distance !== 0 ){
            var newLocation = createVector( (wolkje_1.location.x + wolkje_2.location.x)*0.5, (wolkje_1.location.y + wolkje_2.location.y)*0.5 );
            var newVelocity = createVector( (wolkje_1.velocity.x + wolkje_2.velocity.x)*1, (wolkje_1.velocity.y + wolkje_2.velocity.y)*1 );
            var newRadius = wolkje_1.radius + wolkje_2.radius;

            buyClouds.newClouds.push(new Cloud(newLocation, newVelocity, newRadius ));

            buyClouds.Clouds.splice(j, 1);
            buyClouds.Clouds.splice(i, 1);
          }

          j++;
        }
        
        i++;
      }

      buyClouds.newClouds.map( newCloud => {
        buyClouds.Clouds.push(newCloud);
      })
      buyClouds.newClouds = [];
      
      buyClouds.Clouds.map( cloud => {
        cloud.update();
        cloud.display();
      })
    }

    function windowResized() {
      resizeCanvas( buyClouds.targetElementDimensions()[0], buyClouds.targetElementDimensions()[1] );
    }

    /*
    Make cloud appear on mouse click
    function mousePressed() {
      var location = createVector(mouseX, mouseY);
      var velocity = createVector(random(-buyClouds.velocityScale, buyClouds.velocityScale), random(-buyClouds.velocityScale, buyClouds.velocityScale));
      var radius = buyClouds.radius * random(0.97, 1.03);
      var image = buyClouds.images[parseInt(Math.random()*buyClouds.images.length)];
      buyClouds.newClouds.push( new Cloud(location, velocity, radius) );
    }
    */

    class Cloud {
      constructor( location, velocity, radius ) {
        this.location = location;
        this.velocity = velocity;
        this.radius = radius;


        this.update = function() {
          location.x += velocity.x;
          location.y += velocity.y;
          this.wrapEdges();
        }

        this.display = function() {
          // select image based on speed
          var velocity2d = min( abs( mag(velocity.x, velocity.y)), buyClouds.expectedVmax );
          var index = int(map( velocity2d, 0, buyClouds.expectedVmax, 0, buyClouds.images.length-1 ));

          var imageObj = buyClouds.images[ index ];
          var imgWidth = imageObj.width / 300 * radius;
          var imgHeight = imageObj.height / 300 * radius;

          // show the image
          image( imageObj, location.x - imgWidth/2, location.y - imgHeight/2, imgWidth, imgHeight);

          // show the ellipse 'hitzone' for debugging
          if ( buyClouds.hitzoneDisplay === true ) {
            fill(128);
            ellipse(location.x, location.y, radius, radius)
          };
        }

        this.wrapEdges = function() {
          var safearea = buyClouds.safeareaFactor * radius;
          if ( location.x <= 0 - safearea) {
            location.x = width + safearea;
          }
          if ( location.x > width + safearea) {
            location.x = 0 - safearea;
          }
          if ( location.y <= 0 - safearea) {
            location.y = height + safearea;
          }
          if ( location.y > height + safearea) {
            location.y = 0 - safearea;
          }
        }

        this.getLoc = function() {
          return location;
        }

        this.getVel = function() {
          return velocity;
        }
      }

    }

</script>

    
    
    
<?php
get_sidebar();
get_footer();