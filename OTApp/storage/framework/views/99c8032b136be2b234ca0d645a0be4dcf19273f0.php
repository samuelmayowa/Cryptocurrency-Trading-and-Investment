<?php echo $__env->make('home.assetss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<body class="d-flex flex-column h-100 auth-Page">
    <!-- ======= signup Section ======= -->
    <section class="auth ">
        <div class="container">
            <div class="row justify-content-center user-auth">
                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                    <div class="text-center mb-4">
                        <a href="<?php echo e(url('/')); ?>"><img class="auth__logo img-fluid"
                            src="<?php echo e($settings->site_address); ?>/cloud/app/images/<?php echo e($settings->logo); ?>" alt="<?php echo e($settings->site_name); ?>"> </a>
                            <?php if(Session::has('message')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                    </div>
                    <div class="card ">
                        <h1 class="text-center mt-3"> Create an Account</h1>

                        <form method="POST" action="<?php echo e(route('register')); ?>" class="mt-5 card__form">
                            <?php echo e(csrf_field()); ?> 

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                  <label for="f_name">First Name</label>
                                  <input type="text" class="form-control mr-2" name="name" value="<?php echo e(old('name')); ?>" id="f_name" placeholder="Enter First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <?php if($errors->has('l_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->old('l_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                  <label for="l_name">last name</label>
                                  <input type="text" class="form-control" name="l_name" value="<?php echo e(old('l_name')); ?>" id="l_name" placeholder="Enter last name">
                                </div>
                            </div>

                            <div class="form-group ">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="name@example.com">
                            </div>

                            <div class="form-group ">
                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="phone">Phone Number</label>
                                <input type="mumber" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" id="phone" placeholder="Enter Phone number">
                            </div>
                            <div class="form-row">
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" id="confirm-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" name="country">Country</label>
                                <select class="form_control" name="country" id="country" required>
                                    <option selected disabled value="">Choose Country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country); ?>"><?php echo e($country); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary mt-4" type="submit">Register</button>
                            </div>
    
                            <div class="text-center mb-3">
                                <small class=" text-center mb-2">Already have an Account  <a href="<?php echo e(route('login')); ?>">Login.</a> </small>

                                <small class="text-center">&copy; Copyright  <?php echo e(date('Y')); ?> &nbsp; <?php echo e($settings->site_name); ?> &nbsp; All Rights Reserved.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

    <!-- Wrapper Ends -->
</body>
</html>

