<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $valider = $request->valider;
        $filieres = Filiere::all();
        $result = null;
        if (isset($valider)) {
            $stats = Stats::where('id_filiere', $request->filiere)->select("annee", "nbre")->get();
            $result[] = ['Années', 'Nombres Détudiants'];
            foreach ($stats as $key => $value) {
                $result[++$key] = [$value->annee, (int)$value->nbre];
            }

            return view('home')->with(compact(['filieres', 'result']));

        }
        return view('home')->with(compact(['filieres', 'result']));
    }

    public function map()
    {
        return view('map');
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('manage-user')->with(compact(['users']));
    }
}
