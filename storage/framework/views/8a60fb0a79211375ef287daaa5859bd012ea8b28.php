
<input class="form-control <?php echo e($errors->first($name) ? 'is-invalid' : ''); ?>" id="<?php echo e($name); ?>" type="file"
 name="<?php echo e($name); ?>" onchange="readURL(this, '<?php echo e($name); ?>-preview')" <?php echo e(isset($multiple) ? 'multiple' : ''); ?> >
 
<img src="<?php echo e($value ? asset('img/'. $value) : asset('img/no-image.png')); ?>" id="<?php echo e($name); ?>-preview" class="mt-2 img-fluid img-thumbnail">
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/layouts/includes/imagePreview.blade.php ENDPATH**/ ?>