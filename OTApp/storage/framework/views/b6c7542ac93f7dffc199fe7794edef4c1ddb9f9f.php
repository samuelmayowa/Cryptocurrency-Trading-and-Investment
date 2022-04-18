<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('admin.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-panel bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
            <div class="content">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                    <h1 class="title1 text-<?php echo e($text); ?>">Manage Subscription</h1>
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
                        <div class="col p-4 card shadow bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>"> 
                                    <thead> 
                                        <tr> 
                                            <th>USER</th>
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
                                        <td><?php echo e($sub->tuser->name); ?> <?php echo e($sub->tuser->l_name); ?></td>
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
												<a href="<?php echo e(url('admin/dashboard/confirmsub')); ?>/<?php echo e($sub->id); ?>" class="btn btn-primary btn-sm mb-2">Process</a>	
												<?php else: ?>
												<a class="btn btn-success btn-sm mb-2">Active</a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(url('admin/dashboard/delsub')); ?>/<?php echo e($sub->id); ?>" class="btn btn-danger btn-sm">Delete</a>
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>