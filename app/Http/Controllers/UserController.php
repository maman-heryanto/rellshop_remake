<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
   
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user   = User::all();

        $data = [
            'user'   => $user
        ];

        return view('user_management.user.index', $data);
    }

     public function getAll(Request $request)
    {
        $data = User::query(); // gunakan query builder, bukan ->all()

        // // ✅ filter date range
        // if ($request->date) {
        //     $dates = explode(" - ", $request->date);

        //     if (count($dates) === 2) {
        //         $start = \Carbon\Carbon::createFromFormat('d/m/Y', trim($dates[0]))->startOfDay();
        //         $end   = \Carbon\Carbon::createFromFormat('d/m/Y', trim($dates[1]))->endOfDay();

        //         $data->whereBetween('equipments.created_at', [$start, $end]);
        //     }
        // }

        // // ✅ filter machine (kalau nanti kamu pakai dropdown machine_id)
        // if ($request->machine_id) {
        //     $data->where('equipments.machine_id', $request->machine_id);
        // }

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return $row->created_at 
                    ? $row->created_at->format('d/m/Y H:i') : '-';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button 
                        type="button" 
                        class="btn btn-sm btn-primary editUserBtn"
                        data-id="' . $row->id . '" 
                        data-machine_id="' . $row->machine_id . '"
                        data-name="' . $row->name . '" 
                        data-specification="' . $row->specification . '"
                        data-bs-toggle="modal" 
                        data-bs-target="#showModalEdit">
                        Edit
                    </button>
                    <form action="#" method="POST" class="deleteForm" style="display:inline-block">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
