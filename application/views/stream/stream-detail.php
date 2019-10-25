
			<div class="content py-5">
				<?php foreach ($detail as $key) { ?>
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-5">
						<h3><?php echo $key['name_streams']; ?></h3>
					</div>
					<div class="mb-4">
						<?php if (substr($key['thumbnail_streams'], 0,4)=='http'){ ?>
							<img id="imgPrev" src="<?php echo $key['thumbnail_streams'];?>" alt="your image" class="blog-img" />
						<?php }else{?>
							<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['thumbnail_streams'];?>" alt="your image" class="blog-img" />
						<?php } ?>
					</div>
					<div class="form-group">
						<label class="m-0"><small>Channel ID</small></label>
						<div class="d-flex v-center font-bold">
							<i class="material-icons mr-2" title="Channel ID">videocam</i> <span>UC-VLq0kfYLhFb_1BtWq0kja</span>
						</div>
					</div>
					<div class="form-group">
						<label class="m-0"><small>URL</small></label>
						<div class="d-flex v-center font-bold">
							<i class="material-icons mr-2" title="URL">link</i> <span><?php echo $key['url_streams'] ?></span>
						</div>
					</div>
					<div class="form-group">
						<label><small class="font-bold">Desciption</small></label>
						<div><?php echo $key['desc_streams'] ?></div>
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
