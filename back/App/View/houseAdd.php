<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>

    <link rel="stylesheet" href="/css/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"/>
    <script src="/js/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="/js/validation/bootstrap-validator.js"></script>

    <title>Plantilla para backend</title>
</head>

<body>
<?php include_once("header.php") ?>

<section class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Add House</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/houses.php">Houses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Houses</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        <form id="addHouseForm" method="POST" action="/houses">

            <div class="row px-md-5">
                <div class="col-md-8 col-12">
                    <div class="tab form-group">
                        <h3 class="text-center">General Information</h3>
                        <label for="houseName">Name of the house</label>
                        <input type="text" id="houseName" class="form-control mb-1"
                               name="houseName">
                        <label for="peopleAmount">People Capacity</label>
                        <input type="number" id="peopleAmount" class="form-control mb-1"
                               name="peopleAmount">
                        <label for="street">Address</label>
                        <input id="street" type="text" class="form-control mb-1"
                               name="street">
                        <label for="city">City</label>
                        <select id="city" class="form-control" name="city">
                        </select>
                    </div>
                    <div class="tab form-group">
                        <h1 class="text-center">Additional Information</h1>
                        <label for="squaremeters">Square Meters</label>
                        <input type="number" class="form-control mb-1" name="squaremeters">
                        <label for="checkIn">Check In Time</label>
                        <input type="time" class="form-control mb-1" name="checkIn" value="14:00">
                        <label for="checkOut">Check Out Time</label>
                        <input type="time" class="form-control mb-1" name="checkOut" value="12:00">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control mb-1" rows="4" cols="50"
                                  name="description"></textarea>
                    </div>
                    <div class="tab">
                        <h1 class="text-center">Rates</h1>
                        <label for="standardRate">Standard Rate</label>
                        <input type="number" class="form-control mb-1" name="standardRate">
                    </div>
                    <div id="imageTab" class="tab">
                        <h1 class="text-center">Images</h1>

                    </div>
                    <div class="tab">
                        <h1 class="text-center">Services</h1>
                        <p>Available Soon</p>
                    </div>
                    <div style="overflow:auto;">
                        <div style="float: left;margin:10px auto 30px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 card">
                    <div class="row">
                        <div class="card-header w-100"><h3 id="houseNameCard" class="text-center mb-0">Your House</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="houseMap" style="width:auto;height:300px;margin: -36px -36px 0;"></div>
                        <p id="wrongHouseLocation">Wrong house location?</p>
                        <p id="personCard" class="mb-0"></p>
                        <p id="streetCard"></p>
                        <p id="descriptionCard" class="card-text"></p>
                    </div>
                </div>
        </form>
    </div>
</section>

<!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDufJRsYwR2Knzo2rmeamYxCTpdyeAkhl4&callback=initMap">
</script> -->
<script src="/js/custom/houseAdd.js"></script>
<script src="/js/custom/loadLocalidades.js"></script>
<script>
    $(function () {
        loadLocalidades();
    });
</script>
<?php include_once("footer.php") ?>
</body>
</html>