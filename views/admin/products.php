<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <!-- Content Header (Page header) -->
        <h1>
            Edit products
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <table  class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">price</th>
                <th scope="col">action</th>

            </tr>
            </thead>
            <? foreach ($product as $row) { ?>
                <tr>
                    <th><?=$row['id']; ?> </th>
                    <th><?=$row['title']; ?> </th>
                    <th><img src="<?=$row['img']; ?>"> </th>
                    <th>  <?=$row['price']; ?>$</th>
                    <th> <a href="<?= \yii\helpers\Url::to(['admin/edit-products', 'id' => $row['id'] ]) ?>">Edit</a>/<a href="<?= \yii\helpers\Url::to(['admin/del-products', 'id' => $row['id'] ]) ?>">delete</a> </th>
                </tr>

            <? 	}; ?>


        </table>
        <div class="text-center w-50 m-auto">
            <p>
            </p>
            <p></p>

            <a class="btn btn-primary mr-5" href="add-all.php?query=product_items">
                Добавить продукт
            </a>
        </div>
    </section>




</div>
<!-- /.content-wrapper -->