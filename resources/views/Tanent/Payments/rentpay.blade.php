@extends('layouts.tanent')
@section('page_title')
Rent Payment checkout
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@php
    $stripe_key = 'pk_test_51Ic31vAvjSDpdiu4vOxF5gxK9aporITPSDwopdAdtRcOD05U12cRDDUzrGBE68VxenB20YCmMWH1EMkMpdolsLXn00RH2s1mwB';
@endphp
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
                <div class="row">
                    @include('layouts.menu.tenantmenu')
                    <div class="col-lg-4 col-xl-4 mb10">
                        <div class="breadcrumb_content style2 mb30-991">
                            <h2 class="breadcrumb_title">Rent Payment checkout</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-8">

                        <div class="candidate_revew_select style2 text-right mb30-991">
                            <ul class="mb0">
                                <li class="list-inline-item">
                                    <a href="{!! route('tanents.properties.index') !!}" class="btn btn-danger">Back to properties</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="my_dashboard_review mb40">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="card">
                                        <div class="card-header">
                                          {{ $property->title }}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item">Unique Code : {{ $property->code }}</li>
                                          <li class="list-group-item">Price : ${{ $property->price }} USD</li>

                                          <form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
                                              @csrf
                                              {{-- {{ $rent_id }} --}}
                                              <input type="hidden" name="rent_id" value="{{ $rent_id }}">
                                              <input type="hidden" name="property_id" value="{{ $property->id }}">
                                              <input type="hidden" name="agent_id" value="{{ $property->user_id }}">
                                              <input type="hidden" name="price" value="{{ $property->price }}">
                                              <div class="form-group">
                                                  <div class="card-header">
                                                      <label for="card-element">
                                                          Enter your credit card information
                                                      </label>
                                                  </div>
                                                  <div class="card-body">
                                                      <div id="card-element">
                                                      <!-- A Stripe Element will be inserted here. -->
                                                      </div>
                                                      <!-- Used to display form errors. -->
                                                      <div id="card-errors" role="alert"></div>
                                                      <input type="hidden" name="plan" value="" />
                                                  </div>
                                              </div>
                                              <div class="card-footer">
                                                <button
                                                id="card-button"
                                                class="btn btn-primary btn-block "
                                                type="submit"
                                                data-secret="{{ $intent }}"
                                                >Proceed To Pay (${{ $property->price }}) </button>
                                              </div>
                                          </form>
                                        </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-lg-12">
                        <div class="copyright-widget text-center">
                            <p>©2021 Argo. Made By SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)

    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

    stripe.handleCardPayment(clientSecret, cardElement, {
            payment_method_data: {
                //billing_details: { name: cardHolderName.value }
            }
        })
        .then(function(result) {
            console.log(result);
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                console.log(result);
                form.submit();
            }
        });
    });
</script>
@endsection
