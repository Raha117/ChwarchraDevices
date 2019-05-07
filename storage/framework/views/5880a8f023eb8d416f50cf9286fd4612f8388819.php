<?php $__env->startSection('content'); ?>
  <div class="container-fluid album text-muted">
    <div class="container-fluid">
      <table class="table no-margin no-padding">
        <thead class="thead-dark">
            <tr>
              <th> </th>
              <th scope="row" ><a>name</a></th>
              <th scope="row"> <span style="color:#892F5C"> position</span></th>
              <th scope="row" class="col-lg-2"> <span style="color:#892F5C">Phone Number</span></th>
              <th scope="row"> <span style="color:#892F5C">Organization</span></th>
              <th scope="row"> <span style="color:#892F5C">Location</span></th>
              <th scope="row"> <span style="color:#892F5C">Active</span></th>
              <th scope="row"> <span style="color:#892F5C">Created At</span></th>
              <th scope="row"> <span style="color:#892F5C">Updated At</span></th> 
            </tr>
        </thead>
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tbody>
            <tr>
              <th scope="row"> <?php echo e($loop->iteration); ?> </th> 
              <td><a href="/employees/<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></a></td>
              <td><?php echo e($employee->position); ?></td>
              <td><?php echo e($employee->phone_number); ?></td>
              <td><?php echo e($employee->organization); ?></td>
              <td><?php echo e($employee->location); ?></td>
              <?php if($employee->active === 'Yes'): ?> <td>Yes</td> <?php else: ?> <td>No</td> <?php endif; ?>
              <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($employee->created_at))); ?> </td>
              <td> <?php echo e(date('h:i:s a m/d/Y', strtotime($employee->updated_at))); ?> </td>
              <td><form method="get" action="/employees/<?php echo e($employee->id); ?>/edit"><button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
              <td> <form method="post"class=" needs-validation " action="/employees/<?php echo e($employee->id); ?>"> <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?> <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>
               
              
            </tr>
          </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
    </div> 
    <div class="container-fluid no-margin no-padding">
      <form class="form-inline needs-validation" method="post" action="/employees">
        <?php echo csrf_field(); ?>
        <label class="sr-only" for="name">Employee name</label>
        <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name" >
      
        <label class="sr-only" for="position">Position</label>
        <input name="position" type="text" class="form-control mb-2 mr-sm-2" id="position" placeholder="Position" >

        <label class="sr-only" for="phone_number">Phone Number</label>
        <input name="phone_number" type="text" class="form-control mb-2 mr-sm-2" id="phone_number" placeholder="Phone Number" >

        <label class="sr-only" for="organization">Organization</label>
        <input name="organization" type="text" class="form-control mb-2 mr-sm-2" id="organization" placeholder="Organization" >

        <label class="sr-only" for="location">Location</label>
        <input name="location" type="text" class="form-control mb-2 mr-sm-2" id="location" placeholder="Location" >
        <select name="active" class="btn btn-default btn-md">
          <option selected disabled>Active</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
        <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Employee</button>
      </form>
    </div>
      <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/employees.blade.php ENDPATH**/ ?>