<?php $__env->startSection('content'); ?>
  
  <form method="post" action="/employees/<?php echo e($employee_id); ?>" class="needs-validation">
    <?php echo csrf_field(); ?>
    <div class="container-fluid lbum text-muted no-margin no-padding">
      <p class="text centered text-warning"> Computers </p>
      
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th> </th>
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
            <?php if(!$pc->employees_devices->count()): ?>
              <tr>
                <div class="checkbox-primary"><th> <input type="checkbox" class="" name="<?php echo e($pc->id); ?>"></th></div>
                <th> <?php echo e($loop->iteration); ?> </th>
                <?php $__currentLoopData = $pc->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                    <td scope="row"><?php echo e(ucfirst($device_spec->value)); ?></td>
                  

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($pc->created_at))); ?> </td>
                <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($pc->updated_at))); ?> </td>
                
                
              </tr>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
      </table>

      <table class="table">
        <p class="text centered text-warning"> Printers </p>

          <thead class="thead-dark">
            <tr>
              <th> </th>
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
              <?php if(!$printer->employees_devices->count()): ?>  
                <tr>
                  <th> <input type="checkbox" name="<?php echo e($printer->id); ?>"></th>
                  <th> <?php echo e($loop->iteration); ?> </th>
                  <?php $__currentLoopData = $printer->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $printer_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($printer_spec->specification_id != 1): ?>
                      <td scope="row"><?php echo e(ucfirst($printer_spec->value)); ?></td>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($printer->created_at))); ?> </td>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($printer->updated_at))); ?> </td>
                  
                </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
              
      </table>
      <table class="table">
        <p class="text centered text-warning"> Small Devices </p>

        <thead class="thead-dark">
            <tr>
            <th> </th>
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
            <?php if(!$other->employees_devices->count()): ?>
              <tr>
                <th> <input type="checkbox" name="<?php echo e($other->id); ?>"></th> 
                <th> <?php echo e($loop->iteration); ?> </th>
                  <?php $__currentLoopData = $other->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                          <td scope="row"><?php echo e(ucfirst($other_spec->value)); ?></td>
                      
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($other->created_at))); ?> </td>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($other->updated_at))); ?> </td>
                  

                  
              </tr>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
              
      </table>
      <table class="table">
        <p class="text centered text-warning"> Simcards </p>

        <thead class="thead-dark">
          <tr>
            <th> </th>  
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
              <?php if(!$simcard->employees_devices->count()): ?>  
                <tr>
                  <th> <input type="checkbox" name="<?php echo e($simcard->id); ?>" ></th>
                  <th> <?php echo e($loop->iteration); ?> </th>
                  <?php $__currentLoopData = $simcard->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simcard_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                          <td scope="row"><?php echo e(ucfirst($simcard_spec->value)); ?></td>
                      
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($simcard->created_at))); ?> </td>
                      <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($simcard->updated_at))); ?> </td>
                      

                </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

      </table>
    </div>
    <button type="submit" class="btn btn-primary btn-sm col-lg-1 ">Submit</button> </form></td>
  </form>
  <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/create_employee_device.blade.php ENDPATH**/ ?>