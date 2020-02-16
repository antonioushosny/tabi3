<script>

	 CKEDITOR.replace( 'ar-ckeditor',
	  {
	     filebrowserBrowseUrl: "<?php echo e(asset('vendors/ckfinder/ckfinder.html?Type=Files')); ?>",
	     filebrowserImageBrowseUrl: "<?php echo e(asset('vendors/ckfinder/ckfinder.html?Type=Images')); ?>",
	     filebrowserUploadUrl: "<?php echo e(asset('vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>",
	     filebrowserImageUploadUrl: "<?php echo e(asset('vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>",
	  });

	 CKEDITOR.replace( 'en-ckeditor',
	  {
	     filebrowserBrowseUrl: "<?php echo e(asset('vendors/ckfinder/ckfinder.html?Type=Files')); ?>",
	     filebrowserImageBrowseUrl: "<?php echo e(asset('vendors/ckfinder/ckfinder.html?Type=Images')); ?>",
	     filebrowserUploadUrl: "<?php echo e(asset('vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>",
	     filebrowserImageUploadUrl: "<?php echo e(asset('vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>",
	  });


</script>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/layouts/includes/ckeditor.blade.php ENDPATH**/ ?>