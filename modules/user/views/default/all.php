<?php

use app\assets\ProfileAsset;
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

ProfileAsset::register($this);
$guest = User::findOne(Yii::$app->user->getId());

?>
<div class="container" style="display: flex; justify-content: space-evenly; flex-wrap: wrap; text-align: center;">

    <?php foreach ($users as $user) : ?>
        <div style="margin-bottom: 20px; border: 1px solid gainsboro; text-align: center; border-radius: 3%; padding: 10px; width: 250px;height: 340px; margin-top: 20px"
             class="user">
            <img style="width: 130px; height: 130px; border-radius: 50%;" src="/img/avatars/<?= $user->avatar ?>"> <br>

            <label for="name">Name:</label>
            <text id="name"><?= $user->name ?></text>
            <br>

            <label for="email">Email:</label>
            <text id="email"><?= $user->email ?></text>
            <br>

            <label for="gender">Gender:</label>
            <text id="gender"><?= $user->gender ?></text>
            <br>

            <label for="birth_date">Birth date:</label>
            <text id="birth_date"><?= $user->birth_date ?></text>
            <br>

            <a href="/user/profile?id=<?= $user->id ?>&lim=10" class="btn btn-success">Go to profile</a>
            <a href="/user/chat/create?id=<?= $user->id ?>" class="btn btn-success">Send message</a>

            <?php if ($guest->id != $user->id && !$guest->isInvited($user->id) && !$guest->isBro($user->id)): ?>

                <?php $form = ActiveForm::begin([
                    'id' => 'send_invite_form_' . $user->id,
                    'method' => 'post',
                    'action' => '/user/friends/invite'
                ]) ?>

                <?= $form->field($inviteModel, 'from_user')->hiddenInput(['value' => $guest->id])->label(false) ?>
                <?= $form->field($inviteModel, 'to_user')->hiddenInput(['value' => $user->id])->label(false) ?>

                <div>
                    <?= Html::submitButton('Send invite', ['class' => 'btn btn-success','onclick' => 'send_invite(' . $user->id . ')']) ?>
                </div>

                <?php ActiveForm::end() ?>

            <?php endif; ?>
            <?php if ($guest->isInvited($user->id)): ?>
                <br><div style="margin-top: 15px">
                    <button onclick="delete_invite(<?= $user->id ?>,<?= $guest->id ?>)" class="btn btn-default">Cancel invite
                    </button>
                </div>
            <?php endif; ?>

            <?php if ($guest->id != $user->id && $guest->isBro($user->id)): ?>
                <br><div style="margin-top: 15px">
                    <button onclick="delete_friend(<?= $guest->id ?>,<?= $user->id ?>)" class="btn btn-default">
                        delete from friends
                    </button>
                </div>
            <?php endif; ?>


        </div>
    <?php endforeach; ?>


</div>
