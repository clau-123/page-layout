<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            try {
                $config = require BASE_PATH . '/config/database.php';
                $dsn = sprintf(
                    "mysql:host=%s;port=%s;dbname=%s;charset=%s",
                    $config['host'],
                    $config['port'],
                    $config['dbname'],
                    $config['charset']
                );
                
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                    PDO::MYSQL_ATTR_SSL_CA => true
                ];

                self::$instance = new PDO($dsn, $config['username'], $config['password'], $options);
                
                // Initialize database
                self::initDatabase();
                
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }

    private static function initDatabase() {
        $sql = file_get_contents(BASE_PATH . '/database/init.sql');
        self::$instance->exec($sql);
    }
}
