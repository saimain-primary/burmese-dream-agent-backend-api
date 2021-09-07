<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use phpseclib3\System\SSH\Agent;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent_id = IdGenerator::generate(['table' => 'users', 'field' => 'agent_id', 'length' => 7, 'prefix' => 'BD-']);

        $user = new User();
        $user->agent_id = $agent_id;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->refer_code = $this->generateUniqueCode();
        $user->save();

        return back()->with('success', 'Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->new_password != null) {
            $user->password = Hash::make($request->new_password);
        }

        $user->update();

        return back()->with('success', 'Account Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Account Deleted.');
    }

    public function ssd()
    {
        $users = User::query();

        return Datatables::of($users)->addColumn('action', function ($row) {
            $html = '<a href="' . url('admin/users/' . $row->id . '/edit') . '" class="btn btn-sm btn-secondary">Edit</a><a href="' . url('admin/users/' . $row->id) . '" class="mx-2 btn btn-sm btn-primary">View</a> ';
            return $html;
        })->editColumn('created_at', function ($request) {
            return $request->created_at->format('Y-m-d'); // human readable format
        })->editColumn('updated_at', function ($request) {
            return $request->updated_at->format('Y-m-d'); // human readable format
        })->make(true);
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000, 99999);
        } while (User::where("refer_code", "=", $code)->first());

        return $code;
    }

    public function exportExcel()
    {
        $file_name = 'agent_export_' . date('Ymd') . time() . '.xlsx';
        return Excel::download(new UsersExport, $file_name);
    }

    public function importExcel(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file  = $request->file('file');
        try {
            Excel::import(new UsersImport, $file);
            return back()->with('success', 'Import data from excel success.');;
        } catch (\Throwable $th) {
            return back()->with('fail', 'Import data from excel error.');
        }
    }

    public function getAgent(Request $request)
    {
        $user_id = $request->user_id;
        $agent = User::find($user_id);
        return response()->json(['success' => $agent, 200]);
    }
}
