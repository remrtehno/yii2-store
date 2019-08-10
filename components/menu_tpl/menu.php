<div class="panel panel-default">
    <li>
        <div class="panel-heading">
            <h4 class="panel-title">
                <a <?php if( isset($category['childs']) ) { echo 'href="#child_id-' . $category["id"] . '" data-parent="#accordian" data-toggle="collapse"'; } else {
                      ?> href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>" <?
                  }; ?>>
                  <?= $category['title']?>
                  <?php if( isset($category['childs']) ): ?>
                      <span  class="badge pull-right"><i class="fa fa-plus"></i></span>
                  <?php endif;?>
                </a>
            </h4>
            <!-- /.panel-title -->
        </div>
        <!-- /.panel-heading -->
      <?php if( isset($category['childs']) ): ?>
          <ul class="panel-collapse collapse" id='child_id-<?php echo $category['id']; ?>'>
            <?= $this->getMenuHtml($category['childs'])?>
          </ul>
      <?php endif;?>
    </li>
</div>
<!-- /.panel panel-default -->