<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\Models\Session;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class SessionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user_management.session.index');
    }

    public function getAll()
    {
        $data = Session::with('user');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                return $row->user ? $row->user->name : '-';
            })
            ->addColumn('status', function ($row) {
                if ($row->user) {
                    return '<span class="badge bg-success">Active</span>'; // active
                }
                return '<span class="badge bg-danger">Offline</span>'; // offline
            })
            ->addColumn('last_activity', function ($row) {
                return $row->last_activity 
                    ? Carbon::createFromTimestamp($row->last_activity)
                        ->setTimezone('Asia/Jakarta')
                        ->format('d/m/Y H:i')
                    : '-';
            })

            ->addColumn('action', function ($row) {
                return '
                       <form action="' . route('user-management.session.destroy', $row->id) . '" method="POST" class="deleteForm" style="display:inline-block">
                            ' . csrf_field() . method_field("DELETE") . '
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                ';
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }

    public function destroy($id)
    {
        $session = Session::find($id);
        if ($session) {
            $session->delete();
            return redirect()->route('user-management.session')->with('success', 'Session deleted successfully.');
        } else {
            return redirect()->route('user-management.session')->with('error', 'Session not found.');
        }
    }
}
