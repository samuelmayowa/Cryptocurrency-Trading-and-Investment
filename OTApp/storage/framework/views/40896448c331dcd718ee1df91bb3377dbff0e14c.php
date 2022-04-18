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
                        <h1 class="title1 text-<?php echo e($text); ?>">New Members Assigned to Me </h1>
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
											<th>ID</th> 
											<th>Balance</th> 
											<th>First Name</th> 
											<th>Last Name</th> 
											<th>Email</th> 
											<th>Phone</th>
											<th>Inv. plan</th>
											<th>Status</th>
                                            <th>Date registered</th> 
                                            <th>Assigned To</th>
											<th>Action</th> 
										</tr> 
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $usersAssigned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr> 
                                            <th scope="row"><?php echo e($list->id); ?></th>
											<td>$<?php echo e($list->account_bal); ?></td> 
											<td><?php echo e($list->name); ?></td> 
											<td><?php echo e($list->l_name); ?></td> 
											<td><?php echo e($list->email); ?></td> 
											<td><?php echo e($list->phone_number); ?></td>
											<?php if(isset($list->dplan->name)): ?> 
											<td><?php echo e($list->dplan->name); ?></td>
											<?php else: ?>
											<td>NULL</td>
                                            <?php endif; ?> 
                                            <td><?php echo e($list->status); ?></td> 
                                            <td><?php echo e(\Carbon\Carbon::parse($list->created_at)->toDayDateTimeString()); ?></td> 
                                            <td><?php echo e($list->tuser->firstName); ?> <?php echo e($list->tuser->lastName); ?></td>
                                            <td>
                                                <?php if($list->cstatus =="Customer"): ?>
                                                <a class="btn btn-success btn-sm m-1">Converted</a>  
                                                <?php else: ?>
                                                <a href="<?php echo e(url('admin/dashboard/convert')); ?>/<?php echo e($list->id); ?>" class="btn btn-primary btn-sm m-1">Convert</a> 
                                                <?php endif; ?>
                                               
                                                <a class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#editModal<?php echo e($list->id); ?>" >Edit Status</a>
                                            </td>
                                        </tr> 

                                        <div id="editModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                  <h4 class="modal-title">Edit this User status</h4>
                                                  <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    <form method="post" action="<?php echo e(route('updateuser')); ?>">
                                                        <div class="form-group">
                                                            <h5 class=" text-<?php echo e($text); ?>">User Status</h5>
                                                            <textarea name="userupdate" id=""  rows="5" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" placeholder="Enter here" required><?php echo e($list->userupdate); ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="<?php echo e($list->id); ?>">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="submit" class="btn btn-primary" value="Save">
                                                            
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