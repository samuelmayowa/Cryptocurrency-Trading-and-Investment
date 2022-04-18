<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo e($settings->site_name); ?> | <?php echo e($title); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="icon" href="<?php echo e(asset('dash/img/icon.ico')); ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('dash/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../dash/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/bootstrap.min.css')); ?>">
	
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/atlantis.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/customs.css')); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	
</head>
<body data-background-color="dark">
    <!--PayPal-->
    <script>
    
    // Add your client ID and secret
    var PAYPAL_CLIENT = '<?php echo e($settings->pp_ci); ?>';
    var PAYPAL_SECRET = '<?php echo e($settings->pp_cs); ?>';
    
    // Point your server to the PayPal API
    var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';

    </script>
    
    <script
    src="https://www.paypal.com/sdk/js?client-id=<?php echo e($settings->pp_ci); ?>">
  </script>
  
  <!--/PayPal-->
	
<!--Start of Tawk.to Script-->
<script type="text/javascript">
{<?php echo $settings->tawk_to; ?>}

</script>
<!--End of Tawk.to Script-->
<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				<a href="/" class="logo" style="font-size: 27px">
					<?php echo e($settings->site_name); ?>

				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<?php if(Auth::user()->type =='0'): ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								
								
								<li>
									<a class="see-all" href="<?php echo e(url('dashboard/notification')); ?>">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<?php endif; ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">KYC</span>
									<span class="subtitle op-8">Check your KYC Status</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
										<?php if($settings->enable_kyc =="yes"): ?>
										<?php if(Auth::user()->account_verify=='Verified'): ?>	
										<a href="#" class="col-12 p-0"" ><i class="glyphicon glyphicon-ok"></i> KYC status: Account verified</a>
										<?php else: ?>
										<a href="#" data-toggle="modal" data-target="#verifyModal">Verify Account</a> | <a>KYC status: <?php echo e(Auth::user()->account_verify); ?></a>
										<?php endif; ?>
										<?php endif; ?>
										<!-- <?php if($settings->enable_kyc =="yes"): ?>
										<?php if(Auth::user()->account_verify=='Verified'): ?>	
											<a class="col-12 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-user-2"></i>
													<span class="text">KYC Status:Verified</span>
												</div>
											</a>
										<?php else: ?>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Verify Account</span>
													<span>KYC status: <?php echo e(Auth::user()->account_verify); ?></span>
												</div>
											</a>
										<?php endif; ?>
										<?php endif; ?> -->
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-user"></i>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<a class="dropdown-item" href="<?php echo e(url('dashboard/changepassword')); ?>">Change Password</a>
										<a class="dropdown-item" href="<?php echo e(url('dashboard/accountdetails')); ?>">Update Account</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Logout
											</a>
										<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
											<?php echo e(csrf_field()); ?>

										</form>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo e(Auth::user()->name); ?>

									<span class="user-level"><?php echo e($settings->site_name); ?> User</span>
									<span class="caret"></span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="<?php echo e(url('/dashboard')); ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#bases">
								<i class="fas fa-user"></i>
								<p>Account</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="bases">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('dashboard/accountdetails')); ?>">
											<span class="sub-item">Update Account</span>
										</a>
									</li>
									<?php if(Auth::user()->type =='0'): ?>
									<li>
										<a href="<?php echo e(url('dashboard/notification')); ?>">
											<span class="sub-item">Notifications</span>
										</a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
						</li>
						<?php if(Auth::user()->type =='0'): ?>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/support')); ?>">
								<i class="fa fa-life-ring" aria-hidden="true"></i>
								<p>Support</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/tradinghistory')); ?>">
								<i class="fa fa-briefcase " aria-hidden="true"></i>
								<p>Transaction (ROI) log</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#dept">
								<i class="fas fa-credit-card"></i>
								<p>Deposit/Withdrawal</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dept">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('dashboard/deposits')); ?>">
											<span class="sub-item">Deposits</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('dashboard/withdrawals')); ?>">
											<span class="sub-item">Withdrawal</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/subtrade')); ?>">
								<i class="fa fa-th" aria-hidden="true"></i>
								<p>Subscription Trade</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#mpack">
								<i class="fas fa-cubes"></i>
								<p>Packages</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="mpack">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('dashboard/mplans')); ?>">
											<span class="sub-item">Investment Plans</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('dashboard/myplans')); ?>">
											<span class="sub-item">My Packages</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<?php endif; ?>
						
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/referuser')); ?>">
								<i class="fa fa-recycle " aria-hidden="true"></i>
								<p>Refer Users</p>
							</a>
						</li>

						<?php if(Auth::user()->type =='1' or Auth::user()->type =='2'): ?>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/plans')); ?>">
								<i class="fas fa-cubes " aria-hidden="true"></i>
								<p>Investment Plans</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/manageusers')); ?>">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
								<p>Manage Users</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#mdw">
								<i class="fas fa-credit-card"></i>
								<p>Manage D/W</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="mdw">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('dashboard/mdeposits')); ?>">
											<span class="sub-item">Manage Deposit</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('dashboard/mwithdrawals')); ?>">
											<span class="sub-item">Manage Withdrawal</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/agents')); ?>">
								<i class="fa fa-users " aria-hidden="true"></i>
								<p>View Agents</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/settings')); ?>">
								<i class=" fa fa-cog" aria-hidden="true"></i>
								<p>Settings</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/msubtrade')); ?>">
								<i class="fa fa-sync-alt" aria-hidden="true"></i>
								<p>Manage Subscription</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo e(url('dashboard/frontpage')); ?>">
								<i class="fa fa-sitemap" aria-hidden="true"></i>
								<p>Front Page Setup</p>
							</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

				
		<!-- Verify Modal -->

		<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-dark">
						<h5 class="modal-title text-white" style="text-align:center;">KYC verification - Upload documents below to get verified.</h5>
							<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body bg-dark">
							<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@savevdocs')); ?>"  enctype="multipart/form-data">
								<label class="text-white">Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
								<input type="file" class="form-control" name="id" required><br>
								<label class="text-white">Passport photogragh</label>
								<input type="file" class="form-control" name="passport" required><br>
								
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-light" value="Submit documents">
					   	</form>
					</div>
				</div>
			</div>
		</div>
			<!-- /Verify Modal -->
