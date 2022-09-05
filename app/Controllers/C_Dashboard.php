<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class C_Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Halaman Dashboard | SILOG AJS"
        ];
        
        return view("Dashboard/index",$data);
    }
}
