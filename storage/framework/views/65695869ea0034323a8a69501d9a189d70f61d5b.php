<?php $__env->startSection('content'); ?>
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th> </th>
                        <th scope="row" > <span style="color:#892F5C">name</span></th>
                        <th scope="row"> <span style="color:#892F5C">position</span></th>
                        <th scope="row"> <span style="color:#892F5C">Phone Number</span></th>
                        <th scope="row"> <span style="color:#892F5C">Organization</span></th>
                        <th scope="row"> <span style="color:#892F5C">Location</span></th>
                        <th scope="row"> <span style="color:#892F5C">Active</span></th>
                
                    </tr>
                </thead>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                        <tr>
                            <?php if($employee_edit->id != $employee->id): ?>
                                <th scope="row"> <?php echo e($loop->iteration); ?> </th> 
                                <td><?php echo e($employee->name); ?></td>
                                <td><?php echo e($employee->position); ?></td>
                                <td><?php echo e($employee->phone_number); ?></td>
                                <td><?php echo e($employee->organization); ?></td>
                                <td><?php echo e($employee->location); ?></td>
                                
                                <?php if($employee->active ==='Yes'): ?> <td>Yes</td> <?php else: ?> <td>No</td> <?php endif; ?>
                            <?php else: ?>
                                <th><?php echo e($loop->iteration); ?></th> 
                                <form method="post" action="/employees/<?php echo e($employee_edit->id); ?>">
                                    <?php echo method_field('patch'); ?>
                                    <?php echo csrf_field(); ?>
                                    <td><input name="name" type="text" class="input-md md" id="name" placeholder="Name" value="<?php echo e($employee->name); ?>" ></td>
                                    <td><input name="position" type="text" class="input-md md" id="position" placeholder="Position" value="<?php echo e($employee->position); ?>"></td>
                                    <td><input name="phone_number" type="text" class="input-md md" id="phone_number" placeholder="phone_number" value="<?php echo e($employee->phone_number); ?>" ></td>
                                    <td><input name="organization" type="text" class="input-md md" id="organization" placeholder="Organization" value="<?php echo e($employee->organization); ?>" ></td>
                                    <td><input name="location" type="text" class="input-md md" id="location" placeholder="Location" value="<?php echo e($employee->location); ?>" dropdown></td>
                                    <td>
                                        <select name="active">
                                            <option selected disabled>Active</option>
                                            <?php if($employee->active === 'Yes'): ?> 
                                                <option value="Yes" selected>Yes</option>
                                                <option value="No">No</option>
                                            <?php endif; ?>
                                            <?php if(($employee->active === 'No') ): ?>
                                                <option value="No" selected>No</option>
                                                <option value="Yes" >Yes</option>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                    <td> <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                </form>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div> 
    
        <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/edit_employee.blade.php ENDPATH**/ ?>