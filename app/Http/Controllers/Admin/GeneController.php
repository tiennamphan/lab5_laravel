<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneController extends Controller
{
    public function index(){
        $categories = DB::table('genes')->get();
        return view('admin.genes.index', compact('genes'));
    }
}
