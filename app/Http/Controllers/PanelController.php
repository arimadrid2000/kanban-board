<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panel;

class PanelController extends Controller
{
    //Listar tableros
    public function index(){

        $panels = Panel::get();
        
        return $panels;
    
    }
    
}
