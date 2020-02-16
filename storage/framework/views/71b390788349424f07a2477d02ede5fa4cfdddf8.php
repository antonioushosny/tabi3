<?php $__env->startSection('main'); ?>
  <main class="main">
  	
  	
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?php echo e(__('lang.home')); ?></li>
      <li class="breadcrumb-item  active"><?php echo e(__('lang.countries')); ?></li>
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">

      	
      	<?php echo $__env->make('admin.layouts.includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      	
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="<?php echo e(route('countries')); ?>" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
	                <a href="<?php echo e(route('addcountrie')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                </div>
                <div class="form-group col-12 col-md-1 text-center">
                </div>
                <div class="form-group col-12 col-md-3 text-center">
                  <input class="form-control" type="text" name="title_ar" placeholder="<?php echo e(__('admin.title_ar')); ?>" value="<?php echo e(old('title_ar')); ?>">
                </div>

				<div class="form-group col-12 col-md-3 text-center">
                  <input class="form-control" type="text" name="title_en" placeholder="<?php echo e(__('admin.title_en')); ?>" value="<?php echo e(old('title_en')); ?>">
                </div>

                <div class="form-group col-12 col-md-2 text-center">
						      <select class="form-control" name="status">
						        <option value=""><?php echo e(__('lang.selectStatus')); ?></option>
						        <option value="active1" <?php echo e(old('status') === 'active' ? 'selected' : ''); ?>><?php echo e(__('lang.active')); ?></option>
						        <option value="not_active" <?php echo e(old('status') === 'not_active' ? 'selected' : ''); ?>><?php echo e(__('lang.stopped')); ?></option>
						      </select>
                </div>
                <div class="form-group col-12 col-md-2 text-center">
                	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                	<button type="button" class="btn btn-secondary btn-sm search-reset"><i class="fa fa-ban"></i></button>
                </div>
              </div>
              <!-- /.row-->
            </form>
          </div>
        </div>

      	
        <div class="card d-none d-md-block">
          <div class="card-header">
          	<div class="row">
          		<div class="col-12 col-md-2 text-center"><strong><?php echo e(__('lang.id')); ?></strong></div>
          		<div class="col-12 col-md-2 text-center"><strong><?php echo e(__('admin.name_ar')); ?></strong></div>
          		<div class="col-12 col-md-2 text-center"><strong><?php echo e(__('admin.name_en')); ?></strong></div>
          		<div class="col-12 col-md-2 text-center"><strong><?php echo e(__('lang.image')); ?></strong></div>
          		<div class="col-12 col-md-2 text-center"><strong><?php echo e(__('lang.status')); ?></strong></div>
          		<div class="col-12 col-md-2 text-center"><strong><?php echo e(__('lang.actions')); ?></strong></div>
          	</div>
          </div>
        </div>

      	
			<?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		        <div class="card <?php echo e($loop->even ? 'even-record' : ''); ?>">
		          <div class="card-body">
		          	<div class="row">
		          		<div class="col-xs-12 col-md-2 text-md-center">
							<div class="row mb-2 mb-md-0">
								<div class="col-4 d-block d-md-none"><strong><?php echo e(__('lang.id')); ?></strong></div>
								<div class="col-8 col-md-12"><?php echo e($country->id); ?></div>
							</div>
		          		</div>

		          		<div class="col-12 col-md-2 text-md-center">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong><?php echo e(__('admin.title_ar')); ?></strong></div>
		          				<div class="col-8 col-md-12"><?php echo e($country->title_ar); ?></div>
		          			</div>
		          		</div>

						<div class="col-12 col-md-2 text-md-center">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong><?php echo e(__('admin.title_en')); ?></strong></div>
		          				<div class="col-8 col-md-12"><?php echo e($country->title_en); ?></div>
		          			</div>
		          		</div>

						<div class="col-12 col-md-2 text-md-center">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong><?php echo e(__('admin.image')); ?></strong></div>
		          				<div class="col-8 col-md-12">
									<?php if($country->image): ?>
										<img src="<?php echo e(asset('img/').'/'.$country->image); ?>" width="100px" height="75px">
									<?php else: ?> 
										<img src="<?php echo e(asset('images/default.png')); ?>" width="50px" height="50px">
									<?php endif; ?>
								 </div>
		          			</div>
		          		</div>
						
		          		<div class="col-12 col-md-2 text-md-center">
							<div class="row mb-2 mb-md-0">
								<div class="col-4 d-block d-md-none"><strong><?php echo e(__('lang.status')); ?></strong></div>
								<div class="col-8 col-md-12">
									<?php if($country->status == 'active'): ?>
										<span class="badge badge-warning"><?php echo e(__('lang.active')); ?></span>
									<?php else: ?>
										<span class="badge badge-secondary"><?php echo e(__('lang.stopped')); ?></span>
									<?php endif; ?>
								</div>
							</div>
		          		</div>

		          		<div class="col-12 col-md-2">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong><?php echo e(__('lang.actions')); ?></strong></div>
		          				<div class="col-8 col-md-12">
		          					<form method="POST" action="<?php echo e(route('destroycountrie', $country->id)); ?>">
		          						<?php echo csrf_field(); ?>
		          						<?php echo method_field('GET'); ?>
 
										<a href="<?php echo e(route('editcountrie', $country->id)); ?>" 
											class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

										<button type="submit" class="btn btn-danger btn-sm delete-form">
											<i class="fa fa-trash"></i>
										</button>
 
		          					</form>
		          				</div>
		          			</div>
		          		</div>
		          	</div>
		          </div>
		        </div>
		         
        	 
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<div class="card">
						<div class="card-body text-center text-danger">
							<?php echo e(__('lang.noData')); ?>

						</div>
					</div>
				<?php endif; ?>

				<?php echo e($countries->links()); ?>

      </div>
    </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/sections/countries/index.blade.php ENDPATH**/ ?>