<?php
	if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";

}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('user.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-panel bg-<?php echo e($bg); ?>">
			<div class="content bg-<?php echo e($bg); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>">Subscription Trade</h1>
					</div>
					<?php if(Session::has('message')): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> <?php echo e(Session::get('message')); ?>

							</div>
						</div>
					</div>
					<?php endif; ?>
		
					<?php if(count($errors) > 0): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissable" role="alert" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<i class="fa fa-warning"></i> <?php echo e($error); ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row mb-5">
						<div class="col-lg-8 offset-lg-2 card bg-<?php echo e($bg); ?> shadow-lg p-lg-3 p-sm-5">
						<h2 class="text-<?php echo e($text); ?>"><?php echo e($settings->site_name); ?> Account manager</h2> <br>
							<div clas="well">
							<p class="text-justify text-<?php echo e($text); ?>">Don’t have time to trade or learn how to trade? 
							Our Account Management Service is The Best Profitable Trading Option for you, 
							We can help you to manage your account in the financial MARKET with a simple subscription model.<br>
							<small>Terms and Conditions apply</small><br>Reach us at <?php echo e($settings->contact_email); ?> 
							for more info.</p>
							</div>
							<br>
							<div>
								<a type="button" class="btn btn-primary text-white mb-2" data-toggle="modal" data-target="#SubpayModal">
								Subscribe Now
								</a> &nbsp; &nbsp; &nbsp;
								<a type="button" class="btn btn-danger text-white mb-2" data-toggle="modal" data-target="#submitmt4modal">
								Submit MT4 Details
								</a>	
							</div>
							
						</div>
					</div>
					<div class="row mb-5 card shadow bg-<?php echo e($bg); ?> p-4 ">
						<div class="col-12 mb-3">
							<h1 class="text-<?php echo e($text); ?>">My MT4 List</h1>
						</div>
                        <div class="col-12">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>"> 
                                    <thead> 
                                        <tr> 
                                            <th>MT4 ID</th>
                                            <th>MT4 Password</th>
                                            <th>Account Type</th>
                                            <th>Currency</th>
                                            <th>Leverage</th>
                                            <th>Server</th>
                                            <th>Duration</th>
                                            <th>Submitted at</th>
                                            <th>Started at</th>
											<th>Expiring at</th>
											<th>Status</th>
                                            <th>Action</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                    <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($sub->mt4_id); ?></td>
                                            <td><?php echo e($sub->mt4_password); ?></td>
                                            <td><?php echo e($sub->account_type); ?></td>
                                            <td><?php echo e($sub->currency); ?></td>
                                            <td><?php echo e($sub->leverage); ?></td>
                                            <td><?php echo e($sub->server); ?></td>
                                            <td><?php echo e($sub->duration); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($sub->created_at)->toDayDateTimeString()); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($sub->start_date)->toDayDateTimeString()); ?></td>
											<td><?php echo e(\Carbon\Carbon::parse($sub->end_date)->toDayDateTimeString()); ?></td>
											<td><?php echo e($sub->status); ?></td>
                                            <td>
												<?php if($sub->status == "Pending"): ?>
												<a href="<?php echo e(url('dashboard/delsubtrade')); ?>/<?php echo e($sub->id); ?>" class="btn btn-danger btn-sm">Delete</a>	
												<?php else: ?>
												<a href="#" data-toggle="modal" data-target="#delsubmodal" class="btn btn-danger btn-sm">Delete</a>
												<?php endif; ?>
                                            </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
			<?php echo $__env->make('user.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>