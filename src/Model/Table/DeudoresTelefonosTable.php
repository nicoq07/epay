<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeudoresTelefonos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Deudores
 *
 * @method \App\Model\Entity\DeudoresTelefono get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeudoresTelefono newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeudoresTelefono[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeudoresTelefono|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeudoresTelefono patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeudoresTelefono[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeudoresTelefono findOrCreate($search, callable $callback = null, $options = [])
 */
class DeudoresTelefonosTable extends Table
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

        $this->table('deudores_telefonos');
        $this->displayField('telefono');
        $this->primaryKey('Id');

        $this->belongsTo('Deudores', [
            'foreignKey' => 'deudor_id',
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
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');

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
        $rules->add($rules->existsIn(['deudor_id'], 'Deudores'));

        return $rules;
    }
}
