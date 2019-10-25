
			<div class="content py-5">
				<?php foreach ($detail as $key) { ?>
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group m-0">
						<h3><?php echo $key['title']; ?></h3>
					</div>
					<div class="form-group mb-5">
						<div><?php echo $key['category']; ?></div>
					</div>
					<div class="mb-3">
						<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['url_blog'] ?>" alt="your image" class="blog-img" />
					</div>
					<div class="form-group">
						<?php echo $key['desc_blog']; ?>
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
