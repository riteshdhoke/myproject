<script type="text/javascript">
	function searchFilter(page_num,keyword) {
	page_num = page_num?page_num:0;
	keyword = keyword?keyword:'';

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url(); ?>Agent/ajaxagentgroup/'+page_num,
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

<h1>Agent Groups</h1>
<a href="<?= base_url()?>Agent/Add_agent_group">Add</a>
<input type="text" id="agents_group_keyword"><button type="button" id="search_agents_group">Search</button>
<button type="button" id="export_agents_group">Export Data</button>

<div id="postList">
						<table class="table">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Group ID</th>
									<th>Group Name</th>
									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php $sr=1;

								if(!empty($agent_data)) {
									foreach($agent_data as $rows) {
									 ?>
								<tr>

									<td><?= $sr++; ?></td>
									<td><?= $rows['group_id']?></td>
									<td><?= $rows['name']?></td>
									<td><button class="edit_agent_group btn btn-info" data-id="<?= url_value_encode($rows['id'])?>" data-toggle="modal" data-target="#myModal" >Edit</button><button class="btn btn-danger delete_agent_group" data-id="<?= url_value_encode($rows['id'])?>">Delete</button></td>
									
										
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
          

     <form action="<?= base_url()?>Agent/UpdateAgentGroup" method="post" id="edit_agent_group_form">
     	<input type="hidden" name="id" id="edit_id">
										
		<input type="text" name="group_id" placeholder="Group ID" id="group_id">
		<input type="text" name="name" placeholder="Group Name" id="group_name">
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

