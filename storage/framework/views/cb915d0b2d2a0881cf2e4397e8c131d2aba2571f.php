<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class="page-header-fixed">

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    <?php echo $__env->make('partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>