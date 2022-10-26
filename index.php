<?php
if (isset($_GET['color']))
{
    $color = $_GET['color'];
    setcookie('color', $color);
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css" />
    <script src="/script.js" defer></script>
</head>
<body>
    <div class="menu">
        <div class="red">
            червоний
        </div>
        <div class="green">
            зелений
        </div>
        <div class="blue">
            синій
        </div>
    </div>
    <div class="menu2">
        <a href="index.php?color=red">
            червоний
        </a>
        <a href="index.php?color=green">
            зелений
        </a>
        <a href="index.php?color=blue">
            синій
        </a>
    </div>
</body>
</html>