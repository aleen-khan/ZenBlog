@extends('frontEnd.master')
@section('title')
    Registration
@endsection
@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Registration</h1>
                </div>
            </div>
            <div class="form mt-2 col-md-8 m-auto">
                <form action="{{ route('user.register') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="subject" placeholder="Enter Your Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" id="subject" placeholder="Enter Your Password" required>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>
@endsection
