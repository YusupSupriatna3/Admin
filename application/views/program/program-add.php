
			<div class="title">Add Program</div>
			<div class="content py-5">
				<div class="col-lg-12 col-md-12 col-12">
					<form method="POST" action="<?php echo base_url()?>program-add">
						<div class="form-group mb-3">
							<label class="mb-0"><small>Program Name</small></label>
							<input type="text" class="form-control" name="program_name" id="program_name" value="">
						</div>
						<div class="mb-3">
							<label class="mb-0"><small>Pic</small></label>
							<input type="text" class="form-control" name="pic" id="pic" value="">
						</div>
						<div class="mb-3">
							<label class="mb-0"><small>Payment Channel</small></label><br>
							<input type="radio" name="is_payment" id="is_payment" value="Y"> Y &nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="radio" name="is_payment" id="is_payment" value="N"> N
						</div>
						<div class="col-md-12">
							<?php $no=0; foreach ($payment as $key): ?>
								<label class="radio-dicipline">
									<input type="radio" name="is_game_program" value="<?php echo $key['payment_channel_code']; ?>">
									<img width="100px;" src="<?php echo 'https://reservation2.padiciti.com/padiciti-loyalty-service'.$key['payment_image'] ?>">
								</label>
							<?php $no++; endforeach ?>
						</div>
						<!-- <div class="mb-3">
							<select class="form-control" name="is_payment_program">
								<?php foreach ($payment as $key): ?>
									<option value="<?php echo $key['payment_channel_code'] ?>"><?php echo $key['payment_channel'] ?></option>
								<?php endforeach ?>
							</select>
						</div> -->
						<div class="mb-3">
							<label class="mb-0"><small>Game</small></label><br>
							<input type="radio" name="is_game" id="is_game" value="Y"> Y &nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="radio" name="is_game" id="is_game" value="N"> N
						</div>
						<div class="col-md-12">
							<?php $no=0; foreach ($game as $key): ?>
								<label class="radio-dicipline">
									<input type="radio" name="is_game_program" value="<?php echo $key['game_id']; ?>">
									<img width="100px;" src="<?php echo $key['logo'] ?>">
								</label>
							<?php $no++; endforeach ?>
						</div>
						<div class="mb-3">
							<label class="mb-0"><small>Tournament</small></label><br>
							<input type="radio" name="is_event" id="is_event" value="Y"> Y &nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="radio" name="is_event" id="is_event" value="N"> N
						</div>
						<div class="col-md-12">
							<?php $no=0; foreach ($tournament as $key): ?>
								<label class="radio-dicipline">
									<input type="radio" name="is_event_program" value="<?php echo $key['tournament_id']; ?>">
									<img width="100px;" src="<?php echo $key['logo_original'] ?>">
								</label>
							<?php $no++; endforeach ?>
						</div>
						<!-- <div class="mb-3">
							<label class="mb-0"><small>Tournament</small></label>
							<input type="text" class="form-control" name="is_event_program" id="is_event_program" value="">
						</div> -->
						<div class="mb-3">
							<label class="mb-0"><small>Description</small></label>
							<textarea style="width: 450px" name="description"></textarea>
						</div>
						<div class="mt-3">
							<button type="submit" name="btn-add" class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">add</i> Add Program</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- end wrapper-app -->

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
	</script>
</body>
</html>