<!-- MAIN CONTENT CONTAINER -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-speaker icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Announcements
						<div class="page-title-subheading">Welcome to the Announcements page, here you can see the summary of the users, and other system functionalities.
						</div>
					</div>
				</div>
				<div class="page-title-actions">
					<button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
						<i class="fa fa-star"></i>
					</button>
					<div class="d-inline-block dropdown">
						<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
							<span class="btn-icon-wrapper pr-2 opacity-7">
								<i class="fa fa-business-time fa-w-20"></i>
							</span>
							Buttons
						</button>
						<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<i class="nav-link-icon lnr-inbox"></i>
										<span>
											Inbox
										</span>
										<div class="ml-auto badge badge-pill badge-secondary">86</div>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<i class="nav-link-icon lnr-book"></i>
										<span>
											Book
										</span>
										<div class="ml-auto badge badge-pill badge-danger">5</div>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<i class="nav-link-icon lnr-picture"></i>
										<span>
											Picture
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a disabled href="javascript:void(0);" class="nav-link disabled">
										<i class="nav-link-icon lnr-file-empty"></i>
										<span>
											File Disabled
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- PAGINATION -->
		<div class="row justify-content-between">
			<div class="col-auto">
				<?php //$pager->links() ?>
			</div>
			<div class="col-auto pb-3">
				<div class="d-flex">
					<a href="<?= site_url()?>request" class="btn pb-0 btn-focus rounded-pill px-3 mr-3">
						<span class="align-middle">
							<i class="fa fa-fw" aria-hidden="true">???</i>
							Refresh List
						</span>
					</a>
					<?= form_open('request/s') ?>
					<?= csrf_field() ?>
					<div class="input-group rounded-pill bg-white shadow-sm">
						<input placeholder="Search Name..." name="s" type="text" class="form-control rounded-pill border-0 px-4">
						<span class="input-group-text rounded-pill border-0 bg-primary">
							<button type="submit" class="btn p-0 text-light">
							<i class="fas fa-search"></i>
							</button>
						</span>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>

		<!-- TABLE -->
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">Anouncement
						<div class="btn-actions-pane-right">
							<div role="group" class="btn-group-sm btn-group">
								<button class="active btn btn-focus">Last Week</button>
								<button class="btn btn-focus">All Month</button>
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Name</th>
									<th class="text-center">City</th>
									<th class="text-center">Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center text-muted">#345</td>
									<td>
										<div class="widget-content p-0">
											<div class="widget-content-wrapper">
												<div class="widget-content-left mr-3">
													<div class="widget-content-left">
														<img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
													</div>
												</div>
												<div class="widget-content-left flex2">
													<div class="widget-heading">John Doe</div>
													<div class="widget-subheading opacity-7">Web Developer</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">Madrid</td>
									<td class="text-center">
										<div class="badge badge-warning">Pending</div>
									</td>
									<td class="text-center">
										<button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
									</td>
								</tr>

								<tr>
									<td class="text-center text-muted">#347</td>
									<td>
										<div class="widget-content p-0">
											<div class="widget-content-wrapper">
												<div class="widget-content-left mr-3">
													<div class="widget-content-left">
														<img width="40" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
													</div>
												</div>
												<div class="widget-content-left flex2">
													<div class="widget-heading">Ruben Tillman</div>
													<div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">Berlin</td>
									<td class="text-center">
										<div class="badge badge-success">Completed</div>
									</td>
									<td class="text-center">
										<button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details</button>
									</td>
								</tr>

								<tr>
									<td class="text-center text-muted">#321</td>
									<td>
										<div class="widget-content p-0">
											<div class="widget-content-wrapper">
												<div class="widget-content-left mr-3">
													<div class="widget-content-left">
														<img width="40" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
													</div>
												</div>
												<div class="widget-content-left flex2">
													<div class="widget-heading">Elliot Huber</div>
													<div class="widget-subheading opacity-7">Lorem ipsum dolor sic</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">London</td>
									<td class="text-center">
										<div class="badge badge-danger">In Progress</div>
									</td>
									<td class="text-center">
										<button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details</button>
									</td>
								</tr>

								<tr>
									<td class="text-center text-muted">#55</td>
									<td>
										<div class="widget-content p-0">
											<div class="widget-content-wrapper">
												<div class="widget-content-left mr-3">
													<div class="widget-content-left">
														<img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
													</div>
												</div>
												<div class="widget-content-left flex2">
													<div class="widget-heading">Vinnie Wagstaff</div>
													<div class="widget-subheading opacity-7">UI Designer</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">Amsterdam</td>
									<td class="text-center">
										<div class="badge badge-info">On Hold</div>
									</td>
									<td class="text-center">
										<button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="d-block text-center card-footer">
						<button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
						<button class="btn-wide btn btn-success">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="app-wrapper-footer">
		<div class="app-footer">
			<div class="app-footer__inner">
				<div class="app-footer-left">
					<ul class="nav">
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link">
								Footer Link 1
							</a>
						</li>
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link">
								Footer Link 2
							</a>
						</li>
					</ul>
				</div>
				<div class="app-footer-right">
					<ul class="nav">
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link">
								Footer Link 3
							</a>
						</li>
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<div class="badge badge-success mr-1 ml-0">
									<small>NEW</small>
								</div>
								Footer Link 4
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>