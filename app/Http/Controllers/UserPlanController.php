<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function buyPlan(Request $request)
    {
        $user = Auth::user();

        $stripeCustomer = $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($request->payment_method);

        switch ( $request["plan"] ) {
            case "basic":
                $isInvoiced = $user->invoiceFor("Cross Basic", 7 * 100);
                if ($isInvoiced) {
                    return [
                        "success" => true,
                        "message" => "Payment Sucessfully Completed!"
                    ];
                } else {
                    return [
                        "success" => false,
                        "message" => "Problem in payment processing"
                    ];
                }
                break;
            case "premium":
                $isInvoiced = $user->invoiceFor("Cross Premium", 13 * 100);
                if ($isInvoiced) {
                    return [
                        "success" => true,
                        "message" => "Payment Sucessfully Completed!"
                    ];
                } else {
                    return [
                        "success" => false,
                        "message" => "Problem in payment processing"
                    ];
                }
                break;
        }
    }
}
