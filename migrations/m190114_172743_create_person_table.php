<?php

use yii\db\Migration;

/**
 * Handles the creation of table `person`.
 */
class m190114_172743_create_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
     public function up()
     {
     $tableOptions = null;
         if ($this->db->driverName === 'mysql') {

             $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
         }
         $this->createTable('{{%person}}', [
            'id' => $this->primaryKey(),
             'email' => $this->string()->unique(),
             'roll_no' => $this->string()->unique(),
             'name' => $this->string()->notNull(),
             'phone'=> $this->string()->notNull(),
         ], $tableOptions);
     }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%person}}');
    }
}
