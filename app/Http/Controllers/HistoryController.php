<?php

namespace App\Http\Controllers;

use App\Models\Cartdetail;
use App\Models\Cartheader;
use App\Models\Historydetail;
use App\Models\Historyheader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //
    public function createHistory () {
        $history = new Historyheader();
        $history->user_id = Auth::user()->id;
        $history->transactionDate = Carbon::now('WIB');
        $history->save();
        // $chid = CartHeader::find(Auth::user()->connectCartHeader->id);
        $chid = Cartheader::where('user_id', '=', Auth::user()->id)->first()->connectCartDetail;
        foreach ($chid as $cartdetail) {
            $historydetail = new Historydetail();
            $historydetail->item_id = $cartdetail->item_id;
            $historydetail->qty = $cartdetail->qty;
            $historydetail->historyheader_id = $history->id;
            $historydetail->save();
        }
        Cartdetail::where('cartheader_id', '=', Auth::user()->connectCartHeader->id)->delete();
        return redirect ('/storepage');
    }
    public function getHistory () {
        $q = Historyheader::where('user_id', '=', Auth::user()->id)->orderBy('transactionDate', 'desc')->get();
        return view ('store.history')->with(['historyheader'=>$q]);
    }
}
