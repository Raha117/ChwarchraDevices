<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>New Chwarchra</title>

  <!-- Favicons -->
  <link href="<?php echo e(asset('img/chwarchra.logo')); ?>" class="img-circle" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo e(asset('lib/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/style-responsive.css')); ?>" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
  <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
  <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <?php echo $__env->yieldContent("content"); ?> 
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo e(asset('lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/jquery-ui-1.9.2.custom.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/jquery.ui.touch-punch.min.js')); ?>"></script>
  <script class="include" type="text/javascript" src="<?php echo e(asset('lib/jquery.dcjqaccordion.2.7.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/jquery.scrollTo.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/jquery.nicescroll.js')); ?>" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo e(asset('lib/common-scripts.js')); ?>"></script>
  <!--script for this page-->
  <script src="asset('js/select.js')"> </script>
</body>

</html>
<?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/layout/master.blade.php ENDPATH**/ ?>