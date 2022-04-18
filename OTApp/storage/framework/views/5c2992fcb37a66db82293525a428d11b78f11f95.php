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
                    <div class="mt-2 mb-4">
                    <h1 class="title1 text-<?php echo e($text); ?>">Edit Front page of your website</h1>
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
                        <div class="col-12 p-3">
                            <a href="#"  data-toggle="modal" data-target="#faqmodal" class="btn btn-<?php echo e($text); ?>"><i class="fa fa-plus"></i> Add FAQ</a>
                                <div id="faqmodal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                            <h4 class="modal-title" style="text-align:center;">Add Faq</h4>
                                            <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <h5 class="text-<?php echo e($text); ?>">Question</h5>
                                                    <input type="text" name="question" placeholder="Enter the Question here" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5 class="text-<?php echo e($text); ?>">Answer</h5>
                                                    <textarea name="answer" placeholder="Enter the Answer to the question above" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <a href="#" data-toggle="modal" data-target="#testi" class="btn btn-<?php echo e($text); ?>"><i class="fa fa-plus"></i> Add Tesimonial</a>
                                <div id="testi" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                <h4 class="modal-title" style="text-align:center;">Add Testimony</h4>
                                                <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Testifier Name</h5>
                                                        <input type="text" name="testifier" placeholder="Full name" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class=" text-<?php echo e($text); ?>">Position</h5>
                                                        <input type="text" name="position" placeholder="System user or anonymus"  class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class=" text-<?php echo e($text); ?>">What testifier said</h5>
                                                        <textarea name="said" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class=" text-<?php echo e($text); ?>">Picture</h5>
                                                        <select name="site_preference"  class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                            <option>Picture 1</option>
                                                            <option>Picture 2</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <a href="#" data-toggle="modal" data-target="#images" class="btn btn-<?php echo e($text); ?>"><i class="fa fa-plus"></i> Add Image</a>
                                <div id="images" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                <h4 class="modal-title" style="text-align:center;">Add Image</h4>
                                                <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Title of Image</h5>
                                                        <input type="text" name="question" placeholder="Name of Image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Images Description</h5>
                                                        <textarea name="answer" placeholder="Describe the image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Image</h5>
                                                        <input name="image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" type="file">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <a href="#" data-toggle="modal" data-target="#content" class="btn btn-<?php echo e($text); ?>"><i class="fa fa-plus"></i> Add Content</a>
                                <div id="content" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                <h4 class="modal-title" style="text-align:center;">Add General Content</h4>
                                                <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <h5 class=" text-<?php echo e($text); ?>">Title of Content</h5>
                                                        <input type="text" name="question" placeholder="Name of Content" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Content Description</h5>
                                                        <textarea name="content" placeholder="Describe the content" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save</button> 
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> FAQ(S)</a>
        
                                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false">TESTIMONIALS</a>
        
                                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="nav-contact" aria-selected="false">WEBSITE CONTENTS</a>
        
                                  <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#4" role="tab" aria-controls="nav-about" aria-selected="false">IMAGES</a>
                                </div>
                            </nav>
        
        
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        
                                
                                <div class="tab-pane fade show active bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    
                                </div>
        
                                
                                <div class="tab-pane fade card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    
                                </div>
        
                                
                                <div class="tab-pane fade card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    
                                </div>
        
                                
                                <div class="tab-pane fade card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3" id="4" role="tabpanel" aria-labelledby="nav-about-tab">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>