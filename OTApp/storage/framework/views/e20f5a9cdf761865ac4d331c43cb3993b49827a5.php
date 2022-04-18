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
            <div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                <div class="page-inner">
                    <div class="mt-2 mb-5">
                        <h1 class="title1 text-<?php echo e($text); ?>">View My Task</h1> <br> <br>
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
                                <button type="button" clsass="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <i class="fa fa-warning"></i> <?php echo e($error); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row mb-5">
                        <div class="col-lg-12 card p-4 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> shadow">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>">
                                    <thead> 
										<tr> 
											<th>Task Title</th>
											<th>Assigned To</th>
											<th>Note</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Status</th> 
											<th>Date Created</th>
											<th>Option</th>
										</tr> 
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr> 
                                            <td><?php echo e($task->title); ?></td> 
											<td><?php echo e($task->tuser->firstName); ?> <?php echo e($task->tuser->lastName); ?></td>
											<td><?php echo e($task->note); ?></td> 
											<td><?php echo e($task->start_date); ?></td> 
                                            <td><?php echo e($task->end_date); ?></td>
                                            <td>
                                                <?php if($task->status == 'Pending'): ?>
                                                    <span class="badge badge-danger"><?php echo e($task->status); ?></span>
                                                <?php else: ?>
                                                <span class=" badge badge-success"><?php echo e($task->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($task->created_at); ?></td>
                                            <td>
                                                <?php if($task->status == 'Pending'): ?>
                                                <a href="<?php echo e(url('admin/dashboard/markdone')); ?>/<?php echo e($task->id); ?>" class="btn btn-primary btn-sm m-1">Mark as Done</a>
                                                <?php else: ?>
                                                    <a class="btn btn-success btn-sm m-1">No Action Needed</a>
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>