<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1">Manage Subscription</h1>
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
				<div class="col">
					<form class="form-inline" role="form" method="post" action="<?php echo e(action('Controller@searchsub')); ?>">
                        <a class="btn btn-light m-2" href="<?php echo e(url('dashboard/msubtrade')); ?>">Show all</a>
                        <input placeholder="Search Subscription" class="form-control" type="text" name="searchItem" required>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="type" value="user">
                        <input type="submit" class="btn btn-light m-2" value="Search">
                  </form> 
				</div>
			</div>
			<div class="row mb-5">
				<div class="col p-4 card">
					<div class="table-responsive" data-example-id="hoverable-table">
                    
                        <table class="table table-hover"> 
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
                                    <td><?php echo e($sub->created_at); ?></td>
                                    <td><?php echo e($sub->start_date); ?></td>
                                    <td><?php echo e($sub->end_date); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('dashboard/confirmsub')); ?>/<?php echo e($sub->id); ?>" class="btn btn-primary">Process</a>
                                        <a href="<?php echo e(url('dashboard/delsub')); ?>/<?php echo e($sub->id); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                            </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody> 
                        </table>
                    </div>
				</div>
			</div>
            
	</div>
		
	<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>