<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 * @property \Cake\ORM\Association\HasMany   $Skills
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options =[])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('CounterCache', [
            'Clubs' => ['user_count'],
        ]);

        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType'   => 'INNER',
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'user_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->boolean('approved')
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

        $validator
            ->boolean('club_admin')
            ->requirePresence('club_admin', 'create')
            ->notEmpty('club_admin');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->boolean('admin')
            ->requirePresence('admin', 'create')
            ->notEmpty('admin');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));

        return $rules;
    }

    /**
     * Add a default order to queries if not specified
     *
     * @param $event
     * @param $query
     * @param $options
     * @param $primary
     * @return mixed
     */
    public function beforeFind($event, $query, $options, $primary)
    {
        $order = $query->clause('order');
        if ($order === null || !count($order)) {
            $query->order(['last_name' => 'ASC', 'first_name' => 'ASC']);
        }
    }

    /**
     * True if the given user is an admin for the Club
     *
     * @param $userId
     * @param $clubId
     * @return bool
     */
    public function isClubAdmin($userId, $clubId)
    {
        return $this->exists([
                                 'OR' => [
                                     ['id' => $userId, 'admin' => true],
                                     ['id' => $userId, 'club_id' => $clubId, 'club_admin' => true],
                                 ],
                             ]);
    }

    /**
     * Get a list of UserId & names for this club
     *
     * @param $clubId
     * @return $this|array
     */
    public function getUserIdsInClub($clubId)
    {
        return $this->find('list')
             ->where(['id'=>$clubId])
             ->contain(['contain'=>'Users']);
    }

}
