<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Venues;
use Yajra\DataTables\Facades\DataTables;

 
class VenuesController extends Controller
{
    

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Venues::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
 
        return view('admin.manage');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'venue' => 'required',
            'venue_type' => 'required',
            'floor' => 'required',
            'body' => 'required',
        ]);

        $emps = new Venues;

        $emps->venue = $request->input('venue');
        $emps->venuetype = $request->input('venue_type');
        $emps->floor = $request->input('floor');
        $emps->venue = $request->input('body');

        $emps->save();

        return redirect('/venues')->with('success', 'Data Saved');
    }



}