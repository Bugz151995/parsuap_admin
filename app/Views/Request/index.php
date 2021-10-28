<!-- MAIN CONTENT CONTAINER -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-check icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>User Request
						<div class="page-title-subheading">Welcome to the User Request page, here you can see the summary of the users, and other system functionalities.
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
		<div class="row">
			<div class="col-auto">
				<?= $pager->links() ?>
			</div>
		</div>

		<!-- TABLE -->
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">User Request List
						<div class="btn-actions-pane-right">
							<div role="group" class="btn-group-sm btn-group">
								<button class="active btn btn-focus">Last Week</button>
								<button class="btn btn-focus">All Month</button>
							</div>
						</div>
					</div>
					<div class="table">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Name</th>
									<th class="text-center">Requested @</th>
									<th class="text-center">Batch Type</th>
									<th class="text-center">Batch Year</th>
									<th class="text-center">Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($accounts) > 0): ?>
								<?php foreach($accounts as $key => $account): ?>
									<tr>
										<td class="text-center text-muted">#<?= $account['alumni_id'] ?></td>

										<td>
											<div class="widget-content p-0">
												<div class="widget-content-wrapper">
													<div class="widget-content-left mr-3">
														<div class="widget-content-left">
															<img width="40" class="rounded-circle" src="<?= site_url()?>assets/images/avatars/4.jpg" alt="">
														</div>
													</div>
													<div class="widget-content-left flex2">
														<div class="widget-heading"><?= $account['fname'].' '.$account['lname'] ?></div>
														<div class="widget-subheading opacity-7"><?= $account['email'] ?></div>
													</div>
												</div>
											</div>
										</td>

										<td class="text-center"><?= $account['request_at'] ?></td>

										<td class="text-center">										
											<?php if($account['batch_type'] == 'college'): ?>
												<div class="badge badge-info">College</div>
											<?php elseif($account['batch_type'] == 'high_school'): ?>
												<div class="badge badge-alternate">High School</div>
											<?php else: ?>
												<div class="badge badge-focus">Both</div>
											<?php endif ?>
										</td>

										<td class="text-center">
											<?php foreach($a_batch as $key => $batch): ?>
												<?php if($batch['alumni_id'] == $account['alumni_id']): ?>
														<button class="btn-transition btn btn-outline-light">
														<?= $batch['batch_year']?>
														</button>
												<?php endif?>
											<?php endforeach ?>
										</td>

										<td class="text-center">
											<?php if($account['status'] == 0): ?>
												<div class="badge badge-warning">Pending</div>
											<?php else: ?>
												<div class="badge badge-success">Approved</div>
											<?php endif ?>
										</td>

										<td class="text-center">
											<div class="dropleft btn-group">
												<button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn btn-sm btn-primary"><span class="sr-only">Toggle Dropdown</span></button>
												<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu p-0">
														<?= form_open('request/confirm', ['class' => 'dropdown-item p-0']) ?>
														<?= csrf_field() ?>
														<?= form_hidden('a', esc($account['account_id'])) ?>
														<?= form_hidden('e', esc($account['email'])) ?>
														<?= form_hidden('action', 'approve') ?>
															<button type="submit" tabindex="0" class="btn-transition btn w-100 btn-outline-success rounded-0 border-0">
																<i class="pe-7s-check mr-2"></i> Approve
															</button>
														<?= form_close() ?>
														
														<?= form_open('request/confirm', ['class' => 'dropdown-item p-0']) ?>
														<?= csrf_field() ?>
														<?= form_hidden('a', esc($account['alumni_id'])) ?>
														<?= form_hidden('action', 'delete') ?>
															<button type="submit" tabindex="0" class="btn-transition btn w-100 btn-outline-danger rounded-0 border-0">
																<i class="pe-7s-trash mr-2"></i> Delete
															</button>
														<?= form_close() ?>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="7" class="pt-4 px-5"><div class="alert alert-danger"><strong><i class="fas fa-exclamation-triangle mr-2"></i>Oops!</strong> There are no User Request Found as of this moment.</div></td>
									</tr>
								<?php endif ?>
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