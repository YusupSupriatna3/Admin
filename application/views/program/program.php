
			<div class="d-flex v-center">
				<div class="title">Program</div>
				<a href="<?php echo base_url() ?>program-add" class="btn btn-app btn-sm d-flex v-center ml-auto"><i class="material-icons">add</i>Add Program</a>
			</div>
			<?php 
			if (!empty($this->session->flashdata('msg'))) {
				$message = $this->session->flashdata('msg');
				?>
				<div class="alert alert-<?php echo $message['class']?>" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center><?php echo $message['message'] ?></center>
				</div>
			<?php } ?>
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
						<input type="text" id="search_text" onkeyup="cariProgram()" class="form-control input-app" name="search" placeholder="Search...">
					</div>
				</div>
				<table class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>PIC</th>
							<th>Payment Program</th>
							<th>Game Program</th>
							<th>Event Program</th>
							<th>Descryption</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($program as $key): ?>
							<tr class="program">
								<td class="program-id" hidden nowrap><?php echo $key['program_id']; ?></td>
								<td class="no" nowrap><?php echo $no++; ?>
									<span hidden><?php echo $no++; ?></span>
								</td>
								<td nowrap><?php echo $key['program_name']; ?>
									<span hidden><?php echo strtoupper($key['program_name']); ?></span>
								</td>
								<td nowrap><?php echo $key['pic']; ?>
									<span hidden><?php echo strtoupper($key['pic']); ?></span>
								</td>
								<td nowrap><?php echo $key['is_payment_program']; ?>
									<span hidden><?php echo strtoupper($key['is_payment_program']); ?></span>
								</td>
								<td nowrap><?php echo $key['is_game_program']; ?>
									<span hidden><?php echo strtoupper($key['is_game_program']); ?></span>
								</td>
								<td nowrap><?php echo $key['is_event_program']; ?>
									<span hidden><?php echo strtoupper($key['is_event_program']); ?></span>
								</td>
								<td><?php echo $key['Description']; ?>
									<span hidden><?php echo strtoupper($key['Description']); ?></span>
								</td>
								<td class="d-flex justify-content-center">
									<button class="btn btn-outline-delete btn-sm d-flex v-center mr-2" title="deactived"><i class="material-icons">delete</i></button>
									<a href="<?php echo base_url() ?>program-edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['program_id']); ?>" class="btn btn-outline-info btn-sm d-flex v-center" title="edit"><i class="material-icons">edit</i></a>
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
					<h5 class="modal-title"><span id="statusprogram">Delete</span> program</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to <span id="statusprogram1">Delete</span> this program ?</p>
				</div>
				<div class="modal-footer">
					<a id="depan"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> <span id="statusprogram2">Delete</span></button></a>
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
		function cariprogram(){
			var status = $("#search_text").val();
			var text = status.toUpperCase();
			$(".program").hide();
			$('.program:contains("'+text.toUpperCase()+'")').show();
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$(".program").click(function() {
			    var $row = $(this).closest("tr");    // Find the row
			    var $status = $row.find(".program-status").text(); // Find the text
			    var $id = $row.find(".program-id").text();
			    if ($status=='ACTIVE') {
					$('#statusprogram').text("Delete");
					$('#statusprogram1').text("delete");
					$('#statusprogram2').text("Delete");
				}else{
					$('#statusprogram').text("Delete");
					$('#statusprogram1').text("delete");
					$('#statusprogram2').text("Delete");
				}

			    $("#depan").attr("href","<?php echo base_url(); ?>users/program_deactive/"+$id+'/'+$status);
			});
		})
	</script>
</body>
</html>