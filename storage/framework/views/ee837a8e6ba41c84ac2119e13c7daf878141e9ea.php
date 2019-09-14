<?php $__env->startSection('content'); ?>
<div class="page-header-image" style="background-image:url(images/logo.jpeg); background-size: contain;"></div>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">
                <form action="<?php echo e(route('login')); ?>" method="POST" class="form" id="loginform" autocomplete="off">
                    <?php echo csrf_field(); ?>
                        <div class="header">
 
                            <?php if(session('status')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="logo-container">
                                 <img src="<?php echo e(asset('images/Logo.PNG')); ?>" alt=""> 
                            </div>
                        <h5><?php echo e(__(('admin.sign'))); ?></h5>
                        </div>
                        <?php if(Session::has('error')): ?>

                            <div class="alert alert-danger">
                                <strong><?php echo e(__('admin.error')); ?>!</strong> <?php echo e(Session::get('error')); ?>.
                            </div>
                            
                        <?php endif; ?>
                        <div class="content">                                                
                            <div class="input-group input-lg">
                                <input type="text" name="email" class="form-control" placeholder="<?php echo e(trans('admin.placeholder_email')); ?>" value="<?php echo e(old('email')); ?>"  autofocus>
                                <!-- <input type="text" class="form-control" placeholder="Enter User Name" value="<?php echo e(old('email')); ?>"  autofocus> -->
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-account-circle"></i>
                                </span>
                                
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong ><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                            
                            <div class="input-group input-lg">
                                <input type="password"  placeholder="<?php echo e(trans('admin.placeholder_password')); ?>" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" >
                                <!-- <input type="password" placeholder="Password" class="form-control" /> -->
                                <span class="input-group-addon">
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
                            <button type="submit" class="btn btn-primary  btn-round btn-lg btn-block"><?php echo e(trans('admin.sign')); ?></button>
                        <h5><a href="<?php echo e(Url('password/reset')); ?>" class="link"><?php echo e(__('admin.Forgot Password Or First Login ?')); ?></a></h5>
                        </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp7\htdocs\tabi3\resources\views/auth/login.blade.php ENDPATH**/ ?>