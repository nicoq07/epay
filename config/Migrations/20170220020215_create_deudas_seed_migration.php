<?php

use Phinx\Migration\AbstractMigration;

class CreateDeudasSeedMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
      $faker = \Faker\Factory::create();
      $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('Deudas', 66, [
         'deudor_id' => function()  {
           return rand(7,53);
         },
         'active' => function() {
           return rand(0,1);
         },
         'producto' => function() use ($faker) {
           return $faker->realText(rand(10,13));
         },
         'capital_inicial' => function() {
           return rand(0,999999999);
         },
         'numero_producto' => function() {
           return rand(0,999999999);
         },
         'total' => function() {
             return rand(0,99999999);
         },
         'created' => function () use ($faker) {
               return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
           },
           'modified' => function () use ($faker) {
               return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
           },
           'cartera_id' => function()  {
             return rand(3,4);
           },
           'usuario_id' => function()  {
             return rand(4,5);
           },
           'fecha_mora' => function () use ($faker) {
               return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
           },
           'dias_mora' => function()  {
             return rand(1,1239);
           }





       ]);
         $populator->execute();
    }
}
