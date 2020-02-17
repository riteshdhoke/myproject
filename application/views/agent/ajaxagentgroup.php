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