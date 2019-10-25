
			<div class="title">Add Category</div>
			<div class="content py-5">
				<div class="col-md-6 col-12">
					<form method="POST" action="<?php echo base_url();?>category-add">
						<div class="form-group mb-3">
							<label class="mb-0"><small>Category Name</small></label>
							<input type="text" class="form-control" name="category" id="category" placeholder="Category Name">
						</div>
						<div class="mt-3">
							<button type="submit" name="btn_category" class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Category</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

	<div class="modal modalBlock fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Block Caster</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to block this caster</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger d-flex v-center"><i class="material-icons mr-1">block</i> Block</button>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	