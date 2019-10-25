			<?php $photo = $edit[0]['banner_path']; ?>
			<form action="<?php echo base_url(); ?>banner/proses_edit_banner/<?php echo $this->dataencryption->enc_dec('encrypt',$edit[0]['banner_id']); ?>" method="POST" enctype="multipart/form-data">
			<?php
			if (!empty($this->session->flashdata('msg'))) {
				$message = $this->session->flashdata('msg');
				?>
				<div class="alert alert-<?php echo $message['class']?>" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center><?php echo $message['message'] ?></center>
				</div>
			<?php } ?>
			<div class="title">Edit Banner</div>
			<div class="content py-5">
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<?php foreach ($edit as $key ) { ?>
					<div class="mb-3">
						<label class="mb-0"><small><?php echo $key['banner_path'] ?></small></label>
						<div class="mb-2 img-wrapper">
							<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['banner_path'] ?>" alt="your image" class="blog-img" />
							<input type='file' id="imgInp" name="userfile" class="d-none" />
								<?php 
									if ($photo) {
								?>
							<label for="imgInp" class="image-blog font-12">
								<i class="material-icons mr-1">photo_library</i>Choose Image
							</label>
								<?php } ?>
							<input type="hidden" name="imgs" value="<?php echo $photo ?>">
						</div>

					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Order No ?</small></label>
						<input type="numerik" class="form-control" name="rate" id="rate" placeholder="rate" value="<?php echo $key['rate'] ?>">
					</div>
					<div class="form-group">
						<label class="m-0"><small>Description</small></label>
						<input type="text" class="form-control" name="description" id="description" placeholder="description" value="<?php echo $key['description'] ?>">
					</div>
				<?php } ?>
					<div class="mt-3">
						<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">update</i> Update Banner</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div><!-- end wrapper-app -->

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

		$('.summernote').summernote({
			placeholder: 'Type stream description here...',
			height: 250,
		});
	</script>
