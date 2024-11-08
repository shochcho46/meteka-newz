$(document).ready(function() {
    "use strict";
    var invalidChars = ["-", "e", "+", "E"];

    $("input[type='number']").on("keypress", function(e) {
        "use strict";
        if (invalidChars.includes(e.key)) {
            e.preventDefault();

        }
    });

});



$(document).ready(function() {
    "use strict";
    $('.testselect1').SumoSelect();

    $('.testselect2').SumoSelect();

    $('.optgroup_test').SumoSelect();
    $('.search_test').SumoSelect({ search: true, searchText: 'Enter here.' });

    $('.testselect3').SumoSelect({ placeholder: 'This is a placeholder' });


});

$(document).ready(function() {
    "use strict";
    $("#postfrom").submit(function(e) {

        $("#postBtn").attr("disabled", true).html("Please Wait");

        return true;

    });

});


$(document).ready(function() {
    "use strict";
    $("#updatePost").submit(function(e) {

        $("#updateBtn").attr("disabled", true).html("Please Wait");

        return true;

    });
});