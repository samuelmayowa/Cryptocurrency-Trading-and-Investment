<?php $__env->startComponent('mail::message'); ?>

# Welcome to <?php echo e($demo->sender); ?>!
Your registration is successful and we are really excited to welcome you to <?php echo e($demo->sender); ?> community! <br>

Click the button below to activate your account and start earning!
<div class="action">
    <a href="<?php echo e($demo->acct_activate_link); ?>" target="_blank" class="button blue button-blue">Activate Now</a>
</div> <br>
<p style="font-size:12px">If the button doesn’t work, please copy and paste this link to your browser: <strong><?php echo e($demo->acct_activate_link); ?></strong></p><br>

If you need any help, do not hesitate to reach out to us at <br> <?php echo e($demo->contact_email); ?> <br><br>

Kind regards,<br>
<?php echo e($demo->sender); ?>.
<?php echo $__env->renderComponent(); ?>


