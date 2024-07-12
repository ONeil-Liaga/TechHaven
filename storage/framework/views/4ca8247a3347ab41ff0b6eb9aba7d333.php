<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="<?php echo e($getSystemSettingApp->getLogo()); ?>" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p><?php echo e($getSystemSettingApp->footer_description); ?></p>


                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4>

                        <ul class="widget-list">
                            <li><a href="<?php echo e(url('')); ?>">Home</a></li>
                            <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                            <li><a href="<?php echo e(url('contact')); ?>">Contact us</a></li>
                            <li><a href="<?php echo e(url('blog')); ?>">Blog</a></li>
                            <li><a href="#signin-modal" data-toggle="modal">Log in</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="widget-list">
                            <li><a href="<?php echo e(url('payment-method')); ?>">Payment Methods</a></li>
                            <li><a href="<?php echo e(url('returns')); ?>">Returns</a></li>
                            <li><a href="<?php echo e(url('shipping')); ?>">Shipping</a></li>
                            <li><a href="<?php echo e(url('terms-condition')); ?>">Terms and conditions</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>

                        <ul class="widget-list">
                            <li><a href="<?php echo e(url('cart')); ?>">View Cart</a></li>
                            <li><a href="<?php echo e(url('checkout')); ?>">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © <?php echo e(date('Y')); ?> . All Rights Reserved.</p>
            <figure class="footer-payments">
                <img src="<?php echo e($getSystemSettingApp->getFooterPayment()); ?>" alt="Payment methods" width="272" height="20">
            </figure>
        </div>
    </div>
</footer>
<?php /**PATH D:\TechHub\resources\views/home/_footer.blade.php ENDPATH**/ ?>