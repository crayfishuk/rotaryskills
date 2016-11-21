<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Controller\Component\AuthComponent;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    public $paginate = [
        'limit' => 15,
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $clubs = $this->paginate($this->Clubs);

        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
    }

    /**
     * View method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => ['Skills', 'Users', 'Skills.Users', 'ClubAdmins'],
        ]);

        $users           = empty($club->users) ?
            'No Users yet' :
            implode(', ', (new Collection($club->users))->extract('full_name')->toArray());
        $clubAdmins      = empty($club->club_admins) ?
            'No Administrators yet' :
            implode(', ', (new Collection($club->club_admins))->extract('full_name')->toArray());
        $authIsClubAdmin = $this->Clubs->Users->isClubAdmin($this->Auth->user('id'), $id);

        $this->set(compact('clubAdmins', 'users', 'authIsClubAdmin'));
        $this->set('title', __('Rotary Club of ') . $club->name);
        $this->set('club', $club);
        $this->set('_serialize', ['club']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $club = $this->Clubs->newEntity();
        if ($this->request->is('post')) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The club could not be saved. Please, try again.'));
            }
        }
        $skills = $this->Clubs->Skills->find('list', ['limit' => 200]);
        $this->set(compact('club', 'skills'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => ['Skills'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The club could not be saved. Please, try again.'));
            }
        }
        $skills = $this->Clubs->Skills->find('list', ['limit' => 200]);
        $this->set(compact('club', 'skills'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $club = $this->Clubs->get($id);
        if ($this->Clubs->delete($club)) {
            $this->Flash->success(__('The club has been deleted.'));
        } else {
            $this->Flash->error(__('The club could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
