<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int                       $id
 * @property string                    $last_name
 * @property string                    $first_name
 * @property int                       $club_id
 * @property bool                      $approved
 * @property bool                      $club_admin
 * @property string                    $username
 * @property string                    $email
 * @property string                    $password
 * @property \Cake\I18n\Time           $created
 * @property \Cake\I18n\Time           $modified
 * @property bool                      $admin
 *
 * @property string                    $full_name
 *
 * @property \App\Model\Entity\Club    $club
 * @property \App\Model\Entity\Skill[] $skills
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*'  => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * Expose the virtual fields
     *
     * @var array
     */
    protected $_virtual = ['full_name'];

    /**
     * Provide a FullName virtual field
     *
     * Accessible (via 'magic') as $user->full_name
     *
     * @return string
     */
    protected function _getFullName()
    {
        return trim($this->_properties['first_name'] . ' ' . $this->_properties['last_name']);
    }

    public function isAdminForClub($clubId)
    {
        return
            $this->_properties['admin'] ||
            ($this->_properties['club_admin'] && $this->_properties['club_id'] == $clubId);
    }

}
