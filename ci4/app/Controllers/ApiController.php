<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ApiController extends BaseController
{

    public function addUnit()
    {
        log_message('debug', 'Memulai proses addUnit');

        $client = \Config\Services::curlrequest();

        // Collect and validate data
        $data = [
            'CUSTOMER' => $this->request->getVar('CUSTOMER'),
            'UNIT' => $this->request->getVar('UNIT'),
            'CATEGORY_CUSTOMER' => $this->request->getVar('CATEGORY_CUSTOMER'),
            'KODE_PUSAT_BIAYA' => $this->request->getVar('KODE_PUSAT_BIAYA'),
            'DESKRIPSI_PUSAT_BIAYA' => $this->request->getVar('KODE_PUSAT_BIAYA'),
            'JENIS_PEMBANGKIT' => $this->request->getVar('JENIS_PEMBANGKIT'),
            'STATUS' => 1
        ];

        log_message('debug', 'Data yang akan dikirim: ' . json_encode($data));

        $options = [
            'json' => $data,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'verify' => false,
            'debug' => true,
            'http_errors' => false
        ];

        try {
            log_message('debug', 'Mencoba mengirim request ke API');
            $response = $client->post('https://codev-api.plnipservices.co.id/api/settings/unit', $options);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            log_message('debug', 'Response status: ' . $statusCode);
            log_message('debug', 'Response body: ' . $body);

            $result = json_decode($body, true);

            if ($statusCode == 200) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Unit berhasil ditambahkan',
                    'data' => $data
                ]);
            } else {
                log_message('error', 'API mengembalikan respons error. Status: ' . $statusCode . ', Body: ' . $body);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Gagal menambahkan unit. ' . ($result['message'] ?? 'Unknown error'),
                    'data' => $result['data'] ?? null
                ])->setStatusCode($statusCode);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error saat menambahkan unit: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menambahkan unit: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function edit()
    {
        $this->response->setHeader('Content-Type', 'application/json');

        $id = $this->request->getPost('ID_UNIT');
        $data = [
            'unitName' => $this->request->getPost('Nama-Unit'),
            'idCategoryCustomer' => $this->request->getPost('kategori'),
            'idCustomer' => $this->request->getPost('customer'),
            'costCenter' => $this->request->getPost('pusat-biaya'),
            'idGeneratorType' => $this->request->getPost('jenis-pembangkit'),
            'status' => '1'
        ];

        $url = "https://codev-api.plnipservices.co.id/api/settings/unit/{$id}";

        log_message('debug', 'URL yang diakses: ' . $url);
        log_message('debug', 'Data yang dikirim ke API: ' . json_encode($data));

        $client = \Config\Services::curlrequest();

        try {
            // Coba GET request terlebih dahulu
            $getResponse = $client->request('GET', $url, ['verify' => false]);

            if ($getResponse->getStatusCode() == 200) {
                // Jika GET berhasil, lanjutkan dengan PUT request
                $putResponse = $client->request('PUT', $url, [
                    'headers' => ['Content-Type' => 'application/json'],
                    'json' => $data,
                    'verify' => false  // Hanya untuk development
                ]);

                log_message('debug', 'PUT Response Status: ' . $putResponse->getStatusCode());
                log_message('debug', 'PUT Response Body: ' . $putResponse->getBody());

                $result = json_decode($putResponse->getBody(), true);
                if (isset($result['error'])) {
                    log_message('error', 'API Error: ' . json_encode($result['error']));
                }
                log_message('debug', 'Response API: ' . json_encode($result));

                if ($putResponse->getStatusCode() == 200) {
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Data berhasil diupdate'
                    ])->setStatusCode(ResponseInterface::HTTP_OK);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Gagal mengupdate data'
                    ])->setStatusCode($putResponse->getStatusCode());
                }
            } else {
                throw new \Exception("Unit tidak ditemukan");
            }
        } catch (\Exception $e) {
            log_message('error', 'Error saat mengupdate data: ' . $e->getMessage());
            if (strpos($e->getMessage(), 'Unit tidak ditemukan') !== false) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Unit tidak ditemukan. Pastikan ID unit valid.'
                ])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat menghubungi server. Silakan coba lagi nanti.'
                ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function delete($id)
    {
        $client = \Config\Services::curlrequest([
            'verify' => false  // Hanya untuk debugging, jangan gunakan di produksi
        ]);

        try {
            log_message('info', "Attempting to delete unit with ID: {$id}");

            $url = "https://codev-api.plnipservices.co.id/api/settings/unit/{$id}";
            log_message('info', "API URL: {$url}");


            $response = $client->delete($url, [
                'headers' => [
                    'Accept' => 'application/json',
                ]
            ]);

            log_message('info', "API Response Status: " . $response->getStatusCode());
            log_message('info', "API Response Body: " . $response->getBody());

            $result = json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                log_message('error', 'API returned non-200 status: ' . $response->getStatusCode());
                return $this->response->setStatusCode(500)->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal menghapus data: ' . ($result['message'] ?? 'Unknown error')
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error deleting unit: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
}
