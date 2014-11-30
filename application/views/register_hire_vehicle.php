<form class="form-signin" name = "agency" role="form" method="post" onsubmit = "return validateCreateAgencyForm();" 
        action="<?php echo site_url("carpool/create_agency")?>" 
        style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Register Agency</font></h2>

        <h3 class="form-signin-heading"><font color="white">Travel Agency Details</font></h3>

        <input type="text" class="form-control" placeholder="Name" required autofocus name="name">

        <input type="text" class="form-control" placeholder="Address" required autofocus name="addr">

        <input class="form-control" type="number" min="2" max="10" placeholder="Number of drivers" required autofocus name="driver_count">
        <br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Submit</button>
      </form>

