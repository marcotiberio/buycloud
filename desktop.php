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
<div class="border-top">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="border-right">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<header>
		<img src="logos/desktop-logo.png" alt="buycloud logo" class="logo" id="openModal"><!-- Trigger/Open The Modal -->
	</header>

	<!-- The Modal -->
	<div id="modalManifesto" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Lorem ipsum L Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
			Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus 
			et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies 
			nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. 
			Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, 
			rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis 
			pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate 
			eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. 
			Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla 
			ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. 
			Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus 
			eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. 
			Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante 
			tincidunt tempus.</p>
		</div>

	</div>
	<div id="p5"><!-- This div is the container in which P5.js will place a canvas element --></div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
	<!-- <script src="js/clouds.js"></script> Choose either .js file -->
	<script src="js/clouds.velocity.js"></script>

  <script>
		// Get the modal
		var modal = document.getElementById("modalManifesto");
		
		// Get the button that opens the modal
		var btn = document.getElementById("openModal");
		
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		
		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		  modal.style.display = "block";
		}
		
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}
		
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
			modal.style.display = "none";
		  }
		}
	</script>

	<script>
				/*
		velocity basedd image selection
		*/

		// directory where images of Clouds are
		var assetDirectory = '../img/';

		var cloudData = data;

		var buyClouds = {
			'targetElementId' : 'p5', // Container element id for p5 canvas (now: 'div#p5')
			'backgroundColor' : '#4467A7', // Background color
			'quantity' : 30, // The amount of Clouds to be drawn
			'radius' : 10, // Radius of Clouds
			'velocityScale' : .3, // Max. initial velocity (px/frame)
			'expectedVmax' : 2, 
			'safeareaFactor' : 1.4, // How far the clouds can drift off-screen, before returning to the oppposite side (recommended values between 1.4 and 2.0)
			'hitzoneDisplay' : false, // For debugging: dipslay ellipse geometry [true | false]

			'targetElement' : function(){ return document.getElementById(this.targetElementId) },
			'targetElementDimensions' : function(){ return [this.targetElement().clientWidth, this.targetElement().clientHeight] },
			'Clouds' : [], // Cloud objects

			'date' : new Date().getTime()
		};

		function setup() {
			createCanvas( buyClouds.targetElementDimensions()[0], buyClouds.targetElementDimensions()[1] ).parent(buyClouds.targetElementId);

			cloudData.map( (cloud, index) => {

				var location = createVector( cloud.x0, cloud.y0 );
				var velocity = createVector( cloud.vx, cloud.vy );

				var path = assetDirectory.concat( cloud.image ); // Get the paths
				var image = loadImage(path); // Load the image

				var radius = cloud.radius ? cloud.radius : buyClouds.radius // If undefined, fallback to global default
				var t0 = cloud.t0; // already set

				var newCloud = new Cloud( location, velocity, radius, image, t0 );

				buyClouds.Clouds.push( newCloud );
			})

		}

		function draw() {
			background( buyClouds.backgroundColor);

			buyClouds.Clouds.map( cloud => {
				cloud.update();
				cloud.display();
			})
		}

		function windowResized() {
			resizeCanvas( buyClouds.targetElementDimensions()[0], buyClouds.targetElementDimensions()[1] );
		}


		class Cloud {
			constructor( location, velocity, radius, imageObj, t0 ) {
				// location : 2d vector
				// velocity : 2d vector
				// radius : int
				// image : imageObject
				// t0 : unicode time value ?????

				this.location = location; // x0, y0
				this.velocity = velocity;
				this.radius = radius;

				var newLocation = createVector();
				var safearea = buyClouds.safeareaFactor * radius;


				this.update = function() {
					var age = (buyClouds.date + millis()) / 100;

					// from example
					// newLocation.x = ( location.x + velocity.x * age ) % width;
					// newLocation.y = ( location.y + velocity.y * age ) % height;

					// version with safe area for images
					newLocation.x = ( -safearea + location.x + velocity.x * age ) % (width + safearea);
					newLocation.y = ( -safearea + location.y + velocity.y * age ) % (height + safearea);
					

				}

				this.display = function() {
					// load the image
					var imgWidth = imageObj.width / 300 * radius;
					var imgHeight = imageObj.height / 300 * radius;

					// show the image
					image( imageObj, newLocation.x - imgWidth/2, newLocation.y - imgHeight/2, imgWidth, imgHeight);

					// show the ellipse 'hitzone' for debugging
					if ( buyClouds.hitzoneDisplay === true ) {
						fill(128);
						ellipse(newLocation.x, newLocation.y, radius, radius)
					};
				}
			}
		}
	</script>

    
    
    
<?php
get_sidebar();
get_footer();