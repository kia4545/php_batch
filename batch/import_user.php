<?php

require_once("library/log.php");

$logFile = __DIR__ . "/log/import_users.log";
writeLog($logFile, "社員情報登バッチ 開始");
$dataCount = 0;

try {
    //データベース接続用の変数
    $username = "udemy_user";
    $password = "udemy_pass";
    $hostname = "db";
    $db = "udemy_db";

    //データベース接続
    $pdo = new PDO("mysql:host={$hostname};dbname={$db};charset=utf8", $username, $password);

    //社員情報CSVオープン
    $fp = fopen(__DIR__ . "/import_users.csv", "r");

    //トランザクション開始
    $pdo->beginTransaction();

    //ファイルを１行ずつ読み込み、終端まで繰り返し
    while($data = fgetcsv($fp)) {
        //社員番号をキーにして社員情報取得SQLの実行
        $sql = "SELECT COUNT(*) AS count FROM users WHERE id = :id";
        $param = [":id" => $data[0]];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        //SQLの結果件数は0件?
        if($result["count"] === "0") {
            //社員情報登録SQLの実行
            $sql = "INSERT INTO users ( ";
            $sql .= "id,";
            $sql .= "name,";
            $sql .= "name_kana,";
            $sql .= "birthday,";
            $sql .= "gender,";
            $sql .= "organization,";
            $sql .= "post,";
            $sql .= "start_date,";
            $sql .= "tel,";
            $sql .= "mail_address,";
            $sql .= "created,";
            $sql .= "updated";
            $sql .= ") VALUES (";
            $sql .= ":id,";
            $sql .= ":name,";
            $sql .= ":name_kana,";
            $sql .= ":birthday,";
            $sql .= ":gender,";
            $sql .= ":organization,";
            $sql .= ":post,";
            $sql .= ":start_date,";
            $sql .= ":tel,";
            $sql .= ":mail_address,";
            $sql .= "NOW(),";
            $sql .= "NOW()";
            $sql .= ")";
        } else {
            //社員情報更新SQLの実行
            $sql = "UPDATE users ";
            $sql .= "SET name = :name,";
            $sql .= "name_kana = :name_kana,";
            $sql .= "birthday = :birthday,";
            $sql .= "gender = :gender,";
            $sql .= "organization = :organization,";
            $sql .= "post = :post,";
            $sql .= "start_date = :start_date,";
            $sql .= "tel = :tel,";
            $sql .= "mail_address = :mail_address,";
            $sql .= "updated = NOW()";
            $sql .= "WHERE id = :id";
        }
        $param = array(
            'id' => $data[0],
            'name' => $data[1],
            'name_kana' => $data[2],
            'birthday' => $data[3],
            'gender' => $data[4],
            'organization' => $data[5],
            'post' => $data[6],
            'start_date' => $data[7],
            'tel' => $data[8],
            'mail_address' => $data[9]
        );
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $dataCount++;
    }

    //コミット
    $pdo->commit();

    //社員情報CSVクローズ
    fclose($fp);
} catch(Exception $e) {
    //ロールバック
    $pdo->rollBack();
    $dataCount = 0;
    writeLog($logFile, "エラーが発生しました。" . $e->getMessage());
}

writeLog($logFile, "社員情報登録バッチ 終了[処理件数: {$dataCount}件]");
