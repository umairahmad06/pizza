<?php

// Start your session 
session_start();

// Initialize your variables
$username = "";
$email = ""; 
$errors = array(); // An empty array for any errors

include "config.php";


// Connect to a database
$db = mysqli_connect('localhost', 'root', '7262232', 'registration');


// Register Users

if (isset($_POST['reg_user'])) {
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    
    if (empty($first_name)) {array_push($errors, "First name is required.");}
    if (empty($last_name)) {array_push($errors, "Last name is required.");}
    if (empty($username)) {array_push($errors, "User name is required.");}
    if (empty($email)) {array_push($errors, "Email is required.");}
    if (empty($password_1)) {array_push($errors, "Password is required.");}
    if (empty($password_2)) {array_push($errors, "Password is required.");}
    if ($password_1 != $password_2) { array_push($errors, "Passwords dont match"); }


// first check the database to make sure a user does not already exist with the same username and/or email

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if($user) {
        if ($user['username']===$username) {
            array_push($errors, "User name already exists");
        }

        if ($user['email']===$email) {
            array_push($errors, "Email Address already exists");
        }
    }


// Finally register users

    if(count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO users (username, email, password, first_name, last_name)
            VALUES ('$username','$email','$password', '$first_name', '$last_name')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}


// Login Users
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);
    
    if (empty($username)) {
        array_push($errors, "Username/Email is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}





if (isset($_POST['message'])) {
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $feedback = mysqli_real_escape_string($db, $_POST['feedback']);

    // Form Validation Once again
    if (empty($email)) {array_push($errors, "Email is required"); }
    if (empty($feedback)) {array_push($errors, "Feedback is required");}


    if (count($errors) == 0) {
        $query = "INSERT INTO feedback (first_name, last_name, email, feedback) VALUES ('$first_name','$last_name', '$email', '$feedback')";
        $results = mysqli_query($db, $query);
        
    }
    }

?>