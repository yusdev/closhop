<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('account')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
      $vendor = User::findOrFail($id);
      $upload = [
        'name' => $request->input('name'),
        'lastname' => $request->input('lastname'),
        'address' => $request->input('address'),
        'province' => $request->input('province'),
        'location' => $request->input('location'),
        'postalcode' => $request->input('postalcode'),
        'cellphone' => $request->input('cellphone'),
        'dni_cuit' => $request->input('dni_cuit')
      ];
      $vendor->update($upload);
      $request->flash();
      return redirect('/micuenta')->withInput();
    }
}
