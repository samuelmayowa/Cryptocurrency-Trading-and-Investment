<form method="post" action="<?php echo e(action('SomeController@updatebot')); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Bot Link</label>
        <input type="text" name="bot_link" value="<?php echo e($settings->bot_link); ?>" class="form-control input-pill">
    </div>
    <div class="form-group">
        <label for="">Telegram Token</label>
        <input type="text" name="telegram_token" value="<?php echo e($settings->telegram_token); ?>" class="form-control input-pill" >
    </div>
    <div class="form-group">
        <label for="">Bot group chat link</label>
        <input type="text" name="bot_group_chat" value="<?php echo e($settings->bot_group_chat); ?>" class="form-control input-pill">
    </div>

    <div class="form-group">
        <label for="">Bot channel link</label>
        <input type="text" name="bot_channel" value="<?php echo e($settings->bot_channel); ?>" class="form-control input-pill">
    </div>
    
    <div class="form-group">
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Activate/Deactivate bot:</h4>
            </div>
            <div class="sign-up2">
            <label class="switch">
            <input type="checkbox" id="bot_activate" name="bot_activate" value="true">
            <span class="slider round"></span>
            </label>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Save">
<input type="hidden" name="id" value="1">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form>