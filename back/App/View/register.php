<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once("libraries.php") ?>
    <script src="/js/validation/bootstrap-validator.js"></script>
    <script src="/js/validation/validation.js"></script>
    <title>Register</title>
    <style>
        #regForm {
            background-color: rgba(255, 255, 255, 0.7);
            margin: 70px auto;
            padding: 40px;
            width: 100%;
            min-width: 600px;
            border-radius: 10px;
        }


        /* Hide all steps by default: */
        .window {
            display: none;
            height: 100%;
        }

        /* Step marker: Place in the form. */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: green;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color:;
        }
    </style>
</head>
<body id="landingBody">
<?php include_once("header.php") ?>
<div class="container-fluid col-md-6 col-md-offset-3 justify-content-center">

    <form id="regForm" method="POST" action="/register">
        <h1 class="text-center">Registro</h1>
        <div class="form-group window">
            <div class="row ">
                <div class="form-group col">
                    <label for="">Nom</label>
                    <input class="form-control" placeholder="Nom..." name="nom">
                </div>
                <div class="form-group col">
                    <label for="">Primer Llinatge:</label>
                    <input class="form-control" placeholder="Primer Llinatge..." name="apellido1">
                </div>
                <div class="form-group col">
                    <label for="">Segon Llinatge:</label>
                    <input class="form-control" placeholder="Segon Llinatge..." name="apellido2">
                </div>
            </div>
            <div class="row ">
                <div class="form-group col">
                    <label for="">DNI</label>
                    <input class="form-control" placeholder="DNI..." name="dni">
                </div>
                <div class="form-group col">
                    <label for="">Fecha Nacimiento</label>
                    <input class="form-control" placeholder="00-00-0000" name="fechaN">
                </div>
            </div>
        </div>
        <div class="form-group window">
            <div class="form-group col">
                <label for="emailLogin">Email:</label>
                <input type="email" id="emailLogin" class="form-control" placeholder="E-mail..."
                       name="emailRegister" required>
            </div>
            <div class="form-group col">
                <label for="">Phone:</label>
                <input class="form-control" placeholder="Phone..." name="telefono">
            </div>
        </div>
        <div class="form-group window">
            <div class="container justify-content-center">
                <div class="form-group col-6">
                    <label for="">Contraseña:</label>
                    <input type="password" class="form-control " placeholder="Contraseña..." name="passw">
                </div>
                <div class="form-group col-6">
                    <label for="">Confirmar contraseña:</label>
                    <input type="password" class="form-control " placeholder="Confirmar contraseña..." name="passwC">
                </div>
            </div>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button class="btn btn-danger" type="button" id="prevBtn" onclick="nextPrev(-1)">Atras</button>
                <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div class="text-center">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
</div>
<script>

    $('.btn').click(function (event) {
        event.preventDefault();
        let target = $(this).data('target');
        // console.log('#'+target);
        $('#click-alert').html('data-target= ' + target).fadeIn(50).delay(3000).fadeOut(1000);
    });


    // Multi-Step Form
    let currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        let x = document.getElementsByClassName("window");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Confirmar";
        } else {
            document.getElementById("nextBtn").innerHTML = "Siguiente";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        let x = document.getElementsByClassName("window");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        let x, y, i, valid = true;
        x = document.getElementsByClassName("window");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value === "") {
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
        // This function removes the "active" class of all steps...
        let i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<?php include_once("footer.php") ?>
</body>
</html>