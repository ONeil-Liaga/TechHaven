  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php
        $getUnreadNotification = App\Models\NotificationModel::getUnreadNotification();
      ?>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo e($getUnreadNotification->count()); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo e($getUnreadNotification->count()); ?> Notifications</span>
          <?php $__currentLoopData = $getUnreadNotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e($noti->url); ?>?noti_id=<?php echo e($noti->id); ?>" class="dropdown-item">
            <div><?php echo e($noti->message); ?></div>
            <div class="text-muted text-sm"><?php echo e(date('d-m-Y h:i A', strtotime($noti->created_at))); ?></div>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(url('admin/notification')); ?>" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>


    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="brand-link" style="text-align: center;">
      <span class="brand-text"><?php echo e(Auth::user()->name); ?></span>
    </div>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-item">
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link <?php if(Request::segment(2) == 'dashboard'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


           <li class="nav-item">
            <a href="<?php echo e(url('admin/admin/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'admin'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>


         <li class="nav-item">
            <a href="<?php echo e(url('admin/customer/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'customer'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Customer
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo e(url('admin/orders/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'orders'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Orders
              </p>
            </a>
          </li>


         <li class="nav-item">
            <a href="<?php echo e(url('admin/category/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'category'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/sub_category/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'sub_category'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Sub Category
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo e(url('admin/brand/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'brand'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Brand
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/color/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'color'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Color
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="<?php echo e(url('admin/product/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'product'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Product
              </p>
            </a>
          </li>


           <li class="nav-item">
            <a href="<?php echo e(url('admin/discount_code/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'discount_code'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Discount Code
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?php echo e(url('admin/shipping_charge/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'shipping_charge'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Shipping Charge
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?php echo e(url('admin/slider/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'slider'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Slider
              </p>
            </a>
          </li>



           <li class="nav-item">
            <a href="<?php echo e(url('admin/partner/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'partner'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Partner Logo
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo e(url('admin/contactus')); ?>" class="nav-link <?php if(Request::segment(2) == 'contactus'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Contact us
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/page/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'page'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Page
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo e(url('admin/blog_category/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'blog_category'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Blog Category
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="<?php echo e(url('admin/blog/list')); ?>" class="nav-link <?php if(Request::segment(2) == 'blog'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Blog
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo e(url('admin/system-setting')); ?>" class="nav-link <?php if(Request::segment(2) == 'system-setting'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                System Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/payment-setting')); ?>" class="nav-link <?php if(Request::segment(2) == 'payment-setting'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Payment Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/home-setting')); ?>" class="nav-link <?php if(Request::segment(2) == 'home-setting'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Home Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/smtp-setting')); ?>" class="nav-link <?php if(Request::segment(2) == 'smtp-setting'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                SMTP Setting
              </p>
            </a>
          </li>




           <li class="nav-item">
            <a href="<?php echo e(url('admin/logout')); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>

    </div>

  </aside>
<?php /**PATH D:\TechHub\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>