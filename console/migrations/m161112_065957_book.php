<?php

use yii\db\Migration;

class m161112_065957_book extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'cate' => $this->integer()->notNull()->defaultValue(0),
            'slug' => $this->string()->notNull()->unique(),
            'image' => $this->string(),
            'desc' => $this->string(),
            'content' => $this->text()->notNull(),
            'price' => $this->integer()->notNull()->defaultValue(0),
            'quantiny' => $this->integer()->notNull()->defaultValue(0),
            'author' => $this->string(100),
            'page' => $this->integer()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'publish_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%book}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
