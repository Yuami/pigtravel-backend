<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Back</title>
    <style>
        .btn-group .button {
            background-color: #4CAF50; /* Green */
            border: 1px solid green;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            float: left;
        }

        .btn-group .button:not(:last-child) {
            border-right: none; /* Prevent double borders */
            margin-left: 64px;
        }

        .active {
            background-color: red !important;
        }

        .btn-group .button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
<div class="btn-group">
<a href="index.php" class="button"><span>BACK</span></a>
<a href="front.php" class="active button"><span>FRONT</span></a>
</div>
<?php include_once "front.html" ?>

</body>
</html>

