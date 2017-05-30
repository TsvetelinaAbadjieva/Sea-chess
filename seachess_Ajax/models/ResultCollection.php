<?php


class ResultCollection
{
    private $entity='ResultEntity';
    private $table='game.game_results';
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();

    }

    public function getNumRows($username){

        $numRows=0;
        $query="SELECT game_results.result FROM game.game_results
                JOIN game.users 
                ON users.id=game_results.user_id
                WHERE users.username='{$username}'";

        $result=$this->db->query( $query);
        if($result)
            $numRows=$this->db->numRows($result);
        return $numRows;
    }
    public function getResults($offset,$per_page,$username){

        $data=[];
        if($offset==null || $per_page==null){
            $expression='';
        }
        else{
            $page=$this->db->escapeStr($offset);
            $expression="LIMIT $offset, $per_page";
        }
       // $offset = ($page-1)*$per_page;


        $query="SELECT game_results.id, game_results.result FROM game.game_results
                JOIN game.users 
                ON users.id = game_results.user_id
                WHERE users.username='{$username}' {$expression}";

        $result=$this->db->query($query);
        if($this->db->numRows($result)>0)
            while($row =$this->db->getResultArray($result)){

           // $result= new $this->entity($row['result']);
           // $result->init($row);
           // $data[]=$result;
            $data[]=$row;
            //$data['number']=$row['id'];
        }

            return $data;

        
    }

    public function insert($entity,$username){
        $gameResult=$entity->getResult();
        $data['result']=$this->db->escapeStr($gameResult);

        $query="INSERT INTO game.game_results 
                SET game_results.result= '{$gameResult}',
                game_results.user_id  = 
                (SELECT users.id FROM game.users WHERE users.username='{$username}')";

        $result=$this->db->query($query);
        if($this->db->affectedRows()>0)
            return true;
        return false;
    }
}