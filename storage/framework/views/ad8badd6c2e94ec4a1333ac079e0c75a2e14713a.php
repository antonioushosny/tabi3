
<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
          <i class="nav-icon icon-home"></i> <?php echo e(__('lang.home')); ?>

        </a>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-language"></i> <?php echo e(__('lang.languages')); ?></a>
        <ul class="nav-dropdown-items">
          
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('setlang',['lang'=>'ar'])); ?>">
                <i class="nav-icon icon-globe"></i> <?php echo e(__('lang.ar')); ?></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('setlang',['lang'=>'en'])); ?>">
                <i class="nav-icon icon-globe"></i> <?php echo e(__('lang.en')); ?></a>
            </li>
        
        </ul>
      </li>
      
        
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-arrow-circle-down"></i> <?php echo e(__('lang.admins')); ?></a>
          <ul class="nav-dropdown-items">

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admins')); ?>">
                  <?php echo e(__('lang.admins')); ?></a>
              </li>
          
          </ul>
        </li>

        
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-arrow-circle-down"></i> <?php echo e(__('admin.countries')); ?></a>
          <ul class="nav-dropdown-items">

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('countries')); ?>">
                  <?php echo e(__('admin.countries')); ?></a>
              </li>

              
              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('cities')); ?>">
                  <?php echo e(__('admin.cities')); ?></a>
              </li>

              
              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('areas')); ?>">
                  <?php echo e(__('admin.areas')); ?></a>
              </li>

              
              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('locations')); ?>">
                  <?php echo e(__('admin.locations')); ?></a>
              </li>
          
          </ul>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('categories')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.categories')); ?>

            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('departments')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.departments')); ?>

            </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('subcategories')); ?>" >
            <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.subcategories')); ?>

          </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('delegates')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.delegates')); ?>

            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('payments')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.payments')); ?>

            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('advertisements')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.advertisements')); ?>

            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('advertisingAdvertisements')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.advertisingAdvertisements')); ?>

            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('users')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.users')); ?>

            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('contacts')); ?>" >
              <i class="nav-icon fa fa-th-list"></i> <?php echo e(__('admin.contacts')); ?>

            </a>
        </li>
        
        
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-cogs"></i> <?php echo e(__('lang.settings')); ?></a>
          <ul class="nav-dropdown-items">

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('editsetting','about')); ?>">
                  <?php echo e(__('admin.AboutUs')); ?></a>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('editsetting','term')); ?>">
                  <?php echo e(__('admin.Terms')); ?></a>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('editsetting','install')); ?>">
                  <?php echo e(__('admin.install_ads')); ?></a>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('editsetting','star')); ?>">
                  <?php echo e(__('admin.star_ads')); ?></a>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('editsetting','uploade_video')); ?>">
                  <?php echo e(__('admin.uploade_video')); ?></a>
              </li>


              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('messages')); ?>">
                  <?php echo e(__('admin.messages')); ?></a>
              </li>
          
          </ul>
        </li>

    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/layouts/includes/sidebar.blade.php ENDPATH**/ ?>