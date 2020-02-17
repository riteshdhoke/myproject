<table class="table">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Agent Group</th>
									<th>Full Name</th>
									<th>Short Name</th>
									<th>Address</th>
									<th>Telephone</th>
									<th>Fax</th>
									<th>Contact</th>
									<th>Email</th>
									<th>Country</th>
									<th>Port</th>
									<th>Remark</th>
									<th>UEI No</th>
									<th>CUST ACC</th>
									<th>Credit Limit</th>
									<th>Term</th>
									<th>Currency</th>
									<th>UserID</th>
							
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
									<td><?= $rows['agent_group']?></td>
									<td><?= $rows['full_name']; ?></td>
									<td><?= $rows['short_name']; ?></td>
									<td><?= $rows['address']; ?></td>
									<td><?= $rows['telephone_1'].','.$rows['telephone_2']; ?></td>
									<td><?= $rows['fax_1'].','.$rows['fax_2']; ?></td>
									<td><?= $rows['contact_1'].','.$rows['contact_2']; ?></td>
									<td><?= $rows['email_1'].','.$rows['email_2']; ?></td>
									<td><?= $rows['country']; ?></td>
									<td><?= $rows['port']; ?></td>
									<td><?= $rows['remark']; ?></td>
									<td><?= $rows['uei_no']; ?></td>
									<td><?= $rows['cust_acc']; ?></td>
									<td><?= $rows['credit_limit']; ?></td>
									<td><?= $rows['term']; ?></td>
									<td><?= $rows['currency']; ?></td>
									<td><?= $rows['user_id']; ?></td>
									<td><button class="edit_agent btn btn-info" data-id="<?= url_value_encode($rows['id'])?>" data-toggle="modal" data-target="#myModal" >Edit</button><button class="btn btn-danger delete_agent" data-id="<?= url_value_encode($rows['id'])?>">Delete</button></td>
									
										
									<?php } } else { ?>
										<td colspan="7">No Data Found</td>
									<?php } ?>

								</tr>
							</tbody>
						</table>
						<?php echo $this->ajax_pagination->create_links(); ?>