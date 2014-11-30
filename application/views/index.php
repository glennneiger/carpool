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

    <title>Index</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url();?>ss/menu.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/blueberry.css" rel="stylesheet">
	<script type="text/javascript">
   	 function enable(id) {
   	 	var e = document.getElementById(id);
        e.style.visibility = "visible";

    	}
	</script>
	<script type="text/javascript">
   	 function disable(id) {
   	 	var e = document.getElementById(id);
        e.style.visibility = "hidden";

    }
	</script>
	<script>
	function isValidDate(date)
	{
		;
    
	}
	</script>
    
    <script type="text/javascript">
<!--
    function hideMoreOptions(id) {
       var e = document.getElementById(id);
          e.style.visibility = "hidden";
          <?php if(isset($script)) echo $script; ?>
      
    }
//-->
</script>
    <script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.visibility == "hidden"){
          e.style.visibility = "visible";
       }
       else
       {
          e.style.visibility = "hidden";
          var a=document.getElementById("date");
          a.style.visibility = "hidden";
       }
    }
//-->
</script>

<script type="text/javascript">
    function validateOnTop()
    {
        var form=document.forms['topform'];
        var src = form['topsrc'].value;
        var dest = form['topdest'].value;
        var freq = form['topfreq'].value;
        var freqval = form['topfreqval'].value;
        
        if (topsrc==null || topsrc=="")
        {
          alert("Source must be filled!!");
          return false;
        }

        if (topdest==null || topdest=="")
        {
          alert("Destination must be filled!!");
          return false;
        }

        if(topfreq=="particular day" && (topfreqval ==null || topfreqval==""))
        {
            alert("Please enter date!!");
            return false;            
        }

        return true;        
    }
</script>

<!--All the validations-->
<?php $this->load->view($validate);?>

  </head>

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


  <body onload="hideMoreOptions('more_opts')">


    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style ="float :left; height:35px;background:url('<?php echo base_url();?>bg.png'); padding-right: 50px; padding-left:25px ">
      
        <h4 class="navbar-header" style = "margin : 14px">
        <?php
        $cookie_data = $this->input->cookie('cookie_data');
        $array = explode(' ', $cookie_data, 2);
        ?>
          <font color="white"><a href="<?php  echo site_url('carpool/profile/'.$array[0]) ?>" >
          <?php  
              
              echo $array[1];
          ?>
            </font></a>
        </h4>

        <div class="nav navbar-nav navbar-left">
            <li><a href="<?php echo site_url('carpool/load_update');?>"><font color="white" ><b>Update Profile</b></a></li>
            
          </div>
        

          

          <form name="topform" class="navbar-form navbar-right" method="post" action="<?php echo site_url('carpool/search');?>">
         
         	<select class="form-control" name="topsrc">
        <?php foreach ($place_list as $key ) {?>
          <option value="<?php echo $key->pId ;?>"><?php  echo $key->name ?></option>
       <?php } ?>
        </select>
	        <select class="form-control" name="topdest">
        <?php foreach ($place_list as $key ) {?>
          <option value="<?php echo $key->pId ;?>"><?php  echo $key->name ?></option>
       <?php } ?>
        </select>

        <div class="nav navbar-nav navbar-right" style="font-size:20px">
            <li><button class="btn"><font color="black">Search</a></li>
          </div>


 <a href="#" onclick="toggle_visibility('more_opts');">More Options<b class="caret"></b></a>
	<div id="more_opts" style="background:url('<?php echo base_url();?>bg.png'); padding-right: 0px; padding-left:50px; padding-top:20px; margin : 10px 0px  0px 181px ; width : 400px">

	 <h3 class="form-signin-heading"><font color="white">Frequency</font></h3>
          
                <input type="radio" name="topfreq" value="daily" checked="checked" onclick="disable('date')">Daily<br>
                <input type="radio" name="topfreq" value="particular day" onclick="enable('date')">Particular Day
        
                <input type="date" name="topfreqval" style="color:black" id="date" onchange="isValidDate('date')"><br><br>
            
	
	</div>
          </form>
       
      
    </div>
    <?php   ?>
    <div class="container-fluid" >
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="background:url('<?php echo base_url();?>bg.png')">
          <ul class="nav nav-sidebar">
            <li class="active"><a href = "<?php echo site_url('carpool/request');?>" class="btn btn-lg btn-primary btn-block" type="submit">Make a Request </a></li>
            <li><a href="<?php echo site_url('carpool/offer');?>" class="btn btn-lg btn-primary btn-block" type="submit">Make an Offer</a></li>
            <li><a href="<?php echo site_url('carpool/search_vehicle');?>" class="btn btn-lg btn-primary btn-block" type="submit">Search for a Vehicle</a></li>
            <li><a href="<?php echo site_url('carpool/search_requester');?>" class="btn btn-lg btn-primary btn-block" type="submit">Search for a Requester</a></li>
            <li><a href="<?php echo site_url('carpool/register_own_vehicle');?>" class="btn btn-lg btn-primary btn-block" type="submit">Register my Own Vehicle</a></li>
            <li><a href="<?php echo site_url('carpool/register_hire_vehicle');?>" class="btn btn-lg btn-primary btn-block" type="submit">Register Agency</a></li>
            <li>
              <a href="<?php echo site_url('carpool/create_driver_form');?>" class="btn btn-lg btn-primary btn-block" type="submit">Become Driver</a>
            </li>
           
            <li><a href="<?php echo site_url('carpool/logout');?>" class="btn btn-lg btn-primary btn-block" type="submit">Logout</a></li>
            
          </ul>

        </div>
        <div class="container" >
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 container" style="padding-left: 301px; margin:125px 0px 0px 180px">
              
<!-- PASTE THE TEXT FILES HERE !!! -->

      <?php  
          $cookie_data = $this->input->cookie('cookie_data');
          $array = explode(' ', $cookie_data, 2);
          $uid = $array[0];
          //echo "uid is ".$uid;
      ?>

      <?php $this->load->view($show);?>

          </div>                   
        </div>
      </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/docs.min.js"></script>
  </body>
</html>
