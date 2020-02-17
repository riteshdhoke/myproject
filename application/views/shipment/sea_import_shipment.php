<script type="text/javascript">
	function searchFilter(page_num) {
	page_num = page_num?page_num:0;

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url(); ?>Home/ajaxindex/'+page_num,
		data:'page='+page_num,
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

<h1>Sea Import Shipment</h1>
<a href="<?= base_url()?>Shipment/add_sea_import_shipment">Add</a>

<div id="postList">
						<table class="table">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Status</th>
									<th>Job Type</th>
							
									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php $sr=1;

								if(!empty($ship_import_data)) {
									foreach($ship_import_data as $rows) {
									 ?>
								<tr>

									<td><?= $sr++; ?></td>
									<td><?= $rows['status']?></td>
									<td><?= $rows['job_type']; ?></td>
									<td><button class="edit_import_shipment btn btn-info" data-id="<?= url_value_encode($rows['id'])?>">Edit</button><button class="btn btn-danger delete_port" data-id="<?= url_value_encode($rows['id'])?>">Delete</button></td>
									
										
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
          <form id="edit_port_form" action="<?= base_url()?>Port/UpdatePort" method="post">
          	<input type="hidden" id ="edit_id" name="id">
          	<input type="text" id ="port_code" name="code">
          	<input type="text" id ="port_name" name="name">
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

