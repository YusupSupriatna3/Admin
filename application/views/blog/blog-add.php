
		<form action="<?php echo base_url(); ?>blog/proses_add_blog" method="POST" enctype="multipart/form-data">
			<div class="title">Add Blog</div>
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
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-3">
						<input type="text" class="form-control blog-title" name="blogTitle" id="blogTitle" placeholder="Blog Title" value="" autofocus>
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Main Image</small></label>
						<div class="mb-2 img-wrapper">
							<img id="imgPrev" src="<?php echo base_url()?>assets/img/icon/default-image-2.svg" alt="your image" class="blog-img" />
							<input required type='file' id="imgInp" class="d-none" name="userfile" />
							<label for="imgInp" class="image-blog font-12">
								<i class="material-icons mr-1">photo_library</i>Choose Image
							</label>
						</div>
					</div>
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="category" id="category" placeholder="Category" value="">
					</div>
					<div class="form-group">
						<!-- <input type="textArea" name="description"  id="summernote" value=""> -->
						<!-- <div class="summernote"></div> -->
						<textarea placeholder="      description ...." style="width: 635px" name="description"></textarea>
					</div>
					<div class="mt-3">
						<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Blog</button>
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
	<script src="<?php echo base_url()?>assets/js/summernote.min.js"></script>
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
</body>
</html>