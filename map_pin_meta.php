<div class="my_meta_control">
	<p>Please drag the marker to your listing's location.</p>
	<div id="meta_map" style="width:400px;height:400px;"></div>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<?php $mb->the_field('latitude'); ?>
	<input type="hidden" id="gmap_lat" class="mapper" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
	<?php $mb->the_field('longitude'); ?>
	<input type="hidden" id="gmap_lng" class="mapper" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
</div>