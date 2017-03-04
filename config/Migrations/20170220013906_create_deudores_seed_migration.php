<?php

use Phinx\Migration\AbstractMigration;

class CreateDeudoresSeedMigration extends AbstractMigration
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

      $populator->addEntity('Deudores', 50, [
         'calificacion' => function() use ($faker) {
           return $faker->realText(rand(10,13));
         },
         'active' => function() {
           return rand(0,1);
         },
         'nombre' => function() use ($faker) {
           return $faker->firstName;
         },
         'apellido' => function() use ($faker) {
           return $faker->lastName;
         },
         'direccion' => function() use ($faker) {
           return $faker->address;
         },
         'dni' => function() {
             return rand(0,999999999);
         },
         'created' => function () use ($faker) {
               return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
           },
           'modified' => function () use ($faker) {
               return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
           }



       ]);
         $populator->execute();

    }
}
