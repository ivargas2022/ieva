<?php

namespace App\Models;

use CodeIgniter\Model;

class HcuModel extends Model
{
    protected $DBGroup = 'hcu';
    protected $table = 'cliente';
    protected $allowedFields = ['id_cliente','hcu', 'cedula_identidad','apellido_paterno','apellido_materno','nombres'];
    protected $db;

    public function __construct()
	{
	
       // $this->db = \Config\Database::connect('rumichaca');
	
	
	}

    public function getCliente($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        $builder = $this->db->table($this->table);
		$builder->like('apellido_paterno', $slug);
		$builder->orderBy('id_cliente', 'DESC');
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResultArray();
		}else{
			return false;
		}

    }
	
	
	
	public function getPlanMaternidadDatos($fecha_inicio,$fecha_fin,$database)
	{
		
		$this->db = \Config\Database::connect($database);
		/*$database='sam_rumichaca';
		$this->db->setDatabase($database);*/
		$result=$this->db->table('cliente c')
            ->select("EXTRACT(MONTH FROM ci.fecha) as mes, CONCAT(c.nombres ,' ',c.apellido_paterno,' ',c.apellido_materno) as nombres, c.cedula_identidad as ci, tc.edad_gest as edad_gestacional, case WHEN con.id_tipo_consulta= -1 THEN '' ELSE '' End as riesgo_obst, case   WHEN  c.celular!= '' THEN c.celular ELSE c.telefono End as telefono, pm.nombre as medico, ci.fecha as fecha")
            ->join('cita ci', 'c.id_cliente = ci.id_cliente')
            ->join('consulta con', 'ci.id_cita = con.id_cita')
			->join('personal_medico pm', 'ci.id_medico=pm.id_medico')
			->join('especialidad esp', 'ci.id_especialidad=esp.id_especialidad')
			->join('tabla_control tc', 'c.id_cliente=tc.id_cliente')
            ->where('tc.edad_gest >=', '1')
			->where('ci.fecha >=',$fecha_inicio)
			->where('ci.fecha <=',$fecha_fin) 
			->where('ci.fecha=tc.fecha_creacion')
			->where('ci.id_especialidad=','11') 
			->where('tc.fecha_cierre is null') 
			->where('ci.status=','A')
            ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResultArray();
		}else{
			return false;
		}
		
	
	}
	
	
	
	
}