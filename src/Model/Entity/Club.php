<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Hash;

/**
 * Club Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $contact_email
 * @property string $contact_phone
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\User[] $club_admins
 */
class Club extends Entity
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
        '*' => true,
        'id' => false
    ];

    protected function _getDescription($description)
    {
        return empty($description) ? 'No club description yet' : $description;
    }

}
