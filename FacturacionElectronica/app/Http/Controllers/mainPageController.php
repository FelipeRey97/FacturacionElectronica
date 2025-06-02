<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class mainPageController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

    $userId = Auth::id();

    $invoices = Invoice::with('item')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get();

    return view('pages.mainPage', compact('invoices'));

    }
}