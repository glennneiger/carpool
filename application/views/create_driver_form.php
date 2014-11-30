<form class="form-signin" name = "request" role="form" method="post" onsubmit = "" 
        action="<?php echo site_url("carpool/create_driver")?>" 
        style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Enter your details</font></h2>
        <input name="skill" class="form-control" placeholder="Skill" required autofocus>
        <input name="experience" class="form-control" placeholder="Experience" required autofocus>
        <input name="working_start" class="form-control" placeholder="Start Time" required autofocus>
        <input name="working_end" class="form-control" placeholder="End Time" required autofocus>
        
        <h3 class="form-signin-heading"><font color="black">Frequency</font></h3>
          
          <input type="radio" name="freq" checked ="checked" value="daily">Daily<br>
          <input type="radio" name="freq" value="particular day">Particular Day
          <input type="date" name="freqval"><br>


        <input name="licence_num" class="form-control" placeholder="License Number" required autofocus>
        <input name="date_of_licence" class="form-control" placeholder="Date of License" required autofocus>
        <select class="form-control" name="aid">
        <?php foreach ($agency_list as $key ) {?>
          <option value="<?php echo $key->aid ;?>"><?php  echo $key->name ?></option>
       <?php } ?>
        </select>
        <input type="hidden" name="uid" value="<?php echo $uid; ?>" >
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">Create Driver</button>
      </form>

