<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use App\AssignRoom;
use App\Rate;
use Session;
class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usrs=User::where('RoomNo','!=','not assigned')->count();
        $assign=AssignRoom::orderby('created_at','desc')->first();
        $rates = Rate::orderby('created_at','desc')->first();
        for($i=1;$i<=$usrs;$i++)
        {
            $payment[$i]=Payment::where('user_id',$i)->orderby('created_at','desc')->first();
        }
        return view('adminpanel',compact('payment','usrs','assign','rates'));
        //
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
        $payment = new Payment;
        //userid finder
        $theuser= User::where('name',$request->name)->first();
        $payment->user_id= $theuser->id;        
        $payment->rent = $request->rent;
        $payment->RoomNo = $request->roomno ;
        $payment->rent_paid_upto = $request->rent_paid_upto ;
        $payment->eunit_before = $request->eprev;
        $payment->eunit_now = $request->enow;

        // calculating electricity cost
        $ecost = ($payment->eunit_now - $payment->eunit_before) *15;

        $payment->e_cost = $ecost;

        $total = $payment->rent + $ecost;
        $paidamount = $request->paidamount;
        $payment->paid_amount = $paidamount;

        if($paidamount>=$total)
        {
            $payment->advance =$paidamount-$total;
            $payment->due = 0;
        }
        else
        {
            $payment->advance =0 ;
            $payment->due = $total - $paidamount;
        }

        $payment->paid_to = $request->rent_paid_to   ;
        $payment->payment_done_at = $request->paid_at   ;
        $payment->electricity_paid_upto = $request->elec_paid_upto  ;

        $payment->save();
        Session::flash('message','Payment Successfully Added =)');
        return redirect()->back();
    }
               /**
 * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
