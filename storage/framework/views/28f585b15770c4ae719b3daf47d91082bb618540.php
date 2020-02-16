
<?php
  $lang = session('lang');
  App::setLocale($lang);
  $lang = App::getlocale();
  if($lang == null){
      $lang ='ar';
  }
  $locale = $lang ;
   
  if($locale == 'ar'){
    $dir = 'rtl';
  }else{
    $dir = 'ltr';
  }
   
  $nav = $dir == 'ltr' ? 'ml-auto' : 'mr-auto';
  $dropdown = $dir == 'ltr' ? 'dropdown-menu-right' : 'dropdown-menu-left';

?>
<header class="app-header navbar">
  
  <div class="container-fluid row " >
        <button class="   navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class=" col-lg-1 col-md-2 navbar-brand" href="<?php echo e(route('home')); ?>">
          <img class="d-md-down-none" src="<?php echo e(asset($locale == 'ar' ? 'images/logo.png' : 'images/logo.png')); ?>" height="25" alt="AppLife">

          <img class="d-lg-none" src="<?php echo e(asset($locale == 'ar' ? 'images/logo.png' : 'images/logo.png')); ?>" height="30" alt="AppLife">
        </a>

        <div class="col-lg-10  col-md-8 row m-0 p-0 d-md-down-none">
          <ul class="nav navbar-nav d-md-down-none">
            
            
            <li class="nav-item px-3">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo e(__('admin.admins')); ?>

                <i class="fa fa-arrow-circle-down"></i>
              </a>

              <div class="dropdown-menu <?php echo e($dropdown); ?>">

                

                <a class="dropdown-item" href="<?php echo e(route('admins')); ?>">
                  <?php echo e(__('admin.admins')); ?>

                </a>
            
              </div>
            </li>

            
            <li class="nav-item px-3">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo e(__('admin.countries')); ?>

                <i class="fa fa-arrow-circle-down"></i>
              </a>

              <div class="dropdown-menu <?php echo e($dropdown); ?>">

                
                <a class="dropdown-item" href="<?php echo e(route('countries')); ?>">
                  <?php echo e(__('admin.countries')); ?>

                </a>

                
                <a class="dropdown-item" href="<?php echo e(route('cities')); ?>">
                  <?php echo e(__('admin.cities')); ?>

                </a>

                
                <a class="dropdown-item" href="<?php echo e(route('areas')); ?>">
                  <?php echo e(__('admin.areas')); ?>

                </a>

                
                <a class="dropdown-item" href="<?php echo e(route('locations')); ?>">
                  <?php echo e(__('admin.locations')); ?>

                </a>
            
              </div>
            </li>

            
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('categories')); ?>" >
                  <?php echo e(__('admin.categories')); ?> 
                </a>
            </li>

              
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('departments')); ?>" >
                  <?php echo e(__('admin.departments')); ?>

                </a>
            </li>

            
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('subcategories')); ?>" >
                  <?php echo e(__('admin.subcategories')); ?>

                </a>
            </li>

              
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('delegates')); ?>" >
                  <?php echo e(__('admin.delegates')); ?>

                </a>
            </li>

              
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('payments')); ?>" >
                  <?php echo e(__('admin.payments')); ?>

                </a>
            </li>

            
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('advertisements')); ?>" >
                  <?php echo e(__('admin.advertisements')); ?>

                </a>
            </li>
              
              
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('advertisingAdvertisements')); ?>" >
                  <?php echo e(__('admin.advertisingAdvertisements')); ?>

                </a>
            </li>

            
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('users')); ?>" >
                  <?php echo e(__('admin.users')); ?>

                </a>
            </li>

            
            <li class="nav-item px-3">
                <a class="nav-link" href="<?php echo e(route('contacts')); ?>" >
                  <?php echo e(__('admin.contacts')); ?>

                </a>
            </li>
            
            
            <li class="nav-item px-3">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cogs"></i>
                <?php echo e(__('lang.settings')); ?>

                <i class="fa fa-arrow-circle-down"></i>
              </a>

              <div class="dropdown-menu <?php echo e($dropdown); ?>">

                

                <a class="dropdown-item" href="<?php echo e(route('editsetting','about')); ?>">
                  <?php echo e(__('admin.AboutUs')); ?>

                </a>

                <a class="dropdown-item" href="<?php echo e(route('editsetting','term')); ?>">
                  <?php echo e(__('admin.Terms')); ?>

                </a>

                <a class="dropdown-item" href="<?php echo e(route('editsetting','install')); ?>">
                  <?php echo e(__('admin.install_ads')); ?>

                </a>

                <a class="dropdown-item" href="<?php echo e(route('editsetting','star')); ?>">
                  <?php echo e(__('admin.star_ads')); ?>

                </a>

                <a class="dropdown-item" href="<?php echo e(route('editsetting','uploade_video')); ?>">
                  <?php echo e(__('admin.uploade_video')); ?>

                </a>

                <a class="dropdown-item" href="<?php echo e(route('messages')); ?>">
                  <?php echo e(__('admin.messages')); ?>

                </a>
            
              </div>
            </li>


          </ul>
        </div>

        <div class="col-lg-1 col-md-2 col-4 row m-0 p-0  ">

          <ul class="nav navbar-nav <?php echo e($nav); ?>">
            <li class="nav-item d-md-down-none ">
              
              <?php
                $NotLocale = $locale == 'ar' ? 'en' : 'ar';
              ?>
              <a class="nav-link"
              href="<?php echo e(route('setlang',['lang'=>$NotLocale])); ?>">
                <i class="icon-globe"></i>
                <?php echo e(__('lang.'. $NotLocale . '-inverse' )); ?>

              </a>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="nav-icon icon-user"></i>
              </a>
              <div class="dropdown-menu <?php echo e($dropdown); ?>">
                <div class="dropdown-header text-center">
                  <strong><?php echo e(auth()->user()->name); ?></strong>
                </div>
                <a class="dropdown-item" href=" ">
                  <i class="fa fa-user"></i> <?php echo e(__('lang.profile')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" data-close="true" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa fa-lock"></i> <?php echo e(__('lang.logout')); ?></a> 
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
                </form>
              </div>
            </li>
          </ul>
        </div>

  </div>

</header>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/layouts/includes/header.blade.php ENDPATH**/ ?>