    <form name="register_own_vehicle" class="form-signin" role="form" method="post" onsubmit = "return validateRegisterOwnVehicleForm();"
        action="<?php echo site_url("carpool/create_vehicle")?>"
        style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Registration of own Vehicle Information</font></h2>

        <h3 class="form-signin-heading"><font color="white">Vehicle Details</font></h3>

        <select class="form-control" name="vtype" required>
        <option value="" disabled="disabled" selected="selected">Type</option>
        <option value="Medium/Family Car">Medium/Family Car</option>
        <option value="Sedan">Sedan</option>
        <option value="SUV">SUV</option>
        </select>

        <input name="make" type="text" class="form-control" placeholder="Make" required autofocus>

        <input name="model" type="text" class="form-control" placeholder="Model" required autofocus>
        
        <input name="year_of_purchase" type="text" class="form-control" placeholder="Year of Purchase" required autofocus>

        <select class="form-control" name="dtype" required>
        <option value="" disabled="disabled" selected="selected">Driver Type</option>
        <option value="Self">Self</option>
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>
        </select>

        <input name="maxPassenger" type="number" class="form-control" min="2" max="7" placeholder="Sitting capacity" required autofocus>

        <input name="cost" type="number" class="form-control" min="0" max="40" placeholder="Cost" required autofocus>

        <h3 class="form-signin-heading"><font color="white">Driver Details</font></h3>

        <input name="name" type="text" class="form-control" placeholder="Owner/Driver Name" required autofocus>

        <input name="license_num" type="text" class="form-control" placeholder="Licence No." required autofocus>

        <h5 class="form-signin-heading"><font color="white">Licence Date :</font></h5> 
        <input name="date_of_license" type="date" name="licence date style="color:black"><br><br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</form>
