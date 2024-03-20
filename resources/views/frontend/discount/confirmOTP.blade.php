<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discount Offer Creative IT Institute</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/discountCard.css') }}">
</head>

<body>

    <div class="discountCardPage">

        <div class="imgLogo"><img src="{{ asset('frontend/image/logo.webp') }}" alt=""></div>
        <div class="cardHeader">Your OTP</div>
        <div class="cardBody">
            <form action="{{ route('otp.confirm') }}" method="POST">
                @csrf

                <input type="text" name="otp" placeholder="Enter Your OTP" class="form-control">
                <input type="hidden" name="name" value="{{ $name }}">
                <input type="hidden" name="phone" value="{{ $phone }}">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
                <a href="{{ route('otp.resend') }}" class="text-center d-block my-2">Resend Again!</a>
            </form>
        </div>
    </div>


</body>

</html>