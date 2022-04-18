<form method="post" action="<?php echo e(action('SomeController@updatepreference')); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Contact Email</label>
        <input type="text" class="form-control" name="contact_email" value="<?php echo e($settings->contact_email); ?>" required>
    </div>

    <input name="s_currency" value="<?php echo e($settings->s_currency); ?>" id="s_c" type="hidden">
    <div class="form-group">
		<label for="exampleFormControlSelect1">Website Currency</label>
		<select name="currency" id="select_c" class="form-control" onchange="s_f()">
            <option value="<?php echo htmlentities($settings->currency); ?>"><?php echo e($settings->currency); ?></option>
            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option id="<?php echo e($key); ?>" value="<?php echo htmlentities($currency); ?>"><?php echo e($key .' ('.$currency.')'); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>

    <script>
        function s_f(){
            var e = document.getElementById("select_c");
            var selected = e.options[e.selectedIndex].id;
            document.getElementById("s_c").value = selected;
        }
    </script>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Website Preference</label>
        <select name="site_preference"  class="form-control">
            <option value="<?php echo e($settings->site_preference); ?>">Currently (<?php echo e($settings->site_preference); ?>)</option>
            <option>Web dashboard only</option>
            <option>Telegram bot only</option>
        </select>
    </div>

    <div class="form-group">
       <label for="">Website Color</label> &nbsp; &nbsp; &nbsp;
       <div class="d-inline">
           <label class="colorinput">
            <input name="color" type="radio" id="colour1" value="default" name="site_colour" class="colorinput-input">
            <span class="colorinput-color bg-dark"></span>
            </label>&nbsp; &nbsp;
            <label class="colorinput">
                <input name="color" type="radio" id="colour2" value="blue" name="site_colour" class="colorinput-input">
                <span class="colorinput-color bg-primary"></span>
            </label>
       </div>
    </div>

    <div class="form-group">
            <div class="sign-u">
            <div class="sign-up1">
                <h4>Verify registration:</h4>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="enable_verification" id="enable_verification" type="checkbox" value="true">
                <span class="slider round"></span>
            </label>
            </div>
        </div>
    </div>

     <div class="form-group">
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Turn on/off trade:</h4>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="trade_mode" id="check" type="checkbox" value="on">
                <span class="slider round"></span>
            </label>
            </div>
        </div> 
    </div>
    
    <div class="form-group">
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Turn on/off 2FA:</h4>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="enable_2fa" id="2fa_check" type="checkbox" value="yes">
                <span class="slider round"></span>
            </label>
            </div>
        </div> 
    </div>
    
    <div class="form-group">
        <div class="sign-u">
        <div class="sign-up1">
            <h4>Turn on/off KYC:</h4>
        </div>
        <div class="sign-up2">
            <label class="switch">
                <input name="enable_kyc" id="kyc_check" type="checkbox" value="yes">
                <span class="slider round"></span>
            </label>
        </div>
        </div>
    </div>

    <?php if($settings->trade_mode=='on'): ?>
        <script>document.getElementById("check").checked= true;</script>
    <?php endif; ?>

    <?php if($settings->enable_2fa=='yes'): ?>
        <script>document.getElementById("2fa_check").checked= true;</script>
    <?php endif; ?>

    <?php if($settings->enable_kyc=='yes'): ?>
        <script>document.getElementById("kyc_check").checked= true;</script>
    <?php endif; ?>

    <?php if($settings->enable_verification=='true'): ?>
        <script>document.getElementById("enable_verification").checked= true;</script>
    <?php endif; ?>

    <?php
    if($settings->site_colour=="default"){
        echo'
        <script>document.getElementById("colour1").checked= true;</script>
        ';
        }
        if($settings->site_colour=="blue"){
            echo'
            <script>document.getElementById("colour2").checked= true;</script>
            ';
        }
        
        //for  bot actuvate checkbox
        if($settings->bot_activate=="true"){
            echo'
            <script>document.getElementById("bot_activate").checked= true;</script>
            ';
        }
    ?>
     <input type="submit" class="btn btn-primary btn-round px-5 btn-lg mb-2" value="Save">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
</form>