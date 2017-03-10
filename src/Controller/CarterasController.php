<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;



/**
 * Carteras Controller
 *
 * @property \App\Model\Table\CarterasTable $Carteras
 */
class CarterasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Empresas']
        ];
        $carteras = $this->paginate($this->Carteras);

        $this->set(compact('carteras'));
        $this->set('_serialize', ['carteras']);
    }

    /**
     * View method
     *
     * @param string|null $id Cartera id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartera = $this->Carteras->get($id, [
            'contain' => ['Empresas', 'Deudas']
        ]);

        $this->set('cartera', $cartera);
        $this->set('_serialize', ['cartera']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($empresaElegida = null)
    {
        $cartera = $this->Carteras->newEntity();
        if ($this->request->is('post')) {
            $cartera = $this->Carteras->patchEntity($cartera, $this->request->data);
            if ($this->Carteras->save($cartera)) {
                $this->Flash->success(__('Cartera guardada con éxito.'));

                return $this->redirect(['action' => 'view/'.$cartera->Id]);
            }
            $this->Flash->error(__('No pudo guardarse la cartera. Reintente.'));
        }
        $empresas = $this->Carteras->Empresas->find('list', ['limit' => 200]);


        $this->set(compact('cartera', 'empresas','empresaElegida'));
        $this->set('_serialize', ['cartera']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cartera id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartera = $this->Carteras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartera = $this->Carteras->patchEntity($cartera, $this->request->data);
            if ($this->Carteras->save($cartera)) {
                $this->Flash->success(__('The cartera has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cartera could not be saved. Please, try again.'));
        }
        $empresas = $this->Carteras->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('cartera', 'empresas'));
        $this->set('_serialize', ['cartera']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cartera id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartera = $this->Carteras->get($id);
        if ($this->Carteras->delete($cartera)) {
            $this->Flash->success(__('The cartera has been deleted.'));
        } else {
            $this->Flash->error(__('The cartera could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function subir($idCartera = null)
    {
        // require_once(ROOT . DS . 'src' . DS . 'Classes' . DS . 'PHPExcel.php');
        $connection = ConnectionManager::get('default');

        $cartera = $this->Carteras->newEntity();

        $id = null;

        $uploadData = '';
        if ($this->request->is('post')) {
          if(!empty($this->request->data['file']['name'])){
          $fileName = $this->request->data['file']['name'];
          $uploadPath = 'uploads/files/';
          $uploadFile = $uploadPath.$fileName;
          if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
            $excelReader = \PHPExcel_IOFactory::createReaderForFile($uploadFile);
            $excelObj = $excelReader->load($uploadFile);
            $worksheet = $excelObj->getSheet(0);
            $lastRow = $worksheet->getHighestRow();
            $hoja = null;
            for ($row = 2; $row <= $lastRow; $row++)
            {
              //deudor
              //pregunto si existe el deudor con dni tanto
              $resultDni = $connection->execute('SELECT dni FROM deudores WHERE dni = :dni', ['dni' => $worksheet->getCell('B'.$row)->getValue()]);

              //si el count es 0, osea no trajo nada lo voy a insertar
              // si el count es 1, ese deudor ya existe no lo inserto pero cargo sus deudas.
              if ($resultDni->count() == 0)
              {
                  $connection->insert('deudores', [
                      'calificacion' => '',
                      'nombre' => $worksheet->getCell('A'.$row)->getValue(),
                      'dni' => $worksheet->getCell('B'.$row)->getValue(),
                      'direccion' => $worksheet->getCell('C'.$row)->getValue(),
                      'provincia' => $worksheet->getCell('D'.$row)->getValue(),
                      'localidad' => $worksheet->getCell('E'.$row)->getValue(),
                      'active' => true,
                      'laboral' => $worksheet->getCell('F'.$row)->getValue(),
                      'cantidad' => $worksheet->getCell('G'.$row)->getValue(),
                      'categoria' => $worksheet->getCell('H'.$row)->getValue(),
                      'modified' => new \DateTime('now'),
                      'created' => new \DateTime('now')], ['created' => 'datetime' , 'modified' => 'datetime']);

                    //despues de insertarlo , voy a buscar su  Id preguntando por dni
                  $deudor_id = $connection->execute('SELECT Id FROM deudores WHERE dni = :dni', ['dni' => $worksheet->getCell('B'.$row)->getValue()]);


                  $id = $deudor_id->fetchAll()[0][0];

                  //aca cargo en un array los telefonos del deudor, solo para poder recorrerlos
                  $hoja[$row]['telefono1'] = $worksheet->getCell('P'.$row)->getValue();
                  $hoja[$row]['telefono2'] = $worksheet->getCell('Q'.$row)->getValue();
                  $hoja[$row]['telefono3'] = $worksheet->getCell('R'.$row)->getValue();
                  $hoja[$row]['telefono4'] = $worksheet->getCell('S'.$row)->getValue();
                  $hoja[$row]['telefono5'] = $worksheet->getCell('T'.$row)->getValue();
                  $hoja[$row]['telefono6'] = $worksheet->getCell('U'.$row)->getValue();
                  $hoja[$row]['telefono7'] = $worksheet->getCell('V'.$row)->getValue();
                  //los reccoro, suponiendo que siempre van a tener como maximo 4 telefonos

                  for ($i=1; $i <= 7; $i++) {

                    //voy a recorrer el array que y preguntar si el campo de ese array no esta vacio para insertrlo en la tabla
                      if (!empty($hoja[$row]['telefono'.$i]))
                      {
                        $connection->insert('deudores_telefonos', [
                            'deudor_id' => $id,
                            'telefono' => $hoja[$row]['telefono'.$i]]);
                      }
                  }

                  //Busco el operador asignado, ellos me pasan el nombre completo y yo tengo
                  //que traerme el id

                  $user_id = $connection->execute('SELECT id FROM users WHERE CONCAT(nombre, , apellido) LIKE :nomyape', ['nomyape' => $worksheet->getCell('O'.$row)->getValue()]);
                  $user_id = $user_id->fetchAll()[0][0];

                  //cargo la deuda
                  ///deuda
                  $hoja[$row]['producto'] = $worksheet->getCell('I'.$row)->getValue();
                  $hoja[$row]['numero_prodcuto'] = $worksheet->getCell('J'.$row)->getValue();
                  $hoja[$row]['fecha_mora'] = $worksheet->getCell('K'.$row)->getFormattedValue();
                  $hoja[$row]['dias_mora'] = $worksheet->getCell('L'.$row)->getValue();
                  $hoja[$row]['capital_inicial'] = $worksheet->getCell('M'.$row)->getValue();
                  $hoja[$row]['total'] = $worksheet->getCell('N'.$row)->getValue();
                  //////// formateo la hora del excel en un timestamp para la BD
                  $cell = $worksheet->getCell('K' . $row);
                  $fecha_mora= $cell->getValue();
                  if(\PHPExcel_Shared_Date::isDateTime($cell)) {
                       $fecha_mora = date('Y-m-d h:i:s', \PHPExcel_Shared_Date::ExcelToPHP($fecha_mora));
                  }
                  /////////////////////////////////////////////////////////////////////////////////////

                  $connection->insert('deudas', [
                      'deudor_id' => $id,
                      'cartera_id' => $idCartera,
                      'usuario_id' => $user_id,
                      'producto' => $worksheet->getCell('I'.$row)->getValue(),
                      'numero_producto' => $worksheet->getCell('J'.$row)->getValue(),
                      'fecha_mora' => $fecha_mora,
                      'dias_mora' =>  $worksheet->getCell('L'.$row)->getValue(),
                      'capital_inicial' => $worksheet->getCell('M'.$row)->getValue(),
                      'total' => $worksheet->getCell('N'.$row)->getValue(),
                      'active' => true,
                      'modified' => new \DateTime('now'),
                      'created' => new \DateTime('now')],
                      ['created' => 'datetime' , 'modified' => 'datetime']);

              }
              elseif ($resultDni->count() == 1) {
                //////// formateo la hora del excel en un timestamp para la BD
                $cell = $worksheet->getCell('K' . $row);
                $fecha_mora= $cell->getValue();
                if(\PHPExcel_Shared_Date::isDateTime($cell)) {
                     $fecha_mora = date('Y-m-d h:i:s', \PHPExcel_Shared_Date::ExcelToPHP($fecha_mora));
                }
                ///////////////////////////////////////////////
                //Busco el operador asignado, ellos me pasan el nombre completo y yo tengo
                //que traerme el id

                $user_id = $connection->execute('SELECT id FROM users WHERE CONCAT(nombre, ' ', apellido) like :nomyape', ['nomyape' => $worksheet->getCell('O'.$row)->getValue()]);
                $user_id = $user_id->fetchAll()[0][0];
                /////////////////////////////////////////////////////////////////////////////////////
                $connection->insert('deudas', [
                    'deudor_id' => $id,
                    'cartera_id' => $idCartera,
                    'usuario_id' => $user_id,
                    'producto' => $worksheet->getCell('I'.$row)->getValue(),
                    'numero_producto' => $worksheet->getCell('J'.$row)->getValue(),
                    'fecha_mora' => $fecha_mora,
                    'dias_mora' =>  $worksheet->getCell('L'.$row)->getValue(),
                    'capital_inicial' => $worksheet->getCell('M'.$row)->getValue(),
                    'total' => $worksheet->getCell('N'.$row)->getValue(),
                    'active' => true,
                    'modified' => new \DateTime('now'),
                    'created' => new \DateTime('now')],
                    ['created' => 'datetime' , 'modified' => 'datetime']);



              }
              else
              {

                // si el count no devuelve ni 1 ni 0 algo esta mal
                die('algo salio mal...');

              }


            } // fin FOR



          } //fin if move_uploaded_file
          else {
           $this->Flash->error("Tenemos un problema para cargar el archivo");
          }


        } //fin del request->post
      }
        $this->set(compact('cartera'));

    }
}
