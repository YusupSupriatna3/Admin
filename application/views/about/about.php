<?php 
	if ($list==null) {
		$action = "about/about_add";
		$phoneNumber="";
		$email = "";
		$address = "";
		$youtube = "";
		$nimoTv = "";
		$twitch = "";
		$twitter = "";
		$facebook = "";
		$instagram = "";
	} else {
		$id = $this->dataencryption->enc_dec('encrypt',$list[0]['id']);
		$action = "about/about_update/".$id;
		$phoneNumber = $list[0]['phone_number'];
		$email = $list[0]['email'];
		$address = $list[0]['address'];
		$youtube = $list[0]['youtube'];
		$nimoTv = $list[0]['nimo_tv'];
		$twitch = $list[0]['twitch'];
		$twitter = $list[0]['twitter'];
		$facebook = $list[0]['facebook'];
		$instagram = $list[0]['instagram'];
	}

?>

<?php
if (!empty($this->session->flashdata('msg'))) {
	$message = $this->session->flashdata('msg');
	?>
	<div class="alert alert-<?php echo $message['class']?>" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<center><?php echo $message['message'] ?></center>
	</div>
<?php } ?>
<form action="<?php echo $action ?>" method="post">
	<div class="d-flex v-center">
		<div class="title">About</div>
	</div>
	<div class="content py-5">
		<div class="col-md-6 col-12 p-0">
			
			<div class="mb-5">
				<h5 class="font-bold">Contact Info</h5>
				<div class="form-group">
					<label class="m-0"><small>Phone Number</small></label>
					<input type="text" class="form-control" value="<?php echo $phoneNumber ?>" name="phoneNumber" id="phoneNumber">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Email</small></label>
					<input type="email" class="form-control" value="<?php echo $email ?>" name="email" id="email">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Address</small></label>
					<input type="text" class="form-control" value="<?php echo $address ?>" name="address" id="address">
				</div>
			</div>

			<div>
				<h5 class="font-bold">Social Media</h5>
				<div class="form-group">
					<label class="m-0"><small>Youtube</small></label>
					<input type="text" class="form-control" value="<?php echo $youtube ?>" name="youtube" id="youtube">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Nimo TV</small></label>
					<input type="text" class="form-control" value="<?php echo $nimoTv ?>" name="nimoTv" id="nimoTv">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Twitch</small></label>
					<input type="text" class="form-control" value="<?php echo $twitch ?>" name="twitch" id="twitch">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Twitter</small></label>
					<input type="text" class="form-control" value="<?php echo $twitter ?>" name="twitter" id="twitter">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Facebook</small></label>
					<input type="text" class="form-control" value="<?php echo $facebook ?>" name="facebook" id="facebook">
				</div>
				<div class="form-group">
					<label class="m-0"><small>Instagram</small></label>
					<input type="text" class="form-control" value="<?php echo $instagram ?>" name="instagram" id="instagram">
				</div>

				<div class="mt-3">
					<button class="btn btn-app btn-sm d-flex v-center"><i class="material-icons mr-1">save</i> Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
	