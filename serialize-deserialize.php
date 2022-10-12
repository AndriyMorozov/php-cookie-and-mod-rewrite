<?php
// Запис елементів масиву в рядок і виконання оберненої дії
$arr = ['asdas', 'asdasd,asdasd', 'asdasdasd,'];
$str = implode(",", $arr);
$explodedArray = explode(",", $str);
// Серіаліція та десеріалізація
$arr = [1, 2, 3, 4, 5, "string",
    [
        'one' => 1, 'two' => 2
    ]];
$serializedArray = serialize($arr);
$deserializedArray = unserialize($serializedArray);
// Серіалізація в JSON та обернена дія
$arr = [1, 2, 3, 4, 5, "string",
    [
        'one' => 1, 'two' => 2
    ]];
$jsonArray = json_encode($arr);
$jsonDecodedArray = json_decode($jsonArray);
var_dump($jsonDecodedArray);
?>