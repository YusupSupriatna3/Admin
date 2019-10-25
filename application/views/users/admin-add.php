
			<div class="title">Add Admin</div>
			<div class="content py-5">
				<div class="col-lg-6 col-md-12 col-12">
					<form method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>admin-add">
						<div class="mb-3">
							<label class="mb-0"><small>Profile Photos</small></label>
							<div class="mb-2 img-wrapper">
								<img id="imgPrev" src="<?php echo base_url() ?>assets/img/icon/default-image-2.svg" alt="your image" class="caster-avatar" />
							</div>
							<div>
								<input type='file' id="imgInp" name="userfile" class="d-none" />
								<label for="imgInp" class="btn btn-outline-primary btn-sm font-12">Choose Image</label>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="mb-0"><small>Admin Name</small></label>
							<input type="text" class="form-control" name="name" id="adminName" placeholder="Name" value="">
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
							<input type="password" class="form-control" name="retypepassword" id="password" value="">
						</div>
						<!-- <div class="mb-3">
							<label class="mb-0"><small>Role</small></label>
							<div class="mb-3">
								<label class="checkbox-app">Dashboard
									<input type="checkbox" value="dashboard">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="mb-3">
								<label class="checkbox-app">Users
									<input type="checkbox" value="users">
									<span class="checkmark"></span>
								</label>
								<div class="px-3">
									<label class="checkbox-app">User
										<input type="checkbox" value="users">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Caster
										<input type="checkbox" value="caster">
										<span class="checkmark"></span>
									</label>
									<div>
										<label class="checkbox-app">Admin
											<input type="checkbox" value="admin">
											<span class="checkmark"></span>
										</label>
										<div class="pl-4">
											<label class="checkbox-app">Add
												<input type="checkbox" value="adminAdd">
												<span class="checkmark"></span>
											</label>
											<label class="checkbox-app">Edit
												<input type="checkbox" value="adminEdit">
												<span class="checkmark"></span>
											</label>
											<label class="checkbox-app">Delete
												<input type="checkbox" value="adminDelete">
												<span class="checkmark"></span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label class="checkbox-app">Game
									<input type="checkbox" value="users">
									<span class="checkmark"></span>
								</label>
								<div class="px-3">
									<label class="checkbox-app">Add
										<input type="checkbox" value="gameAdd">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Edit
										<input type="checkbox" value="gameAdd">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Delete
										<input type="checkbox" value="gameDelete">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="mb-3">
								<label class="checkbox-app">Tournament
									<input type="checkbox" value="tournament">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="mb-3">
								<label class="checkbox-app">Stream
									<input type="checkbox" value="stream">
									<span class="checkmark"></span>
								</label>
								<div class="px-3">
									<label class="checkbox-app">Add
										<input type="checkbox" value="streamAdd">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Edit
										<input type="checkbox" value="streamAdd">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Delete
										<input type="checkbox" value="streamDelete">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="mb-3">
								<label class="checkbox-app">Blog
									<input type="checkbox" value="blog">
									<span class="checkmark"></span>
								</label>
								<div class="px-3">
									<label class="checkbox-app">Add
										<input type="checkbox" value="blogAdd">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Edit
										<input type="checkbox" value="blogAdd">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-app">Delete
										<input type="checkbox" value="blogDelete">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="mb-3">
								<label class="checkbox-app">About
									<input type="checkbox" value="tournament">
									<span class="checkmark"></span>
								</label>
							</div>
						</div> -->
						<div class="mt-3">
							<button type="submit" name="btn-add" class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Admin</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

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