<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class Product extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product_model();
    }

    public function index()
    {
        $data['products'] = $this->model->getProduct(); 
        return view('Product_view', $data); // Load the single view for listing and adding
    }

    public function save()
    {
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'product_prize' => $this->request->getPost('product_prize'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->model->saveProduct($data);
        session()->setFlashdata('success', 'Product added successfully');
        return redirect()->to(route_to('product.index'));
    }

    public function edit($id)
    {
        $data['product'] = $this->model->getProduct($id);
        $data['products'] = $this->model->getProduct(); // Fetch all products for the view
        return view('Product_view', $data); // Use the same view for editing
    }

    public function update()
    {
        $id = $this->request->getPost('product_id'); // Get the ID from the form
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'product_prize' => $this->request->getPost('product_prize'),
            'updated_at' => date('Y-m-d H:i:s'), // Update timestamp if necessary
        ];
        $this->model->updateProduct($data, $id);
        session()->setFlashdata('success', 'Product updated successfully');
        return redirect()->to(route_to('product.index'));
    }

    public function delete($id)
    {
        $this->model->deleteProduct($id);
        session()->setFlashdata('success', 'Product deleted successfully');
        return redirect()->to(route_to('product.index'));
    }
}
