<?php $__env->startSection('content'); ?>
    
    
    <div class="container-fluid no-margin no-padding ">

        <table class="table no-margin no-padding">
            <thead class="thead-dark">
                <tr>
                <th> </th>
                <th scope="row" ><span style="color:#892F5C">Name</span></th>
                <th scope="row" ><span style="color:#892F5C">Email</span></th>
                <th scope="row"> <span style="color:#892F5C">Created At</span></th>
                <th scope="row"> <span style="color:#892F5C">Updated At</span></th> 
                </tr>
            </thead>
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                <th scope="row"> <?php echo e($loop->iteration); ?> </th> 
                <td><?php echo e($account->name); ?></td>
                <td><?php echo e($account->email); ?></td>
                <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($account->created_at))); ?> </td>
                <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($account->updated_at))); ?> </td>
                <td><form method="get" action="/accounts/<?php echo e($account->id); ?>/edit"><button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
                <td> <form method="post"class=" needs-validation " action="/accounts/<?php echo e($account->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>
                
                
                </tr>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="container-fluid no-margin no-padding">
            <form class="form-inline needs-validation" method="post" action="/accounts">
                <?php echo csrf_field(); ?>
                <label class="sr-only" for="name">Name</label>
                <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name" >

                <label class="sr-only" for="email">Email</label>
                <input name="email" type="text" class="form-control  mr-sm-2" id="email" placeholder="Email" >

                <label class="sr-only" for="password">Password</label>
                <input name="password" type="password" class="form-control mb-2 mr-sm-2" id="password" placeholder="Password" >
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Passowrd">
                <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Account</button>
            </form>
            

        </div>
        <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/register.blade.php ENDPATH**/ ?>