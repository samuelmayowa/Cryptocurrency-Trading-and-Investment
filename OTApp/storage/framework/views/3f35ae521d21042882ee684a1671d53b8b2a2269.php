<form method="post" action="<?php echo e(action('SomeController@updatewebinfo')); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Announcement</label>
        <textarea name="update" class="form-control input-pill" rows="2"><?php echo e($settings->update); ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Website Name</label>
        <input type="text" name="site_name" class="form-control input-pill" value="<?php echo e($settings->site_name); ?>" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Website Description</label>
        <textarea name="description" class="form-control input-pill" rows="4"><?php echo e($settings->description); ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Live chat widget Code</label>
        <textarea name="tawk_to" class="form-control input-pill" rows="4"><?php echo e($settings->tawk_to); ?></textarea>
    </div>
    <div class="form-group">
        <label for="">Website Title</label>
        <input type="text" name="site_title" class="form-control input-pill" value="<?php echo e($settings->site_title); ?>" required>
    </div>
    <div class="form-group">
        <label for="">Website Keywords</label>
        <input type="text" name="keywords" class="form-control input-pill" value="<?php echo e($settings->keywords); ?>" required>
    </div>
    <div class="form-group">
        <label for="">Website Url (https://yoursite.com)</label>
        <input type="text" placeholder="https://yoursite.com" name="site_address" class="form-control input-pill" value="<?php echo e($settings->site_address); ?>" required>
    </div>
    <div class="form-group">
        <label for="">Site Logo (Recommended size; max width, 200px and max height 100px.)</label>
        <input name="logo" class="form-control" type="file">
    </div>

    <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Update">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form>