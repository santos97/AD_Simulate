<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>End User Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Profile Setup</h2>
  </div>
	
  <form method="post" action="register-user.php">
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
    <label>Gender</label>
    </div>
  	  <select name="gender" style="width: 206px; height: 30px; background: #5F9EA0">
            <option value='male'>Male</option>
            <option value='female'>Female</option>
            <option value='other'>Other</option>
          </select><div class="input-group">
  	  	<label>Date of Birth</label>
  	 <input type="date" name="dob">
  	</div>
  	<div class="input-group">
        <label>State</label>
        <input type="state" placeholder="Valid State in India" name="state">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="register_user">Update Profile</button>
  	</div>
  </form>
</body>
</html>