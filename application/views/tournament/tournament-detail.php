<?php //echo "<pre>"; print_r($tournament_detail); echo "</pre>"; die(); ?>
			<div class="d-flex v-center">
				<div class="title">Tournament Detail</div>
			</div>
			<div class="content py-5">
				<h5>Format</h5>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<small>Game</small>
							<div class="font-bold"><?php echo $tournament_detail[0]['full_name']; ?></div>
						</div>
						<div class="col">
							<small>Region</small>
							<div class="font-bold"><?php echo $tournament_detail[0]['country']; ?></div>
						</div>
						<div class="col">
							<small>Platform</small>
							<div class="font-bold"><?php echo $tournament_detail[0]['platform']; ?></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<small>ID Tournament</small>
					<div class="font-bold"><?php echo $tournament_detail[0]['tournament_id']; ?></div>
				</div>
				<div class="form-group">
					<small>Prize</small>
					<div class="font-bold"><?php echo $tournament_detail[0]['prize']; ?></div>
				</div>
				<div class="form-group">
					<small>Tournament Format</small>
					<div class="font-bold"><?php echo $tournament_detail[0]['bracket_type']; ?></div>
				</div>

				<h5 class="mt-5">Description</h5>
				<div class="form-group">
					<?php echo $tournament_detail[0]['description']; ?>
				</div>

				<h5 class="mt-5">Rules</h5>
				<div class="form-group">
					<?php echo $tournament_detail[0]['rules']; ?>
				</div>
				<h5 class="mt-5">Participant</h5>
				<div class="form-group">
				<table class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>ID User Evet Mapping</th>
							<th>Nick Name</th>
							<th>Email</th>
							<th>Status</th>
							<th>Nominal</th>
							<!-- <th>Created Date</th> -->
							<!-- <th>Status</th> -->
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($list != NULL){ ?>
						<?php foreach ($list as $key): ?>
							<tr class="tournament">
								<td nowrap><?php echo $key['ID_USER_EVENT_MAPPING'] ?>
									<span hidden><?php echo $key['ID_USER_EVENT_MAPPING'] ?></span>	
								</td>
								<td nowrap><?php echo $key['NICK_NAME'] ?>
									<span hidden><?php echo $key['NICK_NAME'] ?></span>
								</td>
								<td><?php echo $key['EMAIL_USER'] ?>
									<span hidden><?php echo $key['EMAIL_USER'] ?></td></span>
								</td>
								<td><?php echo $key['TRN_STATUS'] ?>
									<span hidden><?php echo $key['TRN_STATUS'] ?></td></span>
								</td>
								<td><?php echo $key['REGISTRATION_FEE'] ?>
									<span hidden><?php echo $key['REGISTRATION_FEE'] ?></td></span>
								</td>
								<td class="d-flex justify-content-center">
									<a href="" class="btn btn-outline-info btn-sm d-flex v-center" title="info"><i class="material-icons">info_outline</i></a>
								</td>
							</tr>
						<?php endforeach ?>
						<?php }else{ ?>
							<tr class="tournament">
								<td nowrap>NO DATA</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="row">
			        <div class="col">
			            <?php 
			            echo $this->pagination->create_links();
			            ?>
			        </div>
			    </div>
				<form action="<?php echo base_url(); ?>accept-tournament" method="POST">
					<h5 class="mt-5">Accept Participant By Organizer</h5>
					<div class="form-group">
						<input <?php if ($tournament_detail[0]['organizer_accept']=='Y'): ?>
							<?php echo "checked" ?>
						<?php endif ?> type="radio" name=" accept" value="Y"> Yes &nbsp&nbsp&nbsp&nbsp&nbsp
						<input <?php if ($tournament_detail[0]['organizer_accept']=='N'): ?>
							<?php echo "checked" ?>
						<?php endif ?> type="radio" name=" accept" value="N"> No
						<input type="hidden" name="id" value="<?php echo $tournament_detail[0]['tournament_id']; ?>">
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>

<!-- 				<div class="mt-3">
					<button class="btn btn-outline-delete btn-sm d-flex v-center"><i class="material-icons mr-1">block</i> Banned</button>
				</div> -->
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Banned Tournament</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to banned this tournament</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> Banned</button>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	
	<script>
		$('.btn-outline-delete').on('click', function(){
			$('.modalBlock').modal('show');
		});
	</script>
