			<div class="title">Profile</div>
			<div class="content py-5">
				<div class="mb-3">
					<label class="mb-0" class="font-semibold"><small>Profile Photos</small></label>
					<div class="mb-2 img-wrapper">
						<img id="imgPrev" src="../../assets/img/avatar.jpg" alt="your image" class="caster-avatar" />
					</div>
				</div>
				<div class="mb-3">
					<small>Admin Name</small>
					<div class="font-bold">John Doe</div>
				</div>
				<div class="mb-3">
					<small>Admin Email</small>
					<div class="font-bold">johndoe@padiciti.com</div>
				</div>
				<div class="mb-3">
					<small>Role</small>
					<div class="font-bold">Blog, Game, Tournament</div>
				</div>
				<div class="mt-3 d-flex">
					<a href="setting.html" class="btn btn-app edit btn-sm d-flex v-center"><i class="material-icons mr-1">settings</i> Setting</a>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Block Caster</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to block this caster</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> Block</button>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	<script src="../../assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="../../assets/js/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
	<script src="../../assets/js/bootstrap-datepicker.min.js"></script>
	<script src="../../assets/js/datatables.min.js"></script>
	<script src="../../assets/js/chart.min.js"></script>
	<script src="../../assets/js/admin.js"></script>
	<script src="../../assets/js/bootstrap-select.min.js"></script>
	<script>
		$('.btn-outline-delete').on('click', function(){
			$('.modalBlock').modal('show');
		});
	</script>
</body>
</html>