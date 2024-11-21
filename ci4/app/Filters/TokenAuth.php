<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class TokenAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $response = Services::response();

        $token = $request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $response->setJSON([
                'status' => 401,
                'error' => 'Unauthorized',
                'messages' => ['Masukan Bearer Token']
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        $token = explode(' ', $token);
        if (count($token) != 2 || $token[0] !== 'Bearer') {
            return $response->setJSON([
                'status' => 401,
                'error' => 'Unauthorized',
                'messages' => ['Invalid token format']
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        $providedToken = $token[1];
        $validToken = $this->generateToken();

        if ($providedToken !== $validToken) {
            return $response->setJSON([
                'status' => 401,
                'error' => 'Unauthorized',
                'messages' => ['Invalid token']
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
    private function generateToken()
    {
        $key = 'JeR3M1A123';
        $timestamp = time();
        $minute = floor($timestamp / 60); // Mengambil waktu saat ini dalam satuan menit
        return hash('sha256', $key . $minute);
    }
}
