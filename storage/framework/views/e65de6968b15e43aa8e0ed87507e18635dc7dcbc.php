<?php $__env->startSection('content'); ?>
    
    
    
    
        <div class="container-fluid no-margin no-padding row">
        <form class="form-inline needs-validation" method="post" action="/accounts">
            <?php echo csrf_field(); ?>
            <label class="sr-only" for="name">Name</label>
            <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name" >
        
            <label class="sr-only" for="email">Email</label>
            <input name="email" type="text" class="form-control  mr-sm-2" id="email" placeholder="Email" >

            <label class="sr-only" for="password">Password</label>
            <input name="password" type="password" class="form-control mb-2 mr-sm-2" id="password" placeholder="Password" >
            <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Account</button>
        </form>
        </div>
        <?php echo $__env->make('/resources'/'views''/errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/auth/register.blade.php ENDPATH**/ ?>