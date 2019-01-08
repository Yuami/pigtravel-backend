let menu = $('#scrollspy');
let origOffsetY = menu.offset().top;
var content = $('#mainHouseSection');

function scroll() {
    if ($(window).scrollTop() >= origOffsetY) {
        menu.addClass('fixed-top');
        content.addClass('menu-padding');
    } else {
        menu.removeClass('fixed-top');
        content.removeClass('menu-padding');
    }
}

document.onscroll = scroll;

function mapLoad(x, y) {
    let map = L.map('houseMap').setView([x, y], 14);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoicHJvZmV3ZWIiLCJhIjoiY2pwM3JxeHR3MGF6cjNrcXcwbmh0MGZtOCJ9.mxvmjOpVymwltGGlcxHx8g'
    }).addTo(map);
    L.marker([x, y]).bindPopup("Your House").addTo(map);

}

$(function() {
    $("#updateCompleted").delay(2000).fadeTo(2000, 500).slideUp(500, function(){
        $("#updateCompleted").slideUp(500);
    });
});