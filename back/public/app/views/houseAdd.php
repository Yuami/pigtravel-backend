<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
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

        <form id="addHouseForm" method="post" action="/houses">
            <div class="row px-md-5">
                <div class="col-md-8 col-12">
                    <div class="tab form-group">
                        <h3 class="text-center">General Information</h3>
                        <label for="houseName">Name of the house</label>
                        <input type="text" id="houseName" class="form-control mb-1"
                               placeholder="Amazing House on the corner of Oslo"
                               name="houseName">
                        <label for="peopleAmount">People Capacity</label>
                        <select id="person" class="form-control" name="peopleAmount" required>
                            <option disabled selected value> -- select an option -- </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <label for="street">Address</label>
                        <input id="street" type="text" class="form-control mb-1" placeholder="Son Juan 23"
                               name="Street">
                        <label for="city">City</label>
                        <select id="city" class="form-control" name="city">
                            <option value="Manacor">Manacor</option>
                        </select>
                    </div>
                    <div class="tab form-group">
                        <h1 class="text-center">Additional Information</h1>
                        <label for="squaremeters">Square Meters</label>
                        <input type="number" class="form-control mb-1" placeholder="120" name="squaremeters">
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
                        <input type="number" class="form-control mb-1" placeholder="60" name="standardRate">
                    </div>
                    <div class="tab">
                        <h1 class="text-center">Images</h1>
                        <p>Available Soon</p>
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
                        <div class="card-header w-100"><h3 id="houseNameCard" class="text-center mb-0">Your House</h3></div>
                    </div>
                    <img class="card-img-top mt-2" src="/img/casas/house1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p id="personCard" class="mb-0"></p>
                        <p id="streetCard"></p>
                        <p id="descriptionCard" class="card-text"></p>
                    </div>
                </div>
        </form>
    </div>
</section>
<script src="/js/custom/houseAdd.js"></script>
<?php include_once("footer.php") ?>
</body>
</html>