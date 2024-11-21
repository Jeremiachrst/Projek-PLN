<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CustomerModel;

class CustomerController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    protected $CustomerModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->CustomerModel = new CustomerModel();
    }
    public function ViewData()
    {
        $dataCustCat = new \App\Models\CustCatModel();
        $CustCat = $dataCustCat->findAll();

        $dataCustomer = new \App\Models\CustomerModel();
        $Customer = $dataCustomer->findAll();

        $data = [
            'Title' => 'Data Customer',
            'dataCustomer' => $Customer,
            'dataCustomerCategory' => $CustCat
        ];
        // dd($CustCat);
        // dd($Customer);
        return view('pageSetting/customer', $data);
    }
    public function dataCustomer()
    {
        $dataCustomer = new \App\Models\CustomerModel();
        $Customer = $dataCustomer->findAll();

        $data = [
            'massage' => 'success',
            'dataCustomer' => $Customer
        ];
        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $this->CustomerModel->insert([
            'INITIAL_CUSTOMER' => esc($this->request->getVar('INITIAL_CUSTOMER')),
            'NAME_CUSTOMER' => esc($this->request->getPost('NAME_CUSTOMER')),
            'ID_CATEGORY_CUSTOMER' => esc($this->request->getVar('ID_CATEGORY_CUSTOMER')),
            'STATUS' => 1
        ]);

        $response = [
            'massage' => 'success adding data'
        ];
        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'INITIAL_CUSTOMER' => 'required',
            'NAME_CUSTOMER' => 'required',
            'ID_CATEGORY_CUSTOMER' => 'required',
        ]);

        if (!$rules) {
            $response = [
                'massage' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->CustomerModel->update($id, [
            'INITIAL_CUSTOMER' => esc($this->request->getVar('INITIAL_CUSTOMER')),
            'NAME_CUSTOMER' => esc($this->request->getPost('NAME_CUSTOMER')),
            'ID_CATEGORY_CUSTOMER' => esc($this->request->getVar('ID_CATEGORY_CUSTOMER')),
            'STATUS' => 1
        ]);

        $response = [
            'massage' => 'success updating data'
        ];
        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->CustomerModel->delete($id);
        $response = [
            'massage' => 'success deleting data'
        ];
        return $this->respondDeleted($response);
    }
    public function GenerateToken()
    {
        $token = generate_api_token();
        echo "Token valid: " . $token;
    }
}
