<?php

namespace App\Models;

use CodeIgniter\Model;

class Santri_model extends Model
{

    protected $table = 'santri';

    public function getCategory($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }
    }

    public function insertSantri($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateSantri($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteCategory($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
