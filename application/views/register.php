<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">

</head>
<body>

<div class="col-md-4 col-md-offset-4 col-vertical-4">
	<div class="panel panel-default">
	  <div class="panel-heading">Register</div>
	  <div class="panel-body">
	  	<div id="messages"></div>
	    <form action="users/register" method="post" id="registerForm">
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			  </div>			  
			  <div class="form-group">
			    <label for="passwordAgain">Password Again</label>
			    <input type="password" class="form-control" id="passwordAgain" name="passwordAgain" placeholder="Password Again">
			  </div>			  
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="text" class="form-control" id="email" name="email" placeholder="">
			  </div>			  
			  <div class="form-group">
			    <label for="contact">Mobile</label>
			    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="">
			  </div>			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
	  </div>
	  <div class="panel-footer">
	  	Have Account <a href="index">Login</a>
	  </div>
	</div>
</div>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>

	<script type="text/javascript" src="../custom/js/register.js"></script>


</body>
</html>