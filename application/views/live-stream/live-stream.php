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
				<div class="title">Live Stream</div>
				<a href="<?php echo base_url() ?>add_stream" class="btn btn-app btn-sm d-flex v-center ml-auto"><i class="material-icons">add</i>Add Live Stream</a>
			</div>
			<div class="content py-5">
				<div class="d-md-flex mb-3">
					<div class="mb-3 mb-md-0">
						<select class="form-control select-app">
							<option>10</option>
							<option>50</option>
							<option>100</option>
						</select>
					</div>
					<div class="ml-auto">
						<input type="text" class="form-control input-app" name="search" id="search" placeholder="Search...">
					</div>
				</div>
				<table id="result" class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>Chanel ID</th>
							<!-- <th>Thumbnail Stream</th> -->
							<th >Name Stream</td>
							<th>Publisher Name</th>
							<th>Start Live Stream</th>
							<th>End Live Stream</th>
							<th>Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list as $key ) { ?>
						<tr class="filter">
							<td ><?php echo strtoupper($key['chanel_id']); ?></td>
							<td ><?php echo strtoupper($key['name_stream']); ?></td>
							<td ><?php echo strtoupper($key['publisher']); ?></td>
							<td ><?php echo strtoupper($key['start_date']); ?></td>
							<td ><?php echo strtoupper($key['end_date']); ?></td>
							<td ><?php echo strtoupper($key['status']); ?></td>
							<td class="hide" hidden><?php echo $this->dataencryption->enc_dec('encrypt',$key['chanel_id']); ?></td>
							<td class="hideSt" hidden><?php echo $key['status']; ?></td>
							<td class="d-flex justify-content-center">
								<button class="btn btn-outline-delete btn-sm d-flex v-center mr-2" title="Deactived"><i class="material-icons">block</i></button>
								<a href="<?php echo base_url() ?>liveStream/live_stream_detail/<?php echo $this->dataencryption->enc_dec('encrypt',$key['id']); ?>" class="btn btn-outline-info btn-sm d-flex v-center mr-2" title="info"><i class="material-icons">info_outline</i></a>
								<a href="<?php echo base_url() ?>liveStream/live_stream_edit/<?php echo $this->dataencryption->enc_dec('encrypt',$key['id']); ?>" class="btn btn-outline-info btn-sm d-flex v-center mr-2" title="Edit"><i class="material-icons">edit</i></a>
								
							</td>
						</tr>
					<?php } ?>
						
					</tbody>
				</table>
				<div class="row">
			        <div class="col">
			            <!--Tampilkan pagination-->
			            <!-- <?php //echo $pagination; ?> -->
			        </div>
			    </div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Inactive Stream</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to inactive this stream?</p>
				</div>
				<div class="modal-footer">
					<a id="act"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">delete_outline</i> Inactive</button></a>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	<!-- <script src="<?php echo base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/admin.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script>

	<script>

		$('.btn-outline-delete').on('click', function(){
			$('.modalBlock').modal('show');
		}),

		$("input[name='search']").keyup(function(){
			var text = $(this).val();
			var keyword = text.toUpperCase();
			$(".filter").hide();

			$('.filter:contains("'+keyword.toUpperCase()+'")').show();
		}),

		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$(".filter").click(function() {
			    var row = $(this).closest("tr");    // Find the row
			    var id = row.find('.hide').text();
			    var status = row.find('.hideSt').text();
			    $('#idBlog').val(id);
			    $("#act").attr("href","<?php echo base_url(); ?>liveStream/edit_status/"+id+"/"+status);
			});
		});

	</script>
</body>
</html>