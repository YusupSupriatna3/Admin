			<div class="d-flex v-center">
				<div class="title">Add Game</div>
			</div>
			<div class="content py-5">
				<div class="game-detail mb-3">
					<form action="<?php echo base_url(); ?>game-add" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 col-lg-3">
								<div class="game-image mb-3 mb-lg-3">
									<div class="img-wrapper">
										<img class="imgPrev 03 w-100" src="<?php echo base_url() ?>assets/img/icon/default-image-2.svg"/>
										<!-- <input hidden type='file' id="03" class="d-none" accept="image/*" /> -->
										<!-- <label for="01" class="btn font-12 btnImage d-flex justify-content-center v-center"><i class="material-icons mr-1">photo_library</i> Change Image</label> -->
									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-9">
								<div class="cover mb-2">
									<div class="img-wrapper">
										<img class="imgPrev 03 w-100" src="<?php echo base_url() ?>assets/img/icon/default-image-2.svg"/>
										<!-- <input hidden type='file' id="03" class="d-none" accept="image/*" /> -->
										<!-- <label for="02" class="btn font-12 btnImage d-flex justify-content-center v-center"><i class="material-icons mr-1">photo_library</i> Change Cover</label> -->
									</div>
								</div>
								<div class="d-flex">
									<div class="game-icon mr-2">
										<div class="img-wrapper d-flex v-center">
											<img class="imgPrev 03 mr-2" src="<?php echo base_url() ?>assets/img/icon/default-image-2.svg"/>
											<input type='file' name="userfile" id="03" class="d-none" accept="image/*" />
											<label for="03" class="btn m-0 btn-app font-12 d-flex justify-content-center v-center"><i class="material-icons mr-1">photo_library</i> Change Image</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 mt-5">
								<div class="form-group">
									<label class="mb-0"><small>Copyrights</small></label>
									<input type="text" class="form-control" name="copyrights">
								</div>
								<div class="form-group">
									<label class="mb-0"><small>Game name</small></label>
									<input type="text" class="form-control" name="gameName">
								</div>

								<div class="form-group">
									<label class="mb-0"><small>Name</small></label>
									<input type="text" class="form-control" name="name">
								</div>

								<div class="form-group">
									<label class="mb-0"><small>Short name</small></label>
									<input type="text" class="form-control" name="short">
								</div>
								<div class="form-group">
									<label class="mb-0"><small>Category</small></label>
									<div class="mb-3">
										<div class="row m-0">
										<?php foreach ($category_game as $key): ?>
											<label class="checkbox-app col-md-4 col-6 mb-3"><?php echo $key['category_name']; ?>
												<input type="radio" name="category" value="<?php echo $key['category_id'] ?>">
												<span class="checkmark"></span>
											</label>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="mb-0"><small>Platform</small></label>
									<div class="mb-3">
										<div class="row m-0">
											<?php foreach ($platform_game as $key): ?>
												<label class="checkbox-app col-md-4 col-6 mb-3"><?php echo $key['platform_name']; ?>
													<input type="checkbox" name="platform[]" value="<?php echo $key['platform_id'] ?>">
													<span class="checkmark"></span>
												</label>
											<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt-5 d-flex">
							<button type="submit" name="btn_game_add" class="btn btn-app edit btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Game</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->
	<script>
		$('.img-wrapper input[type=file]').change(function(){
			var id = $(this).attr("id");
			var newimage = new FileReader();
			newimage.readAsDataURL(this.files[0]);
			newimage.onload = function(e){
				$('.imgPrev.' + id ).attr('src', e.target.result);
			}
		});
	</script>
</body>
</html>