<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserLogin Controller
 *
 * @property \App\Model\Table\UserLoginTable $UserLogin
 */
class UserLoginController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userLogin = $this->paginate($this->UserLogin);

        $this->set(compact('userLogin'));
        $this->set('_serialize', ['userLogin']);
    }

    /**
     * View method
     *
     * @param string|null $id User Login id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userLogin = $this->UserLogin->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userLogin', $userLogin);
        $this->set('_serialize', ['userLogin']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userLogin = $this->UserLogin->newEntity();
        if ($this->request->is('post')) {
            $userLogin = $this->UserLogin->patchEntity($userLogin, $this->request->data);
            if ($this->UserLogin->save($userLogin)) {
                $this->Flash->success(__('The user login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user login could not be saved. Please, try again.'));
        }
        $users = $this->UserLogin->Users->find('list', ['limit' => 200]);
        $this->set(compact('userLogin', 'users'));
        $this->set('_serialize', ['userLogin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Login id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userLogin = $this->UserLogin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userLogin = $this->UserLogin->patchEntity($userLogin, $this->request->data);
            if ($this->UserLogin->save($userLogin)) {
                $this->Flash->success(__('The user login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user login could not be saved. Please, try again.'));
        }
        $users = $this->UserLogin->Users->find('list', ['limit' => 200]);
        $this->set(compact('userLogin', 'users'));
        $this->set('_serialize', ['userLogin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Login id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userLogin = $this->UserLogin->get($id);
        if ($this->UserLogin->delete($userLogin)) {
            $this->Flash->success(__('The user login has been deleted.'));
        } else {
            $this->Flash->error(__('The user login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
