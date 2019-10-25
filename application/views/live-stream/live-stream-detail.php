
			<div class="content py-5">
				<?php foreach ($detail as $key) { ?>
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-5">
						<h3><?php echo $key['name_stream']; ?></h3>
					</div>
					<div class="mb-4">
						<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['thumbnail'];?> " alt="your image" class="blog-img" />
					</div>
					<div style="background-color: #A9A9A9"  class="form-group">
						<label class="m-0"><small>Channel ID</small></label>
						<div style="background-color: #E6E6FA" class="d-flex v-center font-bold">
							<i class="material-icons mr-2" title="Channel ID">videocam</i> <span><?php echo $key['chanel_id']; ?></span>
						</div>
					</div>
					<div style="background-color: #A9A9A9"  class="form-group">
						<label class="m-0"><small>URL</small></label>
						<div style="background-color: #E6E6FA" class="d-flex v-center font-bold">
							<i class="material-icons mr-2" title="URL">link</i> <span><?php echo $key['url_stream'] ?></span>
						</div>
					</div>
					<div  style="background-color: #A9A9A9"  class="form-group">
						<label><small class="font-bold">Start Date Stream</small></label>
						<div style="background-color: #E6E6FA"><?php echo $key['start_date'] ?></div>
					</div>
					<div style="background-color: #A9A9A9"  class="form-group">
						<label><small class="font-bold">End Date Stream</small></label>
						<div style="background-color: #E6E6FA"><?php echo $key['end_date'] ?></div>
					</div>
					<div style="background-color: #A9A9A9" class="form-group">
						<label><small class="font-bold">Publisher</small></label>
						<div style="background-color: #E6E6FA"><?php echo $key['publisher'] ?></div>
					</div>
					<div  style="background-color: #A9A9A9" class="form-group">
						<label><small class="font-bold">Person in charge</small></label>
						<div style="background-color: #E6E6FA"><?php echo $key['contact_person'] ?></div>
					</div>
				</div>
				<?php } ?>
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
			placeholder: 'Type blog content here...',
			height: 250,
		});
	</script>
