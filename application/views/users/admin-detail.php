			<div class="title">
				<?php if ($this->uri->segment(1)=='admin-detail'): ?>
					<?php echo "Admin Detail"; ?>
				<?php else: ?>
					<?php echo "User Profile"; ?>
				<?php endif ?>
			</div>
			<div class="content py-5">
				<?php foreach ($admin_detail as $key): ?>
					<div class="mb-3">
						<label class="mb-0" class="font-semibold"><small>Profile Photos</small></label>
						<div class="mb-2 img-wrapper">
							<?php if (substr($key['logo'], 0,4)=='http'){ ?>
								<img id="imgPrev" src="<?php echo $key['logo'];?>" alt="your image" class="caster-avatar" />
							<?php }else{?>
								<img id="imgPrev" src="<?php echo base_url().$key['logo'];?>" alt="your image" class="caster-avatar" />
							<?php } ?>
						</div>
					</div>
					<div class="mb-3">
						<small>Admin Name</small>
						<div class="font-bold"><?php echo $key['name']; ?></div>
					</div>
					<div class="mb-3">
						<small>Admin Email</small>
						<div class="font-bold"><?php echo $key['email']; ?></div>
					</div>
					<!-- <div class="mb-3">
						<small>Role</small>
						<div class="font-bold"><?php echo $key['role']; ?></div>
					</div> -->
					<div class="mt-3 d-flex">
						<a href="<?php echo base_url() ?>admin-edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['admin_id']) ?>" class="btn btn-app edit btn-sm d-flex v-center"><i class="material-icons mr-1">edit</i> Edit</a>
					</div>
				</div>
			<?php endforeach ?>
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