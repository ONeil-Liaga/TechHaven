
<?php
  $getSettingHeader = App\Models\SystemSettingModel::getSingle();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e(!empty($header_title) ? $header_title : ''); ?> - <?php echo e($getSettingHeader->website_name); ?></title>


  <link rel="shortcut icon" href="<?php echo e($getSettingHeader->getFevicon()); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="<?php echo e(url('../assets/plugins/fontawesome-free/css/all.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(url('../assets/plugins/summernote/summernote-bs4.min.css')); ?>">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo e(url('../assets/dist/css/adminlte.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(url('../css/style.css')); ?>">


  <?php echo $__env->yieldContent('style'); ?>

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script src="<?php echo e(url('../assets/plugins/jquery/jquery.min.js')); ?>"></script>

<script src="<?php echo e(url('../assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(url('../assets/dist/js/adminlte.js')); ?>"></script>
<script src="<?php echo e(url('../assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>

<script src="<?php echo e(url('../assets/plugins/chart.js/Chart.min.js')); ?>"></script>

<script src="<?php echo e(url('../assets/dist/js/demo.js')); ?>"></script>


<script>
  $(function () {
    $('.editor').summernote({
       height: 300
    })
  })
</script>
<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH D:\TechHub\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>