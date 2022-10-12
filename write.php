<?php
$arr = [
    [
        'name' => 'Petro',
        'count' => 10,
        'email' => 'petro@ukr.net'
    ],
    [
        'name' => 'Ivan',
        'count' => 113,
        'email' => 'ivan@ukr.net'
    ],
    [
        'name' => 'Sergiy',
        'count' => 4,
        'email' => 'serg@ukr.net'
    ]
];
//file_put_contents('data.json', json_encode($arr));
$f = fopen('data.dat', 'w+');
for($i = 0; $i < count($arr); $i++)
{
    $str = "{$arr[$i]['name']}///{$arr[$i]['count']}///{$arr[$i]['email']}\n";
    fputs($f, $str);
}
fclose($f);