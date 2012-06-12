<?php
// google maps functions
function gmap_script(){
	echo '<script type="text/javascript">
		jQuery(document).ready(function($){
			var $lat = $("#gmap").data("latitude");
			var $lng = $("#gmap").data("longitude");
			var $zoom = $("#gmap").data("zoom");
			latlng = new google.maps.LatLng($lat, $lng);
			var mapOptions = {
		      zoom: $zoom,
		      center: latlng,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map(document.getElementById("gmap"), mapOptions);
			var pinOptions ={
				map: map,
				position: latlng
			}
			pin = new google.maps.Marker(pinOptions);
		});
</script>';
}

function the_gmap($id = "page ID", $zoom = 16, $width = 290, $height = 290){
	if($id == "page ID"){
	    $id = get_the_ID();
	}
	$tempvarname = get_post_meta($id,'_map_pin_meta');
	$latitude = $tempvarname[0]['latitude'];
	$longitude = $tempvarname[0]['longitude'];
	echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<div id="gmap" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-zoom="'.$zoom.'" style="'.$width.'px; height:'.$height.'px;"></div>';
	add_action('wp_footer', 'gmap_script', 100);
}