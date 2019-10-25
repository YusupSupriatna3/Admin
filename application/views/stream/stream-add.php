		<form action="<?php echo base_url()?>stream/prosess_stream_add" method="POST" enctype="multipart/form-data">
			<div class="title">Add Videos</div>
			<div class="content py-5">
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-3">
						<input type="text" class="form-control blog-title" name="streamTitle" id="streamTitle" placeholder="Videos Title" value="" autofocus>
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Thumbnail</small></label>
						<div class="mb-2 img-wrapper">
							<img id="imgPrev" src="<?php echo base_url() ?>assets/img/icon/default-image-2.svg" alt="your image" class="blog-img" />
							<input required type='file' name="userfile" id="imgInp" class="d-none" />
							<label for="imgInp" class="image-blog font-12">
								<i class="material-icons mr-1">photo_library</i>Choose Image
							</label>
						</div>
					</div>
					<!-- <div class="form-group mb-3">
						<label class="m-0"><small>Channel ID</small></label>
						<input type="text" class="form-control" name="channelId" id="channelId" placeholder="Channel ID" value="">
					</div> -->
					<div class="form-group mb-3">
						<label class="m-0"><small>URL</small></label>
						<input type="text" class="form-control" name="url" id="url" placeholder="URL" value="">
					</div>
					<div class="form-group">
						<div class="summernote"></div>
					</div>
					<div class="mt-3">
						<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Videos</button>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<!-- script -->
	
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
