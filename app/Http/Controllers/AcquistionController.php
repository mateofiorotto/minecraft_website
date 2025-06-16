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
