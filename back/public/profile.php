<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>Profile</title>
</head>

<body>
<?php include_once("header.php") ?>

<section id="profilePage" class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Profile</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-12 col-md-4 offset-md-2">
                <div class="row">
                    <label class="sr-only" for="fullNameForm">Name</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="my-auto mr-sm-3 col-md-4">Name</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-8" id="fullNameForm" style="width: 80px;">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="locationForm">Location</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="my-auto mr-sm-3 col-md-4">Location</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-8" id="locationForm">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="emailForm">E-Mail</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="my-auto mr-sm-3 col-md-4">E-Mail</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-8" id="emailForm">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="telephoneForm">Telephone</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="my-auto mr-3 col-md-4">Telephone</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-8" id="telephoneForm">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="passwordForm">Password</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="my-auto mr-sm-3 col-md-4">Password</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-8" id="passwordForm">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <input type="text">
                <input type="text">
            </div>
        </div>
    </form>
</section>


<?php include_once("footer.php") ?>
</body>
</html>