<?php $content = file_get_contents('assets/json/countries.json');
    $countries = json_decode($content, true); 
?>
<div class="register">
            <h1>Welcome <?php echo $name; ?></h1>
            <div style ="display:none;" id="error" class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>

            </div>
			<form id="users" action="users.php?users=update" method="post" enctype="multipart/form-data">
                <input id="name" type="text" name="name" placeholder="Full Name" value="<?php echo $name; ?>">
				<input id="email" type="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
                <input id="password" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                <input id="mobile" type="text" name="mobile" placeholder="Mobile Number" value="<?php echo $mobile; ?>">
                <p class="title">Gender :</p>
                <p>Male: </p><input id="gender" type="radio" name="gender" value="male" <?php echo ($gender =='male')?'checked':'' ?>>
                <p>Female: </p><input id="gender1" type="radio" name="gender" value="female"<?php echo ($gender =='female')?'checked':'' ?>>
                <p>Others: </p><input id="gender2" type="radio" name="gender" value="others"<?php echo ($gender =='others')?'checked':'' ?>>
                <select id="country" name="country">
                <option value="">Select Country</option>
                <?php foreach($countries as $country){ ?>
                    <option value="<?php echo $country['name'] ?>" <?php if($country['name'] == $user_country) echo 'selected="selected"'; ?>> <?php echo $country['name']; ?> (<?php echo $country['code']; ?>) </option>
                <?php } ?>
                </select>
                <input id="image" type="file" name="image">
                <input type="submit" name="update" value="Update Details">
                <input type="button" value="Delete User" onclick="location.href= 'users.php?users=delete'">
			</form>
        </div>