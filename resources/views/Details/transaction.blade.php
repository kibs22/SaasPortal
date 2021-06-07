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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <title>UR-Designs</title>

    <style type="text/css">
      table, th, td {
        border: 0.5px solid black;
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
           
        </div>
        </header>
        <!-- HEADER =============================-->
    </div>
    <br><br><br><br>
   
    <div class="row">
        <div class="col-md-3">

            <div class="productbox">
                <div class="fadeshop">
                    <span class="maxproduct"><img src="https://image.pngaaa.com/345/1582345-middle.png" alt=""></span>
                </div>
                <div class="product-details">
                   
                   <h3> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </h3>
                   <p> {{ Auth::user()->email }} </p>
                   <p> {{ Auth::user()->address }} </p>

                   <hr>

                  <div class="text-center"> 
                    <button id="update_profile"  class="btn btn-primary" type="button" > Update profile </button>
              
                  </div>
                </div>
            </div>

            <ul class="list-group">
              <a href="{{ route('subscription.index') }}"> <li class="list-group-item">Subscription</li> </a>
              <a href="{{ route('transaction.index') }}"> <li class="list-group-item">Transaction History</li> </a>
            </ul>
        </div>

        <div class="col-md-9">
             <table id="transaction_table" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Subscription ID</th>
                          <th>Amount Paid</th>
                          <th>Product Details</th>
                          <th>Number of Users</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $d)
                      <tr>
                          <td>{{ $d['subscription_id'] }}</td>
                          <td>${{ $d['total_amount'] }}</td>
                          <td>
                            <p> {{ $d['product_id'] }}</p>
                            <p> {{ $d['product_name'] }}</p>
                            <p> {{ $d['product_description'] }}</p>
                          </td>
                          <td>{{ $d['number_of_users'] }}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="update-profile-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Profile</h4>
      </div>
      <div class="modal-body">

        <form>
          
          <div class="form-group">
            <label for="fistname">Firstname</label>
            <input type="text" name="firstname" class="form-control" value="{{ Auth::user()->firstname }}">
          </div>

          <div class="form-group">
            <label for="fistname">Middlename</label>
            <input type="text" name="firstname" class="form-control" value="{{ Auth::user()->middlename }}">
          </div>

          <div class="form-group">
            <label for="fistname">Lastname</label>
            <input type="text" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}">
          </div>


          <div class="form-group">
            <label for="fistname">Email</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
          </div>

          <div class="form-group">
            <label for="fistname">Address</label>
            <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
          </div>

        </form>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

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

<script>
  $(document).ready(function() {
    $('#transaction_table').DataTable();
} );

$("#update_profile").on('click', function() {
  $("#update-profile-modal").modal('show');
})

</script>



</body>
</html>

