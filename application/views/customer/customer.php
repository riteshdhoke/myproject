<script type="text/javascript">
	function searchFilter(page_num,keyword) {
	page_num = page_num?page_num:0;
	keyword = keyword?keyword:'';

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url(); ?>Customer/ajaxcustomer/'+page_num,
		data:'page='+page_num+"&keyword="+keyword,
		beforeSend: function () {
			$('.loading').show();
		},
		success: function (html) {
			$('#postList').html(html);
			$('.loading').fadeOut("slow");
		}
	});
}
</script>

<h1>Customer</h1>
<a href="<?= base_url()?>Customer/Add_customer">Add</a>
<input type="text" id="customer_keyword"><button type="button" id="search_customer">Search</button>
<button type="button" id="export_customert">Export Data</button>

<div id="postList">
						<table class="table">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Full Name</th>
									<th>Short Name</th>
							
									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php $sr=1;

								if(!empty($customer_data)) {
									foreach($customer_data as $rows) {
									 ?>
								<tr>

									<td><?= $sr++; ?></td>
									<td><?= $rows['full_name']?></td>
									<td><?= $rows['short_name']; ?></td>
									<td><button class="edit_customer btn btn-info" data-id="<?= url_value_encode($rows['id'])?>" data-toggle="modal" data-target="#myModal" >Edit</button><button class="btn btn-danger delete_customer" data-id="<?= url_value_encode($rows['id'])?>">Delete</button></td>
									
										
									<?php } } else { ?>
										<td colspan="7">No Data Found</td>
									<?php } ?>

								</tr>
							</tbody>
						</table>
						<?php echo $this->ajax_pagination->create_links(); ?>
					</div> <!-- end postlist -->



					<!-- Modal Start -->
					<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Currency</h4>
        </div>
        <div class="modal-body">
         


          <form action="<?= base_url()?>Customer/Updatecustomer" method="post" id="add_customer">

          	<input type="hidden" id ="edit_id" name="id">

	<select name="customer_group" id="group_id">
		<?php
			foreach ($group_data as $group_data_value) { ?>
				<option value="<?= $group_data_value['id'];?>"><?= $group_data_value['group_name'];?></option>	
		<?php	}
		?>
	</select>									
	<input type="text" name="full_name" placeholder="Full Name" id="full_name">
	<input type="text" name="short_name" placeholder="Short Name" id="short_name"><br>
	Telephone : <input type="text" name="telephone_1" placeholder="telephone 1" id="tel_1"><input type="text" name="telephone_2" placeholder="telephone 2" id="tel_2"><br>

	Fax : <input type="text" name="fax_1" placeholder="fax 1" id="fax1"><input type="text" name="fax_2" placeholder="fax 2" id="fax2"><br>

	contact : <input type="text" name="contact_1" placeholder="contact 1" id="contact1"><input type="text" name="contact_2" placeholder="contact 2" id="contact2"><br>

	Email : <input type="text" name="email_1" placeholder="email 1" id="email1"><input type="text" name="email_2" placeholder="email 2" id="email2"><br>

	<textarea name="address" placeholder="Address" id="address"></textarea>

	<select name="country" id="country">
		<?php
			foreach ($country_data as $country_data_value) { ?>
				<option value="<?= $country_data_value['id'];?>"><?= $country_data_value['country_name'];?></option>	
		<?php	}
		?>
	</select>

	<input type="text" name="remark" placeholder="Remark" id="remark">
	<input type="text" name="uei_no" placeholder="uei_no" id="uei_no">
	<input type="text" name="cust_acc" placeholder="cust_acc" id="cusr_acc">
	<input type="text" name="credit_limit" placeholder="credit_limit" id="credit_limit">

		<select name="currency" id="currency">
		<?php
			foreach ($currency_data as $currency_data_value) { ?>
				<option value="<?= $currency_data_value['id'];?>"><?= $currency_data_value['name'];?></option>	
		<?php	}
		?>
	</select>
	Salesman:
	<select name="sales" id="sales">
		<?php
			foreach ($sales_data as $sales_data_value) { ?>
				<option value="<?= $sales_data_value['id'];?>"><?= $sales_data_value['name'];?></option>	
		<?php	}
		?>
	</select>

	<select name="term" id="term">
		<?php
			foreach ($term_data as $term_data_value) { ?>
				<option value="<?= $term_data_value['id'];?>"><?= $term_data_value['name'];?></option>	
		<?php	}
		?>
	</select>

	<input type="submit" value="Update">
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
					<!-- Modal End -->

