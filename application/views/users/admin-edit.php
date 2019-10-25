
			<div class="title">Update Admin</div>
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
				<div class="col-md-6 col-12">
					<?php foreach ($admin as $key): ?>
						<form method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>admin-edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['admin_id']); ?>">
							<div class="mb-3">
								<label class="mb-0"><small>Profile Photos</small></label>
								<div class="mb-2 img-wrapper">
									<?php if (substr($key['logo'], 0,4)=='http'){ ?>
										<img id="imgPrev" src="<?php echo $key['logo'];?>" alt="your image" class="caster-avatar" />
										<input type="hidden" name="imgs" value="<?php echo $key['logo']; ?>">
									<?php }else{?>
										<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/admin/'.$key['logo'];?>" alt="your image" class="caster-avatar" />
										<input type="hidden" name="imgs" value="<?php echo 'https://www.padiplay.com/admin/'.$key['logo'];?>">
									<?php } ?>
								</div>
								<div>
									<input type='file' name="userfile" id="imgInp" class="d-none" />
									<label for="imgInp" class="btn btn-outline-primary btn-sm font-12">Choose Image</label>
								</div>
							</div>
							<div class="form-group mb-3">
								<label class="mb-0"><small>Admin Name</small></label>
								<input type="text" class="form-control" name="name" id="adminName" placeholder="Name" value="<?php echo $key['name'] ?>">
							</div>
							<div class="mb-3">
								<label class="mb-0"><small>Email</small></label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $key['email'] ?>">
							</div>
							<div class="mb-3">
								<label class="mb-0"><small>Password</small></label>
								<input type="password" class="form-control" name="password" id="password" value="<?php echo $key['password'] ?>">
							</div>
							<div class="mb-3">
								<label class="mb-0"><small>Confirm Password</small></label>
								<input type="password" class="form-control" name="password" id="password" value="<?php echo $key['password'] ?>">
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
								<button type="submit" name="btn-edit" class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">update</i> Update</button>
							</div>
						</form>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->
</html>