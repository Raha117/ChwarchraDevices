<?php $__env->startSection('content'); ?>
  <div class="container-fluid album text-muted">
    <div class="container-fluid">
      <table class="table">
      <p class="text centered text-warning"> Computers </p>
        <thead class="thead-dark">
          <tr>
            
            <th> </th>
            <th scope="row" > <span style="color:#892F5C">Kind</span></th>
            <th scope="row" > <span style="color:#892F5C">Brand</span></th>
            <th scope="row" > <span style="color:#892F5C">Condition</span></th>
            <th scope="row" > <span style="color:#892F5C">Organization</span></th>
            <th scope="row" > <span style="color:#892F5C">Location</span></th>
            <th scope="row" > <span style="color:#892F5C">Memory</span></th>
            <th scope="row" > <span style="color:#892F5C">Processor</span></th>
            <th scope="row" > <span style="color:#892F5C">Storage</span></th>
            <th scope="row" > <span style="color:#892F5C">Active</span></th>
            <th scope="row" > <span style="color:#892F5C"> Created At </span> </th>
            <th scope="row" class="text-xm"> <span style="color:#892F5C">updated At</span> </th>
              
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td> <?php echo e($loop->iteration); ?> </td>
              <?php $__currentLoopData = $pc->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td> <?php echo e(ucfirst($device_spec->value)); ?> </td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($pc->created_at))); ?> </td>
              <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($pc->updated_at))); ?> </td>
              <td> <form method="post"class=" needs-validation " action="/employees/<?php echo e($employee_id); ?>/<?php echo e($pc->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>

            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
      
      </table>

      <table class="table">
        <p class="text centered text-warning"> Printers </p>

          <thead class="thead-dark">
            <tr>
              
              <th> </th>
              
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
            <?php $__currentLoopData = $printers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $printer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  
                  <th> <?php echo e($loop->iteration); ?> </th>
                  <?php $__currentLoopData = $printer->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $printer_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($printer_spec->specification_id != 1): ?>
                      <td scope="row"><?php echo e(ucfirst($printer_spec->value)); ?></td>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($printer->created_at))); ?> </td>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($printer->updated_at))); ?> </td>
                  <td> <form method="post"class=" needs-validation " action="/employees/<?php echo e($employee_id); ?>/<?php echo e($printer->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>

                  
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
              
      </table>
      </table>
      <table class="table">
        <p class="text centered text-warning"> Small Devices </p>

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
          <?php $__currentLoopData = $other_devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
              <tr>
                <th> <?php echo e($loop->iteration); ?> </th>
                  <?php $__currentLoopData = $other->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                          <td scope="row"><?php echo e(ucfirst($other_spec->value)); ?></td>
                      
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($other->created_at))); ?> </td>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($other->updated_at))); ?> </td>
                  <td> <form method="post"class=" needs-validation " action="/employees/<?php echo e($employee_id); ?>/<?php echo e($other->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>
              </tr>
            
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
              
      </table>
      <table class="table">
        <p class="text centered text-warning"> Simcards </p>

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
                      <td> <form method="post"class=" needs-validation " action="/employees/<?php echo e($employee_id); ?>/<?php echo e($simcard->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>

                      

                </tr>
              
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

      </table>
    </div> 
    <form method="get" action="/employees/<?php echo e($employee_id); ?>/create"> <button type="submit" class="btn btn-link mb-2 mr-sm-2">Add new device to <?php echo e($employee->name); ?></button></form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/employee_devices.blade.php ENDPATH**/ ?>