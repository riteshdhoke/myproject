<?php
	if(empty($website_settings_data)){ ?>
		<a href="<?= base_url()?>Home/EditWebsite_settings">Add Website Settings</a>
	<?php }
?>
<table class="table">
		<thead>
			<tr>
				<th>Sr No.</th>
				<th>Website Name</th>
				<th>Website Logo</th>
				<th>Website Fevicon</th>
				<th>SMTP Host</th>
				<th>SMTP Port</th>
				<th>SMTP Username</th>
				<th>SMTP Password</th>
				<th>Contact Address</th>
				<th>Email</th>
				<th>Contact Number</th>		
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $sr=1;

			if(!empty($website_settings_data)) {
				 ?>
			<tr>

				<td><?= $sr++; ?></td>
				<td><?= $website_settings_data[0]['name'];?></td>
				<td><?= $website_settings_data[0]['logo']; ?></td>
				<td><?= $website_settings_data[0]['fevicon']; ?></td>
				<td><?= $website_settings_data[0]['smtp_host']; ?></td>
				<td><?= $website_settings_data[0]['smtp_port']; ?></td>
				<td><?= $website_settings_data[0]['smtp_username']; ?></td>
				<td><?= $website_settings_data[0]['smtp_password']; ?></td>
				<td><?= $website_settings_data[0]['contact_address']; ?></td>
				<td><?= $website_settings_data[0]['email']; ?></td>
				<td><?= $website_settings_data[0]['contact_number']; ?></td>
				<td><button class="edit_website_settings btn btn-info" data-id="<?= url_value_encode($website_settings_data[0]['id'])?>">Edit</button></td>
				
					
				<?php } else { ?>
					<td colspan="7">No Data Found</td>
				<?php } ?>

			</tr>
		</tbody>
</table>