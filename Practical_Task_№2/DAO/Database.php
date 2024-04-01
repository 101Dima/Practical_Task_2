<?php
declare(strict_types=1);

class Database
{
    private PDO $pdo;

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

    public function __construct()
    {
        $this->connect();
    }

    private static function getCredentials(): array
    {
        return parse_ini_file('db_params.ini');
    }

    private function connect(): void
    {
        try {
            $dbParams = self::getCredentials();
            $this->pdo = new PDO(
                "mysql:host={$dbParams['host']};dbname={$dbParams['dbname']}",
                $dbParams['user'],
                $dbParams['password']
            );
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}