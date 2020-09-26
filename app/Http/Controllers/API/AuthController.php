<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Routerdata;
class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password
        ];

        if (auth() -> attempt($credentials)) {
            $user = Auth ::user();
            $success['token'] = $user -> createToken('AppName') -> accessToken;
            return response() -> json(['success' => $success], 200);
        } else {
            return response() -> json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator ::make($request -> all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator -> fails()) {
            return response() -> json(['error' => $validator -> errors()]);
        }

        $data = $request -> all();

        $data['password'] = Hash ::make($data['password']);

        $user = User ::create($data);
        $success['token'] = $user -> createToken('AppName') -> accessToken;

        return response() -> json(['success' => $success], 200);

    }

    public function user_detail()
    {
        $user = Auth ::user();
        return response() -> json(['success' => $user], 200);
    }
    public function router_detail(Request $request)
    {
        $validator = Validator ::make($request -> all(), [
            'ip_address' => 'required',
        ]);
        $postData = $request -> all();
        $sapId= $postData['ip_address'];
        $routerdata = RouterData ::where('ip_address', '=',$sapId) -> get();
        return response() -> json(['success' => $routerdata], 200);
    }
    public function create(Request $request){

        $this -> validate($request, [
            'sap_id' => 'required|unique:router_details|min:18|max:18',
            'host_name' => 'required|unique:router_details|max:14',
            'loopback' => 'required',
            'mac_address' => 'required',
        ]);

        $postData = $request -> all();
        $postData['ip_address']= $request->ip();
        Routerdata::create($postData);
        return response() -> json(['success' => "created successfully"], 200);
    }
    public function rangelist(Request $request){
        $validator = Validator ::make($request -> all(), [
            'ip_range_start' => 'required',
            'ip_range_end' => 'required',
        ]);
        $postData = $request -> all();
        $ipStart= $postData['ip_range_start'];
        $ipEnd= $postData['ip_range_end'];
        $routerdata = RouterData ::whereBetween('INET_ATON(ip_address)', array($ipStart, $ipEnd)) -> get();
        return response() -> json(['success' => $routerdata], 200);
    }
    public function updaterouter(Request $request){
        $this -> validate($request, [
            'sap_id' => 'required|min:18|max:18',
            'host_name' => 'required|max:14',
            'loopback' => 'required',
            'mac_address' => 'required',
        ]);

        RouterData::where('loopback', $request->loopback)
            ->update(['sap_id' => $request->sap_id],['host_name' => $request->host_name],['mac_address' => $request->mac_address]);
        return response() -> json(['success' => 'updated router details successfully'], 200);
    }

    public function listsaptype(Request $request){
        $validator = Validator ::make($request -> all(), [
            'sap_id' => 'required',
        ]);
        $postData = $request -> all();
        $sapId= $postData['sap_id'];
        $routerdata = RouterData ::where('sap_id', $sapId) -> get();
        return response() -> json(['success' => $routerdata], 200);
    }
    public function delete(Request $request){
        $validator = Validator ::make($request -> all(), [
            'ip_address' => 'required',
        ]);
        $postData = $request -> all();
        $sapId= $postData['ip_address'];
        Routerdata ::find($sapId) -> delete();
        return response() -> json(['success' => 'Successfully deleted record'], 200);
    }

}
