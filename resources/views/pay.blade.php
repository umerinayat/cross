<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Pay</title>

    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
</head>

<body>
    <!-- Paymnet Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalHeading">Pay For Plan</h5>
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

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <!-- Stripe hanlde payment intent and client secret  -->
    <script>

        $paymentModal = $("#paymentModal");

        $paymentModal.modal('show');

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

            debugger

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
                    debugger
                    if (data.success) {

                        $paymentModal.modal('hide');
                        $('#card-button').html('Pay');
                        $(cardButton).prop('disabled', false);
                    }
                });
            }
        });
    </script>
    <!-- END of Stripe hanlde payment intent and client secret & user subscription-->

</body>

</html>