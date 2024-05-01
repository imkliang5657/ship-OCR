<?php
include_once('../app/config/config.php');
class Database
{
    private $type = DB_TYPE;
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $dbh;
    private $stmt;

    public function __construct() {
        try {
            $this->dbh = new PDO(
                $this->type . ":host=".$this->host . ";dbname=".$this->dbname,
                $this->user,$this->pass
            );
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param $query
     * @return void
     */
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    /**
     * @param $param
     * @param $value
     * @param $type
     * @return void
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }

    /**
     * @return mixed
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /**
     * @return array
     */
    public function getAll() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function getSingle() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return int
     */
    public function getRowCount() {
        $this->execute();
        return $this->stmt->rowCount();
    }

}
