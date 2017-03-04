<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EstadosDeudas Model
 *
 * @method \App\Model\Entity\EstadosDeuda get($primaryKey, $options = [])
 * @method \App\Model\Entity\EstadosDeuda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EstadosDeuda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EstadosDeuda|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstadosDeuda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EstadosDeuda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EstadosDeuda findOrCreate($search, callable $callback = null, $options = [])
 */
class EstadosDeudasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('estados_deudas');
        $this->displayField('descripcion');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
}
