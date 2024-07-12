<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
            </div>

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:<?php echo e($getSystemSettingApp->phone); ?>"><i class="icon-phone"></i>Call: <?php echo e($getSystemSettingApp->phone); ?></a></li>
                            <?php if(!empty(Auth::check())): ?>
                                <li><a href="<?php echo e(url('my-wishlist')); ?>"><i class="icon-heart-o"></i>My Wishlist</a></li>
                            <?php else: ?>
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-heart-o"></i>My Wishlist</a></li>
                            <?php endif; ?>

                            <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(url('contact')); ?>">Contact Us</a></li>
                            <?php if(!empty(Auth::check())): ?>
                                <li><a href="<?php echo e(url('user/dashboard')); ?>"><i class="icon-user"></i> <?php echo e(Auth::user()->name); ?></a></li>
                            <?php else: ?>
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                            <?php endif; ?>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="<?php echo e(url('')); ?>" class="logo">
                    <img src="<?php echo e($getSystemSettingApp->getLogo()); ?>" alt="" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="<?php echo e((Request::segment(1) == '') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('')); ?>">Home</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Shop</a>
                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                    <?php
                                        $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                    ?>
                                            <?php $__currentLoopData = $getCategoryHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_h_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($value_h_c->getSubCategory->count())): ?>
                                                    <div class="col-md-4" style="margin-bottom: 20px;">
                                                        <a href="<?php echo e(url($value_h_c->slug)); ?>" class="menu-title"><?php echo e($value_h_c->name); ?></a>
                                                        <ul>
                                                            <?php $__currentLoopData = $value_h_c->getSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_h_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><a href="<?php echo e(url($value_h_c->slug.'/'.$value_h_sub->slug)); ?>"><?php echo e($value_h_sub->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                            $getCategoryHeaderMenu = App\Models\CategoryModel::getRecordMenuHeader();
                        ?>
                         <?php $__currentLoopData = $getCategoryHeaderMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e((Request::segment(1) == $menu->slug) ? 'active' : ''); ?>">
                                <a href="<?php echo e(url($menu->slug)); ?>"><?php echo e($menu->name); ?></a>
                            </li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="<?php echo e(url('search')); ?>" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." value="<?php echo e(!empty(Request::get('q')) ? Request::get('q') : ''); ?>" required>
                        </div>
                    </form>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count"><?php echo e(Cart::getContent()->count()); ?></span>
                    </a>
                    <?php if(!empty(Cart::getContent()->count())): ?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <?php $__currentLoopData = Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header_cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $getCartProduct = App\Models\ProductModel::getSingle($header_cart->id);
                                    ?>

                                    <?php if(!empty($getCartProduct)): ?>

                                        <?php
                                            $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                                        ?>
                                    <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="<?php echo e(url($getCartProduct->slug)); ?>">
                                            <?php echo e($getCartProduct->title); ?>

                                            </a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty"><?php echo e($header_cart->quantity); ?></span>
                                            x $<?php echo e(number_format($header_cart->price, 2)); ?>

                                        </span>
                                    </div>

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="<?php echo e($getProductImage->getLogo()); ?>" alt="product">
                                        </a>
                                    </figure>
                                    <a href="<?php echo e(url('cart/delete/'.$header_cart->id)); ?>" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">$<?php echo e(number_format(Cart::getSubTotal(), 2)); ?></span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="<?php echo e(url('cart')); ?>" class="btn btn-primary">View Cart</a>
                                <a href="<?php echo e(url('checkout')); ?>" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\TechHub\resources\views/home/_header.blade.php ENDPATH**/ ?>