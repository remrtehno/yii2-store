

    <section>
        <div class="container">
            <div class="row">
    <div class="col-md-3">
        <?php
        include $url = Yii::$app-> basePath.'/views/inc/left-sidebar.php'; ?>
    </div>
    <!-- /.col-md-3 -->


    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>



            <? foreach ($product as $key => $item) { ?>
                <? $cats_id = explode(',', $item['cat_id'] ); ?>

                <div class="col-sm-4" cat-id="<? print_r($cats_id);  ?>">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?= $item['img'];?>" alt="" />
                                <h2>$<?= $item['price'];?></h2>
                                <p><?= $item['title'];?></p>
                                <button type="button" product-id="<?= $item['id']; ?>" class="btn btn-yellow quickView" style="margin-bottom: 25px;" >
                                    quick view
                                </button>
                                <a href="<?= \yii\helpers\Url::to(['cart/add-to-cart', 'product_id' => $item['id'] ]) ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$<?= $item['price'];?></h2>
                                    <p><?= $item['title'];?></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" product-id="<?= $item['id']; ?>" class="btn btn-yellow quickView" style="margin-bottom: 25px;" >
                                        quick view
                                    </button>
                                    <a href="<?= \yii\helpers\Url::to(['cart/add-to-cart', 'product_id' => $item['id'] ]) ?>" product-id-link="<?= $item['id'];?>products" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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

    </div> <!--     colmd-9    -->


            </div>
        </div>
    </section>



