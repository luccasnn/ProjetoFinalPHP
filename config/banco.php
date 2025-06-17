<?php
class Banco {
    private static $pdo;

    public static function getConexao() {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
