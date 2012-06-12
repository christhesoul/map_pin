jQuery(function($){
	if($("#gmap_lat").length != 0){
		var $map;
		var $pin;
	
		initialize();
	
		var $latfield = $("#gmap_lat");
		var $lngfield = $("#gmap_lng");
	
		if(($("#gmap_lat").val() != "")&&($("#gmap_lng").val() != "")){
			$lat = $latfield.val();
			$lng = $lngfield.val();
			updateMap($lat,$lng);
		}else{
			$lat = 52.24381167901584;
			$lng = 0.7165628671646118;
			updateMap($lat,$lng);
		}
		
	}
	function updateMap($lat, $lng){
		var $latlng = new google.maps.LatLng($lat, $lng);
		google.maps.event.trigger($map, "center_changed");
		$map.panTo($latlng);
		$pin.setPosition($latlng);
		$map.setZoom(9);
	}

	function updateFields(){
		var $pinpos = $pin.getPosition();
		$latfield.val($pinpos.lat());
		$lngfield.val($pinpos.lng());
	}
	
	function initialize() {
		var $latlng = new google.maps.LatLng(52.094062282906954, 1.3132095336914062);
	  var $mapOptions = {
	  	zoom: 14,
	    center: $latlng,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  $map = new google.maps.Map(document.getElementById("meta_map"), $mapOptions);
		var $pinOptions ={
			draggable: true,
			map: $map,
			position: $latlng
		}
		$pin = new google.maps.Marker($pinOptions);
		google.maps.event.addListener($pin, 'dragend', updateFields);
	}
});