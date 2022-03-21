<!DOCTYPE html>
<html>
<head>
    <title>Register & Login Tutorial</title>

    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../custom/css/style.css">

</head>
<body>

<div class="col-md-4 col-md-offset-4 col-vertical-4">
    <div class="panel panel-default">
      <div class="panel-heading">Forgot your password?</div>
      <div class="panel-body">
        <div id="messages"></div>
       <form action="forgot" method="post" id="ForgotForm">
<!-- on success -->
<?php  if($error=$this->session->flashdata('otp_failed')):  ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-danger">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

              <div class="form-group">
                <label for="username">Enter Your Registered Email ID to ResetPassword</label>
               <input type="email" name="email" placeholder="Email ID" class="form-control" required />
              </div>
                            
              <button type="submit" class="btn btn-default">Get OTP</button>
            </form>
      </div>
      <div class="panel-footer">
       <a href=" register">Sign Up</a>
      </div>
    </div>
</div>

    <script type="text/javascript" src="../../assets/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../custom/js/login.js"></script>


</body>
</html>