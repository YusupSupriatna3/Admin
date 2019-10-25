
			<div class="title">User</div>
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
					<div class="mb-3 mb-md-0">
						<select onchange="filter()" id="filter" class="form-control select-app">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
					<div class="ml-auto">
						<input onkeyup="cariUser()" id="search_text" type="text" class="form-control input-app" name="search" placeholder="Search...">
					</div>
				</div>
				<table class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>User Name</th>
							<th>Country</th>
							<th>Register Date</th>
							<th>Email</th>
							<th>Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody id="result">
					<?php foreach ($users as $key): ?>
						<tr class="users-data">
						<td nowrap><?php echo $key['last_name']; ?>
							<span hidden><?php echo strtoupper($key['last_name']); ?></span>
						</td>
						<td><?php echo $key['country_name']; ?>
							<span hidden><?php echo strtoupper($key['country_name']); ?></span>
						</td>
						<td nowrap><?php echo $key['created_date']; ?>
							<span hidden><?php echo strtoupper($key['created_date']); ?></span>
						</td>
						<td class="users-email"><?php echo strtoupper($key['email_user']); ?></td>
						<td class="users-status"><?php echo strtoupper($key['status_activation']); ?></td>
						<td class="d-flex justify-content-center">
							<button class="btn btn-outline-delete btn-sm d-flex v-center mr-2" title="block"><i class="material-icons">block</i></button>
							<a href="<?php echo base_url()?>users-detail/<?php echo $this->dataencryption->enc_dec('encrypt',$key['email_user']); ?>"><button class="btn btn-outline-info btn-sm d-flex v-center" title="info"><i class="material-icons">info_outline</i></button></a>
						</td>
					</tr>
					<?php endforeach ?>
					</tbody>
				</table>
				<br>
					<?php 
						echo $this->pagination->create_links();
					?>
				<!-- <div id='pagination'></div>	 -->
				<!-- <ul class="pagination"> -->
					<!-- <li><a href="" class="disabled"><i class="material-icons">chevron_left</i></a></li>
					<li><a href="" class="active">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="" class="dot">...</a></li>
					<li><a href="">100</a></li>
					<li><a href="">101</a></li>
					<li><a href=""><i class="material-icons">chevron_right</i></a></li> -->
					<?php //echo $links; ?>
				<!-- </ul> -->

			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><span id="statusadmin">Deactived</span> User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to <span id="statusadmin1">Deactived</span> this user ?</p>
				</div>
				<div class="modal-footer">
					<a id="depan"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> <span id="statusadmin2">Deactived</span></button></a>
				</div>
			</div>
		</div>
	</div>
	<!-- script -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		});
	</script>
	<script type="text/javascript">
		function cariUser(){
			var status = $("#search_text").val();
			var text = status.toUpperCase();
			$(".users-data").hide();
			$('.users-data:contains("'+text.toUpperCase()+'")').show();
		}

		function filter(){
			var filter = $("#filter").val();
			console.log(filter);
			$("#result").empty();
			$.ajax({
				url:'<?php echo base_url()?>Users/index',
			    method: 'post',
			    data: {no: filter},
			    dataType: 'html',
				success: function(response){
					 $(response).find("#result").html(response); 
					// $("#result").html('tbody',response);
					console.log(response);
				}
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$(".users-data").click(function() {
			    var $row = $(this).closest("tr");    // Find the row
			    var $status = $row.find(".users-status").text(); // Find the text
			    var $email = $row.find(".users-email").text();
			    if ($status=='ACTIVE') {
					$('#statusadmin').text("Deactived");
					$('#statusadmin1').text("deactived");
					$('#statusadmin2').text("Deactived");
				}else{
					$('#statusadmin').text("Actived");
					$('#statusadmin1').text("actived");
					$('#statusadmin2').text("Actived");
				}
			    $("#depan").attr("href","<?php echo base_url(); ?>users/users_deactive/"+$email+'/'+$status);
			});
		})
	</script>
</body>
</html>