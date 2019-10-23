<?php
require_once 'files/bootstrap.php';
session_start();
if (!empty($_GET['users'])) {
    switch ($_GET['users']) {
    case 'update':
        if(isset($_SESSION['loggeduser'])){
            $updated_name = $_POST['name'];
            $updated_email = $_POST['email'];
            $updated_password = md5($_POST['password']);
            $updated_mobile = $_POST['mobile'];
            $updated_gender = $_POST['gender'];
            $updated_country = $_POST['country'];
            $init = new Database;
            $user_check = $_SESSION['loggeduser'];
            $sql = "SELECT id FROM users WHERE email = '$user_check'";
            $result = $init->db->query($sql);
            while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $user_country = $row['country'];
            $gender = $row['gender'];
            $mobile = $row['mobile'];
            }
        if($updated_name != $name){
            $sql = "UPDATE users SET name ='$updated_name' WHERE id=$id";
            $init->db->query($sql);
        }if($updated_email != $email){
            $sql = "UPDATE users SET email ='$updated_email' WHERE id=$id";
            $init->db->query($sql);
        }if($updated_password != $password){
            $sql = "UPDATE users SET password ='$updated_password' WHERE id=$id";
            $init->db->query($sql);
        }if($updated_mobile != $mobile){
            $sql = "UPDATE users SET mobile ='$updated_mobile' WHERE id=$id";
            $init->db->query($sql);
        }if($updated_gender != $gender){
            $sql = "UPDATE users SET gender ='$updated_gender' WHERE id=$id";
            $init->db->query($sql);
        }if($updated_country != $user_country){
            $sql = "UPDATE users SET country ='$updated_country' WHERE id=$id";
            $init->db->query($sql);
        }
        header('location:users.php?users=updated');
        }
        break;
    case 'updated':
        echo 'You have Successfully updated the Data!!';
        session_destroy();
        header( "refresh:1;url=index.php" );
        exit;
        break;
    case 'error':
        require 'files/inc/errorusers.inc.php';
        exit;
        break;
    case 'delete':
    if(isset($_SESSION['loggeduser'])){
        $user_check = $_SESSION['loggeduser'];
        $init = new Database;
        $sql = "SELECT id FROM users WHERE email = '$user_check'";
            $result = $init->db->query($sql);
            while($row = $result->fetch_assoc()){
            $id = $row['id'];
            }
        $sql = "DELETE FROM users WHERE id=$id";
        $result = $init->db->query($sql);
        header('users.php?users=deleted');
    }
    case 'deleted':
        echo 'Users is deleted';
        session_destroy();
        header( "refresh:2;url=index.php" );
        exit;
        break;
    }
  }

    if(isset($_SESSION['loggeduser'])){
        $init = new Database;
        $user_check = $_SESSION['loggeduser'];

        $sql = "SELECT name, email, password, mobile, country, gender FROM users WHERE email = '$user_check'";

        $result = $init->db->query($sql);
        while($row = $result->fetch_assoc()){
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $user_country = $row['country'];
            $gender = $row['gender'];
            $mobile = $row['mobile'];
        }
        require 'files/inc/header.inc.php';
        require 'files/inc/users.inc.php';
        require 'files/inc/footer.inc.php';
    }else{
        echo 'You are not allowed Directly Here! First Login <br>';
        echo '<br>Redirecting to the login page in 2 seconds';
        header( "refresh:2;url=index.php" );

    }

?>