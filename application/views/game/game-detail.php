
			<div class="d-flex v-center">
				<div class="title">Game Detail</div>
			</div>
			<?php foreach ($game_detail as $key): ?>
				<div class="content py-5">
					<div class="game-detail mb-3">
						<div class="row">
							<div class="col-md-12 col-lg-3 game-image mb-3 mb-lg-0">
								<?php if (substr($key['logo'], 0,4)=='http'){ ?>
									<img src="<?php echo $key['logo']; ?>" class="w-100">
								<?php }else{?>
									<img src="<?php echo base_url().$key['logo']; ?>" class="w-100">
								<?php } ?>
							</div>
							<div class="col-md-12 col-lg-9">
								<div class="cover mb-2">
									<?php if (substr($key['logo'], 0,4)=='http'){ ?>
										<img src="<?php echo $key['logo'] ?>" class="w-100">
									<?php }else{?>
										<img src="<?php echo base_url().$key['logo'] ?>" class="w-100">
									<?php } ?>
								</div>
								<div class="d-flex">
									<div class="game-icon mr-2">
										<?php if (substr($key['logo'], 0,4)=='http'){ ?>
										<img src="<?php echo $key['logo'] ?>">
										<?php }else{?>
										<img src="<?php echo base_url().$key['logo'] ?>">
										<?php } ?>
									</div>
									<div>
										<div class="font-bold"><?php echo $key['full_name']; ?></div>
										<div><?php foreach ($platform_game_id as $key1): ?>
											<?php echo $key1['platform_name']; ?>
										<?php endforeach ?></div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt-5 d-flex">
							<a href="<?php echo base_url() ?>game-edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['game_id']); ?>"class="btn btn-app edit btn-sm d-flex v-center"><i class="material-icons mr-1">edit</i> Edit</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div><!-- end wrapper-app -->

	<!-- script -->
	