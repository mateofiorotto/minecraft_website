<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Edition;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Retornar el dashboard del admin
     * 
     * @return Vista admin.dashboard
     */
    public function dashboard(){
        $buys = DB::table('acquisitions')->where('status', 'buyed')->count();

        $users = DB::table('users')->count();

        //id de la edicion mas comprada
    $mostBuyedGameData = DB::table('acquisitions')
        ->select('edition_id', DB::raw('count(*) as total'))
        ->where('status', 'buyed')
        ->groupBy('edition_id')
        ->orderByDesc('total')
        ->first();

    $mostBuyedGame = null;

    if ($mostBuyedGameData) {
        //titulo de la edicion por id
        $edition = Edition::find($mostBuyedGameData->edition_id);
        $mostBuyedGame = $edition?->title ?? 'Edición no encontrada';
    }

        return view('admin.dashboard', ['buys' => $buys, 'users' => $users, 'mostBuyedGame' => $mostBuyedGame]);
    }
}
