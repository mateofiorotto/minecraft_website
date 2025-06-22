<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\User;
use App\Mail\BuyConfirmation;
use App\Mail\RefundConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AcquistionController extends Controller
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

        Mail::to($user->email)->send(new BuyConfirmation($user, $edition));

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

        Mail::to($user->email)->send(new RefundConfirmation($user, $edition));

        return redirect()->route('refunded');
    }
}
