<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Vp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VpsController extends Controller
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
        $vps = Vp::latest('id')->paginate($this->limit);
        return view('vps.index')->with('vps', $vps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::select(array('id', 'vendor_name'))->get();
        return view('vps.create')->with('vendors', $vendors);
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
            'vendor_id' => 'required|numeric',
            'bill_number' => 'required|max:255',
            'bill_date' => 'required|date|max:255',
            'bill_amount' => 'required|numeric',
            //'bank_name' => 'required|max:255',
           // 'file_name' => 'required|mimetypes:pdf',

        ]);
        
        
       
        /*if ($request->file('file_name') !== null) {
                $file_name = time() . '_' . $request->file('file_name')->getClientOriginalName();
                Storage::putFileAs('public/introduction', $request->file('file_name'), $file_name);
                $file_name = asset('storage/app/public/introduction/' . $file_name);
            }*/

        $data = array(
            'creator_id' => Auth::id(),
            'vendor_id' => $request->vendor_id,
            'bill_number' => $request->bill_number,
            'bill_date' => $request->bill_date,
            'bill_amount' => $request->bill_amount,
            //'bank_name' => $request->bank_name,
            'file_name' => $request->bill_name
        );
        Vp::create($data);
        return redirect()->route('vps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vp = Vp::find($id);
        return view('vps.show')->with('vp', $vp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['vendors'] = Vendor::select(array('id', 'vendor_name'))->get();
        $data['vp'] = Vp::find($id);
        return view('vps.edit')->with($data);
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
            'vendor_id' => 'required|numeric',
            'bill_number' => 'required|max:255',
            'bill_date' => 'required|date|max:255',
            'bill_amount' => 'required|numeric',
            //'bank_name' => 'required|max:255',
        ]);
        $vp = Vp::find($id);
        if ($vp->count() > 0) {
            $vp->vendor_id = $request->vendor_id;
            $vp->bill_number = $request->bill_number;
            $vp->bill_date = $request->bill_date;
            $vp->bill_amount = $request->bill_amount;
           // $vp->bank_name = $request->bank_name;
            $vp->save();
            return redirect()->route('vps.index');
        }
        return redirect()->route('vps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vps_vendors_add = Vp::find($id);
        $vps_vendors_add->delete();
        return redirect()->route('vps.index');
    }
}
