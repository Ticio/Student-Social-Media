<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Response;
use View;
use App\Models\Experience;
use Purifier;
use \Crypt;

class ExperienceCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user = Auth::user($id = null);
    $basics =Experience::where('user_id', '=', Auth::user()->id)->first();
      if ($basics == null ) {
        $z = "Tell us about your experience";
      }
      else {
          $ok = Experience::All();
          foreach ($ok as $key => $t) {
          $z = $t->experience;
            }
      }

      $show = false;
      if ($id != null){
          $friend = User::find($id);
          if ($friend){
              $show = true;
          }
      }

      return view('ui.experience', compact('user', 'show', 'id', 'z'));
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
                'experience' => 'required',
                'uref' => 'required|string',
                    ]);
                    /**********************************************************/
                      $decrypt_id = Crypt::decrypt($request->input('uref'));
                      $basics =Experience::where('user_id', '=', $decrypt_id)->first();
                     if ($basics === null)
                     {

                                $validateForm = new Experience;
                                //$validateForm->aboutme= Purifier::clean($request->input('aboutme'));
                                $validateForm->experience = $request->input('experience');
                                $validateForm->user_id= Crypt::decrypt($request->input('uref'));
                                $validateForm->save();
                                return back()->with('success','Saved successfully!');

                              }
                              else{
                                DB::table('experiences')
                                    ->where('user_id','=', $decrypt_id)
                                      ->update([
                                        'experience' => $request->input('experience'),
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
