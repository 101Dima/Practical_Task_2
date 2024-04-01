<?php
declare(strict_types=1);

require_once 'Database.php';

abstract class DAO
{
    protected Database $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    abstract public function create(object $obj): ?int;
    abstract public function read(int $id): ?object;
    abstract public function update(object $obj): bool;
    abstract public function delete(object $obj): bool;
}