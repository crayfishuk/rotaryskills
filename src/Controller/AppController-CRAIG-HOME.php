?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Gourmet\KnpMenu\Controller\Component\MenuComponent;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @property MenuComponent $Menu
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $components = ['Gourmet/KnpMenu.Menu'];
    public $helpers    = ['Gourmet/KnpMenu.Menu'];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginRedirect'  => [
                'controller' => 'Users',
                'action'     => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'Skills',
                'action'     => 'cloud',
            ],
        ]);
    }

    /**
     * Run before any controller action
     *
     * @param Event $event
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event)
    {
        // Allow these actions globally
        //$this->Auth->allow(['index', 'cloud']);
        $this->Auth->allow(['edit']);

        $menu = $this->Menu->get('main_menu');

        $menu->setChildrenAttributes(['class'=> 'nav navbar-nav']);

        $menu->addChild('Skills', ['uri' => ['controller' => 'Skills', 'action' => 'index']])
             ->setAttribute('icon', 'fa fa-thumbsup');
        $menu->addChild('Clubs', ['uri' => ['controller' => 'Clubs', 'action' => 'index']])
             ->setAttribute('icon', 'fa fa-users');
        $menu->addChild('Users', ['uri' => ['controller' => 'Users', 'action' => 'index']])
             ->setAttribute('icon', 'fa fa-user');
        $menu['Users']->addChild('Add', ['uri' => ['controller' => 'Users', 'action' => 'add']])
                      ->setAttribute('icon', 'fa fa-plus');


        return parent::beforeFilter($event);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        // Enable the AdminLTE Theme
        $this->viewBuilder()->theme('AdminLTE');

        // Read theme config from bootstrap.php
        $this->set('theme', Configure::read('Theme'));

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
