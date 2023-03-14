<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    private $limit;
    public function __construct()
    {
        $this->middleware('auth');
        $this->limit = 10;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::latest('id')->paginate($this->limit);
        $vendorsdata = Vendor::all();
        $allusers = response()->json($vendorsdata);
        return view('vendors.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'vendor_name' => 'required|unique:vendors|max:255',
            'pan_number' => 'required|max:255',
            'gst_number' => 'required|max:255',
            'description' => 'required'
        ]);
        $data = array(
            'creator_id' => Auth::id(),
            'vendor_name' => $request->vendor_name,
            'pan_number' => $request->pan_number,
            'gst_number' => $request->gst_number,
            'description' => $request->description
        );
        Vendor::create($data);
        $inserted = response()->json($data);  
        return redirect()->route('vendors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);
        $allShows = response()->json($vendor);  
        return view('vendors.show')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('vendors.edit')->with('vendor', $vendor);
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
        $this->validate($request, [
            'vendor_name' => 'required|unique:vendors|max:255',
            'pan_number' => 'required|max:255',
            'gst_number' => 'required|max:255',
            'description' => 'required'
        ]);
        $vendor = Vendor::find($id);
        if($vendor->count() > 0) {
            $vendor->vendor_name = $request->vendor_name;
            $vendor->pan_number = $request->pan_number;
            $vendor->gst_number = $request->gst_number;
            $vendor->description = $request->description;
            $vendor->save();
            return redirect()->route('vendors.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('vendors.index');
    }
}
