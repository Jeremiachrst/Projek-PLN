<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataUnitModel;

class SettingController extends BaseController
{
    protected $dataUnitModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->dataUnitModel = new DataUnitModel();
    }
    public function dataunit()
    {
        $dataUnitModel = new \App\Models\dataUnitModel();
        $units = $dataUnitModel->findAll();

        $data = [
            'Title' => 'Data Unit',
            'dataUnit' => $units
        ];

        session()->set('dataUnit', $data['dataUnit']);
        return view('pageSetting/dataUnit', $data);
    }

    public function addData()
    {
        $this->dataUnitModel->save([
            'CUSTOMER' => $this->request->getPost('CUSTOMER'),
            'UNIT' => $this->request->getPost('UNIT'),
            'CATEGORY_CUSTOMER' => $this->request->getPost('CATEGORY_CUSTOMER'),
            'KODE_PUSAT_BIAYA' => $this->request->getPost('KODE_PUSAT_BIAYA'),
            'DESKRIPSI_PUSAT_BIAYA' => $this->request->getPost('KODE_PUSAT_BIAYA'),
            'JENIS_PEMBANGKIT' => $this->request->getPost('JENIS_PEMBANGKIT'),
            'STATUS' => 1
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('public/dataunit'));
    }
    public function DeleteData($id)
    {
        try {
            if ($this->dataUnitModel->delete($id)) {
                session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
                return redirect()->to(base_url('public/dataunit'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('public/dataunit'))->with('error', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('public/dataunit'))->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function update($id = null)
    {
        if ($id === null) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID tidak ditemukan']);
        }
        $this->dataUnitModel->save([
            'ID_UNIT' => $id,
            'CUSTOMER' => $this->request->getPost('CUSTOMER'),
            'UNIT' => $this->request->getPost('UNIT'),
            'CATEGORY_CUSTOMER' => $this->request->getPost('CATEGORY_CUSTOMER'),
            'KODE_PUSAT_BIAYA' => $this->request->getPost('KODE_PUSAT_BIAYA'),
            'DESKRIPSI_PUSAT_BIAYA' => $this->request->getPost('KODE_PUSAT_BIAYA'),
            'JENIS_PEMBANGKIT' => $this->request->getPost('JENIS_PEMBANGKIT'),
            'STATUS' => 1
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('public/dataunit'));
    }
}
