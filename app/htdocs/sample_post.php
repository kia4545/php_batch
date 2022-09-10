<?php

echo "通信方式は" . $_SERVER['REQUEST_METHOD'] . "です。";
// echo "test_param1は" . $_GET['test_param1'] . "です。";
// echo "test_param2は" . $_GET['test_param2'] . "です。";
echo "user_idは" . $_POST['user_id'] . "です。";
echo "passwordは" . $_POST['password'] . "です。";

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <form action="sample_post.php" method="post">
        ユーザーID：<input type="text" name="user_id" /><br />
        パスワード：<input type="password" name="password" /><br />
        <input type="submit" value="送信" />
    </form>
</body>

</html>
