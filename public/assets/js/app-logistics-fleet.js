/**
 * Logistic Fleet
 */
('use strict');

(function () {
  // Mapbox Access Token

  //!YOUR_MAPBOX_ACCESS_TOKEN_HERE!
  // mapboxgl.accessToken =
  //   '';

  const geojson = {
    type: 'FeatureCollection',
    features: [
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '1'
        },
        geometry: {
          type: 'Point',
          coordinates: [36.181655, 37.111797]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '2'
        },
        geometry: {
          type: 'Point',
          coordinates: [36.222772, 37.167522]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '3'
        },
        geometry: {
          type: 'Point',
          coordinates: [36.198542, 37.177493]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '4'
        },
        geometry: {
          type: 'Point',
          coordinates: [36.207694, 37.118604]
        }
      }
    ]
  };

  const map = new maplibregl.Map({
    container: 'map',
    style: 'https://demotiles.maplibre.org/style.json', // stylesheet location
    center: [36.207031, 37.147575], // starting position [lng, lat]
    zoom: 12 // starting zoom
  });

  // Add markers to the map and thier functionality
  for (const marker of geojson.features) {
    // Create a DOM element for each marker.
    const el = document.createElement('div');
    const width = marker.properties.iconSize[0];
    const height = marker.properties.iconSize[1];
    el.className = 'marker';
    el.insertAdjacentHTML(
      'afterbegin',
      '<img src="' +
        assetsPath +
        'img/illustrations/fleet-car.png" alt="Fleet Car" width="20" class="rounded-3" id="carFleet-' +
        marker.properties.message +
        '">'
    );
    el.style.width = `${width}px`;
    el.style.height = `${height}px`;
    el.style.cursor = 'pointer';

    // Add markers to the map.
    new maplibregl.Marker(el).setLngLat(marker.geometry.coordinates).addTo(map);

    // Select Accordion for respective Marker
    const element = document.getElementById('fl-' + marker.properties.message);

    // Select Car for respective Marker
    const car = document.getElementById('carFleet-' + marker.properties.message);

    element.addEventListener('click', function () {
      const focusedElement = document.querySelector('.marker-focus');

      if (Helpers._hasClass('active', element)) {
        //fly to location
        map.flyTo({
          center: geojson.features[marker.properties.message - 1].geometry.coordinates,
          zoom: 16
        });
        // Remove marker-focus from other marked cars
        focusedElement && Helpers._removeClass('marker-focus', focusedElement);
        Helpers._addClass('marker-focus', car);
      } else {
        //remove marker-focus if not active
        Helpers._removeClass('marker-focus', car);
      }
    });
  }

  //For selecting default car location
  const defCar = document.getElementById('carFleet-1');
  Helpers._addClass('marker-focus', defCar);

  //hide mapbox controls
  document.querySelector('.mapboxgl-control-container').classList.add('d-none');

  //Selecting Sidebar Accordion for perfect scroll
  var sidebarAccordionBody = $('.logistics-fleet-sidebar-body');

  //Perfect Scrollbar for Sidebar Accordion
  if (sidebarAccordionBody.length) {
    new PerfectScrollbar(sidebarAccordionBody[0], {
      wheelPropagation: false,
      suppressScrollX: true
    });
  }
})();
