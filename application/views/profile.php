<div class="well">
<h3>User Information</h3>
	<table class="table">
		<tr>
		<td> Name </td>
		<td> <?php echo $user[0]->name ?> </td>
		</tr>
		<tr>
		<td> Age </td>
		<td> <?php echo $user[0]->age ?> </td>
		</tr>
		<tr>
		<td> Sex </td>
		<td> <?php echo $user[0]->sex ?> </td>
		</tr>
		<tr>
		<td> Mobile Number </td>
		<td> <?php echo $user[0]->mob ?> </td>
		</tr>
		<tr>
		<td> Address </td>
		<td> <?php echo $user[0]->addr ?> </td>
		</tr>
		<tr>
		<td> Email </td>
		<td> <?php echo $user[0]->email ?> </td>
		</tr>
	</table>
<?php if(isset($driver)){ ?>
<h3>Driver Information</h3>
	<table class="table">
		<tr>
		<td> Skill </td>
		<td> <?php echo $driver[0]->skill ?> </td>
		</tr>
		<tr>
		<td> Experience </td>
		<td> <?php echo $driver[0]->experience ?> </td>
		</tr>
		<tr>
		<td> License Number </td>
		<td> <?php echo $driver[0]->licence_num ?> </td>
		</tr>
		<tr>
		<td> Date of License </td>
		<td> <?php echo $driver[0]->date_of_licence ?> </td>
		</tr>
	</table>
<?php } ?>
<?php if(isset($agency)){ ?>
<h3>Agency Information</h3>
	<table class="table">
		<tr>
		<td> Name </td>
		<td> <?php echo $agency[0]->name ?> </td>
		</tr>
		<tr>
		<td> Number of Drivers </td>
		<td> <?php echo $agency[0]->driver_count ?> </td>
		</tr>
		<tr>
		<td> Address </td>
		<td> <?php echo $agency[0]->addr ?> </td>
		</tr>
	</table>
<?php } ?>
</div>