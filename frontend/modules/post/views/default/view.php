<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;

?>

<div class="post-default-index">
    <div class="row">
        <div class="col-md-12">
            <?php if ($post->user): ?>
                Запись добавил:  <?php echo $post->user->username; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <img src="<?php echo $post->getImage(); ?>" alt="">
        </div>
        <div class="col-md-12">
            <?php echo Html::encode($post->description); ?>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        Likes: <span class="likes-count"><?php echo $post->countLikes(); ?></span>

        <a href="#" class="btn btn-success button-like <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "display-none" : ""; ?>" data-id="<?php echo $post->id; ?>">
            <span class="glyphicon glyphicon-thumbs-up"></span>
        </a>
        <a href="#" class="btn btn-danger button-unlike <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "" : "display-none"; ?>" data-id="<?php echo $post->id; ?>">
            <span class="glyphicon glyphicon-thumbs-down"></span>
        </a>
    </div>
</div>

<?php $this->registerJsFile('@web/js/likes.js', [
    'depends' => JqueryAsset::className(),
]);
