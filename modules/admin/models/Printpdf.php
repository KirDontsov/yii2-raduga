<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Printpdf extends ActiveRecord
{
    public function addToPrint ($product,$qty = 1)
    {
        $mainImg = $product->getImage();
        if(isset($_SESSION['print'][$product->id])){
            if($_SESSION['print'][$product->id]['qty'] <= 0)
            {
                $_SESSION['print'][$product->id]['qty'] += $qty;
            } else
            {
                $_SESSION['print'][$product->id]['qty'] -= $qty;
            }
        }else{
            $_SESSION['print'][$product->id] = [
                'id' => $product->id,
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'floor' => $product->floor,
                'rooms' => $product->rooms,
                'contact' => $product->contact,
                'phone' => $product->phone,
                'street' => $product->street,
                'h_number' => $product->h_number,
                'content' => $product->content,
                'img' => $mainImg->getUrl('x50'),
            ];
        }
        $_SESSION['print.qty'] = isset($_SESSION['print.qty']) ? $_SESSION['print.qty'] + $qty : $qty;
    }

    public function recalc($id){
        if(!isset($_SESSION['print'][$id])) return false;
        $qtyMinus = $_SESSION['print'][$id]['qty'];
        $sumMinus = $_SESSION['print'][$id]['qty'] * $_SESSION['print'][$id]['price'];
        $_SESSION['print.qty'] -= $qtyMinus;
        $_SESSION['print.sum'] -= $sumMinus;
        unset($_SESSION['print'][$id]);
    }
}

