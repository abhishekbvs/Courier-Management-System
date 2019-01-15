<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m190114_174901_create_user_table extends Migration
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
         $this->createTable('{{%user}}', [
             'id' => $this->primaryKey(),
             'username' => $this->string()->notNull()->unique(),
             'auth_key' => $this->string(32)->notNull(),
             'password_hash' => $this->string()->notNull(),
             'password_reset_token' => $this->string()->unique(),
             'type' => $this->string()->notNull(),
             'created_at' => $this->integer()->notNull(),
             'updated_at' => $this->integer()->notNull(),

         ], $tableOptions);
         $this->addForeignKey('fk-username-email','user','username','person','email','CASCADE');
     }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
