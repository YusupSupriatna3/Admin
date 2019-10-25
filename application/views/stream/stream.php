			<?php
			if (!empty($this->session->flashdata('msg'))) {
				$message = $this->session->flashdata('msg');
				?>
				<div class="alert alert-<?php echo $message['class']?>" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center><?php echo $message['message'] ?></center>
				</div>
			<?php } ?>
			<div class="d-flex v-center">
				<div class="title">Videos</div>
				<a href="<?php echo base_url() ?>stream-add" class="btn btn-app btn-sm d-flex v-center ml-auto"><i class="material-icons">add</i>Add Videos</a>
			</div>
			<div class="content py-5">
				<div class="d-md-flex mb-3">
					<div class="ml-auto">
						<input onkeyup="cari()" type="text" class="form-control input-app" name="search_text" id="search_text" placeholder="Search...">
					</div>
				</div>

				<div class="row mx-0 mb-5">
					<?php $no=0; 
					foreach ($list as $key ) {
						$id = $key['id_streams']; 
					?>
						<div class=" stream col-lg-2 col-md-6 col-6 px-1 mb-3 ">
							<div class="game">
								<!-- <input type="hidden" class="hide" name="idStream" value="<?php echo $key['id_streams'];?>"> -->
								<div class="game-cover" onclick="streamsDel(<?php echo $no; ?>)">
									<!-- <div class="hide" hidden><?php echo $this->dataencryption->enc_dec('encrypt',$key['id_streams']); ?></div> -->
									<?php if (substr($key['thumbnail_streams'], 0,4)=='http'){ ?>
										<img class="w-100" src="<?php echo $key['thumbnail_streams'];?>">
									<?php }else{?>
										<img class="w-100" src="<?php echo 'https://www.padiplay.com/'.$key['thumbnail_streams'];?>">
									<?php } ?>
									<div class="option">
										<div class="dropdown">
											<div class="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</div>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item d-flex v-center" href="<?php echo base_url() ?>stream/stream_detail/<?php echo $this->dataencryption->enc_dec('encrypt',$id); ?>"><i class="material-icons mr-2">info_outline</i>Detail</a>
												<a class="dropdown-item d-flex v-center" href="<?php echo base_url() ?>stream/stream_edit/<?php echo $this->dataencryption->enc_dec('encrypt',$id); ?>"><i class="material-icons mr-2">edit</i>Edit</a>
												<button class="dropdown-item-delete dropdown-item d-flex v-center delete"><i class="material-icons mr-2">delete</i>Delete</button>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="" id="<?php echo $no ?>" value="<?php echo $key['id_streams'] ?>">
								<div class="game-name" title="Playerunknown Battlegrounds">
									<span><?php echo strtoupper($key['name_streams']); ?></span>
								</div>
							</div>
						</div>

					<?php $no++;} ?>

				</div>

				<div class="row">
			        <div class="col">
			            <!--Tampilkan pagination-->
			            <?php echo $pagination; ?>
			        </div>
			    </div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Videos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to block this videos? </p>
				</div>
				<div class="modal-footer">
					<a id="streamDel"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">delete_outline</i> Delete</button></a>
				</div>
			</div>
		</div>
	</div>

	<!-- <script>
		$(document).ready(function(){
			var base_url = "<?php// echo base_url(); ?>";
			$("#gameId").click(function() {
			    var row = $(this).closest("div");    // Find the row
			    var id = row.find('.hide').text();
			    // var status = row.find('.hideSt').text();
			    console.log(id);
			    $("#acti").attr("href","<?php// echo base_url(); ?>stream/stream_edit_status/"+id);
			});
		});
	</script> -->