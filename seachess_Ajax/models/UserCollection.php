<?php


class UserCollection
{
    private $entity='UserEntity';
    private $table='users';
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();

    }

    public function checkUserCredentials($user){

        $data=[
            'username'=>$user->getUsername(),
            'password'=>$user->getPassword(),
        ];
        $data=$this->db->escapeData($data);

        $query="SELECT * FROM game.users WHERE users.username ='{$data['username']}'";
        $result= $this->db->query($query);
        if($this->db->affectedRows()>0) {
            $dbUser = $this->db->getResultArray($result);
                if ($data['username']!= $dbUser['username']
                || sha1($data['password'])!=$dbUser['password'])
                    return false;
                else return true;
        } return false;

    }
    public function checkExistingUser($user){
        $data['username']= $user->getUsername();
        $data=$this->db->escapeData($data);
        $username=$data['username'];
        $query="SELECT users.username FROM game.users WHERE users.username='{$username}'";
        $result= $this->db->query($query);

        if($this->db->affectedRows()>0)
            return true;
        return false;

    }
    public function checkExistingEmail($user){
        $data['email']= $user->getEmail();
        $data=$this->db->escapeData($data);
        $email=$data['email'];
        $query="SELECT users.username FROM game.users WHERE users.email='{$email}'";
        $result= $this->db->query($query);

        if($this->db->affectedRows()>0)
            return true;
        return false;
    }

    public function insert($user){
        $data=[
            'username'  =>$user->getUsername(),
            'password'  =>$user->getPassword(),
            'email'     =>$user->getEmail()
        ];
        $password=sha1($data['password']);
        $data=$this->db->escapeData($data);
        $query="INSERT INTO  game.users 
                SET  users.username='{$data['username']}',
                     users.password= '{$password}',
                     users.email='{$data['email']}' ";
        $result= $this->db->query($query);
        if($this->db->affectedRows()>0)
            return true;
        return false;

    }
}