<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact as ModelsContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
        ]);
        ModelsContact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return back()->with('success', 'We received your message.You will be contacted soon.');
    }
}
