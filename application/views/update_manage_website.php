
	<?php 
		if(count($website_settings_data) == 0){ ?>

			<form action="<?= base_url()?>Home/Update_website_settings" id="website_settings_form" method="post" enctype="multipart/form-data">
			website name:<input type="text" name="name" placeholder="Website name" value=""></br>
			website logo:<input type="file" name="logo" id="website_logo"></br>
				<img id="prev_website_logo_upload"/><br>
			website fevicon:<input type="file" name="fevicon" id="website_fevicon"></br>
			<img id="prev_website_fevicon_upload"/><br>
			SMTP Host:<input type="text" name="smtp_host"></br>
			SMTP Port:<input type="text" name="smtp_port"></br>
			SMTP Username:<input type="text" name="smtp_username"></br>
			Contact Address:<input type="text" name="contact_address"></br>
			Email:<input type="text" name="email"></br>
			Contact Number:<input type="text" name="contact_number"></br>
			<input type="submit" value="Submit">

			</form>
	<?php	}else{ ?>

			<form action="<?= base_url()?>Home/Update_website_settings" id="update_website_settings_form" method="post" enctype="multipart/form-data">
			website name:<input type="text" name="name" placeholder="Website name" value="<?= $website_settings_data[0]['name']?>"/></br>
			website logo:<input type="file" name="logo" id="website_logo"></br>
				<img id="prev_website_logo_upload" src="<?= base_url()?>assets/uploads/website_settings/<?= $website_settings_data[0]['logo']?>"/><br>
			website fevicon:<input type="file" name="fevicon" id="website_fevicon"></br>
			<img id="prev_website_fevicon_upload" src="<?= base_url()?>assets/uploads/website_settings/<?= $website_settings_data[0]['fevicon']?>"/><br>
			SMTP Host:<input type="text" name="smtp_host" value="<?= $website_settings_data[0]['smtp_host']?>"></br>
			SMTP Port:<input type="text" name="smtp_port" value="<?= $website_settings_data[0]['smtp_port']?>"></br>
			SMTP Username:<input type="text" name="smtp_username" value="<?= $website_settings_data[0]['smtp_username']?>"/></br>
			Contact Address:<input type="text" name="contact_address" value="<?= $website_settings_data[0]['contact_address']?>"/></br>
			Email:<input type="text" name="email" value="<?= $website_settings_data[0]['email']?>"></br>
			Contact Number:<input type="text" name="contact_number" value="<?= $website_settings_data[0]['contact_number']?>"/></br>
			<input type="submit" value="Submit"/>

			</form>

<?php	}
	?>
	