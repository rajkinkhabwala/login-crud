<?php
session_start();
require_once 'Database.class.php';
require_once 'Session.class.php';

class Functions extends Database{


    public static function select($email, $password){
        $init = new Database;
        // Checking whether the is any connection error
        if($init->db->connect_error == TRUE){
            echo 'Connection Error : ' . $init->db->connect_error;
        }else{
        // Sql query for Selecting the Data from the Database and agree 
        $sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password'";

        $result = $init->db->query($sql);
        while($row = $result->fetch_assoc()){
            if($row['id'] == 0){
                if($init->db->error == TRUE){
                    echo 'Error : ' . $sql . $init->db->error;
                }
            }else{
                return TRUE;
            }
        }
    }
    
    }

    public static function insert($email, $name, $password, $gender, $country, $file){
        $init = new Database;

        if($init->db->connect_error == TRUE){
            echo 'Connection Error : ' . $init->db->connect_error;
        }

        $sql = "INSERT INTO users (name, email, password, country, gender, image_path) 
        VALUES ('$name', '$email', '$password', '$country', '$gender', '$file' )";

        $init->db->query($sql);
        
        if($init->db->error == TRUE){
            echo 'Error : ' . $sql . $init->db->error;
        }
    }

    public static function select_loggedusers(){
        $init = new Database;
        $user_check = $_SESSION['loggeduser'];

        $sql = "SELECT name, email, password, mobile, country, gender FROM users WHERE email = '$user_check'";

        $result = $init->db->query($sql);
        while($row = $result->fetch_assoc()){
        }

    }

}
?>