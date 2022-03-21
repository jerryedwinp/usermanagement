<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>

	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      
      <ul class="nav navbar-nav navbar-right">        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile">Profile</a></li>
            <li><a href="setting">Setting</a></li>
            <li><a href="users/logout">Logout</a></li>            
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Profile Data</div>      

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Username</th>
            <th><?php echo $userData['username']  ?></th>
          </tr>
          <tr>
            <th>Full Name</th>
            <th><?php echo $userData['name']  ?></th>
          </tr>
          <tr>
            <th>Contact</th>
            <th><?php echo $userData['contact']  ?></th>
          </tr>
        </thead>
      </table>
    </div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>

</body>
</html>