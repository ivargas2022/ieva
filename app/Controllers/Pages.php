<?php

namespace App\Controllers;
use App\Models\AscModel;
use App\Models\HcuModel;
use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class Pages extends BaseController
{
    
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
		
		helper('form');
        
        $modelasc = model(AscModel::class);
        $modelhcu = model(HcuModel::class);
        
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        } 

		/*$cedula='0957222417';
		$cedula=$modelasc->getCelularAscFcdistrib_cli($cedula);
		if($cedula!=false){
		  print_r('esto es una prueba nada mas: '.$cedula['celular']);	
		}else{
			print_r('Esto ta vacio vacio vacio');
		}*/
		
		
		
       //print_r($data);
        $data_header=[
            'title'=> ucfirst($page), // Capitalize the first letter
            'link'=>$this->htmlLoad()['css'],
        ]; 
        /*$data_body=[
            'usuarios'=>$model->getUsuarios(),
        ];*/
		
		
			// Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
			$fechai='2023-05-01'; //'2023-05-01'
			$fechaf='2023-05-02'; //'2023-05-05'
			$centro='001';	
			print_r("esto no esta bien esto no esta bien esto no esta bien esto no esta bien");
			
        }else {

			$post = $this->request->getPost(['finicio', 'ffin','centro']);
			    // Checks whether the submitted data passed the validation rules.
		    if (! $this->validateData($post, [
				'finicio' => 'required|valid_date[d/m/Y]',
				'ffin'  => 'required|valid_date[d/m/Y]',
				'centro'  => 'required|max_length[3]|min_length[3]',
			])) {
				// The validation fails, so returns the form.
				
				$fechai='2023-05-01'; //'2023-05-01'
				$fechaf='2023-05-02'; //'2023-05-05'
				$centro='001';
				
				
				print_r("esto no esta bien esto no esta bien esto no esta bien esto no esta bien");
			
			}else{
				
				list($dia, $mes, $anio) = explode('/', $post['finicio']);
				$fechai=$anio."-".$mes."-".$dia;
				list($dia, $mes, $anio) = explode('/', $post['ffin']);
				$fechaf=$anio."-".$mes."-".$dia;
				$centro=$post['centro'];
				print_r("esto si esta bien esto si esta bien".$centro);
				
			}

			
		 }
		
		
		
        $fecha_inicio=$fechai; //'2023-05-01'
		$fecha_fin=$fechaf; //'2023-05-05'
		$centro=$centro;
		
		
		switch($centro){
			   case '001': 
				           $database='rumichaca'; 
				           $nombre_centro='RUMICHACA';
						   break;
			   case '020': $database='sauces'; 
				           $nombre_centro='SAUCES';
						   break;
			   case '018': $database='mapasingue'; 
				           $nombre_centro='MAPASINGUE';
						   break;
			   case '017': $database='dejulio'; 
				           $nombre_centro='25 DE JULIO';
						   break;
			   case '028': $database='express'; 
				           $nombre_centro='EXPRESS';
						   break;
			   case '003': $database='cuenca'; 
				           $nombre_centro='CUENCA';
						   break;
			   case '002': $database='bosmediano'; 
				           $nombre_centro='QUITO';
						   break;
			   default:
						 break;  

							   
		}
		print_r("esto es la base de datos: ".$database);
		
       //$cliente=$modelhcu->getCliente('VARGAS')!=false? $modelhcu->getCliente('VARGAS'):[];
		$cliente=$modelhcu->getPlanMaternidadDatos($fecha_inicio,$fecha_fin,$database)!=false? $modelhcu->getPlanMaternidadDatos($fecha_inicio,$fecha_fin,$database):[];
		//$cliente=$modelhcu->getPlanMaternidadDatos();
		
		$datostr='<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MES</th>
                    <th>NOMBRES</th>
                    <th>CI</th>
                    <th>EDAD GESTACIONAL</th>
                    <th>RIESGO OBST</th>
                    <th>TELEFONO (2)</th>
					<th>MEDICO</th>
					<th>CENTRO MEDICO </th>
					<th>FECHA DE ATENCION</th>
                  </tr>
                  </thead>
                  <tbody>';
		
		foreach($cliente as $cliente_item){
			$telefono='';
		   $datostr.='<tr>';	 
					  
				if($cliente_item['telefono']==''){
						 
					$paciente=$modelasc->getCelularAscFcdistrib_cli($cliente_item['ci']);	 
					if($paciente!=false){
						foreach($paciente as $paciente_item){
							if($paciente_item['celular']!=''){
							   $telefono= $paciente_item['celular'];
								break;
							}
						   
						}
						
					}
						 
						 
				 }else{
					 $telefono=$cliente_item['telefono'];
				 }
	
	                   switch($cliente_item['mes']){
						   case '1': $mes='ENERO';
							         break;
						   case '2': $mes='FEBRERO';
							         break;
						   case '3': $mes='MARZO';
							         break;
					       case '4': $mes='ABRIL';
							         break;
						   case '5': $mes='MAYO';
							         break;
					       case '6': $mes='JUNIO';
							         break;
					       case '7': $mes='JULIO';
							         break;
						   case '8': $mes='AGOSTO';
							         break;  
						   case '9': $mes='SEPTIEMBRE';
							         break;
						   case '10': $mes='OCTUBRE';
							         break;
					       case '11': $mes='NOVIEMBRE';
							         break;
					       case '12': $mes='DICIEMBRE';
							         break;
						   default:
							         break;  
							
							   
					   }
	
					 $datostr.='<td>'.$mes.'</td>';
					 $datostr.='<td>'.$cliente_item['nombres'].'</td>';
					 $datostr.='<td>'.$cliente_item['ci'].'</td>';
                     $datostr.='<td>'.$cliente_item['edad_gestacional'].'</td>';
                     $datostr.='<td>'.$cliente_item['riesgo_obst'].'</td>';
                     $datostr.='<td>'.$telefono.'</td>';
                     $datostr.='<td>'.$cliente_item['medico'].'</td>';
                     $datostr.='<td>'.$nombre_centro.'</td>';
                     $datostr.='<td>'.$cliente_item['fecha'].'</td>';
                     $datostr.='</tr>';
					
		}
		
		 $datostr.='</tbody>
                  <tfoot>
                  <tr>
                    <th>MES</th>
                    <th>NOMBRES</th>
                    <th>CI</th>
                    <th>EDAD GESTACIONAL</th>
                    <th>RIESGO OBST</th>
                    <th>TELEFONO (2)</th>
					<th>MEDICO</th>
					<th>CENTRO MEDICO </th>
					<th>FECHA DE ATENCION</th>
                  </tr>
                  </tfoot>
                </table>';
		
		//print_r($datostr);
		
		
		list($dia, $mes, $anio) = explode('-', $fechai);
		$fechai=$dia."-".$mes."-".$anio;
		list($dia, $mes, $anio) = explode('-', $fechaf);
		$fechaf=$dia."-".$mes."-".$anio;
		
		
        $data_body=[
            'usuarios'=>$modelasc->getUsuarios(),
            'datostr'=>$datostr,
			'finicio'=>$fechai,
			'ffin'=>$fechaf,
			'centro'=>$centro
			
        ];
        $data_footer=[
            'script'=>$this->htmlLoad()['js']
        ];
		
	

    
		
		
        //print_r($data_body['cliente']);
        return view('templates/header', $data_header)
            . view('pages/' . $page, $data_body)
            . view('templates/footer',$data_footer);
    }
	
	
}