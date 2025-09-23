<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

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
                        data-name="' . $row->name . '" 
                        data-email="' . $row->email . '"
                        data-bs-toggle="modal" 
                        data-bs-target="#showModalEdit">
                        Edit
                    </button>
                    <form action="' . route('user-management.user.destroy', $row->id) . '" method="POST" class="deleteForm" style="display:inline-block">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
        ]);
        
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);


        return redirect()->back()->with('success', 'User created successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed', // password opsional
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('user-management.user')
                ->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('user-management.user')
                ->with('error', 'Failed to delete user. Please try again.');
        }
    }

    public function profile()
    {

        return view('user_management.profile.index');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }   


}
