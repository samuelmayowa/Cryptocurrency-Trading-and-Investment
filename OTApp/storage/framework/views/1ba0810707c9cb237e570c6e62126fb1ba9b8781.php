<form method="post" action="<?php echo e(action('SomeController@updatesubfee')); ?>">
    <div class="Form-group">
        <h4>Monthly Subscription Fee:</h4>
        <div>
            <input type="text" name="monthlyfee" class="form-control" value="<?php echo e($settings->monthlyfee); ?>">
        </div>
    </div>

    <div class="form-group">
        <div>
            <h4>Quaterly Subscription Fee:</h4>
        </div>
        <div class="sign-up2">
        <input type="text" name="quaterlyfee" class="form-control"  value="<?php echo e($settings->quaterlyfee); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <div >
            <h4>Yearly Subscription Fee:</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="yearlyfee" class="form-control"  value="<?php echo e($settings->yearlyfee); ?>">
        </div>
    </div>

    <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Save">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
</form>