<?php $__env->startSection('content'); ?>
   <div class="container-fluid album text-muted">
    <div class="container-fluid">
      
        <table class="table">
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
              <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th> <?php echo e($loop->iteration); ?> </th>
                  <?php $__currentLoopData = $device->device_specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td scope="row"><?php echo e(ucfirst($specification->value)); ?></td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($device->created_at))); ?> </td>
                  <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($device->updated_at))); ?> </td>
                  <td> <form method="get" action="/network_devices/<?php echo e($device->id); ?>/edit"> <button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
                  <td> <form method="post" action="/network_devices/<?php echo e($device->id); ?>"> <?php echo method_field('delete'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form> </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            
      </table>
        </div>

      <div class="container-fluid no-padding no-margin">
        <form class="form-inline needs-validation" method="post" action="/network_devices">
          <?php echo csrf_field(); ?>
          <label class="sr-only" for="kind">Kind</label>
          <input name="kind" type="text" class="form-control mb-2 mr-sm-2" id="kind" placeholder="Kind">
      
          <label class="sr-only" for="brand">Brand</label>
          <input name="brand" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="brand" placeholder="Brand">

          <label class="sr-only" for="condition">Condition</label>
          <input name="condition" type="text" class="form-control mb-2 mr-sm-2" id="condition" placeholder="Condition" >

          <label class="sr-only" for="organization">Organization</label>
          <input name="organization" type="text" class="form-control mb-2 mr-sm-2" id="organization" placeholder="Organization" >

          <label class="sr-only" for="location">Location</label>
          <input name="location" type="text" class="form-control mb-2 mr-sm-2" id="location" placeholder="Location" >
          <select name="active" class="btn btn-default btn-md no-padding no-margin">
            <option selected disabled>Active</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
          <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Network Device</button>
        </form>
      </div>
        <?php if($errors->any()): ?>
          <div class="alert alert-danger alert-block">
            <ul class="list-group">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"> <?php echo e($error); ?> </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
      </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/networkDevices.blade.php ENDPATH**/ ?>