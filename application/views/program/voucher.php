
			<div class="d-flex v-center">
				<div class="title">Admin</div>
				<a href="<?php echo base_url() ?>admin-add" class="btn btn-app btn-sm d-flex v-center ml-auto"><i class="material-icons">add</i>Add Admin</a>
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
						<input type="text" id="search_text" onkeyup="cariAdmin()" class="form-control input-app" name="search" placeholder="Search...">
					</div>
				</div>
				<table class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>Admin Name</th>
							<th>Password</th>
							<!-- <th>Register Date</th> -->
							<th>Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($admin as $key): ?>
							<tr class="admin">
								<td class="admin-id" hidden nowrap><?php echo $key['admin_id']; ?></td>
								<td nowrap><?php echo $key['name']; ?>
									<span hidden><?php echo strtoupper($key['name']); ?></span>
								</td>
								<td nowrap><?php echo $key['password']; ?>
									<span hidden><?php echo strtoupper($key['password']); ?></span>
								</td>
								<!-- <td nowrap>30 Januari 2019</td> -->
								<td class="admin-status" nowrap><?php echo strtoupper($key['status']); ?></td>
								<td class="d-flex justify-content-center">
									<button class="btn btn-outline-delete btn-sm d-flex v-center mr-2" title="deactived"><i class="material-icons">block</i></button>
									<a href="<?php echo base_url() ?>admin-detail/<?php echo $this->dataencryption->enc_dec('encrypt',$key['admin_id']); ?>"><button class="btn btn-outline-info btn-sm d-flex v-center mr-2" title="info"><i class="material-icons">info_outline</i></button></a>
									<a href="<?php echo base_url() ?>admin-edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['admin_id']); ?>" class="btn btn-outline-info btn-sm d-flex v-center" title="edit"><i class="material-icons">edit</i></a>
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
					<h5 class="modal-title"><span id="statusadmin">Deactived</span> Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to <span id="statusadmin1">Deactived</span> this admin ?</p>
				</div>
				<div class="modal-footer">
					<a id="depan"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> <span id="statusadmin2">Deactived</span></button></a>
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
		function cariAdmin(){
			var status = $("#search_text").val();
			var text = status.toUpperCase();
			$(".admin").hide();
			$('.admin:contains("'+text.toUpperCase()+'")').show();
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$(".admin").click(function() {
			    var $row = $(this).closest("tr");    // Find the row
			    var $status = $row.find(".admin-status").text(); // Find the text
			    var $id = $row.find(".admin-id").text();
			    if ($status=='ACTIVE') {
					$('#statusadmin').text("Deactived");
					$('#statusadmin1').text("deactived");
					$('#statusadmin2').text("Deactived");
				}else{
					$('#statusadmin').text("Actived");
					$('#statusadmin1').text("actived");
					$('#statusadmin2').text("Actived");
				}

			    $("#depan").attr("href","<?php echo base_url(); ?>users/admin_deactive/"+$id+'/'+$status);
			});
		})
	</script>
</body>
</html>