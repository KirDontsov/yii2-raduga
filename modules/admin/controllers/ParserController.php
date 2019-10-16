<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Parser;


class ParserController extends AppAdminController
{
    public function actionIndex($url=null)
    {
        $robot = new Parser();
        $robot->getPage($url);

        return $this->render('index', compact('robot','url'));
    }
}