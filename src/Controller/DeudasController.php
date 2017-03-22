<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Number;
/**
 * Deudas Controller
 *
 * @property \App\Model\Table\DeudasTable $Deudas
 */
class DeudasController extends AppController
{

  // public function beforeFilter()
  // {
  //   parent::beforeFilter();
  //
  //    if ($this->request->is('ajax'))
  //    {
  //      $this->layout = 'ajax';
  //    }
  // }

  public function initialize()
      {
          parent::initialize();
          Number::defaultCurrency('USD');
          $this->loadComponent('Paginator');
      }

  public function isAuthorized($user)
  {
      if(isset($user['role_id']) &&  $user['role_id'] == 3)
      {
          if(in_array($this->request->action, ['index','view','search']))
          {
              return true;
          }
      }
      elseif (isset($user['role_id']) && $user['role_id'] == 2) {

         return true;
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
      /*  $this->paginate = [
            'contain' => ['Deudores', 'Carteras', 'Users']
        ];
        $deudas = $this->paginate($this->Deudas);

        $this->set(compact('deudas'));
        $this->set('_serialize', ['deudas']);*/

        $notAdmin = null;
        if ($this->Auth->user('role_id') !== 1 && $this->Auth->user('role_id') !== 2 ) $notAdmin = ['Deudas.usuario_id' => $this->Auth->user('id')];
        $this->paginate = [
          'contain' => ['Deudores', 'Carteras', 'Users','EstadosDeudas'],
          'conditions' => [$notAdmin],
          'order' => ['id' => 'desc']
        ];
        $deudas = $this->set('deudas', $this->paginate($this->Deudas));
    }

    /**
     * View method
     *
     * @param string|null $id Deuda id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deuda = $this->Deudas->get($id, [
            'contain' => ['Deudores', 'Carteras', 'Users', 'DeudasGestiones' => ['sort' => ['DeudasGestiones.Id' => 'DESC']]
            ,'EstadosDeudas']]);
        //debug($deuda);
        $this->set('deuda', $deuda);
        $this->set('_serialize', ['deuda']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deuda = $this->Deudas->newEntity();
        if ($this->request->is('post')) {
            $deuda = $this->Deudas->patchEntity($deuda, $this->request->data);
            if ($this->Deudas->save($deuda)) {
                $this->Flash->success(__('The deuda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deuda could not be saved. Please, try again.'));
        }
        $deudores = $this->Deudas->Deudores->find('list');
        $carteras = $this->Deudas->Carteras->find('list');
        $users = $this->Deudas->Users->find('list');
        $estados = $this->Deudas->EstadosDeudas->find('list');
        $this->set(compact('deuda', 'deudores', 'carteras', 'users','estados'));
        $this->set('_serialize', ['deuda']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deuda id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      $deuda = $this->Deudas->get($id, [
          'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {

        if ($this->request->data['id_estado'] = 6)
        {
            $this->request->data['acuerdo'] = true;
        }

          $deuda = $this->Deudas->patchEntity($deuda, $this->request->data);
          if ($this->Deudas->save($deuda)) {
              $this->Flash->success(__('Guardado con éxito'));

              return $this->redirect(['action' => 'view/'.$id]);
          }
          $this->Flash->error(__('Error al guardarse. Reintente.'));
      }
      $deudores = $this->Deudas->Deudores->find('list');
      $carteras = $this->Deudas->Carteras->find('list');
      $users = $this->Deudas->Users->find('list');
      $estados_deuda = $this->Deudas->EstadosDeudas->find('list');
      $this->set(compact('deuda', 'deudores', 'carteras', 'users','estados_deuda'));
      $this->set('_serialize', ['deuda']);

    }

    /**
     * Delete method
     *
     * @param string|null $id Deuda id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deuda = $this->Deudas->get($id);
        if ($this->Deudas->delete($deuda)) {
            $this->Flash->success(__('The deuda has been deleted.'));
        } else {
            $this->Flash->error(__('The deuda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

//metodo de busqueda

    public function search()
    {
      $busqueda = "";
      $this->paginate = [
            'contain' => ['Deudores', 'Carteras', 'Users','EstadosDeudas']
        ];


      if ($this->request->is(['post']) && !empty($this->request->data['busqueda']))
      {
        $busqueda = $this->request->data['busqueda'];
        $search = $this->request->data['busqueda'];


           $conditions = ['conditions' => [
            		            'or' => [
            		                'Deudores.nombre LIKE' => "%$search%",
            		                'Deudores.dni LIKE' => "%$search%",
            		                'Deudas.numero_producto LIKE' => "%$search%"
            		            ]
            		        ]
            		    ];

         $this->set('deudas', $this->paginate($this->Deudas->find('all', $conditions)));

      }
      else{
         	$this->set('deudas', $this->paginate($this->Deudas));
      }


      $this->set(compact('deudas' ,'busqueda'));


    }

    public function asignar()
    {
      $deudas = null;
      $notAdmin = null;
      if ($this->Auth->user('role_id') !== 1) $notAdmin = ['Deudas.usuario_id' => $this->Auth->user('id')];
        $this->paginate = [
          'contain' => ['Deudores', 'Carteras', 'Users','EstadosDeudas'],
          //'conditions' => [$notAdmin,'Deudas.active' =,''> '1'],
          'order' => ['id' => 'desc'],
          'limit' => 100
        ];

      if ($this->request->is(['patch', 'post', 'put']))
      {
          $user = $this->request->data['usuario_id'];
          if (empty($this->request->data['usuario_id']))
          {
            $user = null;
          }

          if (empty($this->request->data['deudas']))
          {
            $this->Flash->error(__('Debe seleccionar alguna deuda para asignar'));
          }
          else {
            $idDeudas = $this->request->data['deudas'];
            $deudasTable = TableRegistry::get('Deudas');
            $userTable = TableRegistry::get('Users');
            $usuario = $userTable->get($user);
            $connection = ConnectionManager::get('default');
            $desc = 'Caso asignado a '.$usuario->presentacion . ' el día :'. date('d-m-Y');
            foreach ($idDeudas as $id)
            {
                $deuda = $deudasTable->get($id);
                $deuda['usuario_id'] = $user;
                $deudasTable->save($deuda);
                $connection->insert('deudas_gestiones', [
                    'deuda_id' => $id,
                    'descripcion' => $desc,
                    'modified' => new \DateTime('now'),
                    'created' => new \DateTime('now')], ['created' => 'datetime' , 'modified' => 'datetime']);
            }
          }


      }

      $deudas = $this->paginate($this->Deudas);
      $users = $this->Deudas->Users->find('list');
      $this->set(compact('deudas','users'));



    }







    // public function busquedaAjax()
    // {
    // //   $this->autoRender = false;
    // //   $this->request->onlyAllow('ajax');
    //
    // $this->layout = 'ajax';
    // $this->beforeRender();
    // $this->autoRender = false;
    //
    //
    //
    //   if($this->request->is('post'))
    //   {
    //       $user = $this->request->data['user'];
    //       $deudas = $this->Deudas->find('asignedto',
    //                   ['user' => $user]);
    //
    //   }
    //
    //   $this->set(compact($deudas));
    //   $this->render('ajax_response','ajax');
    //
    //
    // }

}
