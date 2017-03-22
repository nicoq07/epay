<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deudores Controller
 *
 * @property \App\Model\Table\DeudoresTable $Deudores
 */
class DeudoresController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['role_id']) && $user['role_id'] == 3)
        {
            if(in_array($this->request->action, ['view','index']))
            {
                return true;
            }
        }
        elseif (isset($user['role_id']) && $user['role_id'] == 2) {
            if(in_array($this->request->action, ['edit','add','view','index','search']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $deudores = $this->paginate($this->Deudores);

        $this->set(compact('deudores'));
        $this->set('_serialize', ['deudores']);
    }

    /**
     * View method
     *
     * @param string|null $id Deudore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deudore = $this->Deudores->get($id, [
            'contain' => ['Deudas','DeudoresTelefonos']
        ]);
        $this->set('deudore', $deudore);
        $this->set('_serialize', ['deudore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deudore = $this->Deudores->newEntity();
        if ($this->request->is('post')) {
            $deudore = $this->Deudores->patchEntity($deudore, $this->request->data);
            if ($this->Deudores->save($deudore)) {
                $this->Flash->success(__('The deudore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deudore could not be saved. Please, try again.'));
        }
        $this->set(compact('deudore'));
        $this->set('_serialize', ['deudore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deudore id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deudore = $this->Deudores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deudore = $this->Deudores->patchEntity($deudore, $this->request->data);
            if ($this->Deudores->save($deudore)) {
                $this->Flash->success(__('The deudore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deudore could not be saved. Please, try again.'));
        }
        $this->set(compact('deudore'));
        $this->set('_serialize', ['deudore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deudore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deudore = $this->Deudores->get($id);
        if ($this->Deudores->delete($deudore)) {
            $this->Flash->success(__('The deudore has been deleted.'));
        } else {
            $this->Flash->error(__('The deudore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
      $busqueda = "";
      $this->paginate = [
          'contain' => []
      ];

      if ($this->request->is(['post']) && !empty($this->request->data['busqueda']))
      {
        $busqueda = $this->request->data['busqueda'];
        $search = $this->request->data['busqueda'];


           $conditions = ['conditions' => [
                            'or' => [
                                'nombre LIKE' => "%$search%",
                                'dni LIKE' => "%$search%"
                            ]
                        ]
                    ];


         $this->set('deudores', $this->paginate($this->Deudores->find('all',$conditions)));

      }
      else{
          $this->set('deudores', $this->paginate($this->Deudores));
      }


      $this->set(compact('deudores' ,'busqueda'));

    }

}
