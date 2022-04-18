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
                        <h1 class="title1 text-<?php echo e($text); ?>">Manage All Task</h1> <br> <br>
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
                                                    <a class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#edittaskModal<?php echo e($task->id); ?>" >Edit</a>
                                                <?php endif; ?>
                                                
                                                <a href="<?php echo e(url('admin/dashboard/deltask')); ?>/<?php echo e($task->id); ?>" class="btn btn-danger btn-sm m-1">Delete</a>
                                            </td>
                                        </tr> 

                                        <div id="edittaskModal<?php echo e($task->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                    
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                  <h4 class="modal-title">Edit this Task</h4>
                                                  <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    <form method="post" action="<?php echo e(route('updatetask')); ?>" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <div class=" bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                                <h5 class=" text-<?php echo e($text); ?>">Task Title</h5>
                                                                <input type="text" name="tasktitle" value="<?php echo e($task->title); ?>" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                            </div><br>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class=" bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                                <h5 class=" text-<?php echo e($text); ?>">Note </h5>
                                                                <textarea name="note" id=""  rows="5" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required><?php echo e($task->note); ?></textarea>
                                                            </div> <br>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <h5 class=" text-<?php echo e($text); ?>">Task Delegations</h5>
                                                            <select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="delegation" required>
                                                                <option value="<?php echo e($task->designation); ?>"><?php echo e($task->tuser->firstName); ?> <?php echo e($task->tuser->lastName); ?></option>
                                                                <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div> <br>
                        
                                                        <div class="form-group">
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <h5 class=" text-<?php echo e($text); ?>">From</h5>
                                                                <input type="date" name="start_date" value="<?php echo e($task->start_date); ?>" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                                </div> <br>
                                                                <div class="col-md-6">
                                                                    <h5 class=" text-<?php echo e($text); ?>">To</h5>
                                                                <input type="date" value="<?php echo e($task->end_date); ?>" name="end_date" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                                </div> <br>
                                                            </div>
                                                        </div>
                                                        
                        
                                                        <div class="form-group">
                                                            <h5 class=" text-<?php echo e($text); ?>">Priority</h5>
                                                            <select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="priority" required>
                                                                <option value="<?php echo e($task->priority); ?>"><?php echo e($task->priority); ?></option>
                                                                <option>Immediately</option>
                                                                <option>High</option>
                                                                <option>Medium</option>
                                                                <option>Low</option>
                                                            </select>
                                                        </div> <br>

                                                        
                                                        <input type="hidden" name="id" value="<?php echo e($task->id); ?>">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="submit" class="btn btn-primary" value="Apply Change">
                                                            
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- /send all users email Modal -->
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