<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/error.css">
    <title><?= $code ?> - Pig Travel</title>
</head>
<body>
<p class="info"><?= $errMessage ?></p>
<h1 class="internal">
    <span class="five"><?= $errNumber[0] ?></span>
    <span class="zero"><?= $errNumber[1] ?></span>
    <span class="zero"><?= $errNumber[2] ?></span>
</h1>
</body>
</html>