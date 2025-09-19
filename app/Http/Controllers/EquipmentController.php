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

   public function getAll(Request $request)
    {
        $data = Equipment::with('machine')->select('equipments.*');

        // ✅ filter date range
        if ($request->date) {
            $dates = explode(" - ", $request->date);

            if (count($dates) === 2) {
                $start = \Carbon\Carbon::createFromFormat('d/m/Y', trim($dates[0]))->startOfDay();
                $end   = \Carbon\Carbon::createFromFormat('d/m/Y', trim($dates[1]))->endOfDay();

                $data->whereBetween('equipments.created_at', [$start, $end]);
            }
        }

        // ✅ filter machine (kalau nanti kamu pakai dropdown machine_id)
        if ($request->machine_id) {
            $data->where('equipments.machine_id', $request->machine_id);
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('machine', function ($row) {
                return $row->machine ? $row->machine->name : '-';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button 
                        type="button" 
                        class="btn btn-sm btn-primary editEquipmentBtn"
                        data-id="' . $row->id . '" 
                        data-machine_id="' . $row->machine_id . '"
                        data-name="' . $row->name . '" 
                        data-specification="' . $row->specification . '"
                        data-bs-toggle="modal" 
                        data-bs-target="#showModalEdit">
                        Edit
                    </button>
                    <form action="' . route('master.equipment.destroy', $row->id) . '" method="POST" class="deleteForm" style="display:inline-block">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine_id'    => 'required|exists:machines,id',
            'name'          => 'required|string|max:255',
            'specification' => 'nullable|string',
        ]);

        Equipment::create([
            'machine_id'    => $request->machine_id,
            'name'          => $request->name,
            'specification' => $request->specification,
        ]);

        return redirect()->route('master.equipment')
            ->with('success', 'Equipment has been added successfully.');
    }

    public function edit(string $id) {}

    public function update(Request $request, $id)
    {
        $request->validate([
            'machine_id'    => 'required|exists:machines,id',
            'name'          => 'required|string|max:255',
            'specification' => 'nullable|string',
        ]);

        $equipment = Equipment::findOrFail($id);
        $equipment->update($request->only('machine_id', 'name', 'specification'));

        return redirect()->route('master.equipment')
            ->with('success', 'Equipment updated successfully.');
    }
    public function destroy(string $id)
    {
        try {
            $equipment = Equipment::findOrFail($id);
            $equipment->delete();

            return redirect()->route('master.equipment')
                ->with('success', 'Equipment deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('master.equipment')
                ->with('error', 'Failed to delete equipment. Please try again.');
        }
    }
}
