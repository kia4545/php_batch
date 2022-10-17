<?php
declare(strict_types=1);

class DataBase
{
    private static PDO $pdo;

    /**
     * コンストラクタ
     */
    private function __construct()
    {

    }

    private static function getInstance(): PDO
    {
        if (!isset(self::$pdo)) {
            self::$pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
        }
        return self::$pdo;
    }

    /**
     * トランザクション
     *
     * @param なし
     * @return なし
     */
    public static function beginTransaction(): void
    {
        if (self::getInstance()->inTransaction()) {
            return;
        }
        self::getInstance()->beginTransaction();
    }

    /**
     * コミット
     *
     * @param なし
     * @return なし
     */
    public static function commit(): void
    {
        if (!self::getInstance()->inTransaction()) {
            return;
        }
        self::getInstance()->commit();
    }

    /**
     * ロールバック
     *
     * @param なし
     * @return なし
     */
    public static function rollback(): void
    {
        if (!self::getInstance()->inTransaction()) {
            return;
        }
        self::getInstance()->rollback();
    }



    /**
     * SQLを実行して結果を取得する
     *
     *
     */
}









?>
