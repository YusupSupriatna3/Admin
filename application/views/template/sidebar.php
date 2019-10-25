<body>
	<div class="wrapper-app">
		<div class="wrapper-navmain">
			<div class="logo">
				<img src="<?php echo base_url() ?>assets/img/logo2.png" class="logo-img">
			</div>
			<div class="navigation">
				<a href="<?php echo base_url() ?>" class="nav-link-app">
					<i class="material-icons">dashboard</i>
				</a>
				<a class="nav-link-app active" id="menu">
					<i class="material-icons">menu</i>
				</a>
				<a class="nav-link-app" id="notifications">
					<i class="material-icons">notifications</i>
				</a>
				<a class="nav-link-app" id="search">
					<i class="material-icons">search</i>
				</a>
			</div>
			<div class="profile">
				<div class="profile-menu">
					<div class="info">
						<div class="name mb-3">
							<!-- <small class="badge-app">Super Admin</small> -->
							<p class="m-0"><?php echo $this->session->userdata('name'); ?></p>
						</div>
						<ul>
							<li><a href="<?php echo base_url() ?>profile/<?php echo $this->dataencryption->enc_dec('encrypt',$this->session->userdata('admin_id')); ?>">Profile</a></li>
							<!-- <li><a href="<?php echo base_url() ?>setting">Setting</a></li> -->
							<li>
								<a href="<?php echo base_url() ?>logout" class="d-flex">
									<i class="material-icons mr-1">exit_to_app</i> 
									Logout
								</a>
							</li>
						</ul>
					</div>
				</div>
				<?php if (substr($this->session->userdata('logo'), 0,4)=='http'){ ?>
					<img src="<?php echo $this->session->userdata('logo');?>" class="profile-img">
				<?php }else{?>
					<img src="<?php echo 'https://www.padiplay.com/admin/'.$this->session->userdata('logo');?>" class="profile-img">
				<?php } ?>
			</div>
		</div>
		<div class="wrapper-navsecond menu">
			<div class="title d-flex v-center d-md-none">
				<div>Profile</div>
				<div class="btnClose ml-auto"><i class="material-icons">arrow_back</i></div>
			</div>
			<div class="profile-mobile d-flex d-md-none">
				<div class="avatar-mobile">
					<img src="<?php echo 'https://www.padiplay.com/admin/'.$this->session->userdata('logo');?>" class="profile-img">
				</div>
				<div class="name-mobile">
					<span><?php echo $this->session->userdata('name'); ?></span>
				</div>
			</div>
			<div class="px-4 mt-2 d-block d-md-none">
				<a href="<?php echo base_url() ?>profile/<?php echo $this->dataencryption->enc_dec('encrypt',$this->session->userdata('admin_id')); ?>" class="btn btn-app btn-sm btn-block">Profile</a>
			</div>
			<div class="title d-flex v-center">
				<div>Menu</div>
				<div class="btnClose ml-auto d-none d-md-block"><i class="material-icons">arrow_back</i></div>
			</div>
			<div class="navigation">
				<a href="<?php echo base_url() ?>" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='dashboard'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">dashboard</i>
					<span>Dashboard</span>
				</a>
				<a class="nav-link-app d-flex v-center dropdown <?php if ($this->uri->segment(1)=='users'||$this->uri->segment(1)=='casters'||$this->uri->segment(1)=='admin'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" data-toggle="collapse" href="#casterCollapse" aria-expanded="false">
					<i class="material-icons mr-3">person</i>
					<span>Users</span>
				</a>
				<div class="collapse <?php if ($this->uri->segment(1)=='users'||$this->uri->segment(1)=='casters'||$this->uri->segment(1)=='admin'): ?>
								<?php echo "show"; ?>
							<?php endif ?>" id="casterCollapse">
					<div class="collapse-content">
						<ul>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='users'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url() ?>users">User</a></li>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='casters'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url() ?>casters">Caster</a></li>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='admin'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url() ?>admin">Admin</a></li>
						</ul>
					</div>
				</div>
				<a class="nav-link-app d-flex v-center dropdown <?php if ($this->uri->segment(1)=='games'||$this->uri->segment(1)=='category'||$this->uri->segment(1)=='platform'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" data-toggle="collapse" href="#gameCollapse" aria-expanded="false">
					<i class="material-icons mr-3">videogame_asset</i>
					<span>Game</span>
				</a>
				<div class="collapse <?php if ($this->uri->segment(1)=='games'||$this->uri->segment(1)=='category'||$this->uri->segment(1)=='platform'): ?>
								<?php echo "show"; ?>
							<?php endif ?>" id="gameCollapse">
					<div class="collapse-content">
						<ul>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='games'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url()?>games">Game List</a></li>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='category'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url()?>category">Category</a></li>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='platform'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url()?>platform">Platform</a></li>
						</ul>
					</div>
				</div>
				<a href="<?php echo base_url() ?>tournament" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='tournament'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">group_work</i>
					<span>Tournament</span>
				</a>
				<a href="<?php echo base_url() ?>liveStream" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='liveStream'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">live_tv</i>
					<span>Live Stream</span>
				</a>
				<a href="<?php echo base_url() ?>stream" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='stream'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">live_tv</i>
					<span>Videos</span>
				</a>
				<a href="<?php echo base_url() ?>blog" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='blog'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">book</i>
					<span>Blog</span>
				</a>
				<a href="<?php echo base_url() ?>banner" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='banner'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">book</i>
					<span>Banner</span>
				</a>
				<a class="nav-link-app d-flex v-center dropdown <?php if ($this->uri->segment(1)=='users'||$this->uri->segment(1)=='casters'||$this->uri->segment(1)=='admin'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" data-toggle="collapse" href="#programCollapse" aria-expanded="false">
					<i class="material-icons mr-3">book</i>
					<span>Program</span>
				</a>
				<div class="collapse <?php if ($this->uri->segment(1)=='program'||$this->uri->segment(1)=='voucher'): ?>
								<?php echo "show"; ?>
							<?php endif ?>" id="programCollapse">
					<div class="collapse-content">
						<ul>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='program'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url() ?>program">Program</a></li>
							<li><a class="nav-link-app <?php if ($this->uri->segment(1)=='voucher'): ?>
								<?php echo "active"; ?>
							<?php endif ?>" href="<?php echo base_url() ?>voucher">Voucher</a></li>
						</ul>
					</div>
				</div>
				<a href="<?php echo base_url() ?>about" class="nav-link-app d-flex v-center <?php if ($this->uri->segment(1)=='about'): ?>
								<?php echo "active"; ?>
							<?php endif ?>">
					<i class="material-icons mr-3">contact_support</i>
					<span>About</span>
				</a>
			</div>
		</div>
		<div class="wrapper-navsecond notifications">
			<div class="title d-flex v-center">
				<div>Notifications</div>
				<div class="btnClose ml-auto"><i class="material-icons">arrow_back</i></div>
			</div>
			<div class="navigation">
				<a href="#" class="nav-link-app">
					<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit</div>
					<div class="date">23 July 2019 <span class="time">18:00</span></div>
				</a>
			</div>
		</div>
		<div class="wrapper-content">
			<div class="search">
				<input type="input" class="form-control" name="search" placeholder="Search">
				<span class="closeSearch"><i class="material-icons">close</i></span>
			</div>