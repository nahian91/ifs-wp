<!-- Footer Start -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Footer Header Start -->
                    <div class="footer-header">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="">
                        </div>
                        <!-- Footer Logo End -->
    
                        <!-- Footer Contact Details Start -->
                        <div class="footer-contact-details">
                            <!-- Footer Contact Item Start -->
                            <div class="footer-contact-item">
                                <div class="icon-box">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-headset-gradiant.svg" alt="">
                                </div>
                                <div class="footer-contact-item-content">
                                    <p><a href="tel:01819710384 ">+880 1819-710384 </a></p>
                                    <p><a href="mailto:digitalagencyifs@gmail.com ">digitalagencyifs@gmail.com </a></p>
                                </div>
                            </div>
                            <!-- Footer Contact Item End -->

                            <!-- Footer Contact Item Start -->
                            <div class="footer-contact-item">
                                <div class="icon-box">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-location-gradiant.svg" alt="">
                                </div>
                                <div class="footer-contact-item-content">
                                    <p>513, Rangmohol Tower, Bandor Bazar, Sylhet </p>
                                </div>
                            </div>
                            <!-- Footer Contact Item End -->
                        </div>
                        <!-- Footer Contact Details End -->
                    </div>
                    <!-- Footer Header End -->
                </div>
                    
                <div class="col-lg-4">
                    <!-- Footer Newsletter Box Start -->
                    <div class="footer-newsletter-box">
                        <h3>Subscribe Newsletter's</h3>
                        <!-- Footer Newsletter Form Start -->
                        <div class="footer-newsletter-form">
                            <form id="newslettersForm" action="#" method="POST">
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control"  id="mail" placeholder="E-mail Address" required>
                                    <button type="submit" class="btn-default">Subscribe</button>
                                </div>
                            </form>
                        </div>
                        <!-- Footer Newsletter Box End -->                        
                        <p>* Stay Updated with the Latest Tips, Trends, and Insights—Delivered Straight to Your Inbox. Boost Your Digital Marketing Knowledge Today!</p>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-8">
                    <!-- Footer Links Box Start -->
                    <div class="footer-links-box">
                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>quick links</h3>
                            <?php
wp_nav_menu(array(
    'theme_location' => 'footer-1',
    'menu_class' => 'footer-menu',
    'container' => false
));
?>
                        </div>
                        <!-- Footer Links End -->
    
                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>Services</h3>
                            <?php
wp_nav_menu(array(
    'theme_location' => 'footer-2',
    'menu_class' => 'footer-menu',
    'container' => false
));
?>
                        </div>
                        <!-- Footer Links End -->
        
                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>Support</h3>
                            <?php
wp_nav_menu(array(
    'theme_location' => 'footer-3',
    'menu_class' => 'footer-menu',
    'container' => false
));
?>
                        </div>
                        <!-- Footer Links End -->
                    </div>
                    <!-- Footer Links Box End -->
                </div>
            </div>
        </div>

        <!-- Footer Copyright Start -->
        <div class="footer-copyright">
            <div class="container">
                <div class="col-lg-12">
                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text">
                        <p>Copyright © 2025 All Rights Reserved.</p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
            </div>
        </div>
        <!-- Footer Copyright End -->
    </footer>
    <!-- Footer End -->


<?php wp_footer();?>
</body>
</html>