		<form action="<?php echo base_url()?>liveStream/prosess_streaming_add" method="POST" enctype="multipart/form-data">
			<div class="title">Add Streams</div>
			<div class="content py-5">
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-3">
						<input type="text" class="form-control blog-title" name="name_stream" id="name_stream" placeholder="Name Stream" value="" autofocus>
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Thumbnail</small></label>
						<div class="mb-2 img-wrapper">
							<img id="imgPrev" src="<?php echo base_url() ?>assets/img/icon/default-image-2.svg" alt="your image" class="blog-img" />
							<input type='file' name="userfile" id="imgInp" class="d-none" />
							<label for="imgInp" class="image-blog font-12">
								<i class="material-icons mr-1">photo_library</i>Choose Image
							</label>
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Channel ID</small></label>
						<input type="text" class="form-control" name="chanel_id" id="chanel_id" placeholder="Channel ID" value="">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Start Date for Stream</small></label>
						<div class="input-group-append">
							<input type="date" class="form-control" name="startDate" id="startDate" placeholder="" value="">
							<input type="time" class="form-control" name="timeStart" id="reg_time_open"
										value="" >
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>End Date for Stream</small></label>
						<div class="input-group-append">
							<input type="date" class="form-control" name="endDate" id="endDate" placeholder="" value="">
							<input type="time" class="form-control" name="timeEnd" id="reg_time_open"
										value="" >
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>URL Stream</small></label>
						<input type="text" class="form-control" name="url" id="url" placeholder="URL" value="">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Person in charge</small></label>
						<input type="text" class="form-control" name="contact" id="contact" placeholder="COntact Person" value="">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Publisher Name</small></label>
						<input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher Name" value="">
					</div>
					<div class="form-group">
						<div class="summernote"></div>
					</div>
					<div class="mt-3">
						<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Stream</button>
					</div>
				</div>
			</div>
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

		// $('.summernote').summernote({
		// 	placeholder: 'Type blog content here...',
		// 	height: 250,
		// });
	</script>
</body>
</html>
