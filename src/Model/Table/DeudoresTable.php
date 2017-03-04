<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deudores Model
 *
 * @method \App\Model\Entity\Deudore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deudore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deudore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deudore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deudore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deudore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deudore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeudoresTable extends Table
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

        $this->table('deudores');
        $this->displayField('presentacionCompleta');
        $this->primaryKey('Id');
        $this->hasMany('Deudas', [
            'foreignKey' => 'deudor_id'
        ]);
        $this->hasMany('DeudoresTelefonos', [
            'foreignKey' => 'deudor_id'
        ]);
        $this->addBehavior('Timestamp');
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
            ->integer('Id')
            ->allowEmpty('Id', 'create');

        $validator
            ->allowEmpty('calificacion');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->requirePresence('direccion', 'create')
            ->notEmpty('direccion');

        $validator
            ->integer('dni')
            ->requirePresence('dni', 'create')
            ->notEmpty('dni')
            ->add('dni', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['dni']));

        return $rules;
    }

    //buscador de deudores por dni
    public function findPorDni(Query $query, array $options)
    {
        $deudor = $this->find('all');
          if (!empty($options['deudor']))
          {
              $deudor->where(['Deudores.dni' => $options['deudor']]);
              if($deudor->count() > 0)
              {
                $deudore = $deudor->toArray()[0];
              }
              else {
                return false;
              }
          }
          else {
              return false;
          }


          return $deudore;

          }
}
