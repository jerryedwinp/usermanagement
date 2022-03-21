<!DOCTYPE html>
<html>
<head>
	<title>Register & Login Tutorial</title>

	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">

</head>
<body>

<div class="col-md-4 col-md-offset-4 col-vertical-4">
	<div class="panel panel-default">
	  <div class="panel-heading">Login</div>
	  <div class="panel-body">
	  	<div id="messages"></div>
	    <form action="users/login" method="post" id="loginForm">
			  <div class="form-group">
			    <label for="username">Email/Mobile</label>
			    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			  </div>			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
	  </div>
	  <div class="panel-footer">
	  	No Account!!! <a href="register">Sign Up</a>|<a href="forgot">Forgot Password</a>
	  </div>
	</div>
</div>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../custom/js/login.js"></script>


</body>
</html>