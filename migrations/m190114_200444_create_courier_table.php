<?php

use yii\db\Migration;

/**
 * Handles the creation of table `courier`.
 */
class m190114_200444_create_courier_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
              }
            $this->createTable('{{%courier}}', [
                'id' => $this->primaryKey(),
                'parcel_id'=>$this->string(100)->notNull(),
                'roll_no'=>$this->string(100)->notNull(),
                'date_time'=> $this->string(100)->notNull(),
                'state_id'=>$this->integer()->notNull(),
                'service'=> $this->text()->notNull(),
                'otp'=> $this->string(100)->notNull(),


                ], $tableOptions);
              $this->addForeignKey('fk-courier-person','courier','roll_no','person','roll_no','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('courier');
    }
}
