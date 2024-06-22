<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\CartHeader;
use App\Models\HistoryDetail;
use App\Models\HistoryHeader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class historyController extends Controller
{
    //
    public function createHistory () {
        $history = new HistoryHeader();
        $history->user_id = Auth::user()->id;
        $history->transactionDate = Carbon::now('WIB');
        $history->save();
        $chid = CartHeader::find(Auth::user()->connectCartHeader->id);
        foreach ($chid->connectCartDetail as $cartdetail) {
            $historydetail = new HistoryDetail();
            $historydetail->item_id = $cartdetail->item_id;
            $historydetail->qty = $cartdetail->qty;
            $historydetail->historyheader_id = $history->id;
            $historydetail->save();
        }
        CartDetail::where('cartheader_id', '=', Auth::user()->connectCartHeader->id)->delete();
        return redirect ('/storepage');
    }
    public function getHistory () {
        $q = HistoryHeader::where('user_id', '=', Auth::user()->id)->orderBy('transactionDate', 'desc')->get();
        return view ('store.history')->with(['historyheader'=>$q]);
    }
}
