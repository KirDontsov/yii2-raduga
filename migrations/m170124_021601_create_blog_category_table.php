<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_category`.
 */
class m170124_021601_create_blog_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog_category', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog_category');
    }
}
