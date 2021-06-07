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
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>UR-Designs</title>
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
                   <input type="text" name="P_ID" id="P_ID" value="{{ $data['product_id'] }}" style="display:none;" disabled="disabled">

                   <h3 id="fullname"> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </h3>
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

        <div class="col-md-6">
            <div class="productbox">
                <div class="fadeshop">
                    <span class="maxproduct"><img src="{{ URL::asset('images/items.png') }}" alt=""></span>
                </div>
                <div class="product-details">
                   
                   @if(isset($data['from_paypal']))
                   <input type="text" name="S_ID" id="P_ID" value="{{ $data['subscription_id'] }}" style="display:none;" disabled="disabled">
                   <input type="text" name="P_ID" id="actual_id" value="{{ $data['product_id'] }}" style="display:none;" disabled="disabled">
                   <b> {{ $data['subscription_id'] }} </b>
                   <h3 id="current_name">{{ $data['product_name'] }}</h3>
                   <p id="current_description"> {{ $data['product_description'] }} </p>
                   Number of users:<p id="current_number_of_users"> {{ $data['from_paypal']['quantity'] }}</p>

                   <b> @if(isset($data['from_paypal']['status'])) {{ $data['from_paypal']['status'] }} @endif </b>
                   @else
                   <h2 class="text-center" style="color:red;">You have no active subscription</h2>
                   @endif
                </div>
            </div>
        </div>

        @if(isset($data['from_paypal']))
         <div class="col-md-3">
            <div class="productbox">
                <div class="product-details">
                  <h1>Paid by:</h1>
               
                  <p> {{ $data['from_paypal']['subscriber']['name']['given_name'] }} {{ $data['from_paypal']['subscriber']['name']['surname'] }} </p>
                  <p> {{ $data['from_paypal']['subscriber']['email_address'] }} </p>

                  <p> 
                    @if(isset($data['from_paypal']['subscriber']['shipping_address']))
                    <b id="address_line_1"> {{ $data['from_paypal']['subscriber']['shipping_address']['address']['address_line_1'] }} </b>
                    <b id="admin_area_2"> {{ $data['from_paypal']['subscriber']['shipping_address']['address']['admin_area_2'] }} </b>
                    <b id="admin_area_1" > {{ $data['from_paypal']['subscriber']['shipping_address']['address']['admin_area_1'] }} </b>
                    <b id="postal_code"> {{ $data['from_paypal']['subscriber']['shipping_address']['address']['postal_code'] }}</b>
                    <b id="country_code"> {{ $data['from_paypal']['subscriber']['shipping_address']['address']['country_code'] }} </b>
                    @endif
                  </p>

                </div>
            </div>
        </div>
     
        <div class="col-md-3">
            <div class="productbox">
                <div class="product-details">
                  <h1>Payment details</h1>
                  <p>Subsription date: {{ $data['subscription_date'] }}</p>
                  @if(isset($data['from_paypal']['billing_info']['next_billing_time']))
                  <p> Next billing date: {{ $data['from_paypal']['billing_info']['next_billing_time'] }} </p>
                  @endif
                </div>
               <div class="text-center">
                 @if($data['from_paypal']['status'] == 'CANCELLED')
                   <a href="{{ route('QB.index') }}"><button id="new"  class="btn btn-success" type="button" > Purchase new </button></a>
                  @else
                    <button id="cancel"  class="btn btn-danger" type="button" > Cancel </button>
                    <button id="update"  class="btn btn-primary" type="button" > Update </button>
                    <button id="upgrade" class="btn btn-warning" type="button" > Upgrade </button>
                  @endif 
              </div>
               
              
            </div>
        </div>
       @endif
    </div>
</div>

<!-- Modal -->
<div id="update-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">{{ $data['product_id'] }}  </h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <label for="current_qty">Current quantity</label>
              <input type="number" name="current_qty" value="{{ $data['from_paypal']['quantity'] }}" class="form-control" readonly="readonly">
            </div>

            <div class="col-md-12">
              <label for="update_quantity">Update quantity</label>
              <input type="number" name="current_qty" id="update_quantity" value="{{ $data['from_paypal']['quantity'] }}" class="form-control">
            </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="do_update" data-dismiss="modal">Update now</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="upgrade-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Product list</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            @foreach($list_of_subs as $d)
            <div class="col-md-6">
                <div class="productbox">
                    <div class="fadeshop">
                        <span class="maxproduct"><img src="images/items.png" alt=""></span>
                    </div>
                    <div class="product-details">
                        <a href="#">
                        <h1> {{ $d['id'] }} </h1>
                        <h1>{{ $d['name'] }}</h1>
                        <h1>{{ $d['description']  }}</h1>
                        </a>
                        
                        <div>
                          <button class="btn btn-success btn_select" type="button" id="btn_select" data-product_id='{{ $d["id"] }}' data-name="{{ $d['name'] }}" data-description="{{$d['description']  }}">Select</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
              <label for="qty">Product</label>
              <input type="text" name="qty" id="new_product_id" class="form-control"/>  
            </div>

            <div class="col-md-12">
              <label for="qty">Name</label>
              <input type="text" name="qty" id="new_product_name" class="form-control"/>  
            </div>

            <div class="col-md-12">
              <label for="qty">Description</label>
              <input type="text" name="qty" id="new_product_description" class="form-control"/>  
            </div>


            <div class="col-md-12">
              <label for="qty">Quantity</label>
              <input type="number" name="qty" id="new_qty" class="form-control" value="{{ $data['from_paypal']['quantity'] }}"/>  
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="do_upgrade" data-dismiss="modal">Update now</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
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


<script src="{{asset('js/jquery-.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/anim.js') }} "></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


$(".btn_select").on('click', function(selected) {
  $("#new_product_id").val( $(this).data('product_id') ) 
  $("#new_product_name").val( $(this).data('name') ) 
  $("#new_product_description").val( $(this).data('description') ) 
})


$("#upgrade").on('click', function() {
  $("#upgrade-modal").modal('show');
})

$("#update_profile").on('click', function() {
  $("#update-profile-modal").modal('show');
})

$("#update").on('click', function() {
  $("#update-modal").modal('show');
})



 $("#cancel").on('click', function() {

var actual_id = $("#actual_id").val();
var current_qty = $("#current_number_of_users").text();
var reason = '';
  Swal.fire({
    input: 'textarea',
    inputLabel: 'Message',
    inputPlaceholder: 'Type your message here...',
    title: 'Are you sure you want to cancel your subscription?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Cancel it!'
  }).then((result) => {

    
    if (result.isConfirmed ) {
      if (document.getElementById('swal2-input').value) {
          reason = document.getElementById('swal2-input').value;
       }else {
          reason = 'user cancelled';
       }

       $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });

        $.ajax({
           type:'delete',
           url:"{{ route('subscription.destroy', isset($data['subscription_id']) ? $data['subscription_id'] : 1 ) }}",
           data: {reason: reason,actual_id:actual_id,current_qty:current_qty},
           success:function(data){
               console.log(data)
                if(data.success === true) {
                    Swal.fire(
                      'Cancelled!',
                     
                    ).then(function() {
                      window.location.href = "{{ route('subscription.index') }}"
                    })
                }
             }
        });
    }
  })
})

$("#do_update").on('click', function() {

var new_qty = $("#update_quantity").val();
var address_line_1 = $("#address_line_1").text();
var admin_area_2 = $("#admin_area_2").text();
var admin_area_1 = $("#admin_area_1").text();
var postal_code = $("#postal_code").text();
var country_code = $("#country_code").text();
var fullname = $("#fullname").text();
var actual_id = $("#actual_id").val();
var current_qty = $("#current_number_of_users").text();
var current_prod_id = $("#actual_id").val()
var current_name = $("#current_name").text();
var current_decription = $("#current_description").text();

  $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
      });

      $.ajax({
         type:'patch',
         url:"{{ route('subscription.update', isset($data['subscription_id']) ? $data['subscription_id'] : 1 )}}",
         data: {qty: new_qty, address_line_1:address_line_1, admin_area_2:admin_area_2, admin_area_1:admin_area_1, postal_code:postal_code,country_code:country_code, fullname:fullname, actual_id: actual_id, type: 'update',current_qty:current_qty,current_prod_id:current_prod_id,current_name:current_name,current_decription:current_decription},
         success:function(data){
             
              if(data.success === true) {
                  Swal.fire({
                    icon: 'success',
                    text:'Updated quantity!'
                  }).then(function() {
                    window.location.href="{{ route('subscription.index') }}"
                  })
              }
           }
      });


})



$("#do_upgrade").on('click', function() {
var new_qty = $("#new_qty").val();
var address_line_1 = $("#address_line_1").text();
var admin_area_2 = $("#admin_area_2").text();
var admin_area_1 = $("#admin_area_1").text();
var postal_code = $("#postal_code").text();
var country_code = $("#country_code").text();
var fullname = $("#fullname").text();
var actual_id = $("#new_product_id").val();
var new_name = $("#new_product_name").val();
var new_description = $("#new_product_description").val();
var current_qty = $("#current_number_of_users").text();
var current_name = $("#current_name").text();
var current_decription = $("#current_description").text();
var current_prod_id = $("#actual_id").val()

  $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
      });

      $.ajax({
         type:'patch',
         url:"{{ route('subscription.update', isset($data['subscription_id']) ? $data['subscription_id'] : 1 )}}",
         data: {qty: new_qty, address_line_1:address_line_1, admin_area_2:admin_area_2, admin_area_1:admin_area_1, postal_code:postal_code,country_code:country_code, fullname:fullname, actual_id: actual_id, new_name:new_name, new_description:new_description, type: 'upgrade', current_qty:current_qty,current_name:current_name, current_decription:current_decription, current_prod_id:current_prod_id  },
         success:function(data){
             console.log(data);
              if(data.success === true) {
                  Swal.fire({
                    icon: 'success',
                    text:'Upgraded!'
                  }).then(function() {
                    window.location.href="{{ route('subscription.index') }}"
                  })
              }
           }
      });


})


</script>



</body>
</html>

