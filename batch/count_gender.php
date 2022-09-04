<?php

//CSVファイルのオープンとクローズ

//CSVファイルオープン
$fp = fopen(__DIR__ . "/input.csv", "r");

//ファイルを１行ずつ読み込む、終端まで繰り返し
$lineCount = 0;
$manCount = 0;
$womanCount = 0;
while($data = fgetcsv($fp)) {
    $lineCount++;
    if($lineCount == 1) {
        //一行目がヘッダーだったら→次の行に進む
        continue;
    }

    //男性か女性かの条件分岐
    if($data[4] == "男性") {
         //男性 = 男性人数 + 1
        $manCount++;
    } else {
         //女性 = 女性人数 + 1
        $womanCount++;
    }
}
//CSVクローズ
fclose($fp);

//出力ファイルオープン
$fpOut = fopen(__DIR__ . "/output.csv", "w");

//ヘッダー行書き込み
$header = ["男性", "女性"];
fputcsv($fpOut, $header);

//男性人数、女性人数、書き込み
$outputDate = [$manCount, $womanCount];
fputcsv($fpOut, $outputDate);

//CSVクローズ
fclose($fpOut);


?>
