<div class="container-fluid col-lg-4"> 
  <?php if($errors->any()): ?>
      <div class="alert alert-danger alert-block">
          <ul class="list-group">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="list-group-item"> <?php echo e($error); ?> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <?php endif; ?>
</div><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/errors.blade.php ENDPATH**/ ?>