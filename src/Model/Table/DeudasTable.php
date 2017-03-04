<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Test\Fixture\DeudasFixture;

/**
 * Deudas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Deudores
 * @property \Cake\ORM\Association\BelongsTo $Carteras
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $DeudasGestiones
 *
 * @method \App\Model\Entity\Deuda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deuda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deuda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deuda|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deuda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deuda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deuda findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeudasTable extends Table
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

        $this->table('deudas');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Deudores', [
            'foreignKey' => 'deudor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Carteras', [
            'foreignKey' => 'cartera_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('DeudasGestiones', [
            'foreignKey' => 'deuda_id'
        ]);
        $this->belongsTo('EstadosDeudas', [
            'foreignKey' => 'estado_id'
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
            ->allowEmpty('producto');
        $validator
                ->allowEmpty('usuario_id');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->decimal('capital_inicial')
            ->allowEmpty('capital_inicial');

        $validator
            ->requirePresence('numero_producto', 'create')
            ->notEmpty('numero_producto');

        $validator
            ->decimal('total')
            ->allowEmpty('total');

        $validator
            ->dateTime('fecha_mora')
            ->allowEmpty('fecha_mora');

        $validator
            ->allowEmpty('dias_mora');

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
        $rules->add($rules->existsIn(['cartera_id'], 'Carteras'));
        $rules->add($rules->existsIn(['usuario_id'], 'Users'));

        return $rules;
    }

    /*

    */
    //buscador de Deudas por dni
    public function findPorDni(Query $query, array $options)
    {
          $deudas = $this->find('all');

          if (empty($options['deudores'])) {
              $deudas->leftJoinWith('Deudores' , function ($q) {
              return $q->where( ['Deudores.dni IS' => null]);
            });
          } else {
            $deudas->innerJoinWith('Deudores',function ($q) use ($options) {
              return $q->where(['Deudores.dni IN' => $options['deudores']]);
            });
          }
            return $deudas->group(['Deudas.Id']);

    }
    //buscador de Deudas por dni
    public function findAsignedTo(Query $query, array $options)
    {
          // $deudas = $this->find('all');
          //
          // if (empty($options['user'])) {
          //     $deudas->update('Users' , function ($q) {
          //     return $q->where( ['Users.id IS' => null]);
          //   });
          // } else {
          //   $deudas->innerJoinWith('Users',function ($q) use ($options) {
          //     return $q->where(['Users.id IN' => $options['user']]);
          //   });
          // }
          //
          //   return $deudas->group(['Deudas.Id']);

    }
}
