<?php

$in1 = [
    [
        'id' => 1,
        'code' => 'S1001',
        'name' => '山田',
    ],
    [
        'id' => 2,
        'code' => 'S1003',
        'name' => '鈴木',
    ],
    [
        'id' => 3,
        'code' => 'S1002',
        'name' => '佐藤',
    ],
];

$out1 = array_column($in1, 'name');
echo ('<pre>');
var_dump($out1);
echo ('</pre>');

$in2 = [
    'id' => 1,
    'code' => 'S1001',
    'name' => '山田',
    'pref' => 27,
];

$out2 = array_keys($in2);

echo ('<pre>');
var_dump($out2);
echo ('</pre>');

$in3 = [
    [
        'id' => 1,
        'code' => 'S1001',
        'name' => '山田',
    ],
    [
        'id' => 2,
        'code' => 'S1003',
        'name' => '鈴木',
    ],
    [
        'id' => 3,
        'code' => 'S1002',
        'name' => '佐藤',
    ],
];

$out3 = array_column($in3, 'name', 'code');


echo ('<pre>');
var_dump($out3);
echo ('</pre>');









?>
