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
					<h1 class="title1 text-<?php echo e($text); ?>">Transactions on your account</h1>
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
					<div class="col text-center card p-4 bg-<?php echo e($bg); ?>">
					    
					        <nav>
								<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
		
								  <h4 class="nav-item nav-link active pt-3 " id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> Deposits</h4>
		
								  <h4 class="nav-item nav-link pt-3" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false">Withdrawals</h4>
		
								  <h4 class="nav-item nav-link  pt-3" id="nav-contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="nav-contact" aria-selected="false">Others</h4>
							    </div>
							</nav>
							
							<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
		
								
								<div class="tab-pane fade show active bg-<?php echo e($bg); ?> card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
        							<table id="UserTable" class="UserTable table table-hover text-<?php echo e($text); ?>"> 
        									<thead> 
        										<tr> 
        											<th>ID</th> 
        											<th>Amount</th>
        											<th>Payment mode</th>
        											<th>Status</th> 
        											<th>Date created</th>
        										</tr> 
        									</thead> 
        									<tbody> 
        										<?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        										<tr> 
        											<th scope="row"><?php echo e($deposit->id); ?></th>
        											<td><?php echo e($deposit->amount); ?></td> 
        											<td><?php echo e($deposit->payment_mode); ?></td> 
        											<td><?php echo e($deposit->status); ?></td> 
        											<td><?php echo e(\Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString()); ?></td> 
        										</tr> 
        										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        									</tbody> 
        								</table>
        							</div>
								</div>
		
								
								<div class="tab-pane fade p-3 bg-<?php echo e($bg); ?>" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
									<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
        							<table id="UserTable" class="UserTable table table-hover text-<?php echo e($text); ?>"> 
        									<thead> 
        										<tr> 
        											<th>ID</th> 
        											<th>Amount requested</th>
        											<th>Amount + charges</th>
        											<th>Recieving mode</th>
        											<th>Status</th> 
        											<th>Date created</th>
        										</tr> 
        									</thead> 
        									<tbody> 
        										<?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        										<tr> 
        											<th scope="row"><?php echo e($withdrawal->id); ?></th>
        											<td><?php echo e($withdrawal->amount); ?></td>
        											<td><?php echo e($withdrawal->to_deduct); ?></td> 
        											<td><?php echo e($withdrawal->payment_mode); ?></td> 
        											<td><?php echo e($withdrawal->status); ?></td> 
        											<td><?php echo e(\Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString()); ?></td> 
        										</tr> 
        										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        									</tbody> 
        								</table>
        							</div>
								</div>
		
								
								<div class="tab-pane fade p-3 bg-<?php echo e($bg); ?>" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">
									<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
        								<table id="UserTable" class="UserTable table table-hover text-<?php echo e($text); ?>"> 
        									<thead> 
        										<tr> 
        											<th>ID</th> 
        											<th>Amount</th>
        											<th>Type</th>
        											<th>Plan/Narration</th>
        											<th>Date created</th>
        										</tr> 
        									</thead> 
        									<tbody> 
        									<?php $__currentLoopData = $t_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        										<tr> 
        											<th scope="row"><?php echo e($history->id); ?></th>
        											<td><?php echo e($settings->currency); ?><?php echo e($history->amount); ?></td> 
        											<td><?php echo e($history->type); ?></td> 
        											<td><?php echo e($history->plan); ?></td> 
        											<td><?php echo e(\Carbon\Carbon::parse($history->created_at)->toDayDateTimeString()); ?></td> 
        										</tr> 
        									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        									</tbody> 
        								</table>
        								
        							</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<?php echo $__env->make('user.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
	<?php $__env->stopSection(); ?>
	
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>