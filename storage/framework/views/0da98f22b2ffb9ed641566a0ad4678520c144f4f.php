
<?php
  $activeLocale = old('activeLocale', 'general');
?>

<div class="card-body">
  <?php echo $__env->make('admin.layouts.includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="row">

        <div class="col-lg-9">
          <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(__('admin.title_ar')); ?><span class="text-danger"> *</span></label>

            <div class="col-md-9">
              <input class="form-control <?php echo e($errors->first('title_ar') ? 'is-invalid' : ''); ?>" type="text"
                name="title_ar" placeholder="<?php echo e(__('admin.title_ar')); ?>"
                value="<?php echo e(old('title_ar', isset($countrie) ? $countrie->title_ar : '')); ?>">
              <?php if($errors->first('title_ar')): ?>
                <div class="invalid-feedback"><?php echo e($errors->first('title_ar')); ?></div>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(__('admin.title_en')); ?><span class="text-danger"> *</span></label>

            <div class="col-md-9">
              <input class="form-control <?php echo e($errors->first('title_en') ? 'is-invalid' : ''); ?>" type="text"
                name="title_en" placeholder="<?php echo e(__('admin.title_en')); ?>"
                value="<?php echo e(old('title_en', isset($countrie) ? $countrie->title_en : '')); ?>">
              <?php if($errors->first('title_en')): ?>
                <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="image"><?php echo e(__('lang.img')); ?><span class="text-danger"> *</span></label>
            <div class="col-md-9">
              <?php echo $__env->make('admin.layouts.includes.imagePreview', ['name' => 'image', 'value' => isset($countrie) ? $countrie->image : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php if($errors->first('image')): ?>
                <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(__('lang.status')); ?><span class="text-danger"> *</span></label>
            <div class="col-md-9 col-form-label">
              <?php
                $status = old('status', isset($countrie) ? $countrie->status : 'active');
              ?>
              <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" id="active" type="radio" value="active" name="status" <?php echo e($status == 'active' ? 'checked' : ''); ?>>
                <label class="form-check-label" for="active"><?php echo e(__('lang.active')); ?></label>
              </div>
              <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" id="stopped" type="radio" value="not_active" name="status" <?php echo e($status == 'not_active' ? 'checked' : ''); ?>>
                <label class="form-check-label" for="stopped"><?php echo e(__('lang.stopped')); ?></label>
              </div>
              <?php if($errors->first('status')): ?>
                <div class="invalid-feedback"><?php echo e($errors->first('status')); ?></div>
              <?php endif; ?>
            </div>
          </div>

        </div>
 
      </div>

 
   
 
   
 
</div>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/sections/countries/form.blade.php ENDPATH**/ ?>