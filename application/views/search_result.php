<div class="well">
    <h2>Search result:</h2>
    <hr>
    
    <?php
        if(isset($req))
     {
        ?>
        <h3>Requests:</h3><br>
    <?php
        foreach ($req as $key ) {
            ?>
            <table class="table">
            <?php ?><tr><td>Source</td><td><?php echo $place_list[$key->src - 1]->name ?></td></tr><?php ?>
            <?php ?><tr><td>Destination</td><td><?php echo $place_list[$key->dest - 1]->name ?></td></tr><?php ?>
            <?php if($key->vtype!=""){ ?><tr><td>Vehicle Preference</td><td><?php echo $key->vtype ?></td></tr><?php ;} ?>
            <?php if($key->pickuptime!="") {?><tr><td>pickuptime </td><td> <?php echo $key->pickuptime ?></td></tr> <?php ;} ?>
            <?php if($key->droptime!=""){ ?><tr><td>droptime </td><td> <?php echo $key->droptime ?></td></tr><?php ;} ?>
            <?php if($key->pref!="") {?><tr><td>pref </td><td> <?php echo $key->pref ?></td></tr> <?php ;} ?>
            <?php if($key->comments!="") {?><tr><td>comments </td><td> <?php echo $key->comments?></td></tr> <?php ;} ?>
            <?php if($key->maxcost!="") {?><tr><td>maxcost </td><td> <?php echo $key->maxcost ?></td></tr><?php ;} ?> 
            <?php if($key->freq!="") {?><tr><td>freq </td><td> <?php echo $key->freq ?></td></tr> <?php ;} ?>
            <?php if($key->owner!="") {?><tr><td>owner </td><td> <?php echo $key->owner ?></td></tr><?php ;} ?>
            </table>
            <a class="btn" href="<?php echo  site_url('carpool/profile/'.$key->requesterId) ?>">Contact Informations</a>
            <hr>
            <?php
        }
    }
        ?>
         
           
        <?php
        if(isset($off))
    {
        ?>
         <h3>Offers :</h3> <br>
        <?php
        foreach ($off as $key ) {
            ?>
            <table class="table">
            <?php ?><tr><td>Source</td><td><?php echo $place_list[$key->src - 1]->name ?></td></tr><?php ?>
            <?php ?><tr><td>Destination</td><td><?php echo $place_list[$key->dest - 1]->name ?></td></tr><?php ?>
            <?php if($key->vtype!=""){ ?><tr><td>Vehicle Preference</td><td><?php echo $key->vtype ?></td></tr><?php ;} ?>
            <?php if($key->pickuptime!="") {?><tr><td>pickuptime </td><td> <?php echo $key->pickuptime ?></td></tr> <?php ;} ?>
            <?php if($key->droptime!=""){ ?><tr><td>droptime </td><td> <?php echo $key->droptime ?></td></tr><?php ;} ?>
            <?php if($key->gender_pref!="") {?><tr><td>gender_pref </td><td> <?php echo $key->gender_pref ?></td></tr> <?php ;} ?>
            <?php if($key->comments!="") {?><tr><td>comments </td><td> <?php echo $key->comments?></td></tr> <?php ;} ?>
            <?php if($key->maxcost!="") {?><tr><td>maxcost </td><td> <?php echo $key->maxcost ?></td></tr><?php ;} ?> 
            <?php if($key->freq!="") {?><tr><td>freq </td><td> <?php echo $key->freq ?></td></tr> <?php ;} ?>
            <?php if($key->owner!="") {?><tr><td>owner </td><td> <?php echo $key->owner ?></td></tr><?php ;} ?>
            </table>
            <a class="btn" href="<?php echo site_url('carpool/profile/'.$key->uId) ?>">contact informations</a>
            <hr>
            <?php
        }
    }
        ?>
</div>
