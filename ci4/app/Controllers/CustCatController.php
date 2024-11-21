<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CustCatModel;

class CustCatController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    protected $CustCatModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->CustCatModel = new CustCatModel();
    }
    public function ViewData()
    {
        $dataCustCat = new \App\Models\CustCatModel();
        $CustCat = $dataCustCat->findAll();

        $data = [
            'Title' => 'Data Customer Category',
            'dataCustomerCategory' => $CustCat
        ];
        return view('pageSetting/categorycust', $data);
    }
    public function dataCustCat()
    {
        $dataCustCat = new \App\Models\CustCatModel();
        $CustCat = $dataCustCat->findAll();

        $data = [
            'massage' => 'success',
            'dataCustomerCategory' => $CustCat
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
        $this->CustCatModel->insert([
            'INITIAL_CATEGORY_CUSTOMER' => esc($this->request->getVar('INITIAL_CATEGORY_CUSTOMER')),
            'KETERANGAN_CATEGORY_CUSTOMER' => esc($this->request->getVar('KETERANGAN_CATEGORY_CUSTOMER')),
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
            'INITIAL_CATEGORY_CUSTOMER' => 'required',
            'KETERANGAN_CATEGORY_CUSTOMER' => 'required'
        ]);

        if (!$rules) {
            $response = [
                'massage' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->CustCatModel->update($id, [
            'INITIAL_CATEGORY_CUSTOMER' => esc($this->request->getVar('INITIAL_CATEGORY_CUSTOMER')),
            'KETERANGAN_CATEGORY_CUSTOMER' => esc($this->request->getVar('KETERANGAN_CATEGORY_CUSTOMER')),
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
        $this->CustCatModel->delete($id);
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
