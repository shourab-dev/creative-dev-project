<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discount Offer Creative IT Institute</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/discountCard.css') }}">
</head>

<body>

    <div class="discountCardPage">

        <div class="imgLogo"><img src="{{ asset('frontend/image/logo.webp') }}" alt=""></div>
        <div class="cardHeader">Your Information</div>
        <div class="cardBody">
            <form action="{{ route('otp.send') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name" class="form-control">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="number" name="phone" placeholder="Phone" class="form-control">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (Session::has('otpError'))
                <span class="text-danger mb-2 d-block">
                    {{ session('otpError') }}
                </span>
                @endif
                <button id="otpSubmitButton" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#otpSubmitButton').click(function(){
            let name = $('input[name="name"]').val();
            let phone = $('input[name="phone"]').val();

            if(name == ''){
                alert('hlw')
            } else if(phone == ''){
                alert('hlw 2 ')
            } else{
                let url = "{{ api_url }}";
               console.log(url);
            }



           
        
        })
    </script> --}}
</body>

</html>