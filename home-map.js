$pin_icons = [];
$map = "";
function setupMap($icon,$icon2){
	$pin_icons = [$icon,$icon2];
	latlng = new google.maps.LatLng(52.092562282906954, 1.3172095336914062);
	var mapOptions = {
    zoom: 15,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  $map = new google.maps.Map(document.getElementById("gmap"), mapOptions);
}
function addPin($lat,$lng,$url,$img_index){
	latlng = new google.maps.LatLng($lat, $lng);
	var pinOptions = {
		map: $map,
		position: latlng
	}
	pin = new google.maps.Marker(pinOptions);
	pin.setIcon($pin_icons[$img_index]);
	google.maps.event.addListener(pin, 'click', function() {
    window.location = $url ;
  });
}