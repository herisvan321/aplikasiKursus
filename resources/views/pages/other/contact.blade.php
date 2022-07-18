@extends('layouts.othertemp')

@section('content')
@include('layouts.include.other.banner1')
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
            <iframe class="map-wrap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.315156947638!2d100.36533911475352!3d-0.909955499336191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8c0a13b4011%3A0x7dcc01ea2a1fb73f!2sSTKIP%20PGRI!5e0!3m2!1sid!2sid!4v1636689208967!5m2!1sid!2sid" width="100%" height="445" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="col-lg-4 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                    <div class="contact-details">
                        <h5>Jl. Gn. Pangilun, Gn. Pangilun, Kec. Padang Utara, Kota Padang</h5>
                        <p>
                            Sumatera Barat 25111
                        </p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>
                    <div class="contact-details">
                        <h5>+628116612341</h5>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>imelwati05@yahoo.com
                        </h5>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="form-area contact-form text-right" id="myForm"
                    action="https://preview.colorlib.com/theme/education/mail.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter your name'"
                                class="common-input mb-20 form-control" required type="text">
                            <input name="email" placeholder="Enter email address"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                class="common-input mb-20 form-control" required type="email">
                            <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control"
                                required type="text">
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea class="common-textarea form-control" name="message"
                                placeholder="Enter Messege" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Messege'" required></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <button class="genric-btn primary" style="float: right;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
