<!DOCTYPE html>
<?php $this->load->helper("url"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>User Registration</title>

    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>css/signin.css" rel="stylesheet">
    <script>
    function validateForm()
    {
      var password = document.forms["myForm"]["password"].value;
      var confirm_password = document.forms["myForm"]["confirm_password"].value;

      if(password != confirm_password)
      {
         alert("ERROR : Passwords do not match.") ;
         return false;
      }
      var x = document.forms["myForm"]["phone"].value;
      console.log(x.length);
      if(x.length!=10){
         alert("ERROR : Please enter a 10 digit number.") ;
         return false;
      }
  }
    
</script>
    <script>
    function startup(){
      <?php if(isset($script)) echo $script; ?>
    }
    </script>
  </head>

  
<body onload="startup()">

  <style> 
body
{
background:url("<?php echo base_url();?>carpool.png");
background-size:100% 100%;
background-repeat:no-repeat;
padding-top:40px;
min-height: 700px
}
</style>

     

    <div class="container" style ="float :left; margin: 00px 500px ; width:400px;height:600px;background:url('<?php echo base_url();?>bg.png'); padding-right: 50px; padding-left:50px ">

      <form name="myForm" class="form-signin" role="form" onsubmit="return validateForm()" method = "post" action="<?php echo site_url("carpool/user_register")?>">
        <h2 class="form-signin-heading"><font color="white">Please Register</font></h2>
        <input name="name" class="form-control" placeholder="Name" required autofocus>
        <input name="addr" class="form-control" placeholder="Address" required autofocus>
        <div style="margin-top:10px;margin-bottom:10px;">
          <font color="white" size="4">Gender : </font>
          <input name = "sex" type="radio" value="male" checked><font color="white">Male</font>
          <input name="sex" type="radio" value="female"><font color="white">Female<br></font>
        </div>

        <input name="age" type="number" class="form-control" placeholder="Age" required autofocus >
        <input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
        <input name="mob" type="tel" class="form-control" placeholder="Phone number" required autofocus name="phone">
        <input name="password" type="password" class="form-control" placeholder="Password" style="margin-top:0px;margin-bottom:0px;" required>
        <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" style="margin-top:0px;margin-bottom:0px;" required>
        <input name="username" class="form-control" placeholder="Username" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">Sign in</button>
      </form>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
