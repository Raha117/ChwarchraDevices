<?php $__env->startSection('content'); ?>
    <div class="container-fluid album text-muted no-margin no-padding">
        <div class="container-fluid">
            <form method="post" action="/accounts/<?php echo e($account->id); ?>" class="col-lg-5 no-margin no-padding">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <label class="sr-only" for="name">Name</label>
                <input name="name" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="name" placeholder="Name" value="<?php echo e($account->name); ?>" >

                <label class="sr-only" for="email">Email</label>
                <input name="email" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="email" placeholder="Email" value="<?php echo e($account->email); ?>" >

                <label class="sr-only" for="password">Password</label>
                <input name="password" type="password" class="form-control mb-2 mr-sm-2 no-margin" id="password" placeholder="Password" >
                <input id="password-confirm" type="password" class="form-control mb-2 mr-sm-2 " name="password_confirmation" placeholder="Confirm Passowrd">
                <button type="submit" class="btn btn-primary mb-2 mr-sm-2">Submit</button>
            </form>
        </div> 
    
        <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/edit_register.blade.php ENDPATH**/ ?>