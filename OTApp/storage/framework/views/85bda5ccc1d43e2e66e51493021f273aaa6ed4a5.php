Hello <?php echo e($demo->receiver_name); ?>,
Your registeration was successful! Below are your login credentials. Please keep safe.
 
Login details:
 
Email: <?php echo e($demo->receiver_email); ?>


Password: <?php echo e($demo->receiver_password); ?>


Click the link below to activate your account

<?php echo e($demo->acct_activate_link); ?>

 
Kind regards,

<?php echo e($demo->sender); ?>.