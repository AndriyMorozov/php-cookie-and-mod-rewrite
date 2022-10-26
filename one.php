<?php
if (isset($_GET['change']))
{
    setcookie('font-size', '18px');
    header("Location: one.php");
}
echo $_COOKIE['font-size'];