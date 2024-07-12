<!-- End .mobil-menu-overlay -->
<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="<?php echo e(url('')); ?>">Home</a>
                </li>
                <?php
                    $getCategoryMobile = App\Models\CategoryModel::getRecordMenu();
                ?>
                <?php $__currentLoopData = $getCategoryMobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_m_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($value_m_c->getSubCategory->count())): ?>
                        <li>
                            <a href="<?php echo e(url($value_m_c->slug)); ?>"><?php echo e($value_m_c->name); ?></a>
                            <ul>
                                <?php $__currentLoopData = $value_m_c->getSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_m_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li><a href="<?php echo e(url($value_m_c->slug.'/'.$value_m_sub->slug)); ?>"><?php echo e($value_m_sub->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
    </div>
</div>
<?php /**PATH D:\TechHub\resources\views/layouts/_mobile_menu.blade.php ENDPATH**/ ?>