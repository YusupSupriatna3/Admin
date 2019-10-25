
			<div class="title">Dashboard</div>
			<div class="content py-5">
				<div class="row">
					<div class="col-lg-3 col-md-12 mb-3">
						<a href="#">
							<div class="box overview">
								<div class="overview-icon user"><i class="material-icons">person</i></div>
								<div class="overview-name">Users</div>
								<div class="overview-count">
									<?php 
										if (!empty($dashboard[0]['total_user'])) {
											echo $dashboard[0]['total_user'];
										}else {
											echo "0";
										}
									?>			
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-12 mb-3">
						<a href="#">
							<div class="box overview">
								<div class="overview-icon organizer"><i class="material-icons">group</i></div>
								<div class="overview-name">Organizer</div>
								<div class="overview-count">
									<?php 
										if (!empty($dashboard[0]['total_organizer'])) {
											echo $dashboard[0]['total_organizer'];
										}else {
											echo "0";
										}
									?>			
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-12 mb-3">
						<a href="#">
							<div class="box overview">
								<div class="overview-icon caster"><i class="material-icons">mic</i></div>
								<div class="overview-name">Casters</div>
								<div class="overview-count">
									<?php 
										if (!empty($dashboard[0]['total_caster'])) {
											echo $dashboard[0]['total_caster'];
										}else {
											echo "0";
										}
									?>			
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-12 mb-3">
						<a href="#">
							<div class="box overview">
								<div class="overview-icon tournament"><i class="material-icons">group_work</i></div>
								<div class="overview-name">Tournament</div>
								<div class="overview-count">
									<?php 
										if (!empty($dashboard[0]['total_tournament'])) {
											echo $dashboard[0]['total_tournament'];
										}else {
											echo "0";
										}
									?>			
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row py-5">
					<div class="col-lg-12 col-md-12">
						<div class="graphic box mb-3 mb-lg-0">
							<h5 class="mb-4">User</h5>
							<canvas id="userChart" width="400" height="400"></canvas>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="graphic box mb-3 mb-lg-0">
							<h5 class="mb-4">Tournament</h5>
							<canvas id="tournamentChart" width="400" height="400"></canvas>
						</div>
					</div>
				</div>
				<div class="row py-5">
					<div class="col-lg-6 col-md-12 mb-4">
						<h5 class="mb-3">Popular Game</h5>
						<table class="table table-striped game">
							<thead>
								<tr>
									<th class="text-center" width="50">#</th>
									<th>Game Name</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php $count=1; foreach ($popular_game as $key): ?>
								<tr>
									<td class="text-center"><?php echo $count; ?></td>
									<td>
										<div class="d-flex v-center">
											<span class="game-icon mr-3"><img src="<?php echo $key['logo']; ?>"></span>
											<span class="font-bold"><?php echo $key['full_name']; ?></span>
										</div>
									</td>
									<td>
										<div class="d-flex v-center">
											<span class="font-bold"><?php echo $key['jumlah']; ?></span>
										</div>
									</td>
								</tr>
								<?php $count++; endforeach ?>
							</tbody>
						</table>
					</div>
					<div class="col-lg-6 col-md-12 mb-4">
						<div class="box table-review">
							<h5 class="mb-3">New Users</h5>
							<table class="table table-striped review">
								<thead>
									<tr>
										<th class="text-center" width="50">#</th>
										<th>Name</th>
										<th>Country</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php $count=1; foreach ($new_user as $key): ?>
									<tr>
										<td class="text-center"><?php echo $count; ?></td>
										<td><?php echo $key['first_name']; ?></td>
										<td><?php echo $key['country_name']; ?></td>
										<td><?php echo date($key['created_date']); ?></td>
									</tr>
									<?php $count++; endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 mb-4">
						<div class="box table-review">
							<h5 class="mb-3">New Tournament</h5>
							<table class="table table-striped review table-responsive-lg">
								<thead>
									<tr>
										<th class="text-center" width="50">#</th>
										<th>Tournament Name</th>
										<th>Country</th>
										<th>Organizer</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php $count=1; foreach ($new_toornament as $key): ?>
									<tr>
										<td class="text-center"><?php echo $count; ?></td>
										<td nowrap><?php echo $key['full_name']; ?></td>
										<td><?php echo $key['country']; ?></td>
										<td><?php echo $key['organization']; ?></td>
										<td nowrap><?php echo $key['publish_date']; ?></td>
									</tr>
									<?php $count++; endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 mb-4">
						<div class="box table-review">
							<h5 class="mb-3">New Casters</h5>
							<table class="table table-striped review">
								<thead>
									<tr>
										<th class="text-center" width="50">#</th>
										<th>Name</th>
										<th>Domisili</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php $count=1; foreach ($new_caster as $key): ?>
									<tr>
										<td class="text-center"><?php echo $count; ?></td>
										<td><?php echo $key['caster_name']; ?></td>
										<td><?php echo $key['domisili']; ?></td>
										<td><?php echo date($key['created_date']); ?></td>
									</tr>
									<?php $count++; endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	