<div class="products mb-3">
    <div class="row justify-content-center">
        <?php $__currentLoopData = $getProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $getProductImage = $value->getImageSingle($value->id);
            ?>


        <div class="col-12 <?php if(!empty($is_home)): ?> col-md-3 col-lg-3 <?php else: ?> col-md-4 col-lg-4 <?php endif; ?> ">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="<?php echo e(url($value->slug)); ?>">
                        <?php if(!empty($getProductImage) && !empty($getProductImage->getLogo())): ?>
                          <img style="height: 280px;width: 100%;object-fit: cover;" src="<?php echo e($getProductImage->getLogo()); ?>" alt="<?php echo e($value->title); ?>" class="product-image">
                        <?php endif; ?>
                    </a>

                    <div class="product-action-vertical">
                        <?php if(!empty(Auth::check())): ?>
                           <a href="javascript:;" data-toggle="modal" class=" add_to_wishlist add_to_wishlist<?php echo e($value->id); ?> btn-product-icon btn-wishlist btn-expandable <?php echo e(!empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : ''); ?>"  id="<?php echo e($value->id); ?>" title="Wishlist"><span>add to wishlist</span></a>
                        <?php else: ?>
                            <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                        <?php endif; ?>                                         
                    </div>                                            
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="<?php echo e(url($value->category_slug.'/'.$value->sub_category_slug)); ?>"><?php echo e($value->sub_category_name); ?></a>
                    </div>
                    <h3 class="product-title"><a href="<?php echo e(url($value->slug)); ?>"><?php echo e($value->title); ?></a></h3>
                    <div class="product-price">
                        $<?php echo e(number_format($value->price, 2)); ?>

                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: <?php echo e($value->getReviewRating($value->id)); ?>%;"></div>
                        </div>
                        <span class="ratings-text">( <?php echo e($value->getTotalReview()); ?> Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div><?php /**PATH D:\TechHub\resources\views/product/_list.blade.php ENDPATH**/ ?>