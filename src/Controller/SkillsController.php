<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 */
class SkillsController extends AppController
{

    /**
     * @param Event $event
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['search', 'cloud', 'view']);
    }

    /**
     * Show a cloud of Skills tags
     *
     * @return \Cake\Network\Response|null
     */
    public function cloud()
    {
        $skills = $this->Skills->find();
        $skills->contain(['Clubs']);

        $total = 0;
        foreach ($skills as $skill) {
            $clubCount = count($skill->clubs);
            if ($clubCount > 0) {
                $count[ $skill->id ] = [
                    'count' => $clubCount,
                    'title' => $skill->title,
                ];
                $total += $clubCount;
            }
        }

        $clubs = $this->Skills->Clubs->find();
        $clubs->order('name');
        $clubs->toList();

        $this->set(compact('skills', 'total', 'count', 'clubs'));
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($userId = null)
    {
        // Add user's club_id as a condition
        $conditions = $userId ? ['user_id' => $userId] : [];

        $this->paginate = [
            'contain'    => ['Users'],
            'conditions' => $conditions,
            'limit'      => 15,
        ];

        $skills = $this->paginate($this->Skills);

        $this->set(compact('skills'));
        $this->set('_serialize', ['skills']);
    }

    /**
     * View method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => ['Users', 'Clubs'],
        ]);

        $this->set('skill', $skill);
        $this->set('_serialize', ['skill']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if (!$this->Auth->user('admin') && !$this->Auth->user('club_admin')) {
            throw new ForbiddenException('Only Admin and ClubAdmin users can add Skills');
        }

        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);

            // Force the skill to be created by the current user & leave it unapproved
            $skill->user_id  = $this->Auth->user('id');
            $skill->approved = 0;

            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Skills->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('skill', 'users', 'clubs'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Approve a Skill for use by everyone
     *
     * @param $id
     */
    public function approve($id)
    {
        if ($this->Auth->user('admin')) {

            $skill           = $this->Skills->get($id);
            $skill->approved = true;
            $this->Skills->save($skill);
        }
        $this->redirect($this->referer());

    }

    public function search($needle)
    {
        $query = $this->Skills->find()
                              ->contain('Clubs')
                              ->where(['Skills.title LIKE' => "%$needle%"])
                              ->orWhere(['Skills.description LIKE' => "%$needle%"])
                              ->order(['Skills.title' => 'ASC']);

        $skills = $query->all();

        $this->set(compact('skills', 'needle'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => ['Clubs', 'Users'],
        ]);

        if (!$this->Auth->user('admin') && $this->Auth->user('id') != $skill->user_id) {
            throw new ForbiddenException(
                'Only Admins and the Skills owner (' . $skill->user->full_name . ') can edit a Skill.');
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $users = $this->Skills->Users->find('list', ['limit' => 200]);
        $clubs = $this->Skills->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('skill', 'users', 'clubs'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skill = $this->Skills->get($id);
        if ($this->Skills->delete($skill)) {
            $this->Flash->success(__('The skill has been deleted.'));
        } else {
            $this->Flash->error(__('The skill could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
