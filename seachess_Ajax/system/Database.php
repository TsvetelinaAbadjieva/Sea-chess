<?php


class Database
{
    const HOST     = '127.0.0.1';
    const USERNAME = 'root';
    const PASSWORD = '';
    const NAME     = 'game';

    private static $instance=null;
    private $connection;

    public  function __construct()
{
    $connection = mysqli_connect(
        self::HOST,
        self::USERNAME,
        self::PASSWORD,
        self::NAME
    );

    if (!$connection) {
        echo mysqli_connect_error(); die;
    }

    $this->connection = $connection;
}
    public static function getInstance()
    {

        if (self::$instance === null) {
            $db = new Database();
            self::$instance = $db;
        }

        return  self::$instance;
    }

    public function query($query){

        return mysqli_query($this->connection,$query);

    }
    public function getResultArray($result){

        return mysqli_fetch_assoc($result);
    }

    public function getResultObject($result){

        return mysqli_fetch_object($result);
    }

    public function getLastId(){
        return mysqli_insert_id($this->connection);
    }
    public function affectedRows(){
        return mysqli_affected_rows($this->connection);
    }

    public function numRows($result){
        return mysqli_num_rows($result);
    }
    public function escapeData($data){
        $newData=[];
        foreach($data as $key => $value){
            $newData[$key] = mysqli_real_escape_string($this->connection, $value);
        }
        return $newData;
    }
    public function escapeStr($string){

        return mysqli_real_escape_string($this->connection, $string);
    }

    public function error(){
        die(mysqli_error($this->connection));
    }
}