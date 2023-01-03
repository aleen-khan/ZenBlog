<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{asset('/')}}assets/css/variables.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog - v1.2.1
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Author: BootstrapMade.com
    * License: https:///bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->

@include('frontEnd.include.header')

<main id="main">

@yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->

@include('frontEnd.include.footer')


<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('/')}}assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
<script src="{{asset('/')}}assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('/')}}assets/js/main.js"></script>

<script src="{{ asset('adminAsset') }}/assets/js/jquery.min.js"></script>
<script>

    $('.details').click(function () {
        var blogId =$(this).attr('id');
        // alert(blogId);

        $.ajax({
            method:"GET",
            url:'api/details/'+blogId,
            dataType:'JSON',
            success:function (data) {
                // alert(data);
                $('#title').text(data.title);
                $('#img').attr('src',data.image);
                $('#category').text(data.category_name);
                $('#date').text(data.date.format('D MMM, YYYY'));
                $('#description').text(data.description.substr(0,250));
            }
        });

        //alert('ok')
        $('#detailsModal').modal('show');
    });

</script>

<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="title"></h3>
                <span id="date"></span>
                <span class="mx-1"></span>
                <span id="category"></span>
                <img src="" id="img" alt="" class="img-fluid">
                <p id="description"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
