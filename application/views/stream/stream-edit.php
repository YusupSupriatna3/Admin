			<form action="<?php echo base_url(); ?>stream/proses_edit_stream/<?php echo $this->dataencryption->enc_dec('encrypt',$get[0]['id_streams']); ?>" method="POST" enctype="multipart/form-data">
			<?php
			$photo = $get[0]['thumbnail_streams'];
			if (!empty($this->session->flashdata('msg'))) {
				$message = $this->session->flashdata('msg');
				?>
				<div class="alert alert-<?php echo $message['class']?>" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center><?php echo $message['message'] ?></center>
				</div>
			<?php } ?>
			<div class="title">Edit Videos</div>
			<div class="content py-5">
				<?php foreach ($get as $key ) {  ?>
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-3">
						<input type="text" class="form-control blog-title" name="streamTitle" id="streamTitle" placeholder="Stream Title" value="<?php echo $key['name_streams']; ?>" autofocus>
					</div>					
					<div class="mb-3">
						<label class="mb-0"><small>Thumbnail Stream</small></label>
						<div class="mb-2 img-wrapper">
							<?php if (substr($key['thumbnail_streams'], 0,4)=='http'){ ?>
								<img id="imgPrev" src="<?php echo $key['thumbnail_streams'] ?>" alt="your image" class="blog-img" />
							<?php }else{?>
								<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['thumbnail_streams'] ?>" alt="your image" class="blog-img" />
							<?php } ?>
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
						<label class="m-0"><small>Channel ID</small></label>
						<input type="text" class="form-control" name="channelId" id="channelId" placeholder="Channel ID" value=" UC-VLq0kfYLhFb_1BtWq0kja">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>URL</small></label>
						<input type="text" class="form-control" name="url" id="url" placeholder="URL" value="<?php echo $key['url_streams'] ?>">
					</div>
					<div class="form-group">
						<div class="summernote"><?php $key['desc_streams'] ?></div>
					</div>
					<div class="mt-3">
						<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">update</i> Update Live Stream</button>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		</form>
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
	<!-- <script src="<?php echo base_url()?>assets/js/summernote.min.js"></script> -->
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
			placeholder: 'Type blog content here...',
			height: 250,
		});
	</script>
