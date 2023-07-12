<?php

namespace App\Models;

use CodeIgniter\Model;

class AscModel extends Model
{
    protected $DBGroup = 'ascplus';
    protected $table = 'USUARIOS';
    protected $allowedFields = ['USUARIO','USUARIO_APELLIDOS', 'USUARIO_NOMBRES'];

    public function getUsuarios($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
	
	
	public function getCelularAscFcdistrib_cli($cedula)
	{
		
		$result=$this->db->table('fcdistrib_cli p')
            ->select("p.celular")
			->where('p.cedula',$cedula) 
            ->get();
		
		if ($result->getNumRows()> 0) {
			//return $result->getRowArray();
			return $result->getResultArray();
		}else{
			return false;
		}	
		
	
	}
	
	
	
	
	
}