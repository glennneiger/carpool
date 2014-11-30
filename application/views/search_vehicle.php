      <form class="form-signin" name = "search_vehicle" role="form" method="post" onsubmit = "return validateSearchVehicleForm();"
        action="<?php echo site_url("carpool/search_vehicle_query")?>"        
        role="form" style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Car Pool search</font></h2>

        <select class="form-control" name="src">
        <?php foreach ($place_list as $key ) {?>
          <option value="<?php echo $key->pId ;?>"><?php  echo $key->name ?></option>
       <?php } ?>
        </select>

        <select class="form-control" name="dest">
        <?php foreach ($place_list as $key ) {?>
          <option value="<?php echo $key->pId ;?>"><?php  echo $key->name ?></option>
       <?php } ?>
        </select>

        <h3 class="form-signin-heading"><font color="white">Frequency</font></h3>
          
                <input type="radio" name="freq" checked="checked" value="daily">Daily<br>
                <input type="radio" name="freq" value="particular day">Particular Day
                <input type="date" name="freqval" style="color:black"><br><br>


               
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Search</button>
      </form>

