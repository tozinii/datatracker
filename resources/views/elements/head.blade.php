<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> Matxingo  </title>
<!-- Favicon -->
<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
<!-- Bootstrap CSS -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Animate CSS -->
<link href="{{asset('assets/vendors/animate/animate.css')}}" rel="stylesheet">
<!-- Icon CSS-->
<link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
<!-- Owlcarousel CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/owl_carousel/owl.carousel.css')}}" media="all">
<!--Template Styles CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="all" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!-- Map css & js -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>
