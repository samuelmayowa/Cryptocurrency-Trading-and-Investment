<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Manage clients investments</h3>
				
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

			<!-- <div class="row">
				<div class="col">
					<form style="padding:3px; float:right;" role="form" method="post" action="<?php echo e(action('Controller@searchDp')); ?>">
						<a class="btn btn-default" href="<?php echo e(url('dashboard/mdeposits')); ?>">Show all</a>
						<input style="padding:5px; margin-top:15px;" size="50px" placeholder="Search by user ID, Status, Payment mode, Amount" type="text" name="query" required>
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						<input type="submit" style="margin-top:-5px;" class="btn btn-default" value="Search">
					</form>
				</div>
			</div> -->

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                    <span style="margin:3px;">
                            
                    </span>
					<table class="table table-striped"> 
                        <thead> 
                            <tr> 
                                <th>Asset</th> 
                                <th>Amount (<?php echo e($settings->s_currency); ?>)</th>
                                <th>Open price</th>
                                <th>Status</th> 
                                <th>Date started</th>
                                <th>Action(s)</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                                <th scope="row"><?php echo e($inv->asset); ?></th>
                                <td><?php echo e($inv->amount); ?></td> 
                                <td><?php echo e($inv->open_price); ?></td> 
                                <td><?php echo e($inv->status); ?></td> 
                                <td><?php echo e($inv->created_at); ?></td> 
                                <td>
                                <a href="<?php echo e(url('dashboard/closeinvest')); ?>/<?php echo e($inv->id); ?>" class="btn btn-success">Activate</a>
                                <a href="<?php echo e(url('dashboard/closeinvest')); ?>/<?php echo e($inv->id); ?>" class="btn btn-danger">close</a>
                                </td> 
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody> 
                    </table>
				</div>
			</div>
		</div>
        <?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>