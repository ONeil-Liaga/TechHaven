
<?php $__env->startSection('style'); ?>
       <link rel="stylesheet" href="<?php echo e(url('assets/css/plugins/nouislider/nouislider.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url($getProduct->getCategory->slug)); ?>"><?php echo e($getProduct->getCategory->name); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)); ?>"><?php echo e($getProduct->getSubCategory->name); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($getProduct->title); ?></li>
                    </ol>
                </div>
            </nav>

            <div class="page-content">
                <div class="container">
                    <?php echo $__env->make('layouts._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="product-details-top mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery">
                                    <figure class="product-main-image">
                                         <?php
                                            $getProductImage = $getProduct->getImageSingle($getProduct->id);
                                        ?>

                                        <?php if(!empty($getProductImage) && !empty($getProductImage->getLogo())): ?>
                                            <img id="product-zoom" src="<?php echo e($getProductImage->getLogo()); ?>" data-zoom-image="<?php echo e($getProductImage->getLogo()); ?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        <?php endif; ?>
                                    </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">

                                    <?php $__currentLoopData = $getProduct->getImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="product-gallery-item" href="#" data-image="<?php echo e($image->getLogo()); ?>" data-zoom-image="<?php echo e($image->getLogo()); ?>">
                                        <img src="<?php echo e($image->getLogo()); ?>" alt="product side">
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     

                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo e($getProduct->title); ?></h1>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width:<?php echo e($getProduct->getReviewRating($getProduct->id)); ?>%;"></div>
                                        </div>
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo e($getProduct->getTotalReview()); ?> Reviews )</a>
                                    </div>

                                    <div class="product-price">
                                        $<span id="getTotalPrice"><?php echo e(number_format($getProduct->price, 2)); ?></span>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p><?php echo e($getProduct->short_description); ?></p>
                                    </div><!-- End .product-content -->

                                <form action="<?php echo e(url('product/add-to-cart')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="product_id" value="<?php echo e($getProduct->id); ?>">
                                    <?php if(!empty($getProduct->getColor->count())): ?>
                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Color:</label>
                                            <div class="select-custom">
                                                <select name="color_id" id="color_id" required class="form-control">
                                                    <option value="">Select a color</option>
                                                    <?php $__currentLoopData = $getProduct->getColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($color->getColor->id); ?>"><?php echo e($color->getColor->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if(!empty($getProduct->getSize->count())): ?>
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size_id" id="size" required class="form-control getSizePrice">
                                                <option data-price="0" value="">Select a size</option>
                                                 <?php $__currentLoopData = $getProduct->getSize; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-price="<?php echo e(!empty($size->price) ? $size->price : 0); ?>" value="<?php echo e($size->id); ?>"><?php echo e($size->name); ?> <?php if(!empty($size->price)): ?> ($<?php echo e(number_format($size->price,2)); ?>) <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="100" name="qty" required step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <button style="background: #fff;color: #c96;" type="submit" class="btn-product btn-cart">add to cart</button>

                                        <div class="details-action-wrapper">
                                            <?php if(!empty(Auth::check())): ?>
                                                <a href="javascript:;" class="add_to_wishlist add_to_wishlist<?php echo e($getProduct->id); ?> <?php echo e(!empty($getProduct->checkWishlist($getProduct->id)) ? 'btn-wishlist-add' : ''); ?> btn-product btn-wishlist" title="Wishlist" id="<?php echo e($getProduct->id); ?>"><span>Add to Wishlist</span></a>
                                        
                                            <?php else: ?>
                                                <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                            <?php endif; ?>
                                         
                                        </div>
                                    </div>
                            </form>

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="<?php echo e(url($getProduct->getCategory->slug)); ?>"><?php echo e($getProduct->getCategory->name); ?></a>,
                                            <a href="<?php echo e(url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)); ?>"><?php echo e($getProduct->getSubCategory->name); ?></a>
                                        </div><!-- End .product-cat -->

                                       
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->

                <div class="product-details-tab product-details-extended">
                    <div class="container">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (<?php echo e($getProduct->getTotalReview()); ?>)</a>
                            </li>
                        </ul>
                    </div><!-- End .container -->

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                             <div class="product-desc-content">
                                <div class="container" style="margin-top: 20px;">
                                   <?php echo $getProduct->description; ?>

                                </div><!-- End .container -->
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <div class="container" style="margin-top: 20px;">
                                   <?php echo $getProduct->additional_information; ?>

                                </div><!-- End .container -->
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <div class="container" style="margin-top: 20px;">
                                     <?php echo $getProduct->shipping_returns; ?>

                                </div><!-- End .container -->
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                            <div class="reviews">
                                <div class="container">
                                    <h3>Reviews (<?php echo e($getProduct->getTotalReview()); ?>)</h3>

                                    <?php $__currentLoopData = $getReviewProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#"><?php echo e($review->name); ?></a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: <?php echo e($review->getPercent()); ?>%;"></div>
                                                    </div>
                                                </div>
                                                <span class="review-date">
                                                    <?php echo e(Carbon\Carbon::parse($review->created_at)->diffForHumans()); ?>

                                                </span>
                                            </div>
                                            <div class="col">
                                                <h4><?php echo e($review->review); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                     <?php echo $getReviewProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links(); ?>

                                     
                                </div><!-- End .container -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <div class="container">
                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                        <?php $__currentLoopData = $getRelatedProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $getProductImage = $value->getImageSingle($value->id);
                            ?>
                            <div class="product product-7">
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
                                            <div class="ratings-val" style="width: 20%;"></div>
                                        </div>
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div>
                                   
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


<?php $__env->stopSection(); ?>      
<?php $__env->startSection('script'); ?>
    
    <script src="<?php echo e(url('assets/js/bootstrap-input-spinner.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/jquery.elevateZoom.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/bootstrap-input-spinner.js')); ?>"></script>    

    <script type="text/javascript">
        $('.getSizePrice').change(function() {
            var prduct_price = '<?php echo e($getProduct->price); ?>';
            var price = $('option:selected', this).attr('data-price');
            var total = parseFloat(prduct_price) + parseFloat(price);
            $('#getTotalPrice').html(total.toFixed(2));            
        });
    </script>

<?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TechHub\resources\views/product/detail.blade.php ENDPATH**/ ?>