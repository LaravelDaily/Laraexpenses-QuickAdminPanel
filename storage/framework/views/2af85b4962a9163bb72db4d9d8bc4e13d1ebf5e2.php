<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="<?php echo e(url('quickadmin/js')); ?>/bootstrap.min.js"></script>
<script src="<?php echo e(url('quickadmin/js')); ?>/main.js"></script>

<script>
    window._token = '<?php echo e(csrf_token()); ?>';
</script>

<?php echo $__env->yieldContent('javascript'); ?>