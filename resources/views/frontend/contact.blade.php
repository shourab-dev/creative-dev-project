<x-frontend-app>
    <section id="contact">
        <div class="container">
            <div class="primary">
                <h2>যোগাযোগ</h2>
                <p>যে কোনো প্রয়োজনে যোগাযোগ করতে সরাসরি আমাদের অফিস ভিজিট করতে পারেন। তাছাড়া হটলাইন নম্বরে কল করে জেনে
                    নিতে পারেন ট্রেইনিং
                    সংক্রান্ত যেকোনো তথ্য। এছাড়াও উল্লেখিত মেইলে কিংবা ফেসবুক ম্যাসেঞ্জারেও নক দিতে পারেন।</p>
            </div>

            <div class="mapPart">
                <div class="row align-items-center">
                    <div class="map col-lg-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.8360089177772!2d91.83852071426966!3d22.3598201463836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad277ab0cff8a7%3A0x13eb8ccef8a22dde!2sCreative%20It%20Institute!5e0!3m2!1sen!2sbd!4v1654343509797!5m2!1sen!2sbd"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="detail col-lg-6">
                        <h3>ব্রাঞ্চ অফিস [Chattogram]</h3>
                        <p>9 No, Kapasgola Road (4th Floor),
                        <p>Chawk Bazar, Telpotti More,</p>
                        <p>Chattogram 4203, Bangladesh</p>
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <h4>ফোন নাম্বার</h4>
                                <a href="tel:01847422965">+880 1847422965</a> <br>
                                <a href="01847422959">+880 1847422959</a> <br>
                                <a href="01847422966">+880 1847422966</a>
                            </div>
                            <div class="col-lg-6">
                                <h4>অফিস ভিজিটের সময়</h4>
                                <p>
                                    শনিবার - শুক্রবার <br>
                                সকাল ৯ টা থেকে রাত ৮ টা
                                </p>
                                <h4>ই-মেইল</h4>
                                <p>
                                    <a href="mailto:ctg@creativeitinstitute.com">ctg@creativeitinstitute.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('frontendCss')
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">
    @endpush
</x-frontend-app>