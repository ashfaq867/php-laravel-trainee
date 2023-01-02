<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Events\SendMail;
use App\Events\UserSubscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Auth;

class LoginController extends Controller
{
    public function Index(){
        $data =  user::all();
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ];
        return response()->json($responseArray,200);
    }
    public function store(Request $request){


            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'cnfrm_password'=>'required|same:password'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(),202);
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);

            $user = User::create($input);
            $token = $user->createToken('Token')->accessToken;

            return response()->json([ 'user' => $user, 'token' => $token]);
            event(new UserSubscribed($request->email, $request->name));

        }
        //login
        public function login(Request $request){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user =Auth::user();
                $responseArray['token'] = $user->createToken('MyApp')->accessToken;
                $responseArray['name'] = $user->name;

                return response()->json($responseArray,200);

            }else{
                return response()->json(['error'=>'Unauthenticated'],203);
            }
        }
        public function logout(Request $request){
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
            return response($response, 200);
        }
        public function destroy($id){
            $user=User::find($id);
            $user->delete();
            $response = ['message' => 'Record Delete successfuly!'];
            return response($response, 200);

}


}
