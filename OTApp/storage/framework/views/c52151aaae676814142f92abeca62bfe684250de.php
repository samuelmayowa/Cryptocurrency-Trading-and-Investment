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
                                            <form action="<?php echo e(route('savefaq')); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group">
                                                    <h5 class="text-<?php echo e($text); ?>">Question</h5>
                                                    <input type="text" name="question" placeholder="Enter the Question here" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <h5 class="text-<?php echo e($text); ?>">Answer</h5>
                                                    <textarea name="answer" placeholder="Enter the Answer to the question above" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4" required></textarea>
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
                                                <form action="<?php echo e(route('savetestimony')); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

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
                                                        <select name="picture"  class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <option><?php echo e($item->img_path); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <form action="<?php echo e(route('saveimg')); ?>" method="post" enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Title of Image</h5>
                                                        <input type="text" name="img_title" placeholder="Name of Image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Images Description</h5>
                                                        <textarea name="img_desc" placeholder="Describe the image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2"></textarea>
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
                                                <form action="<?php echo e(route('savecontents')); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="form-group">
                                                        <h5 class=" text-<?php echo e($text); ?>">Title of Content</h5>
                                                        <input type="text" name="title" placeholder="Name of Content" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="text-<?php echo e($text); ?>">Content Description</h5>
                                                        <textarea name="content" placeholder="Describe the content" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2" required></textarea>
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
                                  <a class="nav-item nav-link active mb-2" id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> FAQ(S)</a>
        
                                  <a class="nav-item nav-link mb-2" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false">TESTIMONIALS</a>
        
                                  <a class="nav-item nav-link mb-2" id="nav-contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="nav-contact" aria-selected="false">WEBSITE CONTENTS</a>
        
                                  <a class="nav-item nav-link mb-2" id="nav-about-tab" data-toggle="tab" href="#4" role="tab" aria-controls="nav-about" aria-selected="false">IMAGES</a>
                                </div>
                            </nav>
        
        
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                
                                <div class="tab-pane fade show active bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="boxes">
                                        <div class="row">
                                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 p-1">
                                                <div class="card border p-1 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    <div class="card-body">
                                                        <span class="badge badge-secondary"> <small> <strong class="text-uppercase">Reference Key:</strong>  <?php echo e($faq->ref_key); ?></small></span>
                                                       
                                                        <h5 class="card-title text-<?php echo e($text); ?>"><strong><?php echo e($faq->question); ?></strong> </h5>
                                                        <p class="card-text text-<?php echo e($text); ?>"><?php echo e($faq->answer); ?></p>
                                                        <a href="<?php echo e(url('admin/dashboard/delfaq')); ?>/<?php echo e($faq->id); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a> &nbsp;
                                                        <a href="#" data-toggle="modal" data-target="#editfaq<?php echo e($faq->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="editfaq<?php echo e($faq->id); ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                            <h4 class="modal-title" style="text-align:center;">Update Faq</h4>
                                                            <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                            <form action="<?php echo e(route('updatefaq')); ?>" method="post">
                                                                <?php echo e(csrf_field()); ?>

                                                                <div class="form-group">
                                                                    <h5 class="text-<?php echo e($text); ?>">Question</h5>
                                                                    <input type="text" name="question" value="<?php echo e($faq->question); ?>" placeholder="Enter the Question here" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class="text-<?php echo e($text); ?>">Answer</h5>
                                                                    <textarea name="answer" placeholder="Enter the Answer to the question above" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4" required><?php echo e($faq->answer); ?></textarea>
                                                                </div>
                                                                <input type="hidden" name="id" value="<?php echo e($faq->id); ?>">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                   
                                </div>
        
                                
                                <div class="tab-pane fade card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="boxes">
                                        <div class="row">
                                        <?php $__currentLoopData = $testimonies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 p-1">
                                                <div class="card border p-1 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    <div class="card-body">
                                                        <span class="badge badge-secondary"> <small> <strong class="text-uppercase">Reference Key:</strong>  <?php echo e($faq->ref_key); ?></small></span>
                                                        <h5 class="card-title text-<?php echo e($text); ?>"><strong><?php echo e($faq->name); ?></strong> </h5>
                                                        <p class="card-text text-<?php echo e($text); ?>"><?php echo e($faq->what_is_said); ?></p>
                                                    </div>
                                                    <ul class="list-group list-group-flush ">
                                                        <li class="list-group-item bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>"> <?php echo e($faq->position); ?></li>
                                                        <li class="bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> list-group-item text-<?php echo e($text); ?>"><?php echo e($faq->picture); ?></li>
                                                    </ul>
                                                    <div class="card-body">
                                                        <a href="<?php echo e(url('admin/dashboard/deltestimony')); ?>/<?php echo e($faq->id); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a> &nbsp; &nbsp;
                                                        <a href="#" data-toggle="modal" data-target="#edittes<?php echo e($faq->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="edittes<?php echo e($faq->id); ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                            <h4 class="modal-title" style="text-align:center;">Update  Testimony</h4>
                                                            <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                            <form action="<?php echo e(route('updatetestimony')); ?>" method="post">
                                                                <?php echo e(csrf_field()); ?>

                                                                <div class="form-group">
                                                                    <h5 class="text-<?php echo e($text); ?>">Testifier Name</h5>
                                                                    <input type="text" name="testifier" placeholder="Full name" value="<?php echo e($faq->name); ?>" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class=" text-<?php echo e($text); ?>">Position</h5>
                                                                    <input type="text" name="position" value="<?php echo e($faq->position); ?>" placeholder="System user or anonymus"  class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class=" text-<?php echo e($text); ?>">What testifier said</h5>
                                                                    <textarea name="said" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4"><?php echo e($faq->what_is_said); ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class=" text-<?php echo e($text); ?>">Picture</h5>
                                                                    <select name="picture"  class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                                        <option value="<?php echo e($faq->picture); ?>"><?php echo e($faq->picture); ?></option>
                                                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                        <option><?php echo e($item->img_path); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="id" value="<?php echo e($faq->id); ?>">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
        
                                
                                <div class="tab-pane fade card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="boxes">
                                        <div class="row">
                                            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-3 p-1">
                                                    <div class="card border p-1 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                        <div class="card-body">
                                                            <span class="badge badge-secondary"> <small> <strong class="text-uppercase">Reference Key:</strong>  <?php echo e($faq->ref_key); ?></small></span>
                                                            <h5 class="card-title text-<?php echo e($text); ?>"><strong><?php echo e($faq->title); ?></strong> </h5>
                                                            <p class="card-text text-<?php echo e($text); ?>"><?php echo e($faq->description); ?></p>
                                                            
                                                            <a href="#" data-toggle="modal" data-target="#editcont<?php echo e($faq->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="editcont<?php echo e($faq->id); ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                                <h4 class="modal-title" style="text-align:center;">Update General Content</h4>
                                                                <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                                <form action="<?php echo e(route('updatecontents')); ?>" method="post">
                                                                    <?php echo e(csrf_field()); ?>

                                                                    <div class="form-group">
                                                                        <h5 class=" text-<?php echo e($text); ?>">Title of Content</h5>
                                                                        <input type="text" name="title" placeholder="Name of Content" value="<?php echo e($faq->title); ?> " class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <h5 class="text-<?php echo e($text); ?>">Content Description</h5>
                                                                        <textarea name="content" placeholder="Describe the content" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2" required><?php echo e($faq->description); ?></textarea>
                                                                    </div>
                                                                    <input type="hidden" name="id" value="<?php echo e($faq->id); ?>">
                                                                    <button type="submit" class="btn btn-primary">Update</button> 
                                                                </form>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    
                                </div>
        
                                
                                <div class="tab-pane fade card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3" id="4" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <div class="boxes">
                                        <div class="row">
                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-4 p-1">
                                                    <div class="card border p-1 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                        <div>
                                                            <span class="badge badge-secondary"> <small> <strong class="text-uppercase">Reference Key:</strong>  <?php echo e($faq->ref_key); ?></small></span> 
                                                        </div>
                                                        <img src="<?php echo e($settings->site_address); ?>/cloud/app/images/<?php echo e($faq->img_path); ?>" class="card-img-top w-50" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-<?php echo e($text); ?>"><strong><?php echo e($faq->title); ?></strong> </h5>
                                                            <p class="card-text text-<?php echo e($text); ?>"><?php echo e($faq->description); ?></p>
                                                        </div>
                                                        <div class="card-body">
                                                            <a href="#" data-toggle="modal" data-target="#editimg<?php echo e($faq->id); ?>" class="btn btn-primary btn-sm">Edit</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="editimg<?php echo e($faq->id); ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                                <h4 class="modal-title" style="text-align:center;">Update Image</h4>
                                                                <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                                <form action="<?php echo e(route('updateimg')); ?>" method="post" enctype="multipart/form-data">
                                                                    <?php echo e(csrf_field()); ?>

                                                                    <div class="form-group">
                                                                        <h5 class="text-<?php echo e($text); ?>">Title of Image</h5>
                                                                    <input type="text" name="img_title" value="<?php echo e($faq->title); ?>" placeholder="Name of Image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <h5 class="text-<?php echo e($text); ?>">Images Description</h5>
                                                                        <textarea name="img_desc" placeholder="Describe the image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2"><?php echo e($faq->description); ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <h5 class="text-<?php echo e($text); ?>">Image</h5>
                                                                        <input name="image" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" type="file">
                                                                    </div>
                                                                    <input type="hidden" name="id" value="<?php echo e($faq->id); ?>">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </form>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>