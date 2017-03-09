<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeudasGestiones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Deudas
 *
 * @method \App\Model\Entity\DeudasGestione get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeudasGestione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeudasGestione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeudasGestione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeudasGestione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeudasGestione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeudasGestione findOrCreate($search, callable $callback = null, $options = [])
 */
class DeudasGestionesTable extends Table
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

        $this->table('deudas_gestiones');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Deudas', [
            'foreignKey' => 'deuda_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

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
        $rules->add($rules->existsIn(['deuda_id'], 'Deudas'));

        return $rules;
    }
}
