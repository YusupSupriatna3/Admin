			
			<div class="title">Caster Detail</div>
			<div class="content py-5">
				<div class="mb-3">
					<label class="mb-0" class="font-semibold"><small>Profile Photos</small></label>
					<div class="mb-2 img-wrapper">
						<img id="imgPrev" src="<?php echo base_url() ?>assets/img/avatar.jpg" alt="your image" class="caster-avatar" />
					</div>
				</div>
				<?php foreach ($detail as $key): ?>
					<input type="hidden" id="email" name="email" value="<?php echo $key['caster_email']; ?>">
				<input type="hidden" id="status" name="status" value="<?php echo $key['status_spectator']; ?>">
					<div class="mb-3">
						<small>Caster Nickname</small>
						<div class="font-bold"><?php echo $key['nick_name_caster']; ?></div>
					</div>
					<div class="mb-3">
						<small>Phone Number</small>
						<div class="font-bold"><?php echo $key['phone_number']; ?></div>
					</div>
					<div class="mb-3">
						<small>Domicile</small>
						<div class="font-bold"><?php echo $key['domisili']; ?></div>
					</div>
					<div class="mb-3">
						<small>Tax Registration</small>
						<div class="font-bold"><?php echo $key['tax_registration']; ?></div>
					</div>
					<div class="mb-3">
						<small>Game Specialization</small>
						<div class="font-bold"></div>
					</div>
					<div class="mb-3">
						<small>Range Prize Tournament</small>
						<div class="font-bold">
							<div class="d-flex v-center">
								<span class="font-semibold">
									<?php if (!empty($key['price_start_range'])) {
										echo number_format($key['price_start_range']);
									} else {
										echo "0";
									}
									?>
								IDR</span>
								<span class="badge-app ml-2">publish</span>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<small>Total Collection</small>
						<div class="font-bold">
							<div class="d-flex v-center">
								<span class="font-semibold">
									<?php if (!empty($key['total_collection'])) {
										echo number_format($key['total_collection']);
									} else {
										echo "0";
									}
									?>
								IDR</span>
								<span class="badge-app ml-2">publish</span>
							</div>
						</div>
					</div>
					<div class="mt-3">
						<button id="casters_deactive" class="btn btn-outline-delete btn-sm d-flex v-center"><i class="material-icons mr-1">block</i> <?php if (strtoupper($key['status_spectator'])=='ACTIVE') {
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
					<h5 class="modal-title"><span id="statusadmin">Deactived</span> Caster</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to <span id="statusadmin1">Deactived</span> this caster ?</p>
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
			$("#casters_deactive").click(function() {
			    var $email = $("#email").val();
			    var $status = $("#status").val();
			    if ($status=='active') {
					$('#statusadmin').text("Deactived");
					$('#statusadmin1').text("deactived");
					$('#statusadmin2').text("Deactived");
				}else{
					$('#statusadmin').text("Actived");
					$('#statusadmin1').text("actived");
					$('#statusadmin2').text("Actived");
				}
			    $("#depan").attr("href","<?php echo base_url(); ?>casters-deactive/"+$email+'/'+$status);
			});
		})
	</script>
</body>
</html>