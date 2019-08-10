<?php

/* @var $this yii\web\View */

use yii\widgets\Menu;

$this->title = 'My Yii Application';
?>
<div class="d-block">
    <a href="<?= \yii\helpers\Url::to(['admin/index']); ?>">admin dashboard</a>
</div>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">


                <?php
                $url = Yii::$app-> basePath.'/views/inc/left-sidebar.php';
                include $url; ?>


            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    <? foreach ($products as $key => $item) { ?>
                      <? $cats_id = explode(',', $item['cat_id'] ); ?>

                        <div class="col-sm-4" cat-id="<? print_r($cats_id);  ?>">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?= $item['img'];?>" alt="" />
                                        <h2>$<?= $item['price'];?></h2>
                                        <p><?= $item['title'];?></p>
                                        <button type="button" product-id="<?= $item['id']; ?>" class="btn btn-yellow quickView" style="margin-bottom: 25px;">
                                            quick view
                                        </button>
                                        <a href="<?= \yii\helpers\Url::to(['cart/add-to-cart', 'product_id' => $item['id'] ]) ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$<?= $item['price'];?></h2>
                                            <p><?= $item['title'];?></p>
                                            <button type="button" product-id="<?= $item['id']; ?>" class="btn btn-yellow quickView" style="margin-bottom: 25px;">
                                                quick view
                                            </button>
                                            <a href="<?= \yii\helpers\Url::to(['cart/add-to-cart', 'product_id' => $item['id'] ]) ?>" product-id-link="<?= $item['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?  }; ?>

                </div><!--features_items-->

                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <?  foreach ($cats as $key => $item) { ?>
                                <li class="<?= $key == array_key_first($cats) ? 'active' : ''; ?>"><a href="#cat_id-<?= $item['id']; ?>" data-toggle="tab"><?= $item['title']; ?></a></li>
                            <?  }; ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                      <?  foreach ($cats as $key => $item) { ?>
                      <div class="tab-pane fade <?= $key == array_key_first($cats) ? 'active in' : ''; ?>" id="cat_id-<?= $item['id']; ?>" >
                      <? /* get product by cat_id */
                        foreach ($products as $product) {
                         $arr_cats =  explode(',', $product['cat_id']);
                            if(in_array( $item['id'] , $arr_cats )) { ?>

                              <div class="col-sm-3" cat-id="<?= $product['cat_id'] ?>">
                                  <div class="product-image-wrapper">
                                      <div class="single-products">
                                          <div class="productinfo text-center">
                                              <img src="<?= $product['img'] ?>" alt="" />
                                              <h2>$<?= $product['price'] ?></h2>
                                                <p><?= $product['title'] ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- col-sm-3 -->

                      <? }; // if have cat id in product
                            }; //foreach product in cats  ?>
                      </div> <!-- tab-pane -->
                      <?  }; //foreach CATS?>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <? foreach ($products as $key => $item) { ?>
                            <? if($item['recommended']) { ?>
                            <? $cats_id = explode(',', $item['cat_id'] ); ?>
                              <? if(!$key % 3) { ?>  <? } ?>
                              <div class="item clearfix <?= $key == array_key_first($products) ? 'active in' : ''; ?>">
                                  <div class="col-sm-4">
                                      <div class="product-image-wrapper">
                                          <div class="single-products">
                                              <div class="productinfo text-center">
                                                  <img src="<?= $item['img']; ?>" alt="" />
                                                  <h2>$<?= $item['price']; ?></h2>
                                                  <p><?= $item['title']; ?></p>
                                                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                              </div>

                                          </div>
                                      </div>
                                  </div>
                              </div> <!-- item -->
                            <? } //if recomended ?>
                          <?  }; //foreach product?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>


