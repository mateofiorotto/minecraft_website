<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\User;
use App\Mail\BuyConfirmation;
use App\Mail\RefundConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Client\Payment\PaymentClient;
use Illuminate\Support\Facades\Log;

class AcquisitionController extends Controller
{
    /**
     * Guarda una nueva compra de un usuario y envia un mail de confirmacion
     * 
     * @param id ID de la edicion
     * @return Vista buyed
     */
    public function buyEdition($id)
    {
        $user = Auth::user();
        $edition = Edition::find($id);

        if (!$edition) {
            abort(404);
        }

        $user->editions()->syncWithoutDetaching([
            $id => ['status' => 'buyed', 'buy_date' => now()]
        ]);

        session()->flash('edition_id', $id);

        //Mail::to($user->email)->send(new BuyConfirmation($user, $edition));

        return redirect()->route('acquired');
    }

    /**
     * Procesa un reembolso de una compra y envia un mail
     * 
     * @param id ID de la edicion
     * @return Vista refunded
     */
    public function refundEdition($id)
    {
        $user = Auth::user();
        $edition = Edition::find($id);

        if (!$edition) {
            abort(404);
        }

        $user->editions()->updateExistingPivot($id, ['status' => 'refunded', 'buy_date' => null]);

        session()->flash('edition_id', $id);

        //Mail::to($user->email)->send(new RefundConfirmation($user, $edition));

        return redirect()->route('refunded');
    }


    public function redirectToMP($id)
    {
        $user = Auth::user();
        $edition = Edition::findOrFail($id);

        try {
            MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

            $client = new PreferenceClient();

            $preference = $client->create([
                "items" => [
                    [
                        "title" => $edition->title,
                        "quantity" => 1,
                        "unit_price" => (float)$edition->price,
                        "currency_id" => "ARS"
                    ]
                ],
                "back_urls" => [
                    "success" => url("/editions/{$edition->id}/success"),
                    "failure" => url("/editions/{$edition->id}/failure"),
                    "pending" => url("/editions/{$edition->id}/pending"),
                ],
                "auto_return" => "approved",
                "metadata" => [
                    "user_id" => $user->id,
                    "edition_id" => $edition->id
                ]
            ]);

            return redirect($preference->init_point);
        } catch (\MercadoPago\Exceptions\MPApiException $e) {
            return redirect()->route('edition', $id)
                ->with('feedback.message', 'Ocurrió un error al iniciar el pago. Intentalo más tarde.');
        }
    }

    public function handleMPSuccess(Request $request, $id)
    {
        $user = Auth::user();

        return $this->buyEdition($id, $user);
    }

    public function handleMPFailure(Request $request, $id)
    {
        return redirect()->route('failure');
    }

    public function handleMPPending(Request $request, $id)
    {
        return redirect()->route('pending');
    }
}
