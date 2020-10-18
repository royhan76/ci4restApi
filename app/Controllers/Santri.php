<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Santri extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Santri_model';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }
    public function create()
    {
        $validation =  \Config\Services::validation();

        $name   = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $tgllahir = $this->request->getPost('tgl-lahir');
        $nohp = $this->request->getPost('no_hp');


        $data = [
            'nama' => $name,
            'alamat' => $alamat,
            'tgl-lahir' => $tgllahir,
            'no_hp' => $nohp

        ];

        if ($validation->run($data, 'santri') == FALSE) {
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->insertSantri($data);
            if ($simpan) {
                $msg = ['message' => 'Created category successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }
}
