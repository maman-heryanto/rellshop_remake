<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Machine;
use Yajra\DataTables\Facades\DataTables;


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

        $data = [
            'equipments' => $equipments,
            'machines'   => $machines
        ];

        return view('master.equipment.index', $data);
    }

    public function getAll()
    {
        $data = Equipment::with('machine')->select('equipments.*');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('machine', function ($row) {
                return $row->machine ? $row->machine->name : '-';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <form action="#" method="POST" style="display:inline-block">
                        '.csrf_field().method_field("DELETE").'
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store()
    {
        $equipments = Equipment::with('machine')->get();
        $machines   = Machine::all();

        $data = [
            'equipments' => $equipments,
            'machines'   => $machines
        ];

        return view('master.equipment.index', $data);
    }

}
