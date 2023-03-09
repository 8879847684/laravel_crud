<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $limit;
    public function __construct()
    {
        $this->middleware('auth');
        $this->limit = 10;
    }

    public function index()
    {
       $payment = Payment::latest('id')->paginate($this->limit);
        return view('payments.index')->with('payment', $payment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::select(array('id', 'vendor_name'))->get();
        return view('payments.create')->with('vendors', $vendors);
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
            'bank_name' => 'required|max:255',
            'payment_date' => 'required|date|max:255',
            'amount' => 'required|numeric',
        ]);

           $data = array(
            'creator_id' => Auth::id(),
            'vendor_id' => $request->vendor_id,
            'bank_name' => $request->bank_name,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount
        );
        Payment::create($data);
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $pay = Payment::find($id);
        return view('payments.show')->with('pay', $pay);    
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
        $data['pay'] = Payment::find($id);
        return view('payments.edit')->with($data);   
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
        //
             $this->validate($request, [
            'vendor_id' => 'required|numeric',
            'bank_name' => 'required|max:255',
            'payment_date' => 'required|date|max:255',
            'amount' => 'required|numeric',
        ]);

         $payment = Payment::find($id);
        if ($payment->count() > 0) {
            $payment->vendor_id = $request->vendor_id;
            $payment->bank_name = $request->bank_name;
            $payment->payment_date = $request->payment_date;
            $payment->amount = $request->amount;
            $payment->save();
            return redirect()->route('payments.index');
        }
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payments.index');    
    }
}
