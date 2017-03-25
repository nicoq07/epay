<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notificaciones Controller
 *
 * @property \App\Model\Table\NotificacionesTable $Notificaciones
 */
class NotificacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function isAuthorized($user)
     {
     if(isset($user['role_id']) && $user['role_id'] == 3)
     {
         if(in_array($this->request->action, ['view','add','index']))
         {
             return true;
         }
     }
     elseif (isset($user['role_id']) && $user['role_id'] == 2) {
         if(in_array($this->request->action, ['add','view','index']))
         {
             return true;
         }
     }
     return parent::isAuthorized($user);
   }
    public function index()
    {
      $this->paginate = [
        'conditions' => ['Notificaciones.receptor' => $this->Auth->user('id')],
        'order' => ['Notificaciones.created' => 'desc']];
        $notificaciones = $this->paginate($this->Notificaciones);
        $users = $this->Notificaciones->Users->find('list')->toArray();
        $this->set(compact('notificaciones','users'));
        $this->set('_serialize', ['notificaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);

        $this->set('notificacione', $notificacione);
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificacione = $this->Notificaciones->newEntity();
        if ($this->request->is('post')) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->data);
            $notificacione['emisor'] = $this->Auth->user('id');
            $notificacione['leida'] = false;
            // debug($notificacione);
            // exit();
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('Mensaje enviado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al enviar el mensaje'));
        }
        $users = $this->Notificaciones->Users->find('list');
        $this->set(compact('notificacione','users'));
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->data);
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('The notificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacione'));
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacione = $this->Notificaciones->get($id);
        if ($this->Notificaciones->delete($notificacione)) {
            $this->Flash->success(__('The notificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
