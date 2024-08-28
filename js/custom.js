// overlay menu
function openNav() {
    document.getElementById("myNav").classList.toggle("menu_width");
    document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style");
}


// display current year

function displayYear() {
    var d = new Date();
    var currentYear = d.getFullYear();

    document.querySelector("#displayDate").innerHTML = currentYear;
}
displayYear();

// client section owl carousel
$(document).ready(function() {
    var $carousel = $(".owl-carousel");

    // Vérifier le nombre d'éléments dans le carrousel
    var itemCount = $carousel.find('.item').length;

    $carousel.owlCarousel({
        loop: itemCount > 1,  // Désactive la boucle si un seul item
        margin: 15,
        navText: [],
        center: itemCount === 1,  // Centre l'item si un seul
        dots: false,
        autoplay: itemCount > 1,  // Désactive l'autoplay si un seul item
        autoplayHoverPause: true,
        navText: ['<span class="fa fa-arrow-left "></span>', '<span class="fa fa-arrow-right"></span>'],
        responsive: {
            0: {
                items: 1
            },
            1000: {
                items: Math.min(itemCount, 3) // Définit le nombre d'items max selon le nombre disponible
            }
        }
    });
});


/** google_map js **/

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}