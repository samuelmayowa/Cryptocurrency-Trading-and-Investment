<?php $__env->startComponent('mail::message'); ?>
#2FA code.
A temporary 2FA code request has been made using your account. <br>
Please authenticate using the following details:<br>
2FA code: <strong><?php echo $demo->message; ?></strong> <br>

Thanks,<br>
<?php echo e($demo->sender); ?>.
<br>
If this was not authorized by you, please do well to change your account password. Contact support if problem persit.
<?php echo $__env->renderComponent(); ?>
