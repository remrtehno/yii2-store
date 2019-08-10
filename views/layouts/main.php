<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\View;
use yii\web\Session;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>

      <?php

      View::registerCssFile('@web/css/bootstrap.min.css');
      View::registerCssFile('@web/css/font-awesome.min.css');
      View::registerCssFile('@web/css/prettyPhoto.css');
      View::registerCssFile('@web/css/price-range.css');
      View::registerCssFile('@web/css/animate.css');
      View::registerCssFile('@web/css/font-awesome.min.css');
      View::registerCssFile('@web/css/main.css');
      View::registerCssFile('@web/css/responsive.css');

      ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



<div class="wrap">





        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?=yii\helpers\Url::base(true);?>"><img src="images/home/logo.png" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        USA
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canada</a></li>
                                        <li><a href="#">UK</a></li>
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        DOLLAR
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canadian Dollar</a></li>
                                        <li><a href="#">Pound</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?= \yii\helpers\Url::to(['account/basket']) ?>"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                    <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['cart/cart']) ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <?php

                                    $get_user = Yii::$app->session['user'];

                                    if(!isset($get_user)) { ?>
                                      <li><a href="<?= \yii\helpers\Url::to(['site/login']) ?>"><i class="fa fa-lock"></i> Login</a></li>
                                    <? } else {  ?>

                                      <li><a href="<?= \yii\helpers\Url::to(['site/exit']) ?>">Hi <?= $get_user->name; ?>, Exit?</a></li>
                                   <? } ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href=""<?=yii\helpers\Url::base(true);?>" class="active">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="login.html">Login</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <?= $content ?>

        <footer id="footer"><!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>e</span>-shopper</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe1.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe2.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe3.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe4.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="images/home/map.png" alt="" />
                                <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Online Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Change Location</a></li>
                                    <li><a href="#">FAQ’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quock Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">T-Shirt</a></li>
                                    <li><a href="#">Mens</a></li>
                                    <li><a href="#">Womens</a></li>
                                    <li><a href="#">Gift Cards</a></li>
                                    <li><a href="#">Shoes</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privecy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Billing System</a></li>
                                    <li><a href="#">Ticket System</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Company Information</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Store Location</a></li>
                                    <li><a href="#">Affillate Program</a></li>
                                    <li><a href="#">Copyright</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © <?= date('Y') ?> E-SHOPPER Inc. All rights reserved.</p>
                        <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                    </div>
                </div>
            </div>

        </footer><!--/Footer-->

</div>




<?php $this->endBody() ?>

<?php

    View::registerJsFile('@web/js/jquery.js');
    View::registerJsFile('@web/js/bootstrap.min.js');
    View::registerJsFile('@web/js/jquery.scrollUp.min.js');
    View::registerJsFile('@web/js/price-range.js');
    View::registerJsFile('@web/js/jquery.prettyPhoto.js');
    View::registerJsFile('@web/js/main.js');


?>

<!--ajax add to cart-->
<div class="modal fade" tabindex="-1" role="dialog" id="addToCartAjax">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add to cart</h4>
            </div>
            <div class="modal-body">

                <template id="modalProductsTemplate">
                    <li class="comment">
                        <div class="product-item" product-id-container="<?= $item['id']; ?>">
                            <div class="img"><img src="<?= $item['img']; ?>" alt=""></div><!-- /.img -->
                            <div class="title"></div><!-- /.title -->
                            <div class="price">$</div><!-- /.price -->
                            <div class="count">count:</div><!-- /.count -->
                            <div class="del-product">
                                <a type="button" href="<?= \yii\helpers\Url::to(['cart/delete-from-cart']); ?>" id-product="" class="deleteProduct" class="close"><span aria-hidden="true">&times;</span></a>
                            </div><!-- /.del-product -->
                        </div>
                    </li>
                </template>

                <div class="products" id="modalProducts">
                    <?php if($_SESSION['cart']) { ?>
                        <?php foreach ($_SESSION['cart'] as $item) { ?>
                            <div class="product-item" product-id-container="<?= $item['id']; ?>">
                                <div class="img">
                                    <img src="<?= $item['img']; ?>" alt="">
                                </div>
                                <!-- /.img -->
                                <div class="title">
                                    <?= $item['title']; ?>
                                </div>
                                <!-- /.title -->
                                <div class="price">
                                    $ <?= $item['price']; ?>
                                </div>
                                <!-- /.price -->
                                <div class="count">
                                  count:  <?= $item['count']; ?>
                                </div>
                                <!-- /.count -->
                                <div class="del-product">
                                    <a type="button" href="<?= \yii\helpers\Url::to(['cart/delete-from-cart', 'prod_id' => $item['id']]); ?>" id-product="<?= $item['id']; ?>" class="deleteProduct" class="close"><span aria-hidden="true">&times;</span></a>
                                </div>
                                <!-- /.del-product -->
                            </div>
                        <?php };
                    } else  {
                        echo 'No Products added already';
                    }; //end if else have products ?>
                </div>
                <!-- /.products -->


                <!-- /.product-item -->
                <from id="addToCartForm" method="POST">

                    <input id="prouctId" type="hidden" value="" name="prod_id">


                    <input id="decrement" type="button"  value="-">
                    <input id="count" type="text" value="1" name="count">
                    <input id="increment" type="button"  value="+">


                    <input id="submit" type="submit" ajax-get-prodct="<?= \yii\helpers\Url::to(['cart/product']) ?>"  value="add to cart">
                    <div id="status"></div>

                    <a id="linkToCard" style="display: block;" href="<?= \yii\helpers\Url::to(['cart/cart']) ?>"> View Cart </a>
                </from> <!---addToCartForm.-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="modal fade" tabindex="-1" role="dialog" id="quickView">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Quick view</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="ajaxProductInfo" value="<?= \yii\helpers\Url::to(['site/get-product-by-ajax']); ?>">

                <div id="productsContent">
                    <h4 class="title" id="ajaxTitle"></h4>
                    <img src="" id="ajaxImg" alt="">
                    <p id="ajaxDscpr"></p>
                    <div id="ajaxPrice"></div>
                    <a href="<?= \yii\helpers\Url::to(['cart/add-to-cart', 'product_id' => $item['id'] ]) ?>" product-id-link="<?= $item['id'];?>" class="btn btn-default add-to-cart closeAllModal "><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



</body>
</html>
<?php $this->endPage() ?>
