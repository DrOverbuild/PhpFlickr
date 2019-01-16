<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="justifiedGallery/justifiedGallery.min.css" />
	<script src="justifiedGallery/jquery.justifiedGallery.min.js"></script>

	<script src="swipebox/src/js/jquery.swipebox.js"></script>
	<link rel="stylesheet" href="swipebox/src/css/swipebox.css">
</head>

<div id="gallery">
<?php

	include_once('./phpFlickr.php');

	$key = "";    // enter your API key here
	$secret = ""; // enter your API secret here
	
	$userid = "163300815@N05"; // Get flickr user id here. Currently points to Jasper Reddin
	
	$f = new phpFlickr($key, $secret);

	// 163300815@N05

	$response = $f->people_getPublicPhotos($userid, NULL, "url_m,url_h", 500)['photos']['photo'];

	foreach ($response as $photo) {
		$title = str_replace("'", "&#39;", $photo['title']);

		echo '<a href="' . $photo['url_h'] . '" class="swipebox" title="' . $title . '"><img alt="' . $title . '" src="' . $photo['url_m'] . '"></a>';
	}

?>

</div>

<script>
	$('#gallery').justifiedGallery( {
		rowHeight: 200,
		lastRow: 'nojustify',
		rel: 'Portfolio',
		margins: 2
	});

	$(".swipebox").swipebox({
		loopAtEnd: true
	});
</script>

<style>
	body {
		margin: 0;
	}

	#gallery {
		background-color: black;
	}
</style>
