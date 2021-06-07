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

    <style type="text/css">
        .card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: #1A237E
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row">
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
                    <a  class="navbar-brand brand" href="{{ route('QB.index')}}">  <img src="images/logo.png">  </a>
                </div>
                <div id="navbar-collapse-02" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="propClone"><a href="{{ route('QB.index')}}">Home</a></li>
                        <li class="propClone"><a href="{{ route('login.index') }}">Sign-in</a></li>
                    </ul>
                </div>
            </div>
            </nav>
           
        </div>
        </header>
        <!-- HEADER =============================-->
    </div>
    <br><br><br><br>
    <div class="row">
       <div class="col-md-6 col-md-offset-3">
            <div class="card card0 border-0">
                 <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-lg-6">
                            <div class="card1 pb-5">
                                <div class="row">
                                    <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> 
                                </div>
                                <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                                    <img src="https://i.imgur.com/uNGdWHi.png" class="image"> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card2 card border-0 px-4 py-5">
                                
                                <div class="row px-3">
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Firstname</h6>
                                        </label> 
                                        <input type="text" class=" mb-4 form-control {{ $errors->has('email') ? 'firstname' : '' }}" name="firstname" placeholder="Enter a firstname">
                                         @if($errors->has('firstname'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('firstname')}}
                                             </div>
                                          @endif
                                    </div> 
                                 </div>

                                 <div class="row px-3">
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Middlename</h6>
                                        </label> 
                                        <input type="text" class=" mb-4 form-control {{ $errors->has('middlename') ? 'error' : '' }}" name="middlename" placeholder="Enter a middlename">
                                         @if($errors->has('middlename'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('middlename')}}
                                             </div>
                                          @endif
                                    </div> 
                                 </div>

                                 <div class="row px-3">
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Lastname</h6>
                                        </label> 
                                        <input type="text" class=" mb-4 form-control {{ $errors->has('lastname') ? 'error' : '' }}" name="lastname" placeholder="Enter a lastname">
                                         @if($errors->has('lastname'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('lastname')}}
                                             </div>
                                          @endif
                                    </div> 
                                 </div>

                                  <div class="row px-3">
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Company</h6>
                                        </label> 
                                        <input type="text" class=" mb-4 form-control {{ $errors->has('company') ? 'error' : '' }}" name="company" placeholder="Enter a company">
                                         @if($errors->has('company'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('company')}}
                                             </div>
                                          @endif
                                    </div> 
                                 </div>

                                 <div class="row px-3">
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Address</h6>
                                        </label> 
                                        <input type="text" class=" mb-4 form-control {{ $errors->has('address') ? 'error' : '' }}" name="address" placeholder="Enter a valid address">
                                         @if($errors->has('address'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('address')}}
                                             </div>
                                          @endif
                                    </div> 
                                 </div>

                                <div class="row px-3">
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Email Address</h6>
                                        </label> 
                                        <input type="text" class=" mb-4 form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" placeholder="Enter a valid email address">
                                         @if($errors->has('email'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('email')}}
                                             </div>
                                          @endif
                                    </div> 
                                 </div>

                                <div class="row px-3"> 
                                    <div class="form-group">
                                         <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Password</h6>
                                        </label> 
                                        <input type="password" name="password" class="mb-4 form-control {{ $errors->has('password') ? 'error' : '' }}" placeholder="Enter password">
                                        @if($errors->has('password'))
                                             <div style="color:#E74C3C">
                                                {{$errors->first('password')}}
                                             </div>
                                         @endif
                                    </div>
                                </div>
                             
                                <div class="row mb-3 px-3">
                                  <button type="submit" class="btn btn-blue text-center">Register</button> 
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
    </div>
</div>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->

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

