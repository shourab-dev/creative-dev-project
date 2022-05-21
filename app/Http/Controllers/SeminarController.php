<?php

namespace App\Http\Controllers;

use App\Models\SeminarLeed;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function saveLeeds(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        // ]);

        $leed = SeminarLeed::where('seminar_id', $request->seminar_id)->firstOrCreate([
            'phone' => $request->phone,
        ], [
            'name' => $request->name,
            'seminar_id' => $request->seminar_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return back()->with('success', "Thanks you <strong class='text-uppercase'> " . $request->name . "</strong> for registering. We will contact you soon.");
    }
}
