<?php


namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\models\Product;
use app\modules\admin\models\Printpdf;
use Yii;

class PrintController extends Controller
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);

        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $print = new Printpdf();
        $print->addToPrint($product, $qty);
        if( !Yii::$app->request->isAjax ){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('print-modal', compact('session'));

    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('print');
        $session->remove('print.qty');
        $session->remove('print.sum');
        $this->layout = false;
        return $this->render('print-modal', compact('session'));
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $print = new Printpdf();
        $print->recalc($id);
        $this->layout = false;
        return $this->render('print-modal', compact('session'));
    }

    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('print-modal', compact('session'));
    }
}