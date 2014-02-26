$(function() {
    var now = new Date().getFullYear(),
            to = now - 18,
            from = now - 100;

    for (; to > from; to -= 1) {
        $('<option>').appendTo('#yearBirthday').attr('value', to).html(to);
    }

    var sameSize = function() {
        var formHeight = $('#registration-form-block').innerHeight();
        $('#contract').innerHeight(formHeight);
    };

    setTimeout(function() {
        sameSize();
    }, 50);

    initialize();

});

// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

function initialize() {
    // Create the autocomplete object, restricting the search
    // to geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')),
            {types: ['geocode']});
    // When the user selects an address from the dropdown,
    // populate the address fields in the form.
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
    });
}

// The START and END in square brackets define a snippet for our documentation:
function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace(),
            route = '';

    for (var component in componentForm) {
        if (component === 'route') {
            ;
        } else {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            if (addressType === 'route') {
                route = val;
            } else {
                document.getElementById(addressType).value = val;
            }

            setTimeout(function() {
                $('[name=streetName]').val(arguments[0]);
            }, 200, route);

        }
    }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = new google.maps.LatLng(
                    position.coords.latitude, position.coords.longitude);
            autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
                    geolocation));
        });
    }
}

$('#registration-form').validate({
    debug: true,
    rules: {
        firstName: "required",
        lastName: "required",
        userName: {
            required: true,
            minlength: 5
        },
        password: {
            required: true,
            minlength: 8
        },
        passwordConfirm: {
            required: true,
            minlength: 8,
            equalTo: "#password"
        },
        email: {
            required: true,
            email: true
        },
        agree: "required"
    },
    messages: {
        firstnName: "Please enter your firstname",
        lastName: "Please enter your lastname",
        userName: {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 2 characters"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        passwordConfirm: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",
        agree: "Please accept our policy"
    }
});