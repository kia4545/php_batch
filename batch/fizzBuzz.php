<?php

//入力値を受け取る
$value = $argv[1];

//入力値が3と5で割り切れる→FizzBuzzを出力
if ($value % 3 === 0 && $value % 5 === 0) {
    echo "FizzBuzz\n";
} elseif ($value % 3 === 0) {
    //入力値が3で割り切れる→Fizzを出力
    echo "Fizz\n";
} elseif ($value % 5 === 0) {
    //入力値が5で割り切れる→Buzzを出力
    echo "Buzz\n";
} else {
    //入力値
    echo $value . "\n";
}
