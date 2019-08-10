<?php

 if( Yii::$app->session->hasFlash('error') ) {
   echo Yii::$app->session->getFlash('error');
 };
Yii::$app->session->removeFlash('error');




?>


<h2>
<!--  --><?//= $user->name;?><!-- --><?//= $user->email;?>
</h2>


