<?php

//データベース接続用の変数
$username = "udemy_user";
$password = "udemy_pass";
$hostname = "db";
$db = "udemy_db";

//データベース接続
$pdo = new PDO("mysql:host={$hostname};dbname={$db};charset=utf8", $username, $password);

//社員情報取得SQLの作成
$sql = "SELECT * FROM users ORDER BY id";
$stmt = $pdo->prepare($sql);
//社員情報取得SQLの実行
$stmt->execute();

$outputDate = [];
$dataCount = 0;
//SQL結果を1行ずつ読み込み、終端まで繰り返し
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //出力データの作成
    $outputDate[$dataCount]["id"] = $row["id"];
    $outputDate[$dataCount]["name"] = $row["name"];
    $outputDate[$dataCount]["name_kana"] = $row["name_kana"];
    $outputDate[$dataCount]["birthday"] = $row["birthday"];
    $outputDate[$dataCount]["gender"] = $row["gender"];
    $outputDate[$dataCount]["organization"] = $row["organization"];
    $outputDate[$dataCount]["post"] = $row["post"];
    $outputDate[$dataCount]["start_date"] = $row["start_date"];
    $outputDate[$dataCount]["tel"] = $row["tel"];
    $outputDate[$dataCount]["mail_address"] = $row["mail_address"];
    $outputDate[$dataCount]["created"] = $row["created"];
    $outputDate[$dataCount]["updated"] = $row["updated"];
    $dataCount++;
}

//出力ファイルオープン
$fpOut = fopen(__DIR__ . "/export_users.csv", "w");

//ヘッダー行 書き込み
$header = [
    "社員番号",
    "社員名",
    "社員名カナ",
    "生年月日",
    "性別",
    "所属部署",
    "入社年月日",
    "電話番号",
    "メールアドレス",
    "作成日時",
    "更新日時"
];
fputcsv($fpOut, $header);

//出力データ数分 繰り返し
foreach($outputDate as $data) {
    //出力データ 書き込み
    fputcsv($fpOut, $data);
}

//出力データクローズ
fclose($fpOut);
