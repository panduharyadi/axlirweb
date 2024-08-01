<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.Contact');
    }

    public function complaints(Request $request)
    {
        $complaints = Complaint::create([
            'name'  => $request->name,
            'noHp'  => $request->noHp,
            'pesan' => $request->pesan
        ]);

        return redirect()->back();
    }
}
