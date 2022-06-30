<?php

namespace App\Http\Controllers;

use App\Models\LuckyWheel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DiscountCourseController extends Controller
{
    public $apiUrl = "http://masking.metrotel.com.bd/smsnet/bulk/api";
    public $key = "82523ce713adb69976f7e41980f210d2324";
    public $secret = "3d7fec83f968ca0ef9d9084850f6459c324";
    function sendOpt(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:lucky_wheels,phone',
            'name' => 'required',
        ]);
        // dd(session('OTP'));
        if (!session('OTP')) {
            $newOTP = rand(10000, 999999);
            Session::put('OTP', $newOTP);
            $message = "Your OTP is $newOTP. Please dont share it with anyone else.";
            $response = HTTP::post($this->apiUrl, [
                "auth" => [
                    "username" => "citctg",
                    "api_key" => $this->key,
                    "api_secret" => $this->secret
                ],

                "sms_data" => [
                    [
                        "recipient" => $request->phone,
                        "mask" => "Creative IT Institute",
                        "message" => $message
                    ]
                ]
            ]);
        }

        $phone = $request->phone;
        $name = $request->name;

        return view('frontend.discount.confirmOTP', compact('name', 'phone'));
    }
    function resendOTP()
    {
        Session::forget('OTP');
        return back();
    }

    function confirmOTP(Request $request)
    {

        $request->validate([
            'otp' => 'required',

        ]);
        if (session('OTP')) {
            if (session('OTP') == $request->otp) {
                LuckyWheel::updateOrCreate(['phone' => $request->phone], [
                    'name' => $request->name,
                    'phone' => $request->phone
                ]);
                $phone = $request->phone;
                return view('frontend.discount.luckyWheel', compact('phone'));
            } else {
                return back()->with('otpError', 'OTP did not match');
            }
        } else {
            return view('frontend.discount.discountModal')->with(['otpError' => 'OTP did not found!']);
        }
    }


    function spinWheel()
    {
        if (Session::has('OTP')) {
            return view('frontend.discount.luckyWheel');
        } else {
            return redirect()->route('course.discount');
        }
    }

    function successSpin(Request $request)
    {
        if (Session::has('OTP')) {
            $wheel =  LuckyWheel::where('phone', $request->get('session_value'))->first();
            $wheel->discount = $request->final_text;
            $wheel->save();

            if ($wheel) {
                $data = "অভিনন্দন! আপনি ক্রিয়েটিভ আইটির প্রফেশনাল কোর্সে $wheel->discount স্পেশাল ডিস্কাউন্টটি পেয়েছেন। খুব শীঘ্রই আপনাকে কল করে বিস্তারিত জানিয়ে দেয়া হবে। আপনি চাইলে আমাদের অফিসিয়াল পেইজে নক করতে পারেন- m.me/CITI.Chattogram অফারটি পেতে আপনার ফোনে পাঠানো মেসেজটি সংরক্ষণ করুন।";
                Session::forget('OTP');
                $response = HTTP::post($this->apiUrl, [
                    "auth" => [
                        "username" => "citctg",
                        "api_key" => $this->key,
                        "api_secret" => $this->secret
                    ],

                    "sms_data" => [
                        [
                            "recipient" => $request->get('session_value'),
                            "mask" => "Creative IT Institute",
                            "message" => $data
                        ]
                    ]
                ]);
                return $data;
            }
        }
        return response('OTP Did not found!', 301);
    }
}
