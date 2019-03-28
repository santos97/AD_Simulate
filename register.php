<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" placeholder="Your Name" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" placeholder="Your Email" name="email" value="<?php echo $email; ?>">
  	</div>
      
    <div class="input-group">
        <label>User Type</label>
          <select name="user_type" style="width: 206px; height: 30px; background: #5F9EA0">
            <option value=0>End user</option>
            <option value=1>Advertiser</option>
            <option value=2>Administrator</option>
          </select>
    </div>
      
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" placeholder="Password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" placeholder="Confirm Password" name="password_2">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>