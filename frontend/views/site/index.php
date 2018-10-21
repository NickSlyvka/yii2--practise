<?php
/* @var $this yii\web\View */
/* @var $currentUser frontend\models\User */
/* @var $feedItems[] frontend\models\Feed */

use yii\web\JqueryAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = 'NewsFeed';
?>
    <div class="page-posts no-padding">
        <div class="row">
            <div class="page page-post col-sm-12 col-xs-12">
                <div class="blog-posts blog-posts-large">

                    <div class="row">

                    <?php if ($feedItems): ?>
                            <?php foreach ($feedItems as $feedItem): ?>
                                <?php /* @var $feedItem Feed */ ?>

                                <!-- feed item -->
                                <article class="post col-sm-12 col-xs-12">
                                    <div class="post-meta">
                                        <div class="post-title">

                                            <div class="author-name">
                                                <a href="<?php echo Url::to(['/user/profile/view', 'nickname' => ($feedItem->author_nickname) ? $feedItem->author_nickname
                                                    :$feedItem->author_id]); ?>">
                                                    <img src="<?php echo $feedItem->author_picture; ?>" class="author-image" />
                                                    <?php echo Html::encode($feedItem->author_name); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-type-image">
                                        <a href="<?php echo Url::to(['/post/default/view', 'id' => $feedItem->post_id]); ?>">
                                            <img src="<?php echo Yii::$app->storage->getFile($feedItem->post_filename); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="post-description">
                                        <?php echo HtmlPurifier::process($feedItem->post_description); ?>
                                    </div>
                                    <div class="post-bottom">
                                        <div class="post-likes">
                                            <a href="#" class="button-like <?php echo ($currentUser->likesPost($feedItem->post_id)) ? "display-none" : ""; ?>"
                                               data-id="<?php echo $feedItem->post_id; ?>">
                                                <i class="fa fa-lg fa-heart-o"></i></a>
                                            </a>
                                            <a href="#" class="button-unlike <?php echo ($currentUser->likesPost($feedItem->post_id)) ? "" : "display-none"; ?>"
                                               data-id="<?php echo $feedItem->post_id; ?>">
                                                <i class="fa fa-lg fa-heart-o"></i></a>
                                            </a>
                                            &nbsp<span class="likes-count"><?php echo $feedItem->countLikes(); ?></span>
                                        </div>
                                        <div class="post-comments">
                                            <a href="#">0 Comments</a>

                                        </div>
                                        <div class="post-date">
                                            <span><?php echo Yii::$app->formatter->asDatetime($feedItem->post_created_at); ?></span>
                                        </div>
                                        <div class="post-report">
                                            <a href="#">Report post</a>
                                        </div>
                                    </div>
                                </article>
                                <!-- feed item -->
                            <?php endforeach; ?>

                        <?php else: ?>
                            <div class="col-md-12">
                                Nobody posted yet!
                            </div>
                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php $this->registerJsFile('@web/js/likes.js', [
                        'depends' => JqueryAsset::className(),
                    ]);
