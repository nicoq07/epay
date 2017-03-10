<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


  public function initialize()
      {
        parent::initialize();
        // $this->Flash->set('Ups, no tenés permisos para entrar ahí', ['key' => 'auth']);
      }
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }
    public function isAuthorized($user)
    {
        if(isset($user['role_id']) and $user['role_id'] == 2)
        {
            if(in_array($this->request->action, ['home', 'view', 'logout']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function login()
    {
      ///me fijo en la tabla que el usuario no exista, osea, no haya iniciado sesión previamente
		    if ($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }

        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {

      			  $login = null;
      			  $connection = ConnectionManager::get('default');
              $login = $connection->execute("SELECT user_id FROM user_login WHERE user_id = ?", [$user['id']]);
              if ($login->count() == 0)
                {
                  $connection->insert('user_login', ['user_id' => $user['id']]);
                  $this->Auth->setUser($user);
                  return $this->redirect($this->Auth->redirectUrl());
                }
                else {
                  $this->Flash->error('Su usuario se encuentra con una sesión iniciada', ['key' => 'auth']);
                }

            }
            else
            {
                $this->Flash->error('Datos son invalidos, por favor intente nuevamente', ['key' => 'auth']);
            }
        }

    }
    public function logout()
    {
        $id = $this->Auth->user()['id'];
        $connection = ConnectionManager::get('default');
        $login = $connection->execute("DELETE FROM user_login WHERE user_id = ?", [$id]);
        if ($login->count() == 1)
          {
            return $this->redirect($this->Auth->logout());
          }

    }
    public function home()
    {
      $session = $this->request->session();
      $session->destroy();
    
        $this->render();
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

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
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
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
