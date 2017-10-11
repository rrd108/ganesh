<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActivitiesUsers Controller
 *
 * @property \App\Model\Table\ActivitiesUsersTable $ActivitiesUsers
 *
 * @method \App\Model\Entity\ActivitiesUser[] paginate($object = null, array $settings = [])
 */
class ActivitiesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Activities']
        ];
        $activitiesUsers = $this->paginate($this->ActivitiesUsers);

        $this->set(compact('activitiesUsers'));
        $this->set('_serialize', ['activitiesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Activities User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activitiesUser = $this->ActivitiesUsers->get($id, [
            'contain' => ['Users', 'Activities']
        ]);

        $this->set('activitiesUser', $activitiesUser);
        $this->set('_serialize', ['activitiesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activitiesUser = $this->ActivitiesUsers->newEntity();
        if ($this->request->is('post')) {
            $activitiesUser = $this->ActivitiesUsers->patchEntity($activitiesUser, $this->request->getData());
            if ($this->ActivitiesUsers->save($activitiesUser)) {
                $this->Flash->success(__('The activities user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activities user could not be saved. Please, try again.'));
        }
        $users = $this->ActivitiesUsers->Users->find('list', ['limit' => 200]);
        $activities = $this->ActivitiesUsers->Activities->find('list', ['limit' => 200]);
        $this->set(compact('activitiesUser', 'users', 'activities'));
        $this->set('_serialize', ['activitiesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activities User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activitiesUser = $this->ActivitiesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activitiesUser = $this->ActivitiesUsers->patchEntity($activitiesUser, $this->request->getData());
            if ($this->ActivitiesUsers->save($activitiesUser)) {
                $this->Flash->success(__('The activities user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activities user could not be saved. Please, try again.'));
        }
        $users = $this->ActivitiesUsers->Users->find('list', ['limit' => 200]);
        $activities = $this->ActivitiesUsers->Activities->find('list', ['limit' => 200]);
        $this->set(compact('activitiesUser', 'users', 'activities'));
        $this->set('_serialize', ['activitiesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activities User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activitiesUser = $this->ActivitiesUsers->get($id);
        if ($this->ActivitiesUsers->delete($activitiesUser)) {
            $this->Flash->success(__('The activities user has been deleted.'));
        } else {
            $this->Flash->error(__('The activities user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
