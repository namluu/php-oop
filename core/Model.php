<?php declare(strict_types=1);

namespace Core;

abstract class Model
{
    protected $db;

    protected $stmt;

    public function __construct()
    {
        if ($this->db === null) {
            try {
                $this->db = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
                // throw an exception when an error occurs
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    protected function query($sql): void
    {
        $this->stmt = $this->db->prepare($sql);
    }

    protected function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => \PDO::PARAM_INT,
                is_bool($value) => \PDO::PARAM_BOOL,
                is_null($value) => \PDO::PARAM_NULL,
                default => \PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    protected function execute(){
        $this->stmt->execute();
    }

    protected function getResults(){
        $this->stmt->execute();

        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function lastInsertId(): false|string
    {
        return $this->db->lastInsertId();
    }
}
