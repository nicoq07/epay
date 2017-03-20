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
 // public $archivo;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Empresas','Deudas']
        ];
        $carteras = $this->paginate($this->Carteras);
        $this->set(compact('carteras'));
        $this->set('_serialize', ['carteras']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role_id']) and $user['role_id'] == 2)
        {
            if(in_array($this->request->action, ['index','view','edit','search']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
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

   public function exportar($idCartera = null)
   {
     if (!empty($this->request->data['cartera']) )
     {
       $idCartera = $this->request->data['cartera'];
     }


     if (!empty($idCartera))
     {
      $queryReporte = "SELECT
                        deu.nombre nom, deu.dni dni, d.producto prod, d.numero_producto nump, d.capital_inicial capini, d.total total, e.descripcion estado ,
                        d.fecha_mora fechamora , dg.descripcion gestion, dg.created fecha , CONCAT(u.nombre,' ',u.apellido) operador
                        from deudas d
                        INNER JOIN deudores deu ON deu.Id = d.deudor_id
                        INNER JOIN carteras car ON car.Id = d.cartera_id
                        INNER JOIN users u ON u.id = d.usuario_id
                        INNER JOIN estados_deudas e ON e.id = d.estado_id
                        INNER JOIN deudas_gestiones dg ON dg.deuda_id = d.Id
                        WHERE car.Id = $idCartera AND dg.Id = ( SELECT MAX(dg2.id) FROM deudas_gestiones dg2 where dg2.deuda_id = d.Id  group by dg2.deuda_id )";

            $connection = ConnectionManager::get('default');
            $resultExport = $connection
                            ->execute($queryReporte)
                            ->fetchAll('assoc');

          //  debug($resultExport);

              //////////////////////////////


	$objPHPExcel = new \PHPExcel();
  ini_set('memory_limit', '-1');
	$objPHPExcel->
		getProperties()
			->setCreator($this->current_user['nombre']. " ".$this->current_user['apellido'])
			->setTitle("Reporte");


	// Seteo el formato por default de los bordes para las celdas
	$styleCells = array(
      'borders' => array(
          'allborders' => array(
              'style' => \PHPExcel_Style_Border::BORDER_THIN
          )
      )
	);

	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A1', 'Nombre y Apellido')
				->setCellValue('B1', 'DNI')
				->setCellValue('C1', 'Producto')
				->setCellValue('D1', 'Numero Producto')
				->setCellValue('E1', 'Capital Inicial')
				->setCellValue('F1', 'Total')
				->setCellValue('G1', 'Estado')
				->setCellValue('H1', 'Fecha Mora')
        ->setCellValue('I1', 'Ultima Gestion')
        ->setCellValue('J1', 'Fecha Gestion')
        ->setCellValue('K1', 'Operador');


        	$_row = 1;

        	foreach ($resultExport as $item)
          {
        		$_row = $_row +1;

            $fechaMora = date('d/m/Y', strtotime($item['fechamora']));
            $fechaGestion = date('d/m/Y', strtotime($item['fecha']));
        		$objPHPExcel->setActiveSheetIndex(0)
        				->setCellValue('A'.$_row, $item['nom'])
        				->setCellValue('B'.$_row, $item['dni'])
        				->setCellValue('C'.$_row, $item['prod'])
        				->setCellValue('D'.$_row, $item['nump'])
        				->setCellValue('E'.$_row, $item['capini'])
        				->setCellValue('F'.$_row, $item['total'])
        				->setCellValue('G'.$_row, $item['estado'])
                ->setCellValue('H'.$_row, $fechaMora)
                ->setCellValue('I'.$_row, $item['gestion'])
        				->setCellValue('J'.$_row, $fechaGestion)
                ->setCellValue('K'.$_row, $item['operador']);

        		// Le aplico a todas las celdas el formato de borde.
        		$objPHPExcel->getActiveSheet()->getStyle('A'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('B'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('C'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('D'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('E'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('F'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('G'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('H'.$_row)->applyFromArray($styleCells);
            $objPHPExcel->getActiveSheet()->getStyle('I'.$_row)->applyFromArray($styleCells);
        		$objPHPExcel->getActiveSheet()->getStyle('J'.$_row)->applyFromArray($styleCells);
            $objPHPExcel->getActiveSheet()->getStyle('K'.$_row)->applyFromArray($styleCells);

        	}


          	// Ajusto el ancho de las columnas
          	foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
                  $objPHPExcel->getActiveSheet()
                          ->getColumnDimension($col)
                          ->setAutoSize(true);
              }

          //
          	// Seteo el formato por default de los bordes para las celdas del encabezado y las pongo en negrita
          	$styleHeader = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => \PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
          	  'font' => array(
          			'bold' => true
          			)
          	);
          	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleHeader);
          	$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleHeader);
            $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleHeader);
            $objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleHeader);
            $objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($styleHeader);



          	// Seteo el nombre del archivo

          	$_file_name_aux = "Reporte ". date('d-m-Y');

          	//header("Content-Type:   application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
            header('Content-Type: application/vnd.ms-excel');
          	header('Content-Disposition: attachment;filename='.$_file_name_aux.'.xls');
          	header('Cache-Control: max-age=0');


          	$objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
          	$objWriter->save('php://output');
            return;
          }
          $cartera = $this->Carteras->newEntity();
          $carteras = $this->Carteras->find('list');
          $this->set(compact('carteras','cartera'));
      }

    public function subir($idCartera = null, $confirmar = null)
    {
        // require_once(ROOT . DS . 'src' . DS . 'Classes' . DS . 'PHPExcel.php');

        $connection = ConnectionManager::get('default');
        $uploadFile = 'uploads/files/cartera.xlsx';
        $cartera = $this->Carteras->newEntity();
        $cantDeudas = -1;
        $cantCapIni = 0;
        $cantTotal = 0;
        $deudoresNuevos = 0;
        $deudasNuevas = 0;
        $deudasActualizadas = 0;
        $id = null;
        if ($this->request->is('post')) {
              if(!empty($this->request->data['file']['name']))
              {
                if(!move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile))
                {
                   $this->Flash->error("Tenemos un problema para cargar el archivo");
                }
              }


                if (file_exists($uploadFile))
                {
                  $connection->begin();
                  $excelReader = \PHPExcel_IOFactory::createReaderForFile($uploadFile);
                  $excelObj = $excelReader->load($uploadFile);
                  $worksheet = $excelObj->getSheet(0);
                  $lastRow = $worksheet->getHighestRow();
                  $hoja = null;
                  for ($row = 2; $row <= $lastRow; $row++)
                  {
                    $cantDeudas = $row;
                    //deudor
                    //pregunto si existe el deudor con dni tanto
                    $resultDni =   $connection->execute('SELECT dni FROM deudores WHERE dni = :dni', ['dni' => $worksheet->getCell('B'.$row)->getValue()]);

                    //si el count es 0, osea no trajo nada lo voy a insertar
                    // si el count es 1, ese deudor ya existe no lo inserto pero cargo sus deudas.
                    //sumo uno a DEudores nuevos
                    $nombre = !empty($worksheet->getCell('A'.$row)->getValue()) ? $worksheet->getCell('A'.$row)->getValue() : 0;
                    $dni = !empty($worksheet->getCell('B'.$row)->getValue()) ? $worksheet->getCell('B'.$row)->getValue() : 0;
                    $direccion = !empty($worksheet->getCell('C'.$row)->getValue()) ? $worksheet->getCell('C'.$row)->getValue() : 0;
                    $provincia = !empty($worksheet->getCell('D'.$row)->getValue()) ? $worksheet->getCell('D'.$row)->getValue() : 0;
                    $localidad = !empty($worksheet->getCell('E'.$row)->getValue()) ? $worksheet->getCell('E'.$row)->getValue() : 0;
                    $laboral = !empty($worksheet->getCell('F'.$row)->getValue()) ? $worksheet->getCell('F'.$row)->getValue() : 0;
                    $cantidad = !empty($worksheet->getCell('G'.$row)->getValue()) ? $worksheet->getCell('G'.$row)->getValue() : 0;
                    $categoria = !empty($worksheet->getCell('H'.$row)->getValue()) ? $worksheet->getCell('H'.$row)->getValue() : 0;
                    if ($resultDni->count() == 0)
                    {

                          $connection->insert('deudores', [
                            'calificacion' => '',
                            'nombre' => $nombre,
                            'dni' => $dni,
                            'direccion' => $direccion,
                            'provincia' => $provincia,
                            'localidad' => $localidad,
                            'active' => true,
                            'laboral' => $laboral,
                            'cantidad' => $cantidad,
                            'categoria' => $categoria,
                            'modified' => new \DateTime('now'),
                            'created' => new \DateTime('now')], ['created' => 'datetime' , 'modified' => 'datetime']);



                          //despues de insertarlo , voy a buscar su  Id preguntando por dni
                        $deudor_id =   $connection->execute('SELECT Id FROM deudores WHERE dni = :dni', ['dni' => $dni]);


                        $id = $deudor_id->fetchAll()[0][0];

                        //
                        $deudoresNuevos++;
                        //
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
                            if (!empty($hoja[$row]['telefono'.$i]) || $hoja[$row]['telefono'.$i] != 0 )
                            {
                                $connection->insert('deudores_telefonos', [
                                  'deudor_id' => $id,
                                  'telefono' => $hoja[$row]['telefono'.$i]]);
                            }
                        }

                        //Busco el operador asignado, ellos me pasan el nombre completo y yo tengo
                        //que traerme el id
                        $user_id = null;
                        if ($worksheet->getCell('O'.$row)->getValue() != null && !empty($worksheet->getCell('O'.$row)->getValue()))
                        {
                          $user_id =   $connection->execute("SELECT id FROM users WHERE CONCAT(nombre,'". " ',apellido) LIKE :nomyape", ['nomyape' => $worksheet->getCell('O'.$row)->getValue()]);
                          $user_id = current($user_id->fetchAll('assoc'));
                        }
                        //cargo la deuda
                        ///deuda

                        //////// formateo la hora del excel en un timestamp para la BD
                        $cell = $worksheet->getCell('K' . $row);
                        $fecha_mora = '';
                        if(\PHPExcel_Shared_Date::isDateTime($cell)) {
                          echo 'entra';
                             $fecha_mora = date('Y-m-d h:i:s', \PHPExcel_Shared_Date::ExcelToPHP($cell->getValue()));
                        }
                        $producto =  !empty($worksheet->getCell('I'.$row)->getValue()) ? $worksheet->getCell('I'.$row)->getValue() : '';
                        $numero_producto= !empty($worksheet->getCell('J'.$row)->getValue()) ? $worksheet->getCell('J'.$row)->getValue() : '';
                        $dias_mora = !empty($worksheet->getCell('L'.$row)->getValue()) ? $worksheet->getCell('L'.$row)->getValue() : '';
                        $capital_inicial = !empty($worksheet->getCell('M'.$row)->getValue()) ? $worksheet->getCell('M'.$row)->getValue() : 0;
                        $total = !empty($worksheet->getCell('N'.$row)->getValue()) ? $worksheet->getCell('N'.$row)->getValue() : 0;


                        $connection->insert('deudas', [
                            'deudor_id' => $id,
                            'cartera_id' => $idCartera,
                            'usuario_id' => $user_id['id'],
                            'producto' => $producto,
                            'numero_producto' => $numero_producto,
                            'fecha_mora' => $fecha_mora,
                            'dias_mora' =>  $dias_mora,
                            'capital_inicial' => $capital_inicial,
                            'total' => $total,
                            'active' => true,
                            'modified' => new \DateTime('now'),
                            'created' => new \DateTime('now')],
                            ['created' => 'datetime' , 'modified' => 'datetime']);
                            $deudasNuevas++;
                            $cantCapIni += $capital_inicial;
                            $cantTotal += $total;

                    //hago insert en deudas gestiones informando la asigancion de la deuda
                    //la variable $desc tendrá la descripcion de la dueda asignada
                        if (!empty($user_id['id']) && $user_id['id'] > 0)
                        {
                          /////me traigo el id de la deuda recien creada
                            $deuda_id =   $connection->execute("SELECT Id FROM deudas WHERE deudor_id = :deudor_id AND
                                                             cartera_id = :cartera_id AND
                                                             producto = :producto AND
                                                             dias_mora = :dias_mora AND
                                                             numero_producto = :numero_producto AND
                                                             capital_inicial = :capital_inicial AND
                                                             total = :total" ,   ['deudor_id' => $id,
                                                                      'cartera_id' => $idCartera,
                                                                      'producto' => $producto,
                                                                      'numero_producto' => $numero_producto,
                                                                      'dias_mora' =>  $dias_mora,
                                                                      'capital_inicial' => $capital_inicial,
                                                                      'total' => $total]);
                           $deuda_id = current($deuda_id->fetchAll('assoc'));

                           $usuario_asignado =  !empty($worksheet->getCell('O'.$row)->getValue()) ? $worksheet->getCell('O'.$row)->getValue() : '';
                            $desc = 'Caso asignado a '.$usuario_asignado. ' el día :'. date('d-m-Y');
                              $connection->insert('deudas_gestiones', [
                                'deuda_id' => $deuda_id['Id'],
                                'descripcion' => $desc,
                                'modified' => new \DateTime('now'),
                                'created' => new \DateTime('now')], ['created' => 'datetime' , 'modified' => 'datetime']);
                          }


                        }
                    ///Acá el Duedor ya exite y solo le cargo la info de la deuda
                    elseif ($resultDni->count() == 1) {
                      //despues de insertarlo , voy a buscar su  Id preguntando por dni
                    $deudor_id =   $connection->execute('SELECT Id FROM deudores WHERE dni = :dni', ['dni' => $resultDni->fetchAll()[0][0]]);


                    $id = $deudor_id->fetchAll()[0][0];
                      //////// formateo la hora del excel en un timestamp para la BD
                      $cell = $worksheet->getCell('K' . $row);
                      $fecha_mora= $cell->getValue();
                      if(\PHPExcel_Shared_Date::isDateTime($cell)) {
                           $fecha_mora = date('Y-m-d h:i:s', \PHPExcel_Shared_Date::ExcelToPHP($fecha_mora));
                      }
                      ///////////////////////////////////////////////
                      //Busco el operador asignado, ellos me pasan el nombre completo y yo tengo
                      //que traerme el id

                      $user_id = null;
                      if ($worksheet->getCell('O'.$row)->getValue() != null && !empty($worksheet->getCell('O'.$row)->getValue()))
                      {
                        $user_id =   $connection->execute("SELECT id FROM users WHERE CONCAT(nombre,'". " ',apellido) LIKE :nomyape", ['nomyape' => $worksheet->getCell('O'.$row)->getValue()]);
                        $user_id = current($user_id->fetchAll('assoc'));
                      }
                      /////////////////////////////////////////////////////////////////////////////////////
                      $producto =  !empty($worksheet->getCell('I'.$row)->getValue()) ? $worksheet->getCell('I'.$row)->getValue() : '';
                      $numero_producto= !empty($worksheet->getCell('J'.$row)->getValue()) ? $worksheet->getCell('J'.$row)->getValue() : '';
                      $dias_mora = !empty($worksheet->getCell('L'.$row)->getValue()) ? $worksheet->getCell('L'.$row)->getValue() : '';
                      $capital_inicial = !empty($worksheet->getCell('M'.$row)->getValue()) ? $worksheet->getCell('M'.$row)->getValue() : 0;
                      $total = !empty($worksheet->getCell('N'.$row)->getValue()) ? $worksheet->getCell('N'.$row)->getValue() : 0;


                      $connection->insert('deudas', [
                          'deudor_id' => $id,
                          'cartera_id' => $idCartera,
                          'usuario_id' => $user_id['id'],
                          'producto' => $producto,
                          'numero_producto' => $numero_producto,
                          'fecha_mora' => $fecha_mora,
                          'dias_mora' =>  $dias_mora,
                          'capital_inicial' => $capital_inicial,
                          'total' => $total,
                          'active' => true,
                          'modified' => new \DateTime('now'),
                          'created' => new \DateTime('now')],
                          ['created' => 'datetime' , 'modified' => 'datetime']);
                          $deudasNuevas++;
                          $cantCapIni += $capital_inicial;
                          $cantTotal += $total;
                          $deudasNuevas++;

                  //hago insert en deudas gestiones informando la asigancion de la deuda
                  //la variable $desc tendrá la descripcion de la dueda asignada
                  // HAGO EL INSERT SI $user_id tiene dato
                  if (!empty($user_id['id']) && $user_id['id'] > 0)
                  {
                    /////me traigo el id de la deuda recien creada
                   $deuda_id =   $connection->execute("SELECT Id FROM deudas WHERE deudor_id = :deudor_id AND
                                               cartera_id = :cartera_id AND
                                               producto = :producto AND
                                               dias_mora = :dias_mora AND
                                               numero_producto = :numero_producto AND
                                               capital_inicial = :capital_inicial AND
                                               total = :total" ,   ['deudor_id' => $id,
                                                        'cartera_id' => $idCartera,
                                                        'producto' => $worksheet->getCell('I'.$row)->getValue(),
                                                        'producto' => $producto,
                                                        'numero_producto' => $numero_producto,
                                                        'dias_mora' =>  $dias_mora,
                                                        'capital_inicial' => $capital_inicial,
                                                        'total' => $total]);

                    $deuda_id = current($deuda_id->fetchAll('assoc'));
                    $usuario_asignado =  !empty($worksheet->getCell('O'.$row)->getValue()) ? $worksheet->getCell('O'.$row)->getValue() : '';
                    $desc = 'Caso asignado a '.$usuario_asignado. ' el día :'. date('d-m-Y');
                        $connection->insert('deudas_gestiones', [
                          'deuda_id' => $deuda_id['Id'],
                          'descripcion' => $desc,
                          'modified' => new \DateTime('now'),
                          'created' => new \DateTime('now')], ['created' => 'datetime' , 'modified' => 'datetime']);
                    }
                    }
                    else
                    {

                      // si el count no devuelve ni 1 ni 0 algo esta mal
                        //$connection->rollback();
                      $this->Flash->error("Tenemos un problema para cargar el archivo");

                    }


                  } // fin FOR
                    //   $connection->commit();
                    if ($cantDeudas > 0)
                    {
                      $cantDeudas = $cantDeudas - 1;
                      $cantCapIni =  number_format($cantCapIni, 2, ',', ' ');
                      $cantTotal =  number_format($cantTotal, 2, ',', ' ');
                    }
                    if (isset($this->request->data['btnOk']))
                    {
                       if ($this->request->data['btnOk'] == 'Confirmar')
                        {
                              if (file_exists($uploadFile))
                              {
                                $nombreNuevo = $uploadFile ." ".date('d/m/Y');
                                // rename($uploadFile, $nombreNuevo);
                              }
                              $connection->commit();
                              $this->Flash->success("Cartera subida");
                        }

                    }

                  $this->Flash->default("Confirma: Total deudas: $cantDeudas , Total Capital Inicial: $cantCapIni , Total Actualizado : $cantTotal  Deudores nuevos : $deudoresNuevos ? ");

              }



          //fin requert-data
          // else { //si no trae data file , entra por aca
          //   // debug($this->request->data['btnOk']);
          //   if ($this->request->data['btnOk'] == 'Confirmar')
          //   {
          //         // debug($connection);
          //         $connection->commit();
          //         $this->Flash->success("Cartera subida");
          //   }
          //   elseif ($this->request->data['btnOk'] == 'Rechazar') {
          //       //$connection->rollback();
          //     $this->Flash->error("Okey, borramos todo!");
          //   }
          //   else {
          //       //$connection->rollback();
          //     $this->Flash->error("Tenemos un problema para subir la cartera. Reintente!");
          //   }
          //
          // }
      }//fin del request->post

        $this->set(compact('cartera','archivo'));

    }

    public function exportarCabecera()
    {
      $objPHPExcel = new \PHPExcel();
      ini_set('memory_limit', '-1');
    	$objPHPExcel->
    		getProperties()
    			->setCreator($this->current_user['nombre']. " ".$this->current_user['apellido'])
    			->setTitle("cabecera");


          $objPHPExcel->setActiveSheetIndex(0)
        				->setCellValue('A1', 'nombre')
        				->setCellValue('B1', 'dni')
        				->setCellValue('C1', 'domicilio')
        				->setCellValue('D1', 'provincia')
        				->setCellValue('E1', 'localidad')
        				->setCellValue('F1', 'laboral')
        				->setCellValue('G1', 'cantidad')
        				->setCellValue('H1', 'categoria')
                ->setCellValue('I1', 'producto')
                ->setCellValue('J1', 'numero_producto')
                ->setCellValue('K1', 'fecha_mora')
                ->setCellValue('L1', 'dias_mora')
                ->setCellValue('M1', 'capital_inicial')
                ->setCellValue('N1', 'total')
                ->setCellValue('O1', 'asignado')
                ->setCellValue('P1', 'telefono')
                ->setCellValue('Q1', 'telefono')
                ->setCellValue('R1', 'telefono')
                ->setCellValue('S1', 'telefono')
                ->setCellValue('T1', 'telefono')
                ->setCellValue('U1', 'telefono')
                ->setCellValue('V1', 'telefono');

                foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col)
                {
                      $objPHPExcel->getActiveSheet()
                              ->getColumnDimension($col)
                              ->setAutoSize(true);
                  }

                  // Seteo el nombre del archivo

                  $_file_name_aux = "cabecera";

                  //header("Content-Type:   application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
                  header('Content-Type: application/vnd.ms-excel');
                  header('Content-Disposition: attachment;filename='.$_file_name_aux.'.xls');
                  header('Cache-Control: max-age=0');


                  $objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
                  $objWriter->save('php://output');
                  return;

    }




}
