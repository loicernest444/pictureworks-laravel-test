<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return view
     */
    public function show($id)
    {
        $user = User::find($id);
        if(isset($user)){
            $user->comments = str_replace('\n', '<br>', $user->comments);
            return view('user-details')->with('user', $user);
        } else {
            return view('404')->with('message', 'NO such user with id ' . $id);
            // return response()->json([
            //     'status' => 'Error',
            //     'message' => 'NO such user with id ' . $id
            // ], 404);
        }
    }


    function mysql_escape($tab) {
        if(is_array($tab))
            return array_map(__METHOD__, $tab);
    
        if(!empty($tab) && is_string($tab)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $tab);
        }
    
        return $tab;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:users,id',
            'password' => ['required', function ($attribute, $value, $fail) {
                                if($value != '720DF6C2482218518FA20FDC52D4DED7ECC043AB') {
                                    $fail('Invalid password');
                                }
                            }],
            'comments' => 'required'
        ]);

        if($validator->fails()){
            return $this->error('Error', Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }

        $user = User::find($validator->validated()['id']);
        
        $user->updateOrFail([
            'comments' => $user->comments != '' ? $user->comments . '\n' . $validator->validated()['comments'] : $validator->validated()['comments']
        ]);
        
        
        if($request->header('content-type') == "application/json")
            return $this->success($user, "User comments updated sucessfully!");
        else return Redirect::route('user-details', ['id' => $validator->validated()['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
