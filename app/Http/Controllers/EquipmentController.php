<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Machine;


class EquipmentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipments = Equipment::with('machine')->get();
        $machines   = Machine::all();

        // Bungkus ke dalam array $data
        $data = [
            'equipments' => $equipments,
            'machines'   => $machines
        ];
        
         return view('master.equipment.index', $data);
    }


}
