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

    <title>Homepage</title>

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

     <div style ="margin: 00px 50px 0px 50px ">
        <div class="container" style ="float :left; margin: 00px 00px 0px 000px  ; width:700px;height:410px;background:url('<?php echo base_url();?>bg.png'); padding-right: 50px; padding-left:50px ">

      
        <img src="<?php echo base_url('logo.png')?>"><br>
        <div style="padding:15px;color:#444455;" class="well"> 
        <p><b>With the continuous increase of private vehicles in the urban and suburban area, the ill effects of
vehicle externalities on the environment such as pollution levels, parking problem traffic congestion,
and accidents are increasing in every year. An effective way to decrease this problem is carpooling
strategy. According to this strategy, people who use same route to reach their work places, or who
want share their car journeys. In addition, carpooling is significantly correlated with transport
operating costs, including fuel prices</b></p>
        </p>
        </div>
         
       
        </div>


    <div class="container" style ="float :right; margin: 00px 0px 00px 0px  ; width:400px;height:235px;">
    <div style="background:url('<?php echo base_url();?>bg.png');">
      <form class="form-signin" role="form">
        <h2 class="form-signin-heading"><font color="white">Welcome to CarPool</font></h2>

        <!--div><p>The place where people share their vehicles and also get vehicles on hire in return.
        Get the minimum sharing cost at your fingertips !! </p></div-->

         
        <!--h3 class="form-signin-heading"><font color="white">Are you a new User ?</font></h3-->
        
        <a href = "<?php echo site_url('carpool/load_user_register');?>"  class="btn btn-lg btn-primary btn-block" type="submit" >
        Register
        </a>

         <!--h3 class="form-signin-heading"><font color="white">Registered Users : </font></h3-->

         <a href = "<?php echo site_url('carpool/load_login');?>"  class="btn btn-lg btn-primary btn-block" type="submit" >
        Login
        </a>

      </form>
      </div>
      <div style="padding:20px;padding-left:0px;margin-left:-166px;">
      <img src="<?php echo base_url('car.png') ?>" style="width:400px;height=300px;">
      </div>
    </div>

    </div> <!-- /container -->
    <!--<iframe src="Some Facebook URL" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:px">


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
