<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('rtl/plugins/iCheck/square/blue.css')); ?>">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script> -->

<?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2><?php echo e(__('admin.dashboard')); ?>

                <small><?php echo e(__('admin.Welcome to beitk')); ?></small>
                </h2>
            </div>            
                <?php if($lang =='ar'): ?>
                <div class="col-lg-7 col-md-7 col-sm-12 text-left">
                <ul class="breadcrumb float-md-left" style=" padding: 0.6rem; direction: ltr; ">
                <?php else: ?> 
                <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                <?php endif; ?>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><i class="zmdi zmdi-home"></i><?php echo e(__('admin.dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="zmdi zmdi-accounts-add"></i> <?php echo e(__('admin.contacts')); ?></a></li>
                </ul>
            </div>
        </div>
    </div>

     
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                <?php echo Form::open(['route'=>['contactsdeleteall'],'method'=>'post','autocomplete'=>'off', 'id'=>'contactss_form' ]); ?>


                        <div class="header">
                            <h2><strong><?php echo e(trans('admin.'.$title)); ?></strong> </h2>
                            <ul class="header-dropdown">
  
                                </li>
                                    <a href="javascript:void(0);" class=" deleteall-modal btn btn-danger btn-round" title="<?php echo e(trans('admin.deleteall')); ?>">
                                        <?php echo e(trans('admin.deleteall')); ?>

                                    </a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="body">
                            <?php if($lang == 'ar'): ?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable-ar">
                            <?php else: ?> 
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <?php endif; ?>
                                <thead>
                                    <tr>
                                         
                                      <th><input type="checkbox" class="checkbox icheck" id="check-all" /></th>
                                      <th><?php echo e(trans('admin.name')); ?></th>
                                      <th><?php echo e(trans('admin.email')); ?></th>
                                      <th><?php echo e(trans('admin.title')); ?></th>
                                      <th><?php echo e(trans('admin.message')); ?></th>
                                      <th><?php echo e(trans('admin.date')); ?></th>
                                      <th><?php echo e(trans('admin.actions')); ?></th>
                                    </tr>
                                  </thead>
           
                                  <tbody id="contacttable">
                                      <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php  
                                      $string = substr( $data->message,0,100).'...'; ?>
                                        <tr class="item<?php echo e($data->id); ?>">
                                          <td><input type="checkbox" name="ids[]" value=<?php echo e($data->id); ?> class="check icheck"></td>
                                          <td><?php echo e($data->name); ?></td>
                                          <td><?php echo e($data->email); ?></td>
                                          <td><?php echo e($data->title); ?></td>
                                          <td><?php echo e($string); ?></td>
                                          <td><?php echo e($data->created_at->format('Y-m-d H:i:s')); ?></td>
           
                                           <td>
                                               
                                                <a href="javascript:void(0);" class=" delete-modal btn btn-danger waves-effect waves-float waves-red btn-round " title="<?php echo e(trans('admin.delete')); ?>" data-id="<?php echo e($data->id); ?>" ><i class="zmdi zmdi-delete"></i></a>
                                          </td>  
                        
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  
    </div>
</section>
  
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('rtl/plugins/iCheck/icheck.min.js')); ?>"></script> 

<script>

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
        
    $('#check-all').on('ifChecked', function(event) {
        $('.check').iCheck('check');

    });
    $('#check-all').on('ifUnchecked', function(event) {
        $('.check').iCheck('uncheck');
        
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    $('#check-all').on('ifChanged', function(event){
        if(!this.changed) {
            this.changed=true;
            $('#check-all').iCheck('check');
        
        } else {
            this.changed=false;
            $('#check-all').iCheck('uncheck');
    
        }
        $('#check-all').iCheck('update');
    });
    //this for delete
    $(document).on('click', '.delete-modal', function() {

        titlet ="<?php echo e(__('admin.alert_title')); ?>" ;
        textt ="<?php echo e(__('admin.alert_text')); ?>" ;
        typet ="<?php echo e(__('admin.warning')); ?>" ;
        confirmButtonTextt ="<?php echo e(__('admin.confirmButtonText')); ?>" ;
        cancelButtonTextt ="<?php echo e(__('admin.cancelButtonText')); ?>" ;
        Deleted ="<?php echo e(__('admin.Deleted!')); ?>" ;
        has_been_deleted = "<?php echo e(__('admin.has_been_deleted')); ?>" ;
        success ="<?php echo e(__('admin.success')); ?>" ;
        Cancelled ="<?php echo e(__('admin.Cancelled')); ?>" ;
        file_is_safe ="<?php echo e(__('admin.file_is_safe')); ?>" ;
        no_elemnet_selected ="<?php echo e(__('admin.no_elemnet_selected')); ?>" ;
        error ="<?php echo e(__('admin.error')); ?>" ;
        id = $(this).data('id') ;
        swal({
            title: titlet,
            text: textt,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: confirmButtonTextt,
            cancelButtonText: cancelButtonTextt,
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo url('/')?>/contacts/delete/" + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(data) {
                        $('.item' + data['id']).remove();
                        swal(Deleted, has_been_deleted, "success");
                    }
                });
            } else {
                swal(Cancelled, file_is_safe, "error");
            }
        });
        // $('#deleteModal').modal('show');
        // id = $('#id_delete').val();
    });
    //this for delete all selected
    $(document).on('click', '.deleteall-modal', function() {

        titlet ="<?php echo e(__('admin.alert_title')); ?>" ;
        textt ="<?php echo e(__('admin.alert_text')); ?>" ;
        typet ="<?php echo e(__('admin.warning')); ?>" ;
        confirmButtonTextt ="<?php echo e(__('admin.confirmButtonText')); ?>" ;
        cancelButtonTextt ="<?php echo e(__('admin.cancelButtonText')); ?>" ;
        Deleted ="<?php echo e(__('admin.Deleted!')); ?>" ;
        has_been_deleted = "<?php echo e(__('admin.has_been_deleted')); ?>" ;
        success ="<?php echo e(__('admin.success')); ?>" ;
        Cancelled ="<?php echo e(__('admin.Cancelled')); ?>" ;
        file_is_safe ="<?php echo e(__('admin.file_is_safe')); ?>" ;
        no_elemnet_selected ="<?php echo e(__('admin.no_elemnet_selected')); ?>" ;
        error ="<?php echo e(__('admin.error')); ?>" ;
        swal({
            title: titlet,
            text: textt,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: confirmButtonTextt,
            cancelButtonText: cancelButtonTextt,
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                var choices = [];
                checkboxes = document.getElementsByName('ids[]');
                for (var i=0;i<checkboxes.length;i++){
                    if ( checkboxes[i].checked ) {
                    choices.push(checkboxes[i].value);
                    }
                }
                if(choices.length >= 1){
                    var form = $(this);
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo e(URL::route("contactsdeleteall")); ?>',
                        data:  new FormData($("#contactss_form")[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            for (var i=0;i<data.length;i++){
                                $('.item' + data[i]).remove();
                            }
                            swal(Deleted, has_been_deleted, "success");
                        },
                    });
                }
                else{
                    swal(Cancelled, no_elemnet_selected, "error");
                }

            } else {
                swal(Cancelled, file_is_safe, "error");
            }
        });
        // $('#deleteModal').modal('show');
        // id = $('#id_delete').val();
    });
    
</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tabi3\resources\views/contacts/index.blade.php ENDPATH**/ ?>