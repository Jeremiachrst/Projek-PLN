<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DataUnitModel;

class DataUnitController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    protected $dataUnitModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->dataUnitModel = new DataUnitModel();
    }
    public function dataunit()
    {
        $dataUnit = new \App\Models\dataUnitModel();
        $Unit = $dataUnit->findAll();

        $data = [
            'massage' => 'success',
            'dataUnit' => $Unit
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
        $this->dataUnitModel->insert([
            'CUSTOMER' => esc($this->request->getVar('CUSTOMER')),
            'UNIT' => esc($this->request->getVar('UNIT')),
            'CATEGORY_CUSTOMER' => esc($this->request->getVar('CATEGORY_CUSTOMER')),
            'KODE_PUSAT_BIAYA' => esc($this->request->getVar('KODE_PUSAT_BIAYA')),
            'DESKRIPSI_PUSAT_BIAYA' => esc($this->request->getVar('KODE_PUSAT_BIAYA')),
            'JENIS_PEMBANGKIT' => esc($this->request->getVar('JENIS_PEMBANGKIT')),
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
            'CUSTOMER'              => 'required',
            'UNIT'                  => 'required',
            'KODE_PUSAT_BIAYA'      => 'required',
            'DESKRIPSI_PUSAT_BIAYA' => 'required',
            'JENIS_PEMBANGKIT'      => 'required',
        ]);

        if (!$rules) {
            $response = [
                'massage' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->dataUnitModel->update($id, [
            'CUSTOMER' => $this->request->getVar('CUSTOMER'),
            'UNIT' => $this->request->getVar('UNIT'),
            'CATEGORY_CUSTOMER' => $this->request->getVar('CATEGORY_CUSTOMER'),
            'KODE_PUSAT_BIAYA' => $this->request->getVar('KODE_PUSAT_BIAYA'),
            'DESKRIPSI_PUSAT_BIAYA' => $this->request->getVar('KODE_PUSAT_BIAYA'),
            'JENIS_PEMBANGKIT' => $this->request->getVar('JENIS_PEMBANGKIT'),
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
        $this->dataUnitModel->delete($id);
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
