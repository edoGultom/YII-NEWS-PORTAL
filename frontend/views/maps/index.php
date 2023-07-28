<?php
$this->title = 'Maps Page';
$this->params['breadcrumbs'][] = ['label' => 'Artikel'];
$this->params['breadcrumbs'][] = $this->title;

// $this->registerJs(<<<JS
//   var x = document.getElementById("demo");

// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else { 
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude + 
//   "<br>Longitude: " + position.coords.longitude;
// }
// JS);

?>

<div class="sec-title">
    <h2><?= $this->title ?></h2>
</div>
<section class="contact-section">
    <!--Map Section-->
    <section class="map-section">
        <!--Map Outer-->
        <div class="map-outer">
            <!--Map Canvas-->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.53081693929!2d98.6564726!3d3.6142934!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131f15e1678a7%3A0xbf2710b08b385ac8!2sUniversitas%20Muhammadiyah%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1690566325443!5m2!1sid!2sid"
                width="700" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!--End Map Section-->

</section>