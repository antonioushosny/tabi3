<?php $__env->startSection('style'); ?>
<style>
    .page-header-image
    {
        background-color: #364150!important;
    }
    body
    {
        
    }
    .card-plain
    {
        background-color:#eceef1;
         /* padding: 20px; */
    }
    .form-control:active,.form-control:focus {
        border: 1px solid #c3ccda;
    }
    .form-control {
        background-color: #dde3ec;
        height: 43px;
        color: #8290a3;
        border: 1px solid #dde3ec;
    }
    .btn.btn-primary{
        background-color:#0046B0;
        color: #FFF;
        
    }
    /* .btn.btn-primary:hover{
        color: #FFF;
        background-color: #1f858e;
        border-color: #18666d;
    } */
    h5>a.link
    {
        color:black!important;
    }
    span.input-group-addon
    {
        color:#cccccc !important;
    }
    .authentication .card-plain.card-plain .form-control,.authentication .card-plain.card-plain .form-control:focus
    {
        color: #000;
    }
    .invalid-feedback
    {
        color: #e73d4a;
    }
    body, .page-header{
        background-color: #364150   !important;
    }
    .delete-border{
        border-radius: 0px !important; 
    }
    .authentication .card-plain.card-plain .input-group-addon {

        background-color: #dde3ec !important; 
        border-color: rgb(255, 255, 255) !important;
        color: #fff;

    }
    ::placeholder {
        color: #a19ca3 !important;
        
        text-align: right;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header-image" ></div>

<div class="container" style="padding :20px ;">
        

    <div class="col-md-12 content-center card-plain"  style="top: 50%;">
        <!-- <div class="card-plain"> -->
                <form action="<?php echo e(route('login')); ?>" method="POST" class="form" id="loginform" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    
                        <div class="header" >
                            <div class="logo-container"   >
                                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
                            </div>  
                            <?php if(session('status')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                           
                            <br>

                        <h5 style="color: #0046B0;"><?php echo e(__(('admin.sign'))); ?></h5>
                        </div>
                        <?php if(Session::has('error')): ?>

                            <div class="alert alert-danger">
                                <strong><?php echo e(__('admin.error')); ?>!</strong> <?php echo e(Session::get('error')); ?>.
                            </div>
                            
                        <?php endif; ?>
                        <div class="content">   
                                
                        

                        
                            <div class="input-group  ">
                                <input type="text" name="email" class="form-control delete-border" placeholder="<?php echo e(trans('admin.placeholder_email')); ?>" value="<?php echo e(old('email')); ?>"  autofocus>
                                <!-- <input type="text" class="form-control" placeholder="Enter User Name" value="<?php echo e(old('email')); ?>"  autofocus> -->
                                <span class="input-group-addon delete-border">
                                    <i class="zmdi zmdi-account"></i>
                                </span>
                                
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong ><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                            
                            <div class="input-group input-lg">
                                <input type="password"  placeholder="<?php echo e(trans('admin.placeholder_password')); ?>" class="delete-border form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?> " name="password" >
                                <!-- <input type="password" placeholder="Password" class="form-control" /> -->
                                <span class="input-group-addon delete-border">
                                    <i class="zmdi zmdi-lock"></i>
                                </span>
                                
                            </div>
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="footer text-center">
                            <!-- <a href="index.html" class="btn btn-primary btn-round btn-lg btn-block ">SIGN IN</a> -->
                            <button type="submit" class="btn btn-primary  btn-round btn-lg btn-block delete-border"><?php echo e(trans('admin.sign')); ?></button>
                        <h5><a href="<?php echo e(Url('password/reset')); ?>" class="link"><?php echo e(__('admin.Forgot Password Or First Login ?')); ?></a></h5>
                        </div>
                </form>
        <!-- </div> -->
    </div>
</div>
<?php $__env->stopSection(); ?> 


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tabi3\resources\views/auth/login.blade.php ENDPATH**/ ?>