<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ClubsTable;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 */
class SkillsController extends AppController
{


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
                  'title' => $skill->title
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
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'limit'=>15,
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
            'contain' => ['Users', 'Clubs']
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
        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
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
     * Edit method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => ['Clubs']
        ]);
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
