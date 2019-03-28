<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $category = mysqli_real_escape_string($db,$_POST['category']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($category)) { array_push($errors,"Category is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email,category, password) 
  			  VALUES('$username', '$email','$category','$password')";
  	mysqli_query($db, $query);
    $_SESSION['cat'] = $category;
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    mysqli_close($db);
  	header('location: index.php');
  }
}
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    echo "$username";
    echo "\n";
    $password = mysqli_real_escape_string($db, $_POST['password']);
    echo "$password";
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    /*if (count($errors) > 0)
    {
       foreach ($errors as $error){
        echo "$error";}
    }*/
    if (count($errors) == 0) {
        $password = $password;
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          $user = mysqli_fetch_assoc($results);
          if($user['category'] == 'admin')
              header('location: indexadmin.php');
          if($user['category'] == 'advertiser')
              header('location: indexadv.php');
          if($user['category'] == 'enduser')
              header('location: indexeu.php');

        }else {
             $query = "SELECT * FROM users WHERE username='$username' ";
             $results = mysqli_query($db,$query);
             if(mysqli_num_rows($results) == 0){
                 array_push($errors, "No such UserName Exists");
              }
              else{
                  array_push($errors,"Invalid Password!");
              }
        }
    }
  }
  ?>