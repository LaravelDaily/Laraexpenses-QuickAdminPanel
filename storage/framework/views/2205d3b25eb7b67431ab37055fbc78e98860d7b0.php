<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class="page-header-fixed">
    <div class="page-header navbar navbar-fixed-top">
        <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="clearfix"></div>

    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="page-content-wrapper">
            <div class="page-content">

                <?php if(isset($siteTitle)): ?>
                    <h3 class="page-title">
                        <?php echo e($siteTitle); ?>

                    </h3>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-12">

                        <?php if(Session::has('message')): ?>
                            <div class="note note-info">
                                <p><?php echo e(Session::get('message')); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if($errors->count() > 0): ?>
                            <div class="note note-danger">
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    <?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

        <button type="submit">Logout</button>
    <?php echo Form::close(); ?>


    <?php echo $__env->make('partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>