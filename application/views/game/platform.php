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
				<div class="title">Platform</div>
				<a href="<?php echo base_url() ?>platform-add" class="btn btn-app btn-sm d-flex v-center ml-auto"><i class="material-icons">add</i>Add Platform</a>
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
						<input type="text" class="form-control input-app" id="search_text" onkeyup="cariPlatform()" name="search" placeholder="Search...">
					</div>
				</div>
				<table class="table table-main table-responsive-lg">
					<thead>
						<tr>
							<th>Platform Id</th>
							<th>Platform Name</th>
							<!-- <th>Created Date</th> -->
							<!-- <th>Status</th>
							<th class="text-center">Action</th> -->
						</tr>
					</thead>
					<tbody>
						<?php foreach ($platform as $key): ?>
							<?php if ($key!=NULL): ?>
								<tr class="platform">
									<td><?php echo $key['platform_id']; ?></td>
									<td><?php echo $key['platform_name']; ?></td>
									<span hidden><?php echo strtoupper($key['platform_name']); ?></span>
									<!-- <td nowrap>30 Januari 2019</td> -->
									<!-- <td>Aktif</td>
									<td class="d-flex justify-content-center">
										<button class="btn btn-outline-delete btn-sm d-flex v-center mr-2" title="Deactived"><i class="material-icons">block</i></button>
									</td> -->
								</tr>
							<?php else: ?>
								<tr>
									<td colspan="3"><?php echo "No Data"; ?></td>
									<!-- <td></td>
									<td></td> -->
								</tr>
							<?php endif ?>
						<?php endforeach ?>
					</tbody>
				</table>
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
					<h5 class="modal-title">Deactived Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to deactived this category</p>
				</div>
				<div class="modal-footer">
					<a href="<?php echo base_url() ?>platform-deactive"><button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> Deactived</button></a>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
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
		function cariPlatform(){
			var status = $("#search_text").val();
			var text = status.toUpperCase();
			$(".platform").hide();
			$('.platform:contains("'+text.toUpperCase()+'")').show();
		}
	</script>
</body>
</html>
