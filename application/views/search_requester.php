      <form class="form-signin" name = "search_requester" role="form" method="post" onsubmit = "return validateSearchRequesterForm();"
      	action="<?php echo site_url("carpool/search_requester_query")?>"
      	role="form" style="width: 423px;background:url('<?php echo base_url();?>bg.png'); padding:15px 15px 15px 15px">
        <h2 class="form-signin-heading"><font color="white">Search a Requester</font></h2>

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

        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit" >Search</button>
      </form>

