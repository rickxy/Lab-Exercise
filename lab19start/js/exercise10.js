
$(function () {
    $('.animLoading').show();
    var url =
    "http://www.randyconnolly.com/funwebdev/services/travel/cities.php";
    var param = "iso=CA";
    // make request for list of cities for specified country
    $.get(url, param)
    .done(function (data) {
    // loop through returned array of cities
    $.each(data, function(index,city) {
    // create new empty list item
    var item = $('<li>');
    // add lat and long info from web service to each
    // list item using HTML5 data- attributes
    item.attr( "data-lat", city.latitude);
    item.attr( "data-long", city.longitude);
    item.html('<a href="#">' + city.name + '</a>');
    // add list item to UL
    $("#cities").append(item);
    });
  // add handler for clicking on list items
  $("#cities li").on("click", function () {
    displayMap($(this));
    });

    })
    .fail(function (jqXHR) {
    alert("Error: " + jqXHR.status);
    })
    .always(function () {
    // all done so now hide the animated loading GIF
    $('.animLoading').fadeOut("slow");
    });
    });


    // display map for selected city
function displayMap(selectedCity) {
    // the lat and long of city is contained within
    // the clicked <li> element
    var ourLatLong = {lat: Number(selectedCity.attr("data-lat")) ,
    lng: Number(selectedCity.attr("data-long"))};
    var ourMap = new google.maps.Map(document.getElementById('map'), {
    center: ourLatLong,
    scrollwheel: false,
    zoom: 13
    });
    }