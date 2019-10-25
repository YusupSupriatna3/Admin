		<form action="<?php echo base_url(); ?>liveStream/proses_edit_liveStream/<?php echo $this->dataencryption->enc_dec('encrypt',$edit[0]['id']); ?>" method="POST" enctype="multipart/form-data">
			<?php
			$photo = $edit[0]['thumbnail'];
			if (!empty($this->session->flashdata('msg'))) {
				$message = $this->session->flashdata('msg');
				?>
				<div class="alert alert-<?php echo $message['class']?>" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center><?php echo $message['message'] ?></center>
				</div>
			<?php } ?>
			<div class="title">Edit Chanel Live Streaming</div>
			<div class="content py-5">
				<?php foreach ($edit as $key ) {  
					$dateStarted = substr($key['start_date'],0,10) ;
					$timeStarted = substr($key['start_date'],10,9) ;
					$dateEnd     = substr($key['end_date'],0,10) ;
					$timeEnd     = substr($key['end_date'],10,6) ;
					$startD 	 = strtotime($timeStarted); 
					$endD 		 = strtotime($timeEnd);
					
				?>
				<div class="col-lg-8 col-md-12 col-12 p-0">
					<div class="form-group mb-3">
						<label class="m-0"><small>Channel ID</small></label>
						<input type="text" class="form-control blog-title" name="chanel_id" id="chanel_id" placeholder="Chanel ID" value="<?php echo $key['chanel_id'] ?>" autofocus>
					</div>
					<div class="mb-3">
						<label class="mb-0"><small>Thumbnail Stream</small></label>
						<div class="mb-2 img-wrapper">
							<img id="imgPrev" src="<?php echo 'https://www.padiplay.com/'.$key['thumbnail'] ?>" alt="your image" class="blog-img" />
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
						<label class="m-0"><small>Name Stream</small></label>
						<input type="text" class="form-control" name="name_stream" id="name_stream" placeholder="Name Stream" value="<?php echo $key['name_stream'] ?>">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Publisher Name</small></label>
						<input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher Name" value="<?php echo $key['publisher'] ?>">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Start Date for Stream</small></label>
						<div class="input-group-append">
							<input type="date" class="form-control" name="startDate" id="startDate" placeholder="" value="<?php echo $dateStarted ?>">
							<input type="time" class="form-control" name="timeStart" id="reg_time_open"
										value="<?php echo date("h:i", $startD);	?>" >
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>End Date for Stream</small></label>
						<div class="input-group-append">
							<input type="date" class="form-control" name="endDate" id="endDate" placeholder="" value="<?php echo $dateEnd ?>">
							<input type="time" class="form-control" name="timeEnd" id="reg_time_open"
										value="<?php echo date("h:i", $endD);	?>" >
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>URL Stream</small></label>
						<input type="text" class="form-control" name="url" id="url" placeholder="URL" value="<?php echo $key['url_stream'] ?>">
					</div>
					<div class="form-group mb-3">
						<label class="m-0"><small>Person in charge</small></label>
						<input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Person" value="<?php echo $key['contact_person'] ?>">
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
