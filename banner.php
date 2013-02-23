 <link rel="stylesheet" href="js/nivo-slider/themes/dark/dark.css">
 <link rel="stylesheet" href="js/nivo-slider/nivo-slider.css">
 <script src="js/jquery-1.8.2.min.js"></script>
 <script src="js/nivo-slider/jquery.nivo.slider.js"></script>
 <script>
	$(window).load(function() {
		$('#slider').nivoSlider();
		});
 </script>
 <div class="slider-wrapper theme-dark">
	<div id="slider" class="nivoSlider">
		<img src="banner/banner1.png" data-thumb="banner/banner1.png" alt="" data-transition="fold"/>
		<img src="banner/banner2.png" data-thumb="banner/banner2.png" alt="" data-transition="fold"/>
		<img src="banner/banner3.png" data-thumb="banner/banner3.png" alt="" data-transition="fold"/>
	</div>
	<div id="htmlcaption" class="nivo-html-caption">
		<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
	</div>
 </div>