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

    protected function getResults(){
        $this->stmt->execute();

        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
