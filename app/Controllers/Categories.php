<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Categories extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Category_model';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }
}
