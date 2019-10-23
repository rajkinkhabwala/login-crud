<div class="login">
            <h1>Login</h1>
            <div id="error" class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                You have entered Wrong Email and password. Please Check!
            </div>
			<form id="login" name ="login" action="index.php?login=check" method="post">
				<input id="email" type="email" name="email" placeholder="Email Address">
				<input id="password" type="password" name="password" placeholder="Password">
                <input type="submit" value="Login" name="login">
                <input type="button" value="Register" onclick="location.href= 'register.php'">
			</form>
        </div>
        <script src="assets/js/login.js" type="text/javascript"></script>