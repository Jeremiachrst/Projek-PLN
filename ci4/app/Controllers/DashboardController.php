<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class DashboardController extends BaseController
{
    public function index()
    {
        // Mengambil data dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Proses login menggunakan fungsi process_login_apicdb
        $response = $this->process_login_apicdb($username, $password);


        $session = session();
        if ($response && $response->message == 'success') {
            // Jika login sukses, ambil data user dari respons API
            $key = $response->datas;
            $userData = [
                'nama' => $key->displayName,
                'jabatan' => null,
                'user_id' => $username,
                'username' => $response->datas->sn,
                'mail' => isset($key->mail) ? $key->mail : $username . "@cogindo.corp",
                'ou' => null,
                'department' => null,
                'company' => null,
                'nip' => null,
                'photo' => null,
                'photo2' => null,
                'photo3' => null,
                'isLoggedIn' => true
            ];


            // Set data sesi pengguna
            session()->set($userData);

            // Ambil data dari API kedua
            $existingDataP = $this->getExistingDataP();
            $proyeksiBaruDataP = $this->getProyeksiBaruDataP();

            $ExistingDataPD = $this->getExistingDataPD();
            $ProyeksiBaruDataPD = $this->getProyeksiBaruDataPD();
            $CadanganDataPD = $this->getCadanganDataPD();
            $existingApproveBeban = $this->getExistingApproveBeban();
            $proyeksiBaruApproveBeban = $this->getProyeksiBaruApproveBeban();
            $existingTidakApproveBeban = $this->getExistingTidakApproveBeban();
            $proyeksiBaruTidakApproveBeban = $this->getProyeksiBaruTidakApproveBeban();
            $cadanganTidakApproveBeban = $this->getCadanganTidakApproveBeban();


            $eksistingApproveRP = $this->getEksistingApproveRP();
            $proyeksiBaruApproveRP = $this->getProyeksiBaruApproveRP();
            $eksistingTidakApproveRP = $this->getEksistingTidakApproveRP();
            $proyeksiBaruTidakApproveRP = $this->getProyeksiBaruTidakApproveRP();
            $cadanganTidakApproveRP = $this->getCadanganTidakApproveRP();
            $eksistingApproveBebanRP = $this->getEksistingApproveBebanRP();
            $proyeksiBaruApproveBebanRP = $this->getProyeksiBaruApproveBebanRP();
            $eksistingTidakApproveBebanRP = $this->getEksistingTidakApproveBebanRP();
            $proyeksiBaruTidakApproveBebanRP = $this->getProyeksiBaruTidakApproveBebanRP();
            $CadanganTidakApproveBebanRP = $this->getJumlahCadanganTidakApproveBebanRP();
            $data = [
                'proyeksiBaruDataP' => $proyeksiBaruDataP,
                'existingDataP' => $existingDataP,
                'ExistingDataPD' => $ExistingDataPD,
                'ProyeksiBaruDataPD' => $ProyeksiBaruDataPD,
                'CadanganDataPD' => $CadanganDataPD,
                'existingApproveBeban' => $existingApproveBeban,
                'proyeksiBaruApproveBeban' => $proyeksiBaruApproveBeban,
                'existingTidakApproveBeban' => $existingTidakApproveBeban,
                'proyeksiBaruTidakApproveBeban' => $proyeksiBaruTidakApproveBeban,
                'cadanganTidakApproveBeban' => $cadanganTidakApproveBeban,

                'eksistingApproveRP' => $eksistingApproveRP,
                'proyeksiBaruApproveRP' => $proyeksiBaruApproveRP,
                'eksistingTidakApproveRP' => $eksistingTidakApproveRP,
                'proyeksiBaruTidakApproveRP' => $proyeksiBaruTidakApproveRP,
                'cadanganTidakApproveRP' => $cadanganTidakApproveRP,
                'eksistingApproveBebanRP' => $eksistingApproveBebanRP,
                'proyeksiBaruApproveBebanRP' => $proyeksiBaruApproveBebanRP,
                'eksistingTidakApproveBebanRP' => $eksistingTidakApproveBebanRP,
                'proyeksiBaruTidakApproveBebanRP' => $proyeksiBaruTidakApproveBebanRP,
                'CadanganTidakApproveBebanRP' => $CadanganTidakApproveBebanRP
            ];
            // Misalnya:
            return view('dashboard', $data);
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            $session->setFlashdata('error', 'Username atau password salah');
            return view('login');
        }
    }
    public function dashboard2()
    {

        // Ambil data dari API kedua
        $existingDataP = $this->getExistingDataP();
        $proyeksiBaruDataP = $this->getProyeksiBaruDataP();

        $ExistingDataPD = $this->getExistingDataPD();
        $ProyeksiBaruDataPD = $this->getProyeksiBaruDataPD();
        $CadanganDataPD = $this->getCadanganDataPD();
        $existingApproveBeban = $this->getExistingApproveBeban();
        $proyeksiBaruApproveBeban = $this->getProyeksiBaruApproveBeban();
        $existingTidakApproveBeban = $this->getExistingTidakApproveBeban();
        $proyeksiBaruTidakApproveBeban = $this->getProyeksiBaruTidakApproveBeban();
        $cadanganTidakApproveBeban = $this->getCadanganTidakApproveBeban();


        $eksistingApproveRP = $this->getEksistingApproveRP();
        $proyeksiBaruApproveRP = $this->getProyeksiBaruApproveRP();
        $eksistingTidakApproveRP = $this->getEksistingTidakApproveRP();
        $proyeksiBaruTidakApproveRP = $this->getProyeksiBaruTidakApproveRP();
        $cadanganTidakApproveRP = $this->getCadanganTidakApproveRP();
        $eksistingApproveBebanRP = $this->getEksistingApproveBebanRP();
        $proyeksiBaruApproveBebanRP = $this->getProyeksiBaruApproveBebanRP();
        $eksistingTidakApproveBebanRP = $this->getEksistingTidakApproveBebanRP();
        $proyeksiBaruTidakApproveBebanRP = $this->getProyeksiBaruTidakApproveBebanRP();
        $CadanganTidakApproveBebanRP = $this->getJumlahCadanganTidakApproveBebanRP();
        $data = [
            'proyeksiBaruDataP' => $proyeksiBaruDataP,
            'existingDataP' => $existingDataP,
            'ExistingDataPD' => $ExistingDataPD,
            'ProyeksiBaruDataPD' => $ProyeksiBaruDataPD,
            'CadanganDataPD' => $CadanganDataPD,
            'existingApproveBeban' => $existingApproveBeban,
            'proyeksiBaruApproveBeban' => $proyeksiBaruApproveBeban,
            'existingTidakApproveBeban' => $existingTidakApproveBeban,
            'proyeksiBaruTidakApproveBeban' => $proyeksiBaruTidakApproveBeban,
            'cadanganTidakApproveBeban' => $cadanganTidakApproveBeban,

            'eksistingApproveRP' => $eksistingApproveRP,
            'proyeksiBaruApproveRP' => $proyeksiBaruApproveRP,
            'eksistingTidakApproveRP' => $eksistingTidakApproveRP,
            'proyeksiBaruTidakApproveRP' => $proyeksiBaruTidakApproveRP,
            'cadanganTidakApproveRP' => $cadanganTidakApproveRP,
            'eksistingApproveBebanRP' => $eksistingApproveBebanRP,
            'proyeksiBaruApproveBebanRP' => $proyeksiBaruApproveBebanRP,
            'eksistingTidakApproveBebanRP' => $eksistingTidakApproveBebanRP,
            'proyeksiBaruTidakApproveBebanRP' => $proyeksiBaruTidakApproveBebanRP,
            'CadanganTidakApproveBebanRP' => $CadanganTidakApproveBebanRP
        ];
        return view('dashboard2', $data);
    }
    public function dataunit()
    {
        $client = \Config\Services::curlrequest();

        try {
            // Mengambil data unit
            $responseUnit = $client->request('GET', 'https://codev-api.plnipservices.co.id/api/settings/units', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'timeout' => 30,
                'verify'  => false,
            ]);

            $bodyUnit = $responseUnit->getBody();
            $resultUnit = json_decode($bodyUnit, true);

            // Mengambil data kategori pelanggan
            $responseCategory = $client->request('GET', 'https://codev-api.plnipservices.co.id/api/settings/category-customers', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'timeout' => 30,
                'verify'  => false,
            ]);

            $bodyCategory = $responseCategory->getBody();
            $resultCategory = json_decode($bodyCategory, true);

            // Mengambil data pelanggan
            $responseCustomer = $client->request('GET', 'https://codev-api.plnipservices.co.id/api/settings/customers', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'timeout' => 30,
                'verify'  => false,
            ]);

            $bodyCustomer = $responseCustomer->getBody();
            $resultCustomer = json_decode($bodyCustomer, true);

            // Mengambil data costCenter
            $responseCostCenter = $client->request('GET', 'https://codev-api.plnipservices.co.id/api/settings/cost-center', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'timeout' => 30,
                'verify'  => false,
            ]);

            $bodyCostCenter = $responseCostCenter->getBody();
            $resultCostCenter = json_decode($bodyCostCenter, true);

            // Mengambil data JenisPembangkit
            $responseGenType = $client->request('GET', 'https://codev-api.plnipservices.co.id/api/settings/generator-type', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'timeout' => 30,
                'verify'  => false,
            ]);

            $bodyGenType = $responseGenType->getBody();
            $resultGenType = json_decode($bodyGenType, true);

            $data = [
                'dataUnit' => $resultUnit['data'] ?? [],
                'dataCategory' => $resultCategory['data'] ?? [],
                'dataCustomer' => $resultCustomer['data'] ?? [],
                'dataCostCenter' => $resultCostCenter['data'] ?? [],
                'dataGenType' => $resultGenType['data'] ?? [],
                'title' => 'Daftar Unit'
            ];

            // Simpan ke session
            session()->set('dataUnit', $data['dataUnit']);
            session()->set('dataCategory', $data['dataCategory']);
            session()->set('dataCustomer', $data['dataCustomer']);
            session()->set('dataCostCenter', $data['dataCostCenter']);
            session()->set('dataGenType', $data['dataGenType']);

            return view('pageSetting/dataUnit', $data);
        } catch (\Exception $e) {
            log_message('error', 'Error saat mengambil data: ' . $e->getMessage());

            $data = [
                'dataUnit' => [],
                'dataCategory' => [],
                'title' => 'Daftar Unit',
                'error' => 'Terjadi kesalahan saat mengambil data. Silakan coba lagi nanti.'
            ];

            return view('pageSetting/dataUnit', $data);
        }
    }
    public function datapegawai()
    {
        return view('pageSetting/dataPegawai');
    }
    public function datarutinitas()
    {
        return view('pageSetting/RKAPdataRutinitas');
    }
    public function datacustomer()
    {
        return view('pageSetting/customer');
    }
    public function categorycust()
    {
        return view('pageSetting/categorycust');
    }
    public function naturalAcc()
    {
        return view('pageSetting/naturalAcc');
    }
    public function confidence()
    {
        return view('pageSetting/confidence');
    }
    public function Proyeksi()
    {
        return view('pageSetting/proyeksi');
    }
    public function estimasiPenyerapan()
    {
        return view('pageSetting/estimasiPenyerapan');
    }
    public function segmenBisnis()
    {
        return view('pageSetting/segmenBisnis');
    }
    public function subSegmenBisnis()
    {
        return view('pageSetting/subSegmenBisnis');
    }
    public function pajakRKAP()
    {
        return view('pageSetting/pajakRKAP');
    }
    public function dataKategori()
    {
        return view('pageSetting/dataKategori');
    }
    public function jenisAnggaran()
    {
        return view('pageSetting/jenisAnggaran');
    }
    public function dataDept()
    {
        return view('pageSetting/dataDept');
    }
    public function pajakITrack()
    {
        return view('pageSetting/pajakITrack');
    }
    public function pusatBiaya()
    {
        return view('pageSetting/pusatBiaya');
    }
    public function kursITrack()
    {
        return view('pageSetting/kursITrack');
    }
    public function mitraVendor()
    {
        return view('pageSetting/mitraVendor');
    }
    public function masterRole()
    {
        return view('pageSetting/masterRole');
    }

    private function process_login_apicdb($username, $password)
    {
        // Data untuk dikirim ke API
        $post = [
            "username" => $username,
            "password" => $password,
        ];

        // Konfigurasi CURL untuk mengakses API
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://api.cogindo.co.id:3000/ldapAuth',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($post),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded'
            ],
        ]);

        // Eksekusi CURL dan ambil respons
        $response = curl_exec($curl);
        curl_close($curl);

        // Decode respons JSON
        $dt = json_decode($response);

        return $dt;
    }
    private function fetchDataFromApi($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }
    private function getProyeksiBaruDataP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_proyeksi_baru_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }
    private function getExistingDataP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_eksisting_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }
    private function getExistingDataPD()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_eksisting_tidak_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }
    private function getProyeksiBaruDataPD()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_proyeks_baru_tidak_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }
    private function getCadanganDataPD()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_cadangan_tidak_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }
    private function getExistingApproveBeban()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_eksisting_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getProyeksiBaruApproveBeban()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_proyeksi_baru_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getExistingTidakApproveBeban()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_eksisting_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getProyeksiBaruTidakApproveBeban()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_proyeksi_baru_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getCadanganTidakApproveBeban()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/total_data_cadangan_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    // Rupiah
    private function getEksistingApproveRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/eksisting_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getProyeksiBaruApproveRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/proyeksi_baru_apaprove?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getEksistingTidakApproveRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/eksisting_tidak_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getProyeksiBaruTidakApproveRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/proyeksi_baru_tidak_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getCadanganTidakApproveRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/cadangan_tidak_approve?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getEksistingApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/eksisting_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getProyeksiBaruApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/proyeksi_baru_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getEksistingTidakApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/eksisting_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getProyeksiBaruTidakApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/proyeksi_baru_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getJumlahEksistingApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/jumlah_data_eksisting_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getJumlahProyeksiBaruBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/jumlah_data_proyeksi_baru_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getJumlahEksistingTidakApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/jumlah_data_eksisting_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getJumlahProyeksiBaruTidakApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/jumlah_data_proyeksi_baru_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }

    private function getJumlahCadanganTidakApproveBebanRP()
    {
        $url = 'https://codev.plnipservices.co.id/data_rkap_api/jumlah_data_cadangan_tidak_approve_beban?id_rkap=1';
        return $this->fetchDataFromApi($url);
    }
}
