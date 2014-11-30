<form name="update" class="form-signin" role="form" 
        onsubmit="return validateUpdateForm()" method = "post" action="<?php echo site_url("carpool/update")?>"
        style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Edit Details</font></h2>
        <input name="name" class="form-control"  value="<?php echo $user[0]->name ?>" required autofocus>
        <input name="addr" class="form-control" value="<?php echo $user[0]->addr ?>" required autofocus>
        <div style="margin-top:10px;margin-bottom:10px;">
          <font color="white" size="4">Gender : </font>
          <input name = "sex" type="radio" value="male" checked><font color="white">Male</font>
          <input name="sex" type="radio" value="female"><font color="white">Female<br></font>
        </div>

        <input name="age" type="number" class="form-control" value="<?php echo $user[0]->age ?>" required autofocus >
        <input name="email" type="email" class="form-control" value="<?php echo $user[0]->email ?>" required autofocus>
        <input name="mob" type="tel" class="form-control" value="<?php echo $user[0]->mob ?>" required autofocus name="phone">
        <input name="password" type="password" class="form-control" placeholder="Password" style="margin-top:0px;margin-bottom:0px;" required>
        <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" style="margin-top:0px;margin-bottom:0px;" required>
        <input name="username" class="form-control" value="<?php echo $user[0]->username ?>" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">Confirm</button>
</form>