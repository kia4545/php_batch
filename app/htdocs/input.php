<?php

declare(strict_types=1);

$genderLists = [
    "男性",
    "女性",
];

$organizationLists = [
    "営業部",
    "人事部",
    "総務部",
    "システム開発1部",
    "システム開発2部",
    "システム開発3部",
    "システム開発4部",
    "システム開発5部",
];

$postLists = [
    "部長",
    "次長",
    "課長",
    "一般",
];

$id = '';
$name = '';
$nameKana = '';
$birthday = '';
$gender = '';
$organization = '';
$post = '';
$startDate = '';
$tel = '';
$mailAddress = '';
$errorMessage = '';
$successMessage = '';

//データベース接続

//POST通信、かつ登録ボタン押す
if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    var_dump($_POST);
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $nameKana = isset($_POST['name_kana']) ? $_POST['name_kana'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $organization = isset($_POST['organization']) ? $_POST['organization'] : '';
    $post = isset($_POST['post']) ? $_POST['post'] : '';
    $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $mailAddress = isset($_POST['mail_address']) ? $_POST['mail_address'] : '';

    //POSTされた社員番号の入力チェック
    //空白ではないか
    //６桁の数値か
    //存在しない社員番号か

    //POSTされた社員名の入力チェック
    //空白ではないか
    //50文字以内か

    //POSTされた社員名カナの入力チェック
    //空白ではないか
    //50文字以内か

    //POSTされた生年月日の入力チェック
    //空白ではないか
    //yyyy/mm/dd形式
    //存在する日付

    //POSTされた性別の入力チェック
    //以下のいずれかか
    //男性、女性

    //POSTされた部署の入力チェック

    //POSTされた役職の入力チェック

    //POSTされた入社年月日の入力チェック

    //POSTされた電話番号の入力チェック

    //POSTされたメールアドレスの入力チェック

    //入力チェックOK?

    //トランザクション開始

    //社員情報登録SQLの発行

    //コミット
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>社員登録</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>

    <div id="header">
        <h1>社員管理システム</h1>
    </div>

    <div class="clearfix">
        <div id="menu">
            <h3>メニュー</h3>
            <div class="sub_menu"><a href="./search.php">社員検索</a></div>
            <div class="sub_menu">社員登録</div>
        </div>

        <div id="main">
            <h3 id="title">社員登録画面</h3>

            <div id="input_area">
                <form action="input.php" method="POST">
                    <p><strong>社員情報を入力してください。全て必須です。</strong></p>
                    <?php //メッセージ表示
                    ?>
                    <?php //例)社員名を入力してください。
                    ?>
                    <?php //例)社員名は50文字以内で入力してください。
                    ?>
                    <?php //例)生年月日を正しく入力してください。
                    ?>
                    <?php //例)性別を選択してください。
                    ?>
                    <?php //例)XXXXXを入力してください。
                    ?>
                    <?php //例)登録完了しました。
                    ?>

                    <?php //各入力項目表示
                    ?>
                    <table>
                        <tbody>
                            <tr>
                                <td>社員番号</td>
                                <td><input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>" /></td>
                            </tr>
                            <tr>
                                <td>社員名</td>
                                <td><input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" /></td>
                            </tr>
                            <tr>
                                <td>社員名カナ</td>
                                <td><input type="text" name="name_kana" value="<?php echo htmlspecialchars($nameKana); ?>" /></td>
                            </tr>
                            <tr>
                                <td>生年月日</td>
                                <td><input type="date" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>" /></td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>
                                    <?php foreach ($genderLists as $key => $value) { ?>
                                        <input type="radio" name="gender" value="<?php echo $value ?>" <?php echo $gender === $value ? "checked" : ""; ?>>
                                        <?php echo $value ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>部署</td>
                                <td>
                                    <select name="organization">
                                        <?php foreach ($organizationLists as $key => $value) { ?>
                                            <option value="<?php echo $value ?>" <?php echo $organization === $value ? "selected" : ""; ?>>
                                                <?php echo $value ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>役職</td>
                                <td>
                                    <select name="post">
                                        <?php foreach ($postLists as $key => $value) { ?>
                                            <option value="<?php echo $value ?>" <?php echo $post === $value ? "selected" : ""; ?>>
                                                <?php echo $value ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>入社年月日</td>
                                <td><input type="date" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>" /></td>
                            </tr>
                            <tr>
                                <td>電話番号(ハイフン無し)</td>
                                <td><input type="text" name="tel" value="<?php echo htmlspecialchars($tel); ?>" /></td>
                            </tr>
                            <tr>
                                <td>メールアドレス</td>
                                <td><input type="text" name="mail_address" value="<?php echo htmlspecialchars($mailAddress); ?>" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="input_area_right">
                            <input type="hidden" name="save" value="1" />
                            <input type="submit" id="input_button" value="登録">
                            <input type="button" id="back_button" value="戻る" onclick="location.href='search.php'; return false;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
