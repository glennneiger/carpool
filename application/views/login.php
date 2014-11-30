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

    <title>Login</title>

    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>css/signin.css" rel="stylesheet">

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

     

    <div class="container"   style ="float :center; width:615px;height:280px;background:url('<?php echo base_url();?>bg.png'); padding-right: 50px; padding-left:50px ">

      <form class="form-signin" role="form" method = "post" action="<?php echo site_url("carpool/login")?>">
        <h2 class="form-signin-heading"><font color="white">Login</font></h2>

       
        <input name = "username" type="text" class="form-control" placeholder="Username" required autofocus>
        
        <input name = "password" type="password" class="form-control" placeholder="Password" required autofocus>

        <br>     
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Login</button>
      </form>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
