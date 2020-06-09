<?php

/* @var $this yii\web\View */

$this->title = 'Socialnetwork';
?>
<div class="site-index" style="text-align: center">

    <h1>Эй, Привет!</h1>
    <p>Ты попал в новую социальную сеть, по кнопке ниже ты сможешь увидеть всех пользователей зарегистрированных в этой сети. </p>
    <p>Общайся, добавляй друзей. Удачи! </p>
   <?php if (!Yii::$app->user->isGuest): ?>
   <div style="text-align: center;">
       <a href="/user/default/all" class="btn btn-success">All users</a>
   </div>
   <?php endif; ?>

    <br><img style="max-height: 550px; max-width: 700px" src="https://www.meme-arsenal.com/memes/a33f03c17166038d73f8eafc9803c513.jpg">
</div>
