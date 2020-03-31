<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign in</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signin-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signin-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signin-form h2:before, .signin-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signin-form h2:before{
		left: 0;
	}
	.signin-form h2:after{
		right: 0;
	}
    .signin-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signin-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signin-form .form-group{
		margin-bottom: 20px;
	}
	.signin-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signin-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signin-form .row div:first-child{
		padding-right: 10px;
	}
	.signin-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signin-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signin-form a:hover{
		text-decoration: none;
	}
	.signin-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signin-form form a:hover{
		text-decoration: underline;
	}  
</style>
</head>
<body>
<div class="signin-form">
	<form method="post" action="login.php">
	<?php include('errors.php'); ?>
	<h2>Sign in</h2>
	<div class="form-group">
        	<input type="username" class="form-control" name="username" placeholder="username" required="required" value="<?php echo $username; ?>">
    </div>
	<div class="form-group">
            <input type="password" class="form-control" name="password_1" placeholder="Password" required="required">
    </div>
	<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="login_user" >Sign in</button>
    </div>
    </form>
	<div class="text-center">Not yet a member? Sign up please!<a href="register.php">Sign up</a></div>
</div>
</body>
</html>