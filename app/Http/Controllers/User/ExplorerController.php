<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    //index of all withdrawals
    public function index(Request $request)
    {
        $page_title = 'Explorer';
        return view('user.explorer.index', compact(
            'page_title',

        ));
    }

    //index of all withdrawals
    /* public function trxdetails(Request $request)
    {
        $page_title = 'Explorer Details';


        if ($request->s) {
            $transactions = user()
                ->transactions()
                ->where('ref', 'LIKE', '%' . $request->s . '%')
                ->orderBy('id', 'DESC')
                ->paginate(site('pagination'));
        } else {
            $transactions = user()
                ->transactions()
                ->orderBy('id', 'DESC')
                ->paginate(site('pagination'));
        }




        return view('user.earnings.history', compact(
            'page_title',
            'transactions',
        ));
    }

*/


}
