<script>
	var paso;
	if ({{$producto->users_id}} == empresa) {
			$("#productos").html('<div class="row">' + '<br>' +
				'<div class="col-sm-4 col-lg-4 col-md-4">' + '<br>' +
					'<div class="thumbnail">' + '<br>' +
						'<img src="http://placehold.it/320x150" alt="">' + '<br>' +
						'<div class="caption">' + '<br>' +
							'<h4 class="">$64.99</h4>' + '<br>' +
							'<h4><a href="product-name">{{$producto->pro_nom}}</a></h4>' + '<br>' +
							'<p>{{$producto->pro_info}}</p>' + '<br>' +
						'</div>' + '<br>' +
						'<div class="ratings">' + '<br>' +
							'<p class="">12 reviews</p>' + '<br>' +
						'</div>' + '<br>' +
					'</div>' + '<br>' +
				'</div>' + '<br>' +
			'</div>' + '<br>');
		
	}
</script>