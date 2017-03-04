<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EstadosDeudas Controller
 *
 * @property \App\Model\Table\EstadosDeudasTable $EstadosDeudas
 */
class EstadosDeudasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $estadosDeudas = $this->paginate($this->EstadosDeudas);

        $this->set(compact('estadosDeudas'));
        $this->set('_serialize', ['estadosDeudas']);
    }

    /**
     * View method
     *
     * @param string|null $id Estados Deuda id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadosDeuda = $this->EstadosDeudas->get($id, [
            'contain' => []
        ]);

        $this->set('estadosDeuda', $estadosDeuda);
        $this->set('_serialize', ['estadosDeuda']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadosDeuda = $this->EstadosDeudas->newEntity();
        if ($this->request->is('post')) {
            $estadosDeuda = $this->EstadosDeudas->patchEntity($estadosDeuda, $this->request->data);
            if ($this->EstadosDeudas->save($estadosDeuda)) {
                $this->Flash->success(__('The estados deuda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estados deuda could not be saved. Please, try again.'));
        }
        $this->set(compact('estadosDeuda'));
        $this->set('_serialize', ['estadosDeuda']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Estados Deuda id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estadosDeuda = $this->EstadosDeudas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estadosDeuda = $this->EstadosDeudas->patchEntity($estadosDeuda, $this->request->data);
            if ($this->EstadosDeudas->save($estadosDeuda)) {
                $this->Flash->success(__('The estados deuda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estados deuda could not be saved. Please, try again.'));
        }
        $this->set(compact('estadosDeuda'));
        $this->set('_serialize', ['estadosDeuda']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Estados Deuda id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadosDeuda = $this->EstadosDeudas->get($id);
        if ($this->EstadosDeudas->delete($estadosDeuda)) {
            $this->Flash->success(__('The estados deuda has been deleted.'));
        } else {
            $this->Flash->error(__('The estados deuda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
