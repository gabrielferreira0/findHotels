$(document).ready(function () {
    $('#table_id').DataTable();
});

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        $("#alertErro").html('"Your browser does not support Geolocation."').show().fadeOut(4000);
    }
}

function showPosition(position) {

    $('#longitude').val(position.coords.latitude)
    $('#latitude').val(position.coords.longitude)

    $('#form').submit();

}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            $("#alertErro").html("User rejected a geolocation reques.").show().fadeOut(4000);
            break;
        case error.POSITION_UNAVAILABLE:
            $("#alertErro").html("Location unavailable.").show().fadeOut(4000);
            break;
        case error.TIMEOUT:
            $("#alertErro").html("The request expired.").show().fadeOut(4000);
            break;
        case error.UNKNOWN_ERROR:
            $("#alertErro").html("Some unknown error happened.").show().fadeOut(4000);
            break;
    }
}
