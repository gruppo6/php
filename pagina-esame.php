<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="it_IT" dir="ltr">
    <?php include 'frontend-head.php'; ?>
    <body class="c-layout-header-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <?php include 'frontend-header.php'; ?>
        <div class="c-layout-page">
            <div class="c-layout-page">
                <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
                <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(img/ECDL.jpg)">
                    <div class="container">
                        <div class="c-page-title c-pull-left">
                            <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Esame Ecdl</h3>
                            <h4 class="c-font-dark c-font-slim">
                                Page Sub Title Goes Here </h4>
                        </div>
                        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                            <li>
                                <a href="#" class="c-font-dark">Pages</a>
                            </li>
                            <li class="c-font-dark">
                                /
                            </li>
                            <li class="c-state_active c-font-dark">
                                Ecdl
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/MISC/ABOUT-2 -->
                <div class="c-content-box c-size-md c-bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna aluam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci et tation diam nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer euismod tincidunt ut laoreet dolore magna aluam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci et tation diam nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
            <div class="c-content-box c-size-md c-bg-white">
                <div class="container">
                    <div class="c-content-feedback-1 c-option-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="c-container c-bg-green c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_1.png)">
                                    <div class="c-content-title-1 c-inverse">
                                        <h3 class="c-font-uppercase c-font-bold">Need to know more?</h3>
                                        <div class="c-line-left">
                                        </div>
                                        <p class="c-font-lowercase">
                                            Try visiting our FAQ page to learn more about our greatest ever expanding theme, JANGO.
                                        </p>
                                        <a href="#" class="btn btn-md c-btn-border-2x c-btn-white c-btn-uppercase c-btn-square c-btn-bold">Learn More</a>
                                    </div>
                                </div>
                                <div class="c-container c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_2.png)">
                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">Have a question?</h3>
                                        <div class="c-line-left">
                                        </div>
                                        <form action="#">
                                            <div class="input-group input-group-lg c-square">
                                                <input type="text" class="form-control c-square" placeholder="Ask a question">
                                                <span class="input-group-btn">
                                                    <button class="btn c-theme-btn c-btn-square c-btn-uppercase c-font-bold" type="button">Go!</button>
                                                </span>
                                            </div>
                                        </form>
                                        <p>
                                            Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="c-contact">
                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">Keep in touch</h3>
                                        <div class="c-line-left">
                                        </div>
                                        <p class="c-font-lowercase">
                                            Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you as soon as we can.
                                        </p>
                                    </div>
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Name" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Email" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Contact Phone" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="message" placeholder="Write comment here ..." class="form-control c-theme c-square input-lg"></textarea>
                                        </div>
                                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/CONTACT/FEEDBACK-1 -->
            <!-- END: PAGE CONTENT -->
        </div>
        <?php include 'frontend-footer.php'; ?>
    </body>
</html>