
<div class="card-body">
	<?php echo $__env->make('admin.layouts.includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-lg-9">
      <div class="form-group row">
        <label class="col-md-3 col-form-label" for="name"><?php echo e(__('lang.name')); ?><span class="text-danger"> *</span></label>
        <div class="col-md-9">
          <input class="form-control <?php echo e($errors->first('name') ? 'is-invalid' : ''); ?>" id="name" type="text" name="name" placeholder="<?php echo e(__('lang.name')); ?>"
           value="<?php echo e(old('name', isset($admin) ? $admin->name : '')); ?>">
          <?php if($errors->first('name')): ?>
            <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-3 col-form-label" for="email"><?php echo e(__('lang.email')); ?><span class="text-danger"> *</span></label>
        <div class="col-md-9">
          <input class="form-control <?php echo e($errors->first('email') ? 'is-invalid' : ''); ?>" id="email" type="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"
           value="<?php echo e(old('email', isset($admin) ? $admin->email : '')); ?>">
          <?php if($errors->first('email')): ?>
            <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-3 col-form-label" for="password"><?php echo e(__('lang.password')); ?><span class="text-danger"> *</span></label>
        <div class="col-md-9">
          <input class="form-control <?php echo e($errors->first('password') ? 'is-invalid' : ''); ?>" id="password" type="password" name="password" placeholder="<?php echo e(__('lang.password')); ?>">
          <?php if($errors->first('password')): ?>
            <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
          <?php endif; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 col-form-label" for="password_confirmation"><?php echo e(__('lang.confirmPassword')); ?><span class="text-danger"> *</span></label>
        <div class="col-md-9">
          <input class="form-control <?php echo e($errors->first('password_confirmation') ? 'is-invalid' : ''); ?>" id="password_confirmation" type="password"
           name="password_confirmation" placeholder="<?php echo e(__('lang.confirmPassword')); ?>">
          <?php if($errors->first('password_confirmation')): ?>
            <div class="invalid-feedback"><?php echo e($errors->first('password_confirmation')); ?></div>
          <?php endif; ?>
        </div>
      </div>

      <div class="form-group row">
          <label class="col-md-3 col-form-label" for="image"><?php echo e(__('lang.img')); ?><span class="text-danger"> *</span></label>
          <div class="col-md-9">
            <?php echo $__env->make('admin.layouts.includes.imagePreview', ['name' => 'image', 'value' => isset($admin) ? $admin->image : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if($errors->first('image')): ?>
              <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
            <?php endif; ?>
          </div>
      </div>
       
      
      <div class="form-group row">
        <label class="col-md-3 col-form-label"><?php echo e(__('lang.status')); ?><span class="text-danger"> *</span></label>
        <div class="col-md-9 col-form-label">
          <?php
            $status = old('status', isset($admin) ? $admin->status : 'active');
          ?>
          <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="active" type="radio" value="active" name="status" <?php echo e($status == 'active' ? 'checked' : ''); ?>>
            <label class="form-check-label" for="active"><?php echo e(__('lang.active')); ?></label>
          </div>
          <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="not_active" type="radio" value="not_active" name="status" <?php echo e($status == 'not_active' ? 'checked' : ''); ?>>
            <label class="form-check-label" for="not_active"><?php echo e(__('lang.stopped')); ?></label>
          </div>
          <?php if($errors->first('status')): ?>
            <div class="invalid-feedback"><?php echo e($errors->first('status')); ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/sections/admins/form.blade.php ENDPATH**/ ?>