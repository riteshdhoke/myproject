<script type="text/javascript">
	function searchFilter(page_num,keyword) {
	page_num = page_num?page_num:0;
	keyword = keyword?keyword:'';

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url(); ?>Home/ajaxcurrency/'+page_num,
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

<h1>Currency</h1>
<a href="<?= base_url()?>Home/Add_currency">Add</a>

<input type="text" id="currency_keyword"><button type="button" id="search_currency">Search</button>
<button type="button" id="export_currency">Export Data</button>

<div id="postList">
						<table class="table">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Code</th>
									<th>Name</th>
									<th>Rate</th>
									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php $sr=1;

								if(!empty($currency_data)) {
									foreach($currency_data as $rows) {
									 ?>
								<tr>

									<td><?= $sr++; ?></td>
									<td><?= $rows['currency_code']?></td>
									<td><?= $rows['name']; ?></td>
									<td><?= $rows['rate']; ?></td>
									
									<td><button class="edit_currency btn btn-info" data-id="<?= url_value_encode($rows['id'])?>" data-toggle="modal" data-target="#myModal" >Edit</button><button class="btn btn-danger delete_currency" data-id="<?= url_value_encode($rows['id'])?>">Delete</button></td>
									
										
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
          <form id="edit_currency_form" action="<?= base_url()?>Home/UpdateCurrency" method="post">
          	<input type="hidden" id ="edit_id" name="id">
          	<input type="text" id ="currency_code" name="currency_code">
          	<input type="text" id ="currency_name" name="name">
          	<input type="text" id ="currency_rate" name="rate">
          	<input type="submit" id ="currency_rate" value="Update">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
					<!-- Modal End -->

