jQuery(function(){

	var $ = jQuery;

		$('.open1').on('click', function(){
			$('body').toggleClass('show_sidemenu')
		})

		$('#open2').on('click', function(){
			$('body').toggleClass('show_topmenu')
		})

		$('.open3').on('click', function(){
			$('body').toggleClass('show_usermenu')
		})


        $('.verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });

        $(document).ready(function() {
            $(".show").fancybox({
                'titleShow'     : 'false',
                'transitionIn'      : 'fade',
                'transitionOut'     : 'fade'
            });
        });
});

/*$(".open").click(function(e) {

        if( $(this).hasClass("open") ) {
            $(this).removeClass("open").addClass("closed");
        } else {
            // if other menus are open remove open class and add closed
            $(this).siblings().removeClass("open").addClass("closed"); 
            $(this).removeClass("closed").addClass("open");
        }

});*/

function initialize() {
  var styles = [
    
    {
        "stylers": [
            {
                "saturation": -100
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": 50
            },
            {
                "gamma": 0
            },
            {
                "hue": "#50a5d1"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#333333"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [
            {
                "weight": 0.5
            },
            {
                "color": "#333333"
            }
        ]
    },
    {
        "featureType": "transit.station",
        "elementType": "labels.icon",
        "stylers": [
            {
                "gamma": 1
            },
            {
                "saturation": 50
            }
        ]
    }
];

var styledMap = new google.maps.StyledMapType(styles, {
  name: "Styled Map"
});

var user_location,
        store_location = new google.maps.LatLng( -36.857251, 174.749008),
        mapOptions,
        map,
        directionsService = new google.maps.DirectionsService(),
        directionsDisplay = new google.maps.DirectionsRenderer()

    if (navigator.geolocation) { //Checks if browser supports geolocation
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }else{
        drawMap();
    }

    function onSuccess(position){
        drawMap(position.coords.latitude, position.coords.longitude);
    }

    function onError(err){
        console.log(err);

        drawMap();
    }

    function drawMap(lat, long){

        mapOptions = {
            center: store_location,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            },
            styles: styles,
           
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        
        if(lat){
            user_location = new google.maps.LatLng(lat, long);

            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('panel'));

            var request = {
                origin: user_location,
                destination: store_location,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };

            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
        }
        
    }
}

if(typeof google == 'object'){

    google.maps.event.addDomListener(window, 'load', initialize);

}

