<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createBook = $auth->createPermission('createBook');
        // $createBook->description = 'create Book';
        // $auth->add($createBook);

        $updateBook = $auth->createPermission('updateBook');
        // $updateBook->description = 'update Book';
        // $auth->add($updateBook);

        $deleteBook = $auth->createPermission('deleteBook');
        // $deleteBook->description = 'delete Book';
        // $auth->add($deleteBook);

        $viewBook = $auth->createPermission('viewBook');
        // $viewBook->description = 'view Book';
        // $auth->add($viewBook);

        // $indexBook = $auth->createPermission('indexBook');
        // $indexBook->description = 'index Book';
        // $auth->add($indexBook);

        // // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        // $auth->add($author);
        // $auth->addChild($author,$indexBook);

        // // add "admin" role and give this role the "updatePost" permission
        // // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        // $auth->add($admin);
        // $auth->addChild($admin, $createBook);
        // $auth->addChild($admin, $updateBook);
        // $auth->addChild($admin, $deleteBook);
         // $auth->addChild($admin, $viewBook);
        // $auth->addChild($admin, $author);

        // // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}
?>