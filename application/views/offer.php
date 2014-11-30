 <form class="form-signin" name = "offer" role="form" method="post" onsubmit = "return validateCreateOfferForm();"
        action="<?php echo site_url("carpool/create_offer")?>"
        style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Please Fill in the Details</font></h2>

        <input class="form-control" type="number" name="maxcost" min="2" max="10" placeholder="Sharing Cost/km (Rs/km)" required autofocus>
        
        <input class="form-control" type="number" name="maxPassenger" min="1" max="6" placeholder="Number of Allowable co-passengers" required autofocus>

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
        
        
        <h3 class="form-signin-heading"><font color="white">Gender Preference</font></h3>
          
                <input type="radio" name="gender_pref" checked="checked" value="male">Male<br>
                <input type="radio" name="gender_pref" value="female">Female<br>

               <h3 class="form-signin-heading"><font color="white">Age Preference(in years)</font></h3>
          
                <input type="radio" name="age_pref" checked="checked" value="20-30">20-30<br>
                <input type="radio" name="age_pref" value="30-40">30-40<br>
                <input type="radio" name="age_pref" value="40-50">40-50<br>
                <input type="radio" name="age_pref" value="50-60">50-60<br>

                <br>

                <textarea name="comments" cols="35" rows="5" class="form-control" placeholder="Please Enter Your Comments here..." required autofocus>
                </textarea><br>

           
                
          
      
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Submit</button>
      </form>



