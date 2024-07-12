<?php $__env->startSection('content'); ?>

        <main class="main">
            <div class="intro-section bg-lighter pt-3 pb-6">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                                <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false,
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>

                                    <?php $__currentLoopData = $getSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($slider->getImage())): ?>
                                            <div class="intro-slide">
                                                <figure class="slide-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)" srcset="<?php echo e($slider->getImage()); ?>">
                                                        <img src="<?php echo e($slider->getImage()); ?>" alt="Image Desc">
                                                    </picture>
                                                </figure>

                                                <div class="intro-content">
                                                    <h1 class="intro-title">
                                                        <?php echo $slider->title; ?>

                                                    </h1>
                                                    <?php if(!empty($slider->button_link) && !empty($slider->button_name)): ?>
                                                        <a href="<?php echo e($slider->button_link); ?>" class="btn btn-outline-white">
                                                            <span><?php echo e($slider->button_name); ?></span>
                                                            <i class="icon-long-arrow-right"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>

                                <span class="slider-loader"></span>
                            </div>
                        </div>
                    </div>

                    <?php if(!empty($getPartner->count())): ?>
                    <div class="mb-6"></div>

                    <div class="owl-carousel owl-simple" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        <?php $__currentLoopData = $getPartner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($partner->getImage())): ?>
                                <a href="<?php echo e(!empty($partner->button_link) ? $partner->button_link : '#'); ?>" class="brand">
                                    <img src="<?php echo e($partner->getImage()); ?>" >
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php endif; ?>

                </div>
            </div>

            <div class="mb-6"></div>

            <?php if(!empty($getProductTrendy->count())): ?>
            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg"><?php echo e(!empty($getHomeSetting->trendy_product_title) ? $getHomeSetting->trendy_product_title : 'Trendy Products'); ?></h2>
              </div>
                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                            <?php $__currentLoopData = $getProductTrendy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $getProductImage = $value->getImageSingle($value->id);
                                ?>

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


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(!empty($getCategory->count())): ?>
            <div class="container categories pt-6">
                <h2 class="title-lg text-center mb-4"><?php echo e(!empty($getHomeSetting->shop_category_title) ? $getHomeSetting->shop_category_title : 'Shop by Categories'); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $getCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category->getImage())): ?>
                            <div class="col-sm-12 col-lg-4 banners-sm">
                                <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                                    <a href="<?php echo e(url($category->slug)); ?>">
                                        <img src="<?php echo e($category->getImage()); ?>" alt="<?php echo e($category->name); ?>">
                                    </a>

                                    <div class="banner-content banner-content-center">
                                        <h3 class="banner-title text-white"><a href="<?php echo e(url($category->slug)); ?>"><?php echo e($category->name); ?></a></h3>

                                        <?php if(!empty($category->button_name)): ?>
                                            <a href="<?php echo e(url($category->slug)); ?>" class="btn btn-outline-white banner-link"><?php echo e($category->button_name); ?><i class="icon-long-arrow-right"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>

            <div class="mb-5"></div>

            <?php endif; ?>

            <div class="container">
                <div class="heading heading-center mb-6">
                    <h2 class="title"><?php echo e(!empty($getHomeSetting->recent_arrival_title) ? $getHomeSetting->recent_arrival_title : 'Recent Arrivals'); ?></h2><!-- End .title -->

                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                        </li>
                        <?php $__currentLoopData = $getCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a class="nav-link getCategoryProduct" data-val="<?php echo e($category->id); ?>" id="top-<?php echo e($category->slug); ?>-link" data-toggle="tab" href="#top-<?php echo e($category->slug); ?>-tab" role="tab" aria-controls="top-<?php echo e($category->slug); ?>-tab" aria-selected="false"><?php echo e($category->name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products">
                            <?php
                                $is_home = 1;
                            ?>
                            <?php echo $__env->make('product._list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="more-container text-center">
                            <a href="<?php echo e(url('search')); ?>" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                        </div>

                    </div>
                    <?php $__currentLoopData = $getCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane p-0 fade getCategoryProduct<?php echo e($category->id); ?>" id="top-<?php echo e($category->slug); ?>-tab" role="tabpanel" aria-labelledby="top-<?php echo e($category->slug); ?>-link">


                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

            <div class="container">
                <hr>
                <div class="row justify-content-center">
                    <?php if(!empty($getHomeSetting->payment_delivery_title)): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <?php if(!empty($getHomeSetting->getPaymentImage())): ?>
                            <span class="icon-box-icon">
                                <img style="width: 50px;" src="<?php echo e($getHomeSetting->getPaymentImage()); ?>">
                            </span>
                            <?php endif; ?>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title"><?php echo e($getHomeSetting->payment_delivery_title); ?></h3><!-- End .icon-box-title -->
                                <p><?php echo e($getHomeSetting->payment_delivery_description); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                     <?php if(!empty($getHomeSetting->refund_title)): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                             <?php if(!empty($getHomeSetting->getRefundImage())): ?>
                            <span class="icon-box-icon">
                                <img style="width: 50px;" src="<?php echo e($getHomeSetting->getRefundImage()); ?>">
                            </span>
                            <?php endif; ?>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title"><?php echo e($getHomeSetting->refund_title); ?></h3><!-- End .icon-box-title -->
                                <p><?php echo e($getHomeSetting->refund_description); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                     <?php if(!empty($getHomeSetting->support_title)): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                             <?php if(!empty($getHomeSetting->getSupportImage())): ?>
                            <span class="icon-box-icon">
                                <img style="width: 50px;" src="<?php echo e($getHomeSetting->getSupportImage()); ?>">
                            </span>
                            <?php endif; ?>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title"><?php echo e($getHomeSetting->support_title); ?></h3><!-- End .icon-box-title -->
                                <p><?php echo e($getHomeSetting->support_description); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>


                </div>

                <div class="mb-2"></div>
            </div>
            <?php if(!empty($getBlog->count())): ?>
            <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
                <div class="container">
                   <h2 class="title-lg text-center mb-3 mb-md-4"><?php echo e(!empty($getHomeSetting->blog_title) ? $getHomeSetting->blog_title : 'Our Blog'); ?></h2><!-- End .title-lg text-center -->

                    <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                        <?php $__currentLoopData = $getBlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <article class="entry entry-display">
                            <figure class="entry-media">
                                <a href="<?php echo e(url('blog/'.$blog->slug)); ?>">
                                    <img style="height: 260px;object-fit: cover;" src="<?php echo e($blog->getImage()); ?>" alt="<?php echo e($blog->title); ?>">
                                </a>
                            </figure>

                            <div class="entry-body pb-4 text-center">
                                <div class="entry-meta">
                                    <a href="#"><?php echo e(date('M d, Y', strtotime($blog->created_at))); ?></a>, <?php echo e($blog->getCommentCount()); ?> Comments
                                </div>

                                <h3 class="entry-title">
                                    <a href="<?php echo e(url('blog/'.$blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                                </h3>

                                <div class="entry-content">
                                    <p><?php echo e($blog->short_description); ?></p>
                                    <a href="<?php echo e(url('blog/'.$blog->slug)); ?>" class="read-more">Read More</a>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>

                <div class="more-container text-center mb-0 mt-3">
                    <a href="<?php echo e(url('blog')); ?>" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
                </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($getHomeSetting->singup_title)): ?>
            <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url('<?php echo e($getHomeSetting->getSingupImage()); ?>');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-9 col-xl-8">
                            <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                                <div class="col">
                                    <h3 class="cta-title text-white"><?php echo e($getHomeSetting->singup_title); ?></h3><!-- End .cta-title -->
                                    <p class="cta-desc text-white"><?php echo e($getHomeSetting->singup_description); ?></p><!-- End .cta-desc -->
                                </div>

                                <div class="col-auto">
                                    <?php if(empty(Auth::check())): ?>
                                    <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </main>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>


<script type="text/javascript">
            $('body').delegate('.getCategoryProduct','click',function() {
                var category_id = $(this).attr('data-val');

                $.ajax({
                    url: "<?php echo e(url('recent_arrival_category_product')); ?>",
                    type: "POST",
                    data:{
                     "_token": "<?php echo e(csrf_token()); ?>",
                       category_id:category_id,
                    },
                    dataType:"json",
                    success:function(response) {
                        $('.getCategoryProduct'+category_id).html(response.success)
                    },
                });
            });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('home.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TechHub\resources\views/home/home.blade.php ENDPATH**/ ?>