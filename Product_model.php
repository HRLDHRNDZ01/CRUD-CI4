<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'product_id'; // Adjust this to match your actual primary key name
    protected $allowedFields = ['product_name', 'product_prize', 'created_at'];

    public function getProduct($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function saveProduct($data)
    {
        return $this->insert($data);
    }

    public function updateProduct($data, $id)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
}
