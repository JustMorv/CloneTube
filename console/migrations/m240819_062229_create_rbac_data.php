<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m240819_062229_create_rbac_data
 */
class m240819_062229_create_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $view = $auth->createPermission('viewComplaisantList');
        $auth->add($view);

        $viewPost = $auth->createPermission('viewPost');
        $auth->add($viewPost);

        $deletePost = $auth->createPermission('deletePost');
        $auth->add($deletePost);

        $approvePost = $auth->createPermission('approvePost');
        $auth->add($approvePost);

        $viewUser = $auth->createPermission('viewUser');
        $auth->add($viewUser);

        $deleteUser = $auth->createPermission('deleteUser');
        $auth->add($deleteUser);

        $updateUser = $auth->createPermission('updateUser');
        $auth->add($updateUser);

        //create roles
        $moderator = $auth->createPermission('moderator');
        $auth->add($moderator);

        $admin = $auth->createPermission('admin');
        $auth->add($admin);


        $auth->addChild($moderator, $view);
        $auth->addChild($moderator, $viewPost);
        $auth->addChild($moderator, $deletePost);
        $auth->addChild($moderator, $approvePost);
        $auth->addChild($moderator, $viewUser);
        $auth->addChild($admin, $viewUser);

        $auth->addChild($admin, $moderator);
        $auth->addChild($admin, $deleteUser);
        $auth->addChild($admin, $updateUser);

        //add user how admin
        $user = new User();
        $user->username = 'justmorv';
        $user->email = 'justmorv@gmail.com';
        $user->status = User::STATUS_ACTIVE;
        $user->created_at = time();
        $user->updated_at = time();
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->password_hash = Yii::$app->security->generatePasswordHash('qwerty64575'); // Хешируем пароль
        $user->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
        if($user->save()){
            if($auth->assign($admin, $user->getId())){
                \yii\helpers\VarDumper::dump('user '. $user->username . ' успешно зарегитсрировани  и присвоен как админ' );
            };
        };



        $user2 = new User();
        $user2->username = 'newuser';
        $user2->email = 'newuser@example.com';
        $user2->status = User::STATUS_ACTIVE;
        $user2->created_at = time();
        $user2->updated_at = time();
        $user2->auth_key = Yii::$app->security->generateRandomString();
        $user2->password_hash = Yii::$app->security->generatePasswordHash('qwerty64575'); // Хешируем пароль
        $user2->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
        if($user2->save()){
            if($auth->assign($moderator, $user2->getId())){
                \yii\helpers\VarDumper::dump('user '. $user2->username . ' успешно зарегитсрировани  и присвоен как админ' );
            };
        };

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240819_062229_create_rbac_data cannot be reverted.\n";

        return false;
    }
}
