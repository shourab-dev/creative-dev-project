<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact as ModelsContact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
        ]);
        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#contact')->withErrors($validator)->withInput();
        }
        ModelsContact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->to(url()->previous() . '#contact')->with('success', 'We received your message.You will be contacted soon.');
    }
}
