<?php
session_start();
require_once('library.inc.php');
/** @var string[] $monthList */

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
$values = [
    'day1' => 1,
    'day2' => date('d'),
    'month1' => 1,
    'month2' => date('m'),
    'year1' => 2000,
    'year2' => date('Y')
];
$keys = array_keys($values);

foreach ($keys as $key) {
    if (isset($_SESSION[$key]))
        $values[$key] = $_SESSION[$key];
    if (isset($_POST[$key]))
        $values[$key] = $_SESSION[$key] = $_POST[$key];
}
?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
    <?php
    $folder = $_POST['folder'];
    $file = $_POST['file'];
    if (!is_dir($folder))
        mkdir($folder);
    $date1 = "{$values['year1']}-{$values['month1']}-{$values['day1']}";
    $date2 = "{$values['year2']}-{$values['month2']}-{$values['day2']}";
    $time1 = strtotime($date1);
    $time2 = strtotime($date2);
    $dateNew1 = date('Y-n-j', $time1);
    $dateNew2 = date('Y-n-j', $time2);
    $timeDiff = $time2 - $time1;
    $daysCount = $timeDiff / (60 * 60 * 24);
    $resultString = "Різниця між датами {$date1} та {$date2} складає ".abs($daysCount)." днів";
    // file_put_contents($folder.'/'.$file, $resultString);
    /*$f = fopen($folder.'/'.$file, "w+");
    fputs($f, $resultString);
    fclose($f);*/
/*    $f = fopen($folder.'/'.$file, "w+");
    foreach($values as $key => $value) {
        fputs($f, "{$key} = {$value}\n");
    }
    fclose($f);*/
    file_put_contents($folder.'/'.$file, json_encode($values));
    $value = json_decode(file_get_contents($folder.'/'.$file));
    ?>
    <?php if ($date1 != $dateNew1) : ?>
        <div class="badge text-bg-danger">Помилка введення першої дати!</div>
    <?php endif; ?>

    <?php if ($date2 != $dateNew2) : ?>
        <div class="badge text-bg-danger">Помилка введення другої дати!</div>
    <?php endif; ?>
    <div><?=$resultString ?></div>
<?php endif; ?>
<form method="post" action="">
    <table>
        <tr>
            <td>Folder Name</td>
            <td><input type="text" name="folder" /></td>
        </tr>
        <tr>
            <td>File Name</td>
            <td><input type="text" name="file" /></td>
        </tr>
        <tr>
            <td>Дата 1:</td>
            <td>
                <?= createSelect(1, 31, 'day1', $values['day1']) ?>
                <?= createSelect(1, 12, 'month1', $values['month1'], $monthList) ?>
                <?= createSelect(1970, date('Y'), 'year1', $values['year1']) ?>
            </td>
        </tr>
        <tr>
            <td>Дата 2:</td>
            <td>
                <?= createSelect(1, 31, 'day2', $values['day2']) ?>
                <?= createSelect(1, 12, 'month2', $values['month2'], $monthList) ?>
                <?= createSelect(1970, date('Y'), 'year2', $values['year2']) ?>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <button type="submit">Send</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>