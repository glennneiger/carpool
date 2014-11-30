<form class="form-signin" name = "request" role="form" method="post" onsubmit = "return validateCreateRequestForm();" 
        action="<?php echo site_url("carpool/create_request")?>" 
        style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Request for Finding a Shared Vehicle</font></h2>

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

        <input type="time" class="form-control" name="pickuptime" 
        placeholder="Journey Start Time" required autofocus>

        <input type="time" class="form-control" name="droptime" 
        placeholder="Probable time of Reaching" required autofocus>       
        

        <h3 class="form-signin-heading"><font color="white">Frequency</font></h3>
          
                <input name = "freq" type="radio" name="frequency" checked ="checked" value="daily">Daily<br>
                <input name = "freq"  type="radio" value="particular day">Particular Day
                <input name = "freqval" type="date" name="frequency" style="color:black"><br>


        
        <select class="form-control" name="pref">
        <option value="" disabled="disabled" selected="selected">Vehicle Preference</option>
        <option value="Owner">Owner</option>
        <option value="Hire">Hire</option>
        </select>

        <select class="form-control" name="vtype">
        <option value="" disabled="disabled" selected="selected">Vehicle Type</option>
        <option value="Medium/Family Car">Medium/Family Car</option>
        <option value="Sedan">Sedan</option>
        <option value="SUV">SUV</option>
        </select>


        <input class="form-control" type="number" name="maxcost" min="2" max="10" placeholder="Maximum Bearable Cost (Rs/km)" required autofocus><br>

               
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Submit</button>
      </form>
