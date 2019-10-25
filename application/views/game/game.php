			<div class="d-flex v-center">
				<div class="title">Game</div>
				<a href="<?php echo base_url() ?>game-add"  class="btn btn-app btn-sm d-flex v-center ml-auto"><i class="material-icons">add</i>Add Game</a>
			</div>
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
				<div class="d-md-flex mb-3">
					<div class="ml-auto">
						<input type="text" class="form-control input-app" onkeyup="cariGame()" id="search_text" name="search" placeholder="Search...">
					</div>
				</div>
				<div class="row mx-0 mb-5">
				<?php if (!empty($game)) {?>
					<?php $no=0; foreach ($game as $key): ?>
						<div class="col-lg-2 col-md-6 col-6 px-1 mb-3 game-search">
							<div class="game">
								<div class="game-cover" onclick="ubahhref(<?php echo $no; ?>)">
									<?php if (substr($key['logo'], 0,4)=='http'){ ?>
										<img class="w-100" src="<?php echo $key['logo'] ?>">
									<?php }else{?>
										<img class="w-100" src="<?php echo 'https://www.padiplay.com/'.$key['logo'] ?>">
									<?php } ?>
									<div class="option">
										<div class="dropdown">
											<div class="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</div>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a href="<?php echo base_url() ?>game-detail/<?php echo $this->dataencryption->enc_dec('encrypt',$key['game_id']); ?>"><button class="dropdown-item d-flex v-center"><i class="material-icons mr-2">info_outline</i>Detail</button></a>
												<a href="<?php echo base_url() ?>game-edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['game_id']); ?>"><button class="dropdown-item d-flex v-center"><i class="material-icons mr-2">edit</i>Edit</button></a>
												<button id="btn-outline-delete" class="dropdown-item d-flex v-center delete"><i class="material-icons mr-2">delete</i>Delete</button>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="" id="<?php echo $no ?>" value="<?php echo $key['game_id'] ?>">
								<div class="game-name" title="Playerunknown Battlegrounds">
									<span><?php echo $key['full_name']; ?></span>
								</div>
								<span hidden><?php echo strtoupper($key['full_name']); ?></span>
							</div>
						</div>
					<?php $no++; endforeach ?>
				<?php } ?>
				</div>
				<br>
					<?php 
						echo $this->pagination->create_links();
					?>
				<!-- <ul class="pagination">
					<li><a href="" class="disabled"><i class="material-icons">chevron_left</i></a></li>
					<li><a href="" class="active">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="" class="dot">...</a></li>
					<li><a href="">100</a></li>
					<li><a href="">101</a></li>
					<li><a href=""><i class="material-icons">chevron_right</i></a></li>
				</ul> -->
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Game</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to delete this game ?</p>
				</div>
				<div class="modal-footer">
					<a id="depan"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-2">delete</i> Delete</button></a>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	
	<!-- <script>
		$('#btn-outline-delete').on('click', function(){
			$('.modalBlock').modal('show');
		});
	</script> -->
	<script type="text/javascript">
		function cariGame()
		{
			var status = $("#search_text").val();
			var text = status.toUpperCase();
			console.log(text);
			$(".game-search").hide();
			$('.game-search:contains("'+text.toUpperCase()+'")').show();
		}
	</script>

	

</html>