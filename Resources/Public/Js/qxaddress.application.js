$(function() {
	$('.qx-address--map').each(function() {
		var container = $(this).find('.qx-address--map-container');
		var options = {
			zoom: {
				default: 9,
				max: 15
			}
		};

		var map = new google.maps.Map(container[0], {
			center: {
				lat: 47.636896,
				lng: 11.231763
			},
			zoom: 15,
			scrollwheel: false
		});

		var markers = [];
		var bound		= new google.maps.LatLngBounds();

		$(this).find('.qx-address--map-marker').each(function() {
			var item 			= $(this);
			var latitude	= parseFloat(item.data('qxLatitude'));
			var longitude	= parseFloat(item.data('qxLongitude'));
			var position	= new google.maps.LatLng(latitude, longitude);
			var options 	= {
				position: position
			};

			if(item.data('qxMarker') !== undefined) {
				options.icon = item.data('qxMarker');
			}

			var marker		= new google.maps.Marker(options);

			markers.push(marker);
			bound.extend(position);
		});

		if(markers.length !== 0) {
			for(var i = 0; i < markers.length; i++) {
				markers[i].setMap(map);
			}

			map.fitBounds(bound);

			if(typeof(options.zoom.max) !== 'undefined') {
				var listener = google.maps.event.addListener(map, 'idle', function() {
					if(map.getZoom() > options.zoom.max) {
						map.setZoom(options.zoom.max);
					}

					google.maps.event.removeListener(listener);
				});
			}
		}
	});
});