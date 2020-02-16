<?php $__env->startSection('main'); ?>
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?php echo e(__('lang.home')); ?></li>
      <li class="breadcrumb-item">
        <a href="<?php echo e(route('admins')); ?>"><?php echo e(__('lang.admins')); ?></a>
      </li>
      <li class="breadcrumb-item  active"><?php echo e(__('lang.edit')); ?></li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-header">
            <strong><?php echo e(__('lang.edit')); ?></strong>
          </div>
          <form class="form-horizontal" action="<?php echo e(route('storeadmin')); ?>" method="post" enctype="multipart/form-data">
          	<?php echo csrf_field(); ?>
          	<!-- <?php echo method_field('PUT'); ?> -->
          	<?php echo $__env->make('admin.sections.admins.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	          <div class="card-footer">
                <input type="hidden" value="<?php echo e($admin->id); ?>" name="id" >
  	            <a href="<?php echo e(route('admins')); ?>" class="btn btn-sm btn-secondary">
  	              <i class="fa fa-arrow-left"></i>
                </a>
             
              <button class="btn btn-sm btn-success" type="submit">
                <i class="fa fa-save"></i>
              </button>
	          </div>
          </form>
        </div>
      </div>
    </div>
  </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/sections/admins/edit.blade.php ENDPATH**/ ?>