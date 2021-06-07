<!DOCTYPE html>
<html>
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">

    <title>UR-Designs</title>
</head>

<body>


<!-- HEADER =============================-->
<header class="item header margin-top-0">
<div class="wrapper">
    <nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand brand" href="{{ route('QB.index')}}">  <img src="images/logo.png">  </a>
        </div>
        <div id="navbar-collapse-02" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="propClone"><a href="{{ route('QB.index')}}">Home</a></li>
                @guest
                <li class="propClone"><a href="{{ route('login.index') }}">Sign-in</a></li>
                @else
                <li class="propClone"><a href="{{ route('transaction.index') }}">Portal</a></li>
                <li class="propClone"><a href="{{ url('/logout') }}">Sign-out</a></li>
                @endguest
                
            </ul>
        </div>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text-homeimage">
                    <div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
                         Software as a Service
                    </div>
                    <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
                         Powered by URDesigns
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
<!-- HEADER =============================-->

<!-- STEPS =============================-->

    
    <!-- LATEST ITEMS =============================-->
<section class="item content">
    <div class="container">
        <div class="underlined-title">
            <div class="editContent">
                <h1 class="text-center latestitems">LATEST ITEMS</h1>
            </div>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                </span>
            </div>
        </div>
        <div class="row">


            @foreach($data as $d)

            <div class="col-md-4">
                <div class="productbox">
                    <div class="fadeshop">
                        <div class="captionshop text-center" style="display: none;">
                            <h3>{{ $d['name'] }}</h3>
                            <p> {{ $d['description']  }}</p>
                            
                        </div>
                        <span class="maxproduct"><img src="images/items.png" alt=""></span>
                    </div>
                    <div class="product-details">
                        <a href="#">
                        <h1>{{ $d['name'] }}</h1>
                        <h1>{{ $d['description']  }}</h1>
                        </a>
                        <div>
                            <a type="button" href="https://ur-designs.com/ur-saas-pricing/" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
                        </div>
                        <div>
                            <a type="button" href="{{ route('QB.show',$d['id']) }}" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>


<!-- BUTTON =============================-->
<!-- <div class="item content">
    <div class="container text-center">
        <a href="shop.html" class="homebrowseitems">Browse All Products
        <div class="homebrowseitemsicon">
            <i class="fa fa-star fa-spin"></i>
        </div>
        </a>
    </div>
</div> -->
<hr>
<br/>


<!-- AREA =============================-->
<div class="item content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-microphone infoareaicon"></i>
                <div class="infoareawrap">
                    <h1 class="text-center subtitle">General Questions</h1>
                    <p>
                         Want to buy a theme but not sure if it's got all the features you need? Trouble completing the payment? Or just want to say hi? Send us your message and we will answer as soon as possible!
                    </p>
                    <p class="text-center">
                        <a href="#">- Get in Touch -</a>
                    </p>
                </div>
            </div>
            <!-- /.col-md-4 col -->
            <div class="col-md-4">
                <i class="fa fa-comments infoareaicon"></i>
                <div class="infoareawrap">
                    <h1 class="text-center subtitle">Theme Support</h1>
                    <p>
                         Theme support issues prevent the theme from working as advertised in the demo. This is a free and guaranteed service offered through our support forum which is found in each theme.
                    </p>
                    <p class="text-center">
                        <a href="#">- Select Theme -</a>
                    </p>
                </div>
            </div>
            <!-- /.col-md-4 col -->
            <div class="col-md-4">
                <i class="fa fa-bullhorn infoareaicon"></i>
                <div class="infoareawrap">
                    <h1 class="text-center subtitle">Hire Us</h1>
                    <p>
                         If you wish to change an element to look or function differently than shown in the demo, we will be glad to assist you. This is a paid service due to theme support requests solved with priority.
                    </p>
                    <p class="text-center">
                        <a href="#">- Get in Touch -</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- TESTIMONIAL =============================-->
<div class="item content">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="slide-text">
                <div>
                    <h2><span class="uppercase">Awesome Support</span></h2>
                    <img src="http://wowthemes.net/demo/salique/salique-boxed/images/temp/avatar2.png" alt="Awesome Support">
                    <p>
                         The support... I can only say it's awesome. You make a product and you help people out any way you can even if it means that you have to log in on their dashboard to sort out any problems that customer might have. Simply Outstanding!
                    </p>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
                <h1 class="callactiontitle"> Promote Items Area Give Discount to Buyers <span class="callactionbutton"><i class="fa fa-gift"></i> WOW24TH</span>
                </h1>
            </div>
        </div>
    </div>
</div>
</section>


<!-- FOOTER =============================-->
<div class="footer text-center">
    <div class="container">
        <div class="row">
            <p class="footernote">
                 Connect with Scorilo
            </p>
            <ul class="social-iconsfooter">
                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <p>
                 &copy; 2017 Your Website Name<br/>
                Scorilo - Free template by <a href="https://www.wowthemes.net/">WowThemesNet</a>
            </p>
        </div>
    </div>
</div>





<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->
!-- jQuery -->
<script src="{{asset('js/jquery-.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/anim.js') }} "></script>

<script>
//----HOVER CAPTION---//      
jQuery(document).ready(function ($) {
    $('.fadeshop').hover(
        function(){
            $(this).find('.captionshop').fadeIn(150);
        },
        function(){
            $(this).find('.captionshop').fadeOut(150);
        }
    );
});
</script>
</body>
</html>


  <!-- <pre>
         @php 

      print_r($data)
      @endphp
     </pre> -->