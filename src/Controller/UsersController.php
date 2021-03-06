<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public $paginate = [
        'limit' => 15,
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['edit', 'add', 'logout']);
    }

    /**
     * Log a user in
     *
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->viewBuilder()->layout('login');
    }

    /**
     * Log a user out
     *
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if ($this->Auth->user('admin')) {
            $conditions = [];
        } elseif ($this->Auth->user('club_admin')) {
            $conditions = ['Users.club_id' => $this->Auth->user('club_id')];
        } else {
            $conditions = ['Users.id' => $this->Auth->user('id')];
        }
        $this->paginate = [
            'contain'    => ['Clubs'],
            'conditions' => $conditions,
            'order'      => ['last_name' => 'ASC', 'first_name' => 'ASC'],
        ];
        $users          = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Clubs', 'Skills', 'Skills.Users'],
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if (!$this->Auth->user('admin') &&
            !$this->Auth->user('club_admin')
        ) {
            throw new ForbiddenException('Only Admin & ClubAdmin users can create new users.');
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            // Force the settings for Non-Admin creation of account to be user's Club & Non-admin
            if (!$this->Auth->user('admin')) {
                $user->club_id = $this->Auth->user('club_id');
                $user->admin = false;
                $user->club_admin = false;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Users->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('user', 'clubs'));
        $this->set('_serialize', ['user']);
    }

    public function approve($id)
    {
        $user = $this->Users->get($id);

        // Allow approval if current login is Admin
        // or current login is Club Admin for the User-in-question's Club
        if ($this->Auth->user('admin') ||
            $this->Users->isClubAdmin($this->Auth->user('id'), $user->club_id)
        ) {

            $user->approved = true;
            $this->Users->save($user);
        }
        $this->redirect($this->referer());

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if (!$this->Auth->user('admin') &&
            !($this->Auth->user('club_admin') && $user->club_id == $this->Auth->user('club_id'))
        ) {
            throw new ForbiddenException('Only Admin and ClubAdmins for this user can edit.');
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Users->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('user', 'clubs'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
