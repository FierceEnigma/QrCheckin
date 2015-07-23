<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Qrcode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode as Qr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QrcodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qrcodes = Qrcode::all();

        return view('qrcodes.dashboard', compact('qrcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    public function download() {

        $id = Input::get('id');
        $fileName = Qrcode::find($id)->qrcode;
        return response()->download('./qrcodes/'.$fileName);
    }

    public function preview() {

        $description = Input::get('description');

        return(Qr::margin(0)->size(180)->generate($description));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required']);

        $fileName = Carbon::now() . '.jpg';
        $user = Auth::user();
        $request->merge(['qrcode' => $fileName, 'user_id' => $user->id]);

        $qrcode = Qrcode::create($request->all());

        Qr::format('jpg')->size(1000)->generate(getenv('SITE_URL') . 'promotions/'.$qrcode->id, './qrcodes/'.$fileName);

        return redirect('/dashboard')->with('message', 'Qrcode successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $qrcode = Qrcode::find($id);
        return response()->json($qrcode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {

        $this->validate($request, ['name' => 'required', 'description' => 'required']);


        $qrcode = Qrcode::find($id);
        $qrcode->update($request->all());
        $qrcode->save();
        return with('message', 'Qrcode successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $qrcode = Qrcode::find($id);

        Qrcode::destroy($id);


        return redirect('/dashboard')->with('message', $qrcode->name . ' deleted.');
    }
}
