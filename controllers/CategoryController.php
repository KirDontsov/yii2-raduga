<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use app\models\ProductSearch;

class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('Агентство недвижимости Радуга', 'агентство недвижимости', 'Яркое агентство недвижимости');
        return $this->render('index', compact('hits'));
    }

    // public function actionView($id)
    // {
    //     $category = Category::findOne($id);
    //     if(empty($category))
    //         throw new \yii\web\HttpException(404, 'Такой категории нет');

    //         $query = Product::find()->where(['category_id' => $id]);

    //     $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
    //     $products = $query->offset($pages->offset)->limit($pages->limit)->all();
    //     $this->setMeta('Агентство недвижимости Радуга | ' . $category->name, $category->keywords, $category->description);
    //     return $this->render('view',compact('products', 'pages', 'category'));
    // }

    public function actionSearch()
    {
        $q = '%' . trim(Yii::$app->request->get('q')) . '%';
        $this->setMeta('Агентство недвижимости Радуга | Поиск: ' . $q, $q, 'Поиск по категории: '. $q .'');
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

    public function actionAll()
    {
        $this->setMeta('Агентство недвижимости Радуга | Все категории','агентство недвижимости', 'Яркое агентство недвижимости');
        $query = Product::find()->where([]);
        
        //$products_all = $query->offset($pages->offset)->limit($pages->limit)->all();

        $searchModel = New ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $products = $dataProvider->getModels();
        $pages = new Pagination(['totalCount' => $dataProvider->getTotalCount()]);

        return $this->render('all', compact('products_all', 'products', 'pages', 'searchModel', 'dataProvider'));
    }
} 