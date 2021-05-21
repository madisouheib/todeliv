<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WharehouseController extends Controller
{
    //

    public function index_admin(){


        return view('dashboard.pages.wharehouse.table_wms');
    }

    public function index_admin_products(){


        return view('dashboard.pages.wharehouse.table_list_products');
    }
}
