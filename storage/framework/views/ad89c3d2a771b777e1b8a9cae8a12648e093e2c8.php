<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid no-padding no-margin">
        <div class="container-fluid col-lg-4 no-padding no-margin"> 
            <form method="post" action="/computers/<?php echo e($id); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <?php $__currentLoopData = $specs_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specs_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($specs_name != 'kind' && $specs_name != 'Active'): ?>
                        <input name="<?php echo e($specs_name); ?>" type="text" value="<?php echo e($pc_spec_values[$loop->iteration -1]); ?>" class="form-control mb-2 mr-sm-2 no-margin" id="<?php echo e($specs_name); ?>" placeholder="<?php echo e(ucfirst($specs_name)); ?>">
                    <?php else: ?>
                        <?php if($specs_name == 'Active'): ?>
                            <select name="active" class="btn btn-default btn-md">
                                <option disabled>Active</option>
                                <?php if($pc_spec_values[8] == 'Yes'): ?>    
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                <?php else: ?>
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                                <?php endif; ?>
                            </select>
                        <?php else: ?>
                            <select name="kind" class="btn btn-default btn-md">
                                <option disabled>Active</option>
                                <?php if($pc_spec_values[0] == 'Desktop'): ?>    
                                    <option value="Desktop" selected>Desktop</option>
                                    <option value="Laptop">Laptop</option>
                                <?php else: ?>
                                    <option value="Desktop">Desktop</option>
                                    <option value="Laptop" selected>Laptop</option>
                                <?php endif; ?>
                            </select>
                        <?php endif; ?>
                    <?php endif; ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button type="submit" class="btn btn-primary mb-2 mr-sm-2">Submit</button>
            </form>
                
        </div>
        
        <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/edit_computers.blade.php ENDPATH**/ ?>