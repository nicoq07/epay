<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeudoresTelefonos Controller
 *
 * @property \App\Model\Table\DeudoresTelefonosTable $DeudoresTelefonos
 */
class DeudoresTelefonosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Deudores']
        ];
        $deudoresTelefonos = $this->paginate($this->DeudoresTelefonos);

        $this->set(compact('deudoresTelefonos'));
        $this->set('_serialize', ['deudoresTelefonos']);
    }
    public function isAuthorized($user)
    {
        if(isset($user['role_id']) and $user['role_id'] == 2)
        {
          return true;
        }
        elseif (isset($user['role_id']) and $user['role_id'] == 3) {
          if(in_array($this->request->action, ['edit','add','view']))
          {
              return true;
          }
        }
        return parent::isAuthorized($user);
    }

    /**
     * View method
     *
     * @param string|null $id Deudores Telefono id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deudoresTelefono = $this->DeudoresTelefonos->get($id, [
            'contain' => ['Deudores']
        ]);

        $this->set('deudoresTelefono', $deudoresTelefono);
        $this->set('_serialize', ['deudoresTelefono']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_deudor = null)
    {
        $deudoresTelefono = $this->DeudoresTelefonos->newEntity();
        if (empty($id_deudor))
          {
            return false;
          }
          $deudoresTelefono->deudor_id = $id_deudor;
        if ($this->request->is('post')) {
            $deudoresTelefono = $this->DeudoresTelefonos->patchEntity($deudoresTelefono, $this->request->data);
            if ($this->DeudoresTelefonos->save($deudoresTelefono)) {
                $this->Flash->success(__('Telefono guardado con éxito.'));

                return $this->redirect(['controller' => 'Deudores', 'action' => 'view/'.$id_deudor]);
            }
            $this->Flash->error(__('Tenemos un problemita para guardar el telefono. Reintentá por favor'));
        }
        $deudores = $this->DeudoresTelefonos->Deudores->find('list', ['limit' => 200]);
        $this->set(compact('deudoresTelefono', 'deudores'));
        $this->set('_serialize', ['deudoresTelefono']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deudores Telefono id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deudoresTelefono = $this->DeudoresTelefonos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deudoresTelefono = $this->DeudoresTelefonos->patchEntity($deudoresTelefono, $this->request->data);
            if ($this->DeudoresTelefonos->save($deudoresTelefono)) {
                $this->Flash->success(__('The deudores telefono has been saved.'));

                return $this->redirect(['controller' => 'Deudores', 'action' => 'view/'.$deudoresTelefono->deudor_id]);
            }
            $this->Flash->error(__('The deudores telefono could not be saved. Please, try again.'));
        }
        $deudores = $this->DeudoresTelefonos->Deudores->find('list', ['limit' => 200]);
        $this->set(compact('deudoresTelefono', 'deudores'));
        $this->set('_serialize', ['deudoresTelefono']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deudores Telefono id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deudoresTelefono = $this->DeudoresTelefonos->get($id);
        if ($this->DeudoresTelefonos->delete($deudoresTelefono)) {
            $this->Flash->success(__('The deudores telefono has been deleted.'));
        } else {
            $this->Flash->error(__('The deudores telefono could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
