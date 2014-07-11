$(function() {
    $('.with-popover').popover({trigger: 'hover'}).click(function(e){
        e.preventDefault();
    });

    $('.address-search').keydown(function (e){
        if ((e.which == 13)) && ($('.pac-container:visible').length)){
            return false;
        }
    })
    
    var sameSize = function() {
        var formHeight = $('#registration-form-block').innerHeight();
        $('#contract').innerHeight(formHeight);
    };

    setTimeout(function() {
        sameSize();
    }, 50);

    initialize();


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
                    $('[id=autocomplete]').val(arguments[0]);
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
            "RegistrationForm[firstName]": "required",
            "RegistrationForm[lastName]": "required",
            "RegistrationForm[streetName]": "required",
            "RegistrationForm[streetNumber]": "required",
            "RegistrationForm[city]": "required",
            "RegistrationForm[country]": "required",
            "RegistrationForm[postCode]": "required",
            "RegistrationForm[userName]": {
                required: true,
                minlength: 2
            },
            "RegistrationForm[password]": {
                required: true,
                minlength: 8,
                maxlength: 32,
                pattern: /^.*(?=.{8,32})(?=.*\d)(?=.*[a-zA-Z]).*$/i
            },
            "RegistrationForm[passwordConfirm]": {
                equalTo: "#password"
            },
            "RegistrationForm[email]": {
                required: true,
                email: true
            },
            "RegistrationForm[agree]": "required"
        },
        messages: {
            "RegistrationForm[firstName]": "Please, enter your firstname",
            "RegistrationForm[lastName]": "Please, enter your lastname",
            "RegistrationForm[userName]": {
                required: "Please, enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            "RegistrationForm[streetName]": "Please, enter your street name",
            "RegistrationForm[streetNumber]": "Please, enter your street number",
            "RegistrationForm[city]": "Please, enter your city",
            "RegistrationForm[country]": "Please, enter your country",
            "RegistrationForm[postCode]": "Please, enter a zip code",
            "RegistrationForm[password]": {
                required: "Please provide a password",
                minlength: "Password must be between 8 and 32 characters long, and include at least a letter and a digit",
                maxlength: "Password must be between 8 and 32 characters long, and include at least a letter and a digit",
                pattern: "Password must be between 8 and 32 characters long, and include at least a letter and a digit"
            },
            "RegistrationForm[passwordConfirm]": {
                equalTo: "Please enter the same password"
            },
            "RegistrationForm[email]": "Please enter a valid email address",
            "RegistrationForm[agree]": "Please accept our policy"
        },
        submitHandler: function(form) {
            form.submit();
          },
        invalidHandler: function() {
            setTimeout(function() {
                sameSize();
            }, 50);
        }
    });
});
