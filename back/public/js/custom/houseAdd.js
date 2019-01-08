var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

var map = L.map('houseMap').setView([25, 0], 1);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoicHJvZmV3ZWIiLCJhIjoiY2pwM3JxeHR3MGF6cjNrcXcwbmh0MGZtOCJ9.mxvmjOpVymwltGGlcxHx8g'
}).addTo(map);
// var geocoder = new google.maps.Geocoder();


$('#houseName').on('change', function (e) {
    $("#houseNameCard").text($("#houseName").val());
});

$('#person').on('change', function () {
    console.log(this.value);
    if (this.value > 1) {
        $("#personCard").html('<span class="fas fa-user-friends"></span> ' + this.value + " people");
    } else {
        $("#personCard").html('<span class="fas fa-user-friends"></span> ' + this.value + " person");
    }
});

function updateStreet(){
    let address;
    let streetName = $("#street").val();
    let city = $("#city option:selected").text();
    if (city !== $("#city option:first-child").text() && streetName){
        address = streetName + ", " + city;
        $("#streetCard").html('<span class="fas fa-road"></span> ' + address);
    }

//    geocoder.geocode(address, function(results, status) {
//        if (status == geocoder.GeocoderStatus.OK) {
// // // latLng = new L.LatLng(results[0].center.lat, results[0].center.lng);
//             marker = new L.Marker(latLng);
//             marker.addTo(map);
//             console.log(latLng);
//         } else {
//             console.log("ERROR");
//         }
//     });
}

$('#street').on('change', function (e) {
    updateStreet();
});

$('#city').on('change', function (e) {
    updateStreet();
});

$('#description').on('change', function (e) {
    $("#descriptionCard").text(this.value);
});

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        document.getElementById("addHouseForm").submit();
        return false;
    }
    showTab(currentTab);
}

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
        x[n].className += " active";
    }
}


$("#houseName").on('blur',bootstrapValidate('#houseName', 'required:Enter a name!'))
    .on('blur',bootstrapValidate('#houseName', 'regex:^[a-zA-Z ]+$:Enter only letters!'));

$("#street").on('blur',bootstrapValidate('#street', 'required:Enter a name!'));


