<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="it_IT" dir="ltr">
    <?php include 'index-head.php'; ?>
    <body class="c-layout-header-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <?php include 'index-header.php'; ?>
        <!-- END: LAYOUT/HEADERS/HEADER-1 -->        
        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
            
            <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/CONTACT/CONTACT-1 -->
            <div class="c-content-box c-size-md c-bg-img-top c-no-padding c-pos-relative">
                <div class="container">
                    <div class="c-content-contact-1 c-opt-1">
                        <div class="row" data-auto-height=".c-height">
                            <div class="col-sm-8 c-desktop">
                            </div>
                            <div class="col-sm-4">
                                <div class="c-body">
                                    <div class="c-section">
                                        <h3>INFOBASIC</h3>
                                    </div>
                                    <div class="c-section">
                                        <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                            Indirizzo
                                        </div>
                                        <p>
                                            Via Silvio Spaventa, 62<br/>Pescara (PE)<br/>65127
                                        </p>
                                    </div>
                                    <div class="c-section">
                                        <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                            Contatti
                                        </div>
                                        <p>
                                            <strong>Tel</strong> 800 123 0000<br/><strong>Fax</strong> 800 123 8888
                                        </p>
                                    </div>
                                    <div class="c-section">
                                        <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                            Seguici su:
                                        </div>
                                        <br/>
                                        <ul class="c-content-iconlist-1 c-theme">
                                            <li>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 615px;">
                </div>
            </div>
            <!-- END: CONTENT/CONTACT/CONTACT-1 -->
            <!-- BEGIN: CONTENT/CONTACT/FEEDBACK-1 -->
            <div class="c-content-box c-size-md c-bg-white" style="background-image: url(img/contact.jpg); background-repeat:no-repeat; ">
                <div class="container">
                    <div class="c-content-feedback-1 c-option-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="c-container c-bg-green c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_1.png)">
                                    <div class="c-content-title-1 c-inverse">
                                        <h3 class="c-font-uppercase c-font-bold">Vorresti sapere di più?</h3>
                                        <div class="c-line-left">
                                        </div>
                                        <p class="c-font-lowercase">
                                            Try visiting our FAQ page to learn more about our greatest ever expanding theme.
                                        </p>
                                        <a href="#" class="btn btn-md c-btn-border-2x c-btn-white c-btn-uppercase c-btn-square c-btn-bold">Leggi di più</a>
                                    </div>
                                </div>
                                <div class="c-container c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_2.png)">
                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">Hai domande?</h3>
                                        <div class="c-line-left">
                                        </div>
                                        <form action="#">
                                            <div class="input-group input-group-lg c-square">
                                                <input type="text" class="form-control c-square" placeholder="Scrivi qui la tua domanda">
                                                <span class="input-group-btn">
                                                    <button class="btn c-theme-btn c-btn-square c-btn-uppercase c-font-bold" type="button">Vai!</button>
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
                                        <h3 class="c-font-uppercase c-font-bold">Contattaci</h3>
                                        <div class="c-line-left">
                                        </div>
                                        <p class="c-font-lowercase">
                                            Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you as soon as we can.
                                        </p>
                                    </div>
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" placeholder="Il tuo nome" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="La tua Email" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Telefono" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="message" placeholder="Scrivi qui..." class="form-control c-theme c-square input-lg"></textarea>
                                        </div>
                                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">Invia</button>
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
        <!-- END: PAGE CONTAINER -->
        <?php include 'index-footer.php'; ?>
    </body>
</html>