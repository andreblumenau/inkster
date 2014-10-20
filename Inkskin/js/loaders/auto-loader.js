
function checkAccessUser() {
    $("#txtRegisterUsername").keyup(function() {
        var checkUser = $('#txtRegisterUsername').val();

        if(checkUser == "") {
            $("#checkAvailabilityUser").html("");
        } else {
            $.ajax({
                type: "POST",
                url: "../account/check.php",
                data: "txtRegisterUsername="+ checkUser ,
                success: function(html){
                    $("#checkAvailabilityUser").html(html);
                }
            });
            return false;
        }
    });
}

function checkAccessEmail() {
    $("#txtRegisterEmail").keyup(function() {
        var checkEmail = $('#txtRegisterEmail').val();

        if(checkEmail == "") {
            $("#checkAvailabilityEmail").html("");
        } else {
            $.ajax({
                type: "POST",
                url: "../account/check.php",
                data: "txtRegisterEmail="+ checkEmail,
                success: function(html){
                    $("#checkAvailabilityEmail").html(html);
                }
            });
            return false;
        }
    });
}

function goRedirect() {
    window.location = '../pages/login.php';
}

function goReturn() {
    window.location = '../pages/profile.php';
}