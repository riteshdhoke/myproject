<form action="<?= base_url()?>Customer/Add_customer" method="post" id="add_customer">



	<select name="customer_group">
		<?php
			foreach ($group_data as $group_data_value) { ?>
				<option value="<?= $group_data_value['id'];?>"><?= $group_data_value['group_name'];?></option>	
		<?php	}
		?>
	</select>									
	<input type="text" name="full_name" placeholder="Full Name">
	<input type="text" name="short_name" placeholder="Short Name"><br>
	Telephone : <input type="text" name="telephone_1" placeholder="telephone 1"><input type="text" name="telephone_2" placeholder="telephone 2"><br>

	Fax : <input type="text" name="fax_1" placeholder="fax 1"><input type="text" name="fax_2" placeholder="fax 2"><br>

	Fax : <input type="text" name="contact_1" placeholder="contact 1"><input type="text" name="contact_2" placeholder="contact 2"><br>

	Email : <input type="text" name="email_1" placeholder="email 1"><input type="text" name="email_2" placeholder="email 2"><br>

	<textarea name="address" placeholder="Address"></textarea>
	Country:
	<select name="country">
		<?php
			foreach ($country_data as $country_data_value) { ?>
				<option value="<?= $country_data_value['id'];?>"><?= $country_data_value['country_name'];?></option>	
		<?php	}
		?>
	</select>

	

	<input type="text" name="remark" placeholder="Remark">
	<input type="text" name="uei_no" placeholder="uei_no">
	<input type="text" name="cust_acc" placeholder="cust_acc">
	<input type="text" name="credit_limit" placeholder="credit_limit">
		Currency:
		<select name="currency">
		<?php
			foreach ($currency_data as $currency_data_value) { ?>
				<option value="<?= $currency_data_value['id'];?>"><?= $currency_data_value['name'];?></option>	
		<?php	}
		?>
	</select>
	Salesman:
	<select name="sales">
		<?php
			foreach ($sales_data as $sales_data_value) { ?>
				<option value="<?= $sales_data_value['id'];?>"><?= $sales_data_value['name'];?></option>	
		<?php	}
		?>
	</select>

	<select name="term">
		<?php
			foreach ($term_data as $term_data_value) { ?>
				<option value="<?= $term_data_value['id'];?>"><?= $term_data_value['name'];?></option>	
		<?php	}
		?>
	</select>

	<input type="submit" value="Add">
</form>