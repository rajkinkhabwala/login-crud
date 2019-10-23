<?php
    session_start();
    require_once 'files/bootstrap.php';
    require 'files/inc/header.inc.php';

    if (!empty($_GET['login'])) {
        switch ($_GET['login']) {
        case 'check':
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if(Functions::select($email, $password) == TRUE){
                $_SESSION['loggeduser'] = $email;
                header('location:users.php');
            }else{
                header('location:index.php?login=error');
            }
            break;
        case 'error':
            require 'files/inc/error.inc.php';
            exit;
            break;
        }
      }
?>
        <div class="login">
            <h1>Login</h1>
            <div style ="display:none;" id="error" class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>

            </div>
			<form id="login" name ="login" action="index.php?login=check" method="post">
				<input id="email" type="email" name="email" placeholder="Email Address">
				<input id="password" type="password" name="password" placeholder="Password">
                <input type="submit" value="Login" name="login">
                <input type="button" value="Register" onclick="location.href= 'register.php'">
			</form>
        </div>
        <script src="assets/js/login.js" type="text/javascript"></script>
<?php
    require 'files/inc/footer.inc.php';
?>