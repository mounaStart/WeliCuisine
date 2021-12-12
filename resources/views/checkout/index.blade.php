@extends('layouts.admin')

@section('extra-meta')


<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('extra-script')
 
  <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

<div class="container justify-content-center"><br><br>
    <div class="col-lg-9 mx-auto">
        <div class="card"><BR>
            <h1>Page de Paiment</h1><BR>
            <form  action="{{route('chekout.store')}}" method="post"  id="payment-form"  class="my-4">
                @csrf
                <div class="col-lg-6">
                    <div class="container" id="card-element"> </div>
                    <!-- Used to display Element errors. -->
                    <div id="card-errors" ></div>
                </div>
                <boutton class="btn btn-warning col-lg-12 mt-4"  id="submit">Procéder au paiment({{getPrice(Cart::total())}})</boutton>
            </form>
        </div>
    </div>
</div>
@endsection


@section('extra-js')
<script>
// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/apikeys
var stripe = Stripe('pk_test_51JqLCwHksddvc4OPFQofYTsoL9TTeb7S9esIvXM999JT55IoAMwCYSRpDE80sPaCKY5vREt8lki9HNFmrYTBBY5b00tBYvcDMa');
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Create a token or display an error when the form is submitted.

card.addEventListener('change' , ({error}) => {
    const displayError =  document.getElementById('card-errors') ;

    if(error) {
        displayError.classList.add('alert' , 'alert-warning') ;
        displayError.textContent = error.message ;
    }else{
        displayError.classList.remove('alert' , 'alert-warning') ;
        displayError.textContent = '' ;
    }
});

var submitbtn = document.getElementById('submit');

submitbtn.addEventListener('click', function(ev) {
    ev.preventDefault();
    submitbtn.disabled =true ;
    // If the client secret was rendered server-side as a data-secret attribute
    // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
    stripe.confirmCardPayment('{{$client_secret}}', {
        payment_method: {
            card: card
            // ,
            // billing_details: {
            //     name: 'Jenny Rosen'
            // }
        }
    }).then(function(result) {
        if (result.error) {
            submitbtn.disabled =false ;
            // Show error to your customer (e.g., insufficient funds)
            console.log(result.error.message);
            $('#card-errors').text(result.error.message);
        } else {
            // The payment has been processed!
            if (result.paymentIntent.status === 'succeeded') {
               var paymentIntent = result.paymentIntent ;
               var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content') ;
              var form  =  document.getElementById('payment-form');
               var url = form.action ;
               var redirect = "/merci" ;

               fetch(
                    url ,
                    {
                        headers:{
                            'Content-Type': 'application/json',
                            'Accept': 'application/json, text-plain, */*',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN' : token 
                        },
                        method:'post' ,
                        body:JSON.stringify({
                            paymentIntent:  paymentIntent 
                        })
                    }
               ).then((data) =>{
                   console.log(data)
                   
                     window.location.href = redirect ;
               }).catch((error) =>{
                   console.log(error);
               })
                
                // $('#card-errors').text('Payment Completed');

              

            }
        }
    });
});

 
</script>
@endsection