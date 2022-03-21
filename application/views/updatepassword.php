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
      <div class="panel-heading">Reset your password?</div>
      <div class="panel-body">
<form action="Users/fupdatepassword" method="post" id="ForgotForm">
<?php  
$this->load->helper(array('form', 'url'));
if($error=$this->session->flashdata('otp_success')):  ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-success">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- on success -->
     <?php  if($error=$this->session->flashdata('update_failed')):  ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-danger">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

    <script  type="text/javascript">
            function myFunction() {
             var x = document.getElementById("myInput");
             if (x.type === "password") {
             x.type = "text";
             } else {
              x.type = "password";
             }
             }
         </script>
<div class="row">
    <div class="col-sm-6 p-1 text-warning">
        <p style="font-size: larger;">Update Password</p>
        <hr/>
            
            <lable>OTP</lable>
            <input class="form-control" type="text" name="otp" value="<?php echo set_value('otp'); ?>" placeholder="Enter OTP" size="50" required/>
            <div class="text-danger"><?php echo form_error('otp'); ?></div>
            
            <lable>New Password</lable>
            <input class="form-control" type="password" id="myInput" name="Password" value="<?php echo set_value('Password'); ?>" placeholder="Enter Password" size="50" required/>
            <div class="text-danger"><?php echo form_error('Password') ?></div>
            
            <lable>Password Confirm</lable>
            <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="Re-Enter Password" size="50" required/>
            <div class="text-danger"><?php echo form_error('passconf'); ?></div>
            <input type="checkbox" onclick="myFunction()"> Show Password
            <div class="col-md-offset-2 col-md-10 p-2">
                <input class="btn btn-danger btn-sm" type="submit" value="Update" />
                <input class="btn btn-warning btn-sm" type="reset" value="Reset" />
            </div>
    </div>
</div>
</form>
</div>
</div>
</div>
    <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../custom/js/login.js"></script>


</body>
</html>