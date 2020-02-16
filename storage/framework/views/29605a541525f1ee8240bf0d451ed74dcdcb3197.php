
<?php if($errors->any()): ?>
<div class="alert alert-danger">
	<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php endif; ?>

<?php if(session()->has('status')): ?>
<div class="alert alert-success text-sm-center">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<h6><?php echo e(session('status')); ?></h6>
</div>
<?php endif; ?>

<?php if(session()->has('status_danger')): ?>
<div class="alert alert-danger text-sm-center">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<h6><?php echo e(session('status_danger')); ?></h6>
</div>
<?php endif; ?>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/layouts/includes/messages.blade.php ENDPATH**/ ?>