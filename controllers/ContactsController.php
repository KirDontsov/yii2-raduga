<?php

namespace app\controllers;

class ContactsController extends \yii\web\Controller
{
    public function actionContacts()
    {
        return $this->render('contacts');
    }

}
