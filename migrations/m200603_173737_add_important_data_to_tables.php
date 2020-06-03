<?php

use app\models\User;
use app\modules\user\models\UserSettings;
use yii\db\Migration;

/**
 * Class m200603_173737_add_important_data_to_tables
 */
class m200603_173737_add_important_data_to_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        User::deleteAll();
        UserSettings::deleteAll();

        $user = new User();
        $user->name = 'Admin User';
        $user->login = 'admin';
        $user->email = 'test@test.com';
        $user->password = \Yii::$app->security->generatePasswordHash('123456789');
        $user->birth_date = '1995-12-17';
        $user->gender = 'male';
        $user->save();

        $consoleController = new \app\commands\RbacController('rbac', Yii::$app);
        $consoleController->runAction('init');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200603_173737_add_important_data_to_tables cannot be reverted.\n";

        return false;
    }
}
