
$(function () {
    // initialize countries select list
    displayCountries();
        // set up event handler for this select list
    $("#countries").on("change", displayCities);
    // responsible for retrieving a list of cities for a specific
    // country and then creating and populating a new select list
    // with these cities
    function displayCities() {
    $('.animLoading').show();
    var url =
    "http://www.randyconnolly.com/funwebdev/services/travel/cities.php";
    var param = "iso=" + $('#countries').val();
    // only make web service request if the use has selected
    // an actual country
    if ($('#countries').val() != 0) {
    $.get(url, param)
    .done(function (data) {
    var select = $("<select id='cities'></select>");

    select.append("<option value=0>Select acity</option>");
    // loop through an array using jquery's $.each() method
    $.each(data, function(index,city) {
    select.append('<option value="' + city.id + '">'
    + city.name + '</option>');
    });
    $("#results").empty().append(select);
    })
    .fail(function (jqXHR) {
    alert("Error: " + jqXHR.status);
    })
    .always(function () {
    // all done so now hide the animated loading GIF
    $('.animLoading').fadeOut("slow");
    });
    }
    }
    function displayCountries() {
    // display animated loading GIF while data is being fetched
    $('.animLoading').show();
    var url =
    "http://www.randyconnolly.com/funwebdev/services/travel/countries.php";
    // now make asynchronous request for data from the web service
    $.get(url)
    .done(function (data) {
    // loop through returned countries
    for (let i=0; i<data.length; i++) {
    // create option element and add to select list
    var country = data[i];
    var option = $('<option>',
    {value: country.iso, text: country.name});
    $("#countries").append(option);
    }
    })
    .fail(function (jqXHR) {
    alert("Error: " + jqXHR.status);
    })
    .always(function () {
    // all done so now hide the animated loading GIF
    $('.animLoading').fadeOut("slow");
    });
    }
    });

   