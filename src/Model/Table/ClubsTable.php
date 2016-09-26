<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clubs Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\Club get($primaryKey, $options = [])
 * @method \App\Model\Entity\Club newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Club[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Club|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Club patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Club[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Club findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClubsTable extends Table
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

        $this->table('clubs');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'club_id'
        ]);
        $this->belongsToMany('Skills', [
           'through' => 'ClubsSkills'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('contact_email')
            ->email('contact_email');

        return $validator;
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
    public function beforeFind ($event, $query, $options, $primary) {
        $order = $query->clause('order');
        if ($order === null || !count($order)) {
            $query->order( [ "name" => 'ASC' ] );
        }
    }
}
