<form method="post" action="<?php echo e(action('SomeController@updatebotswt')); ?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Referral Commission (%) </label>
        <input type="text" class="form-control input-pill" name="ref_commission" value="<?php echo e($settings->referral_commission); ?>" required>
    </div>

    <div class="form-group">
        <label for="">Referral Commission 1 (%) </label>
        <input type="text" class="form-control input-pill" name="ref_commission1" value="<?php echo e($settings->referral_commission1); ?>" required>
    </div>

    <div class="form-group">
        <label for="">Referral Commission 2 (%) </label>
        <input type="text" class="form-control input-pill" name="ref_commission2" value="<?php echo e($settings->referral_commission2); ?>" required>
    </div>

    <div class="form-group">
        <label for="">Referral Commission 3 (%) </label>
        <input type="text" class="form-control input-pill" name="ref_commission3" value="<?php echo e($settings->referral_commission3); ?>" required>
    </div>

    <div class="form-group">
        <label for="">Referral Commission 4 (%) </label>
        <input type="text" class="form-control input-pill" name="ref_commission4" value="<?php echo e($settings->referral_commission4); ?>" required>
    </div>

    <div class="form-group">
        <label for="">Referral Commission 5 (%) </label>
        <input type="text" class="form-control input-pill" name="ref_commission5" value="<?php echo e($settings->referral_commission5); ?>" required>
    </div>

    <div class="form-group">
        <label for="">Sign up Bonus (<?php echo e($settings->currency); ?>)</label>
        <input type="text" class="form-control input-pill" name="signup_bonus" value="<?php echo e($settings->signup_bonus); ?>" required>
    </div>

    <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Update">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
</form>