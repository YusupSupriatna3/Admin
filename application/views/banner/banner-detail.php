
			<div class="content py-5">
				<?php foreach ($detail as $key) { ?>
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group m-0">
						<span>Order at Number : </span>
						<h3><?php echo $key['rate']; ?></h3>
					</div>
					<div class="form-group m-0">
						<span>Created Date : </span>
						<h3><?php echo $key['created_date']; ?></h3>
					</div>
					<div class="mb-3">
						<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['banner_path'] ?>" alt="your image" class="blog-img" />
					</div>
					<div class="form-group">
						<span>Description : </span>
						<?php echo $key['description']; ?>
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
