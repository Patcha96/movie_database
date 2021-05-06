var regexFirst = /^[A-Za-z0-9\:\ \-\'\,]*$/;
var regexLast = /^[A-Z]+[a-z' \-]*$/;
/*var regexEmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;*/
$(document).ready(
    function () {
        $("#title").keypress(
            function (e) {
                var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ((!e.charCode ? e.which : e.charCode) > 0 && !regexFirst.test($("#first_name").val() + key)) {
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;
                }
            }
        );

/*        $("#last_name").keypress(
            function (e) {
                var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ((!e.charCode ? e.which : e.charCode) > 0 && !regexLast.test($("#last_name").val() + key)) {
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;
                }
            }
        );*/

        /*    $("#signup").submit(function(event) {
        var emailinput = $('#email').val();
        var firstnameinput = $('#first_name').val();
        var lastnameinput = $('#last_name').val();

        if (regexEmail.test(emailinput) == false)
        {
            event.preventDefault();
            window.alert('Invalid email');
        }

        if (regexLast.test(lastnameinput) == false)
        {
            event.preventDefault();
            window.alert('Invalid last name');
        }

        if (regexFirst.test(firstnameinput) == false)
        {
            event.preventDefault();
            window.alert('Invalid first name');
        }
        });*/
    }
);
