<?php
declare(strict_types=1);

//共通部分の読み込み
require_once(dirname(__DIR__) . "/library/common.php");

session_start();

$loginId = "";
$password = "";
$errorMessage = "";

//POST通信?
if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    //ログイン認証SQLの実装
    $loginId = isset($_POST['login_id']) ? $_POST['login_id'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $sql = "SELECT * FROM login_accounts WHERE login_id = :login_id";
    $param = ["login_id" => $loginId];
    $loginAccount = DataBase::fetch($sql, $param);

    //ログイン認証OK?
    if (empty($loginAccount["id"])) {
        $errorMessage .= "ログインID、又はパスワードに誤りがあります";
    } else if (password_verify($password, $loginAccount["password"]) === false) {
        $errorMessage .= "ログインID、又はパスワードに誤りがあります";
    }

    if ($errorMessage === "") {
        session_regenerate_id(true);
        
        echo "ログイン成功";
    }

    //社員検索画面に遷移

    //エラーメッセージを表示

}

//各入力項目表示
$title = "ログイン";
require_once(TEMPLATE_DIR . "login.php");

?>
