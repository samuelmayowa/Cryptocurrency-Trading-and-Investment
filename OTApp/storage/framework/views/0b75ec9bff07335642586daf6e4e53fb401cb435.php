<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Manage Subscription</h3>

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

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                    <form style="padding:3px; float:right;" role="form" method="post" action="<?php echo e(action('Controller@searchsub')); ?>">
				            <a class="btn btn-default" href="<?php echo e(url('dashboard/msubtrade')); ?>">Show all</a>
					   		<input style="padding:5px; margin-top:15px;" placeholder="Search Subscription" type="text" name="searchItem" required>
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="hidden" name="type" value="user">
					   		<input type="submit" style="margin-top:-5px;" class="btn btn-default" value="Search">
					  </form> 
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
		<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>