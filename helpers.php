<?php
// google maps functions
function the_gmap($id = "page ID", $zoom = 16, $width = 450, $height = 450){
	if($id == "page ID"){
	    $id = get_the_ID();
	}
	$tempvarname = get_post_meta($id,'_map_pin_meta');
	$latitude = $tempvarname[0]['latitude'];
	$longitude = $tempvarname[0]['longitude'];
	echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>	
		<div id="gmap" style="background:white; width:'.$width.'px; height:'.$height.'px;"></div>
		<script type="text/javascript">
		
			jQuery(document).ready(function($){
				var $lat = '.$latitude.';
				var $lng = '.$longitude.';
				latlng = new google.maps.LatLng($lat, $lng);
				var mapOptions = {
			      zoom: '.$zoom.',
			      center: latlng,
			      mapTypeId: google.maps.MapTypeId.SATELLITE
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