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
                    <a  class="navbar-brand brand" href="{{ route('QB.index')}}">  <img src=" {{ URL::asset('images/logo.png') }} ">  </a>
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
       
        <div class="col-md-5 col-md-offset-4">
          
            <div class="productbox">
                <div class="fadeshop">
                    <span class="maxproduct"><img src="{{ URL::asset('images/items.png') }}" alt=""></span>
                </div>
                <div class="product-details">
                   <input type="text" name="P_ID" id="P_ID" value="{{ $data['id'] }}"  disabled="disabled" style="display:none">
                   <input type="text" name="P_NAME" id="P_NAME" value="{{ $data['name']  }}"  disabled="disabled"  style="display:none">
                   <input type="text" name="P_DESCRIPTION" id="P_DESCRIPTION" value="{{ $data['description']  }}"  disabled="disabled"  style="display:none">

                   <h3>{{ $data['name'] }}</h3>
                   <p> {{ $data['description']  }}</p>

                   <div class="row">
                    @php $id = 1; @endphp
                     @foreach($data['price'] as $p)
                      
                        <div class="col-md-4">
                          <div class="panel panel-primary {{$id}}">
                              <div class="panel-heading">
                                Number of users: {{ $p['starting_quantity'] }} - @if(isset($p['ending_quantity'])) {{ $p['ending_quantity'] }}  @endif
                              </div>
                              <div class="panel-body">
                                <h1>${{ $p['amount']['value'] }}</h1>
                              </div>
                          </div>
                        </div>

                       @php  $id++; @endphp 
                     @endforeach
                   </div>

                </div>

             
                 @guest
                 @else
                     @if(isset($subscription['subscription_id']))
                     @else
                      <hr><br>
                       <div>
                          <label for="qty">Quantity</label>
                          <input type="number" name="qty" id="qty" class="form-control" value="1"/>  

                          <label for="qty">Total:</label>
                          <input type="number" name="total_amount" id="total_amount" class="form-control" disabled="disabled" /> 
                          
                      </div>
                     @endif

                 @endguest


                <hr><br>
                <div>
                 @guest
                    <button class="btn btn-success" type="button">Login!</button>
                  @else
                      @if(isset($subscription['subscription_id']))
                      <div class="text-center">
                        <h2 class="text-center">You already have a subscription!</h2>
                        <br>
                        <a href="{{ route('subscription.index') }}"> <button class="btn btn-primary"> View Subscription</button> </a>
                      </div>
                      @else
                       <div id="paypal-button-container-{{ $data['id'] }}" ></div>
                      @endif
                  @endguest
                </div>

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
<script src="https://www.paypal.com/sdk/js?client-id=AZx6aZTW4Y00CqgiqXAtfvsDHMIoYc8HzGqYKU4m91IZkvG3YRCUiS5PO4DaSWTfUiMxEVB-omaS9k62&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script> 

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


$("#qty").on('change', function() {
  var qty = $(this).val();
  var total = 0;
  
  if(qty >= 1 && qty < 50){
    total = qty * 39;
  }else if(qty >= 51 && qty < 250){
    total = qty * 35; 
  }else if(qty >= 251) {
    total = qty * 32; 
  }

  
  $("#total_amount").val(total);

})


// $("#test").on('click', function() {

// $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//         });

//         var order_id = 'data.orderID'
//         var subscription_id = 'data.subscriptionID'
//         var product_id = $("#P_ID").val()
//         var quantity = $("#qty").val()
//         var total_amount = $("#total_amount").val()
//         var product_name = $("#P_NAME").val()
//         var product_description = $("#P_DESCRIPTION").val()

//          $.ajax({
//            type:'POST',
//            url:"{{ route('transaction.store') }}",
//            data:{subscription_id:subscription_id, product_id:product_id, quantity:quantity, total_amount:total_amount, order_id:order_id, product_name:product_name, product_description:product_description},
//              success:function(data){
//               console.log(data);
//               if(data.success == true) {
//                   Swal.fire({
//                     icon: 'success',
//                     title: 'Congratulations!',
//                     text: 'You are now subscribed!',
//                   }).then(function() {
//                     window.location.href = "{{ route('QB.index') }}"
//                   })
//               }
//            }
//         });

// })
 


</script>



<script>


  paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'subscribe'
      },
      createSubscription: function(data, actions) {
       var qty = parseInt($("#qty").val());
       var P_ID = $("#P_ID").val();
        return actions.subscription.create({
          /* Creates the subscription */
          plan_id: P_ID,
          quantity: qty// The quantity of the product for a subscription
        });
      },
      onApprove: function(data, actions) {
      
       console.log(data);

          $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

            var order_id = data.orderID
            var subscription_id = data.subscriptionID
            var product_id = $("#P_ID").val()
            var quantity = $("#qty").val()
            var total_amount = $("#total_amount").val()
            var product_name = $("#P_NAME").val()
             var product_description = $("#P_DESCRIPTION").val()

             $.ajax({
               type:'POST',
               url:"{{ route('transaction.store') }}",
               data:{subscription_id:subscription_id, product_id:product_id, quantity:quantity, total_amount:total_amount, order_id:order_id, product_name:product_name , product_description:product_description},
                 success:function(data){
                   console.log(data);
                    if(data.success == true) {
                        Swal.fire({
                          icon: 'success',
                          title: 'Congratulations!',
                          text: 'You are now subscribed!',
                        }).then(function() {
                          window.location.href = "{{ route('QB.index') }}"
                        })
                    }
                 }
            });


              
      // You can add optional success message for the subscriber here
      },
  }).render('#paypal-button-container-{{ $data["id"] }}'); // Renders the PayPal button
</script>

</body>
</html>

