			<div class="d-flex v-center">
				<div class="title">Tournament</div>
			</div>
			<div class="content py-5">
				<div class="d-md-flex mb-3">
					<div class="mb-3 mb-md-0">
						<select class="form-control select-app">
							<option>10</option>
							<option>50</option>
							<option>100</option>
						</select>
					</div>
					<div class="ml-auto">
						<input type="text" id="search_text" onkeyup="cariTournaments()" class="form-control input-app" name="search" placeholder="Search...">
					</div>
				</div>
				<table class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>Tournament Name</th>
							<th>Organizer</th>
							<th>Platform</th>
							<!-- <th>Created Date</th> -->
							<!-- <th>Status</th> -->
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tournament as $key): ?>
							<tr class="tournament">
								<td nowrap><?php echo $key['full_name']; ?>
									<span hidden><?php echo strtoupper($key['full_name']); ?></span>	
								</td>
								<td nowrap><?php echo $key['organization']; ?>
									<span hidden><?php echo strtoupper($key['organization']); ?></span>
								</td>
								<td><?php echo $key['platform']; ?>
									<span hidden><?php echo strtoupper($key['platform']); ?></td></span>
								</td>
								<!-- <td nowrap><?php //echo $key['platform']; ?></td> -->
								<!-- <td>Aktif</td> -->
								<td class="d-flex justify-content-center">
									<!-- <button class="btn btn-outline-delete btn-sm d-flex v-center mr-2" title="Deactived"><i class="material-icons">block</i></button> -->
									<a href="<?php echo base_url(); ?>tournament-detail/<?php echo $this->dataencryption->enc_dec('encrypt',$key['tournament_id']); //$this->dataencryption->enc_dec('encrypt',$key['tournament_id']); ?>" class="btn btn-outline-info btn-sm d-flex v-center" title="info"><i class="material-icons">info_outline</i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<br>
					<?php 
						echo $this->pagination->create_links();
					?>
				<!-- <ul class="pagination">
					<li><a href="" class="disabled"><i class="material-icons">chevron_left</i></a></li>
					<li><a href="" class="active">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="" class="dot">...</a></li>
					<li><a href="">100</a></li>
					<li><a href="">101</a></li>
					<li><a href=""><i class="material-icons">chevron_right</i></a></li>
				</ul> -->
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
	<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/admin.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script>
	<script>
		$('.btn-outline-delete').on('click', function(){
			$('.modalBlock').modal('show');
		});
	</script>
	<script type="text/javascript">
		function cariTournaments(){
			var status = $("#search_text").val();
			var text = status.toUpperCase();
			console.log(text);
			$(".tournament").hide();
			$('.tournament:contains("'+text.toUpperCase()+'")').show();
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$(".users-data").click(function() {
			    var $row = $(this).closest("tr");    // Find the row
			    var $status = $row.find(".users-status").text(); // Find the text
			    var $email = $row.find(".users-email").text();

			    $('#email').val($email);
			    $('#status').val($status);
			    $("#depan").attr("href","<?php echo base_url(); ?>users/users_deactive/"+$email+'/'+$status);
			});
		})
	</script>
</body>
</html>