
			<div class="title">User Detail</div>
			<div class="content py-5">
			<?php foreach ($detail as $key): ?>
				<input type="hidden" id="email" name="email" value="<?php echo $key['email_user']; ?>">
				<input type="hidden" id="status" name="status" value="<?php echo $key['status_activation']; ?>">
				<div class="mb-3">
					<small>Nickname</small>
					<div class="font-bold"><?php echo $key['nick_name']; ?></div>
				</div>
				<div class="mb-3">
					<small>Full Name</small>
					<div class="font-bold"><?php echo $key['last_name']; ?></div>
				</div>
				<div class="mb-3">
					<small>Email</small>
					<div class="font-bold"><?php echo $key['email_user']; ?></div>
				</div>
				<div class="mb-3">
					<small>Phone Number</small>
					<div class="font-bold"><?php echo $key['phone_number']; ?></div>
				</div>
				<div class="mb-3">
					<small>Country</small>
					<div class="font-bold"><?php echo $key['country_name']; ?></div>
				</div>
				<div class="mb-3">
					<small>Timezone</small>
					<div class="font-bold"><?php echo $key['time_zone']; ?></div>
				</div>
				<div class="mb-3">
					<small>Organization</small>
					<div class="font-bold"><?php echo $key['organization']; ?></div>
				</div>
				<div class="mb-3">
					<small>Organization Position</small>
					<div class="font-bold"><?php echo $key['position']; ?></div>
				</div>
				<div class="mt-3">
					<button id="users-deactive" class="btn btn-outline-delete btn-sm d-flex v-center"><i class="material-icons mr-1">block</i> <?php if (strtoupper($key['status_activation'])=='ACTIVE') {
						echo "ACTIVE";
					}else{
						echo "DEACTIVE";
					} ?></button>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div><!-- end wrapper-app -->
	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><span id="statusadmin">Deactived</span> User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to <span id="statusadmin1">Deactived</span> this user ?</p>
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
		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$("#users-deactive").click(function() {
			    var $email = $("#email").val();
			    var $status = $("#status").val();
			    if ($status=='ACTIVE') {
					$('#statusadmin').text("Deactived");
					$('#statusadmin1').text("deactived");
					$('#statusadmin2').text("Deactived");
				}else{
					$('#statusadmin').text("Actived");
					$('#statusadmin1').text("actived");
					$('#statusadmin2').text("Actived");
				}
			    $("#depan").attr("href","<?php echo base_url(); ?>users/users_deactive/"+$email+'/'+$status);
			});
		})
	</script>
</body>
</html>