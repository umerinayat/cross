@extends('layouts.app')

@section('content')
<!-- Content -->
<div class="cross-wrapper">
    <div class="right-col">
        <p><strong>Purchase</strong></p>
        <div class="top-right-row">
            <!------------------------------------------------------------------->
            <div class="cross-bars cross-bar-1"></div>
            <div class="cross-bars cross-bar-2"></div>
            <div class="cross-bars cross-bar-3"></div>
            <div><strong>Basic</strong></div>
            <div><strong>Residential Proxies</strong></div>
            <div class="mt-3">
                <ul class="li-left-border-one">
                    <li class=" z-index">- Perfect for raffle botting</li>
                    <li class=" z-index">- Average speed of 500ms </li>
                    <li class=" z-index">- Supporting over 100+ countries</li>
                    <li class=" z-index">- Perfect Non expiring</li>
                </ul>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <select class="basic-select" name="" id="basicSelect">
                   
                        @foreach($basic_plans as $plan)
                            <option value="{{ $plan->id . '-' . $plan->price }}"> {{ $plan->total_gb }}GB </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 text-right">
                    <strong>€<span id="basicPrice">7</span></strong>
                    <button id="basicPlanPurchaseBtn" style="background: #89F2D3" class="btn btn-sm ml-2">
                        Purchase
                    </button>
                </div>
            </div>
            <!------------------------------------------------------------------->
        </div>
        <div class="bottom-right-row">
            <div class="cross-bars cross-bar-1 bg-purp"></div>
            <div class="cross-bars cross-bar-2 bg-purp"></div>
            <div class="cross-bars cross-bar-3 bg-purp"></div>

            <div>
                <strong>Premium</strong>
            </div>
            <div>
                <strong>Residential Proxies</strong>
            </div>
            <div class="mt-3">
                <ul class="li-left-border-two">
                    <li>- Unbanned on all websites</li>
                    <li>- Average speed of 100-300ms </li>
                    <li>- Site specific pools</li>
                    <li>- 60 day expiry</li>
                </ul>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <select class="basic-select" name="" id="premiumSelect">
                        @foreach($premium_plans as $plan)
                            <option value="{{ $plan->id . '-' . $plan->price }}"> {{ $plan->total_gb }}GB </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 text-right">
                <strong>€<span id="premiumPrice">13</span></strong> <button style="background-color: #9441E9;color:#fff" class="btn btn-sm ml-2">Purchase</button>
                </div>
            </div>
        </div>
        <div class="disclaimer">
            <p>
                No refunds/warranties due to the nature of the product.
                All sales are final.
            </p>
        </div>
    </div>

    <div class="center-col">
        <div class="top-center-rows">
            <p><strong>Usage</strong></p>
            <!-- <p style="padding: 0; margin: 0;">Usage</p> -->
            <div class="top-center-row">
                <div class="top-center-row-child-one">
                    <div><strong>Basic Plan</strong></div>
                    <h4><b>2 GB</b></h4>
                    <div class="basic-gb-bar"></div>
                    <small>Data Remaining</small>
                </div>
                <div class="top-center-row-child-two">
                    <div><strong>Premium Plan</strong></div>
                    <h4><b>0.7 GB</b></h4>
                    <div class="premium-gb-bar "></div>
                    <small>Data Remaining (936 hours remaining)</small>
                </div>
            </div>
        </div>

        <div class="bottom-center-row">
            <strong>Usage History</strong>

            <div class="mb-4">
                <small style="color: #97969E;font-size: 0.7em">From the most recent usage date</small>
            </div>
            <div class="usage-history-block mx-3">
                <p><strong>Plan</strong></p>
                <div class="col-sm-12 p-0">
                    <select class="basic-select" name="" id="">
                        <option value="Basic">Basic</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div class="mt-3 img-fluid usage-graph">
                    <!-- <img src="./graph.png" alt="" > -->
                    <!-- width="700" height="270" -->
                </div>
            </div>
        </div>
    </div>

    <div class="left-col">
        <p><strong>Generate</strong></p>
        <div class="left-col-child">
            <div>
                <strong>Plan</strong>
                <div class="col-sm-12 p-0">
                    <select class="basic-select" name="" id="">
                        <option value="Basic">Basic</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <br>

                <strong>Country</strong>
                <div class="col-sm-12 p-0">
                    <select class="basic-select" name="" id="">
                        <option value="Basic">Basic</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <br>

                <strong>Type</strong>
                <br>

                <input type="radio" class="mt-2" name="type" /> <span class="mr-2">Sticky</span>
                <input type="radio" name="type" /> <span class="mr-2">Rotating</span>
                <br>
                <br>

                <strong>Quantity</strong>
                <div class="mt-0">
                    <p id="rangeval" class="text-center rangeval-holder">50
                        <!-- Default value -->
                    </p>
                    <input type="range" class="form-control-range range" id="formControlRange" onInput="$('#rangeval').html($(this).val())">
                </div>

                <button style="background: #89F2D3" class="btn btn-sm  mt-3 btn-block">Purchase</button>
            </div>

            <div class="mt-4"><strong>List</strong></div>
            <div class="mt-1 ">
                <div class="row left-col-list">
                    <div class="col-sm-6">
                        <button style="background: #333030;color: #67637A" class="btn btn-sm  mt-3  btn-block">Copy</button>
                    </div>
                    <div class="col-sm-6">
                        <button style="background: #333030;color: #67637A" class="btn btn-sm  mt-3  btn-block">Download</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Paymnet Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalHeading" style="color: #000">Pay For Basic Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <!-- updated -->
                <div class="form-group">

                    <div id="collectPaymentInfo">
                        <input class="form-control form-control-sm mb-4" id="card-holder-name" placeholder="Card Holder Name" type="text">

                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element"></div>
                    </div>

                    <p id="directCreditsInfo" class="text-info"></p>

                    <div class="form-check mt-4" style="display:none">
                        <input type="checkbox" class="form-check-input" id="cDefaultPaymentMethod">
                        <label class="form-check-label" for="cDefaultPaymentMethod">Use My Default Payment Method</label>
                    </div>

                    <button class="btn btn-success btn-sm mt-4" id="card-button" data-secret="{{  Auth::user()->createSetupIntent()->client_secret }}">
                        Pay
                    </button>
                </div>

                <div style="display:none" class="mt-2 alert alert-danger" id="stripe-errors"></div>

            </div>
        </div>
    </div>
</div>
<!-- Payment Modal -->
@endsection


@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://js.stripe.com/v3/"></script>
<!-- Stripe hanlde payment intent and client secret  -->
<script>
    $paymentModal = $("#paymentModal");

    $basicPlanPurchaseBtn = $('#basicPlanPurchaseBtn');

    $basicPlanPurchaseBtn.on('click', function(e) {
        $paymentModal.modal('show');
    });

    const stripe = Stripe("{{ config('site.stripe_key') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {

        $('#card-button').html('processing...');
        $(cardButton).prop('disabled', true);

        // debugger

        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(

            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        );
        if (error) {
            // Display "error.message" to the user...
            $('#stripe-errors').text(error.message);
            $('#card-button').html('Pay');
            $('#stripe-errors').css('display', 'block');
            $(cardButton).prop('disabled', false);
        } else {
            // The card has been verified successfully...

            console.log(setupIntent.payment_method);

            var url = '/buy-plan';
            var data = {
                payment_method: setupIntent.payment_method,
                name: cardHolderName.value,
                plan: "basic",
                useDefaultPaymentMethod: false
            };

            axios.post(url, data).then(({
                data
            }) => {
                console.log(data);
                
                if (data.success) {
                    $.toast({
                        text: 'Payment Successfully Completed!',
                        position: 'top-left',
                    });
                    $paymentModal.modal('hide');
                    $('#card-button').html('Pay');
                    $(cardButton).prop('disabled', false);
                }
            });
        }
    });
</script>
<!-- END of Stripe hanlde payment intent and client secret & user subscription-->


<script>

    // handle basic and premium plans selection
    $basicSelect = $('#basicSelect');
    $premiumSelect = $('#premiumSelect');
    $basicPrice = $('#basicPrice');
    $premiumPrice = $('#premiumPrice');

    function getIdAndPrice(value) {
        let split = value.split('-');
        const idPrice = {id: split[0], price: split[1]}
        return idPrice;
    }

    $basicSelect.on('change', function(event) {
       let value = $(this).val();
       let { id, price } = getIdAndPrice(value);
       $basicPrice.text(price);
    });

    $premiumSelect.on('change', function(event) {
       let value = $(this).val();
       let { id, price } = getIdAndPrice(value);
       $premiumPrice.text(price);
    });



</script>

@endpush