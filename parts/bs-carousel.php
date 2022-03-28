<?php
    // REGISTER STYLE ONLY WHEN THIS PART TEMPLATE IS CALLED
    wp_register_style('bsc', get_template_directory_uri() . '/assets/css/bs-carousel.css' ,[] );
    wp_enqueue_style('bsc');
?>
<div id="bs-carousel" class="my-5 text-center container">
    <div class="row d-flex align-items-center">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <a href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <div class="carousel-nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                    </svg>
                </div>
            </a>
        </div>
        <div class="col-10">
            <!--Start carousel-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div style="background-image:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/46992/flexfun04.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div style="background-image:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/46992/flexfun02.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div style="background-image:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/46992/flexfun05.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">
                                <h3 class="text-white">Text in the panel.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div style="background-image:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/46992/flexfun01.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                            </div>
                            <div style="background-image:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/46992/flexfun03.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                            </div>
                            <div style="background-image:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/46992/flexfun06.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End carousel-->
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center"><a href="#carouselExampleIndicators" data-bs-slide="next">
                <div class="carousel-nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
