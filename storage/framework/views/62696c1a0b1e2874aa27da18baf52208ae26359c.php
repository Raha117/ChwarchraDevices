<?php $__env->startSection('content'); ?>
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
      
            <table class="table">
            <p class="text-justify text-warning"> Add small devices such as keyboard , mouse , UPS ... etc. here : </p>
                <thead class="thead-dark">
                    <tr>
              
                        <th> </th>
                        <?php $__currentLoopData = $specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th scope="row" ><span style="color:#892F5C"><?php echo e(ucfirst($spec)); ?></span></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $other_devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th> <?php echo e($loop->iteration); ?> </th>
                            <?php if($other_dev->id != $id): ?>
                                <?php $__currentLoopData = $other_dev->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($specification->specification_id != 12): ?>
                                        <td scope="row"><?php echo e(ucfirst($specification->value)); ?></td>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php else: ?>
                            <form method="post" action="/other_devices/<?php echo e($id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('patch'); ?>
                                <?php $__currentLoopData = $specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($spec != 'Active'): ?>
                                        <td><input name="<?php echo e($spec); ?>" value="<?php echo e(ucfirst($other_devices_spec_values[$loop->iteration -1 ])); ?>" type="text" class="input-md md no-margin" id="<?php echo e($spec); ?>" placeholder="<?php echo e(ucfirst($spec)); ?>"></td>
                                    <?php else: ?>
                                        <td>
                                            <select name="active" class="">
                                                <option disabled>Active</option>
                                                <?php if($other_devices_spec_values[5] == 'Yes'): ?>
                                                    <option value="Yes" selected >Yes</option>
                                                    <option value="No">No</option>
                                                <?php else: ?>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No" selected>No</option>
                                                <?php endif; ?>
                                            </select>
                                         </td>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                <td> <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                            </form>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            
      </table>
        <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/edit_other_devices.blade.php ENDPATH**/ ?>