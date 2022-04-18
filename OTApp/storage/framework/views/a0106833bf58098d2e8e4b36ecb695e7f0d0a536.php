
<!DOCTYPE html>
<html lang="en">
<head class="crypt-<?php echo e(Auth::user()->dashboard_style); ?>">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($settings->site_name."|".$title); ?></title>
    <?php echo $__env->make('trade.assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class="crypt-<?php echo e(Auth::user()->dashboard_style); ?>">
    <header>
        <div class="container-full-width">
            <div class="crypt-header">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="crypt-logo"><h4 style="margin:20px 0px 0px 30px; color:#28a745;"><?php echo e($settings->site_name); ?></h4><!--<img src="images/<?php echo e($settings->logo); ?>" alt="">--></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-8 col-lg-8 col-md-8 d-none d-md-block d-lg-block">
                        <ul class="crypt-heading-menu fright">

                            <li>
                            <form method="get" action="javascript:void(0)">
                            <small>Switch style</small>
                                <label class="switch">
								    <input id="switchbox" id="check" type="checkbox">
								    <span class="s_slider round"></span>
                                </label>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>

                            <?php if(Auth::user()->dashboard_style=='dark'): ?>
								<script>document.getElementById("switchbox").checked = true;</script>
							<?php endif; ?>
                            </li>

                            <?php $__currentLoopData = $bals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($bal->wallet == "USD"): ?>
                            <li class="crypt-box-menu menu-green"><a href="#">USD <?php echo e(round($bal->balance,4)); ?></a></li>
                            <?php endif; ?>
                            <?php if($bal->wallet == "BTC"): ?>
                            <li class="crypt-box-menu menu-green"><a href="#">BTC <?php echo e(round($bal->balance,4)); ?></a></li>
                            <?php endif; ?>
                            <?php if($bal->wallet == "ETH"): ?>
                            <li class="crypt-box-menu menu-green"><a href="#">ETH <?php echo e(round($bal->balance,4)); ?></a></li>
                            <?php endif; ?>
                            <?php if($bal->wallet == "BCH"): ?>
                            <li class="crypt-box-menu menu-green"><a href="#">BCH <?php echo e(round($bal->balance,4)); ?></a></li>
                            <?php endif; ?>
                            <?php if($bal->wallet == "LTC"): ?>
                            <li class="crypt-box-menu menu-green"><a href="#">LTC <?php echo e(round($bal->balance,4)); ?></a></li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="crypt-box-menu menu-red"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                        </ul>
                    </div><i class="menu-toggle pe-7s-menu d-xs-block d-sm-block d-md-none d-sm-none"></i></div>
            </div>
        </div>

        <script type="text/javascript">

    $('#switchbox').change('checked',function(){
        if(this.checked) {
            var url = '/trade/switchcolor/dark';
        }
        else{
            var url = '/trade/switchcolor/light';
        }
        $.ajax({
            url: url,
            type: 'GET',
            data:$('#switchbox').serialize(),
            success: function (data) {
                swal({
                icon: "success",
                text: "Color changed successfully!",
                timer:3000,
                });
                location.reload(true);
            },
            error: function (data) {
                swal({
                icon: "error",
                text: "Something went wrong", 
                timer:3000,
                });
            },
        });
    });
    </script>
    </header>