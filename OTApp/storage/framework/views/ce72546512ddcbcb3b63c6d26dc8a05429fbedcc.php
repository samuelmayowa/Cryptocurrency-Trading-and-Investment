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
                        <h1 class="title1 text-<?php echo e($text); ?>">Create New Task</h1> <br> <br>
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
                            <form method="post" action="<?php echo e(route('addtask')); ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class=" bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                        <h5 class=" text-<?php echo e($text); ?>">Task Title</h5>
                                        <input type="text" name="tasktitle" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                    </div><br>
                                </div>
                                
                                <div class="form-group">
                                    <div class=" bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                        <h5 class=" text-<?php echo e($text); ?>">Note </h5>
                                        <textarea name="note" id=""  rows="5" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required></textarea>
                                    </div> <br>
                                </div>
                                
                                <div class="form-group">
                                    <h5 class=" text-<?php echo e($text); ?>">Task Delegations</h5>
                                    <select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="delegation" required>
                                        <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div> <br>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <h5 class=" text-<?php echo e($text); ?>">From</h5>
                                        <input type="date" name="start_date" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" placeholder="First name" required>
                                        </div> <br>
                                        <div class="col-md-6">
                                            <h5 class=" text-<?php echo e($text); ?>">To</h5>
                                        <input type="date" name="end_date" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" placeholder="Last name" required>
                                        </div> <br>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <h5 class=" text-<?php echo e($text); ?>">Priority</h5>
                                    <select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="priority" required>
                                        <option>Immediately</option>
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div> <br>
                               
                                
                                
                                <input type="hidden" name="id" value="<?php echo e(Auth('admin')->User()->id); ?>">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>