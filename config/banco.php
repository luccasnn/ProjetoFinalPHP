<?php
// config/banco.php
// Classe abstrata para conexão única com o banco 'banco-prova'
abstract class Banco {
    private static $conn;

    public static function getConn() {
        if (!isset(self::$conn)) {
            self::$conn = new mysqli("localhost", "root", "", "banco-prova");
            if (self::$conn->connect_error) {
                die("Erro ao conectar ao banco: " . self::$conn->connect_error);
            }
            self::$conn->set_charset("utf8mb4");
        }
        return self::$conn;
    }
}
?>