<?php

use yii\db\Migration;

/**
 * Handles the creation of table `faq`.
 */
class m170407_092539_create_faq_table extends Migration
{
  /**
   * @inheritdoc
   */
  public function up()
  {
    $this->createTable('faq', [
      'id' => $this->primaryKey(),
      'product_id' => $this->integer()->notNull(),
      'title' => $this->string(64)->notNull(),
      'text' => $this->text()->notNull(),
      'image' => $this->string(64)->notNull(),
    ]);
    
    $this->createIndex(
      'idx-faq-product_id',
      'faq',
      'product_id'
    );

    $this->addForeignKey(
      'fk-faq-product_id',
      'faq',
      'product_id',
      'products',
      'id',
      'CASCADE'
    );
  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable('faq');

    $this->dropForeignKey(
      'fk-faq-product_id',
      'faq'
    );

    $this->dropIndex(
      'idx-faq-product_id',
      'faq'
    );
  }
}
