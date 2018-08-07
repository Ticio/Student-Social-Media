<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Response;
use View;
use App\Models\Contact;
use Purifier;
use \Crypt;

class ContactCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user($id = null);
      $basics =Contact::where('user_id', '=', Auth::user()->id)->first();
        if ($basics == null ) {
          $z = "Your Contact Details";
        }
        else {
            $ok = Contact::All();
            foreach ($ok as $key => $t) {
            $z = $t->contact;
              }
        }

        $show = false;
        if ($id != null){
            $friend = User::find($id);
            if ($friend){
                $show = true;
            }
    }
      return view('ui.contact', compact('user', 'show', 'id', 'z'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

                 $this->validate($request, [
                 'contact' => 'required',
                 'uref' => 'required|string',
                     ]);
                     /**********************************************************/
                       $decrypt_id = Crypt::decrypt($request->input('uref'));
                       $basics =Contact::where('user_id', '=', $decrypt_id)->first();
                      if ($basics === null)
                      {

                                 $validateForm = new Contact;
                                 //$validateForm->aboutme= Purifier::clean($request->input('aboutme'));
                                 $validateForm->contact = $request->input('contact');
                                 $validateForm->user_id= Crypt::decrypt($request->input('uref'));
                                 $validateForm->save();
                                 return back()->with('success','Saved successfully!');

                               }
                               else{
                                 DB::table('contacts')
                                     ->where('user_id','=', $decrypt_id)
                                       ->update([
                                         'contact' => $request->input('contact'),
                                       ]);
                                       return back()->with('success','Updated successfully!');

                                }
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
