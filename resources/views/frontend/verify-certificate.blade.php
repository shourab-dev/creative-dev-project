<x-frontend-app>
    @push('title')
    Verify Your Certificate -
    @endpush
    @push('frontendCss')
    <link rel="stylesheet" href="{{ asset('frontend/css/verify-certificate.css') }}">
    @endpush
    <!-- breadcrum section starts -->
    <section class="breadcrum">
        <div class="container">
            <h2>আপনার সার্টিফিকেট ভেরিফাই করুন</h2>
            <p>
                <a href="{{ url('/') }}">হোম </a><i class="bi bi-chevron-right"></i>
                <a href="#" class="active">সার্টিফিকেট</a>
            </p>
        </div>
    </section>

    <!-- breadcrum section ends -->
    @if (isset($user))
    {{-- CERTIFICATE DETAILS --}}
    <section id="certificate_view">
        <div class="container">
            <div class="viewContainer">
                <div class="student_info">
                    <div class="alert alert-success">
                        <h5 class="m-0">
                            <i class="bi bi-check-circle-fill"></i> Certified
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="certificate-holder-img">
                                <img src="data:image/png;base64,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"
                                    alt="certificate-holder-img" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-5 pt-2">
                            <div class="certificate-holder-info">
                                <p><b>Certificate ID</b>: CJ-21091306</p>
                                <p><b>Name:</b> Md. Sahazadul Islam</p>
                                <p><b>Father Name:</b> </p>
                                <p><b>Mother Name:</b> </p>
                            </div>
                        </div>
                        <div class="col-lg-5 pt-2">
                            <div class="certificate-holder-info">
                                <p><b>Course Name:</b> Creative Juniors</p>
                                <p><b>Batch Number:</b> CJ Special</p>
                                <p><b>Course End Date:</b> 30 November, -0001</p>
                                <p><b>Certificate Date:</b> 30 November, -0001</p>
                            </div>
                        </div>
                    </div>

                    {{-- share options --}}
                    <div class="socialIcons">
                        <p><span>Share On:</span> <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        </p>
                    </div>
                    {{-- share options --}}
                </div>
                <div class="certificate_info">
                    <img src="{{ asset('frontend/image/certificateBG.jpg') }}" alt="" style="height: 860px;width:100%">
                    <div class="certifiate-overlay">
                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <div class="certificate-main-info main-info-left">
                                    <h5>ID No: <p> <b>CJ-21091306</b></p>
                                    </h5>
                                    <h5>Date of Issue: <p> <b>30/11/-0001</b></p>
                                        <p></p>
                                    </h5>
                                    <input id="text" type="hidden"
                                        value="https://www.certificate.creativeit.xyz/certificate?cid=CJ-21091306&amp;fbclid=IwAR2eO9dM7xvR_i22pLoqigbBIXNeSadMSYaH5Bs4-vSYc4ixkizkI403tck"
                                        style="width:20%"><br>
                                    <div id="qrcode" class="d-none d-lg-block d-md-block"
                                        style="width:20px; height:20px; margin-top:25px;"
                                        title="https://www.certificate.creativeit.xyz/certificate?cid=CJ-21091306&amp;fbclid=IwAR2eO9dM7xvR_i22pLoqigbBIXNeSadMSYaH5Bs4-vSYc4ixkizkI403tck">
                                        <canvas width="100" height="100" style="display: none;"></canvas><img
                                            alt="Scan me!"
                                            src="data:image/png;base64,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"
                                            style="display: block;">
                                    </div>
                                    <div class="qr-img d-lg-none d-md-none d-block">
                                        <img src="https://creativeitinstitute.com/front/images/qr.png" alt="">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-8 col-8 pl-0">
                                <div class="certificate-main-info main-info-right">
                                    <h3><span>Presented to</span>
                                        <p>MD. SAHAZADUL ISLAM</p>
                                    </h3>
                                    <p class="abcde">Son of <b></b> &amp; <b></b> has successfully completed the
                                        <b>Creative Juniors</b>
                                        course held on 09 November 2021 to 30 November -0001 at <b>
                                            Creative IT
                                            Institute
                                        </b> Lorem ipsum dolor sit amet, consectetur adipis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- CERTIFICATE DETAILS ENDS --}}
    @endif
    {{-- CERTIFICATE CHECK SECTION --}}
    <section id="certificate">
        <div class="container">
            <h4>Check Your Certificate</h4>
            <form action="{{ route('verified-certificate') }}" method="POST">
                @csrf
                <div class="row justify-content-between">
                    <div class="form_input">
                        <input type="text" placeholder="Certificate Id*" name="certificate_id">
                        @error('certificate_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </section>
    {{-- CERTIFICATE CHECK SECTION ENDS HERE --}}
</x-frontend-app>