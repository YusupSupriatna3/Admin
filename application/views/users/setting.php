			<div class="title">Setting</div>
			<div class="content py-5">
				<div class="col-md-6 col-12">
					<div class="mb-3">
						<label class="mb-0"><small>Profile Photos</small></label>
						<div class="mb-2 img-wrapper">
							<img id="imgPrev" src="../../assets/img/avatar.jpg" alt="your image" class="caster-avatar" />
						</div>
						<div>
							<input type='file' id="imgInp" class="d-none" />
							<label for="imgInp" class="btn btn-outline-primary btn-sm font-12">Choose Image</label>
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="mb-0"><small>Name</small></label>
						<input type="text" class="form-control" name="adminName" id="adminName" placeholder="Name" value="">
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Email</small></label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Password</small></label>
						<input type="password" class="form-control" name="password" id="password" value="">
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Confirm Password</small></label>
						<input type="password" class="form-control" name="password" id="password" value="">
					</div>
					
					</div>
					<div class="mt-3">
						<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Admin</button>
					</div>
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
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#imgPrev').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#imgInp").change(function() {
			readURL(this);
		});
	</script>
</body>
</html>