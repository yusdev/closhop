<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Storage;

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
        $provincias = Storage::disk('local')->get('provincias.json');
        $provincias = json_decode($provincias, true);
        // \Session::flash('flash_message','Office successfully added.');
        return view('back.account',['user'=>$user, 'provincias'=>$provincias]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'name' => 'required',
          'lastname'  => 'required',
          'address'  => 'required',
          'province'  => 'required',
          'city'  => 'required',
          'postalcode'  => 'required',
          'cellphone'  => 'required|numeric',
          'dni_cuit'  => 'required|numeric'
      ]);
      $vendor = User::findOrFail($id);
      $upload = [
        'name' => $request->input('name'),
        'lastname' => $request->input('lastname'),
        'address' => $request->input('address'),
        'province' => $request->input('province'),
        'city' => $request->input('city'),
        'postalcode' => $request->input('postalcode'),
        'cellphone' => $request->input('cellphone'),
        'dni_cuit' => $request->input('dni_cuit'),
        'complete' => 1
      ];
      $vendor->update($upload);
      $request->flash();
      session()->flash('saved');
      return redirect()->route('myaccount')->withInput();

    }
}
