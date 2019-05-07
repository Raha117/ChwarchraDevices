<?php $__env->startSection('content'); ?>
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
      
            <table class="table">

                <p class="text-justify text-warning"> Add small devices such as keyboard , mouse , UPS ... etc. here : </p>
                <thead class="thead-dark">
                    <tr>
              
                    <th> </th>
                    <th scope="row" > <span style="color:#892F5C">Kind</span></th>
                    <th scope="row" > <span style="color:#892F5C">Brand</span></th>
                    <th scope="row" > <span style="color:#892F5C">Condition</span></th>
                    <th scope="row" > <span style="color:#892F5C">Organization</span></th>
                    <th scope="row" > <span style="color:#892F5C">Location</span></th>
                    <th scope="row" > <span style="color:#892F5C">Active</span></th>
                    <th> <span style="color:#892F5C">Created At </span> </th>
                    <th> <span style="color:#892F5C"> Updated At </span> </th>
             
                    
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th> <?php echo e($loop->iteration); ?> </th>
                        <?php $__currentLoopData = $other->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                                <td scope="row"><?php echo e(ucfirst($other_spec->value)); ?></td>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($other->created_at))); ?> </td>
                        <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($other->updated_at))); ?> </td>
                        <td> <form method="get" action="/other_devices/<?php echo e($other->id); ?>/edit"> <button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
                        <td> <form method="post" action="/other_devices/<?php echo e($other->id); ?>"> <?php echo method_field('delete'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form> </td>
                    </tr>
              
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            
            </table>
        </div>

        <div class="container-fluid">
            <form class="form-inline needs-validation" method="post" action="/other_devices">
            <?php echo csrf_field(); ?>
          
            <label class="sr-only" for="kind">Kind</label>
            <input name="kind" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="kind" placeholder="Kind">
            <label class="sr-only" for="brand">Brand</label>
            <input name="brand" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="brand" placeholder="Brand">

            <label class="sr-only" for="condition">Condition</label>
            <input name="condition" type="text" class="form-control mb-2 mr-sm-2" id="condition" placeholder="Condition" >

            <label class="sr-only" for="organization">Organization</label>
            <input name="organization" type="text" class="form-control mb-2 mr-sm-2" id="organization" placeholder="Organization" >

            <label class="sr-only" for="location">Location</label>
            <input name="location" type="text" class="form-control mb-2 mr-sm-2" id="location" placeholder="Location" >
            <select name="active" class="btn btn-default btn-md">
                <option selected disabled>Active</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
         
          
          
            <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Device</button>
            </form>
     
        
        
    </div>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        
        <table class="table">

            <p class="text-justify text-warning"> Add simcards owned by any organization here : </p>
            <thead class="thead-dark">
                    <tr>
                        <th> </th>
                        <th scope="row" > <span style="color:#892F5C">Phone Number</span></th>
                        <th scope="row"> <span style="color:#892F5C"> Vendor </span></th>
                        <th scope="row"> <span style="color:#892F5C"> Organization </span></th>
                        <th scope="row"> <span style="color:#892F5C"> Location </span></th>
                        <th> <span style="color:#892F5C">Created At </span> </th>
                        <th> <span style="color:#892F5C"> Updated At </span> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $simcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simcard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th> <?php echo e($loop->iteration); ?> </th>
                            <?php $__currentLoopData = $simcard->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simcard_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <td scope="row"><?php echo e(ucfirst($simcard_spec->value)); ?></td>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($simcard->created_at))); ?> </td>
                                <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($simcard->updated_at))); ?> </td>
                                <td> <form method="get" action="/simcards/<?php echo e($simcard->id); ?>/edit"> <button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
                                <td> <form method="post" action="/simcards/<?php echo e($simcard->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form> </td>
                            </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>
    <div class="container-fluid">
        <form class="form-inline needs-validation" method="post" action="/simcards">
            <?php echo csrf_field(); ?>
          
            <label class="sr-only" for="phone_number">Phone Number</label>
            <input name="phone_number" type="tel" class="form-control mb-2 mr-sm-2 no-margin" id="phone_number" placeholder="Phone Number">
            
            <label class="sr-only" for="kind">Vendor</label>
            <input name="brand" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="vendor" placeholder="Vendor">
            <input name="organization" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="organization" placeholder="organization">
            <input name="location" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="location" placeholder="location">

            
            <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Simcard</button>
        </form>
    </div>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/other_devices.blade.php ENDPATH**/ ?>