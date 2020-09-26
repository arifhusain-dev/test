<?php

namespace App\Http\Controllers;
use App\Routerdata;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;


class RouterdataController extends Controller
{
    public function index()
    {
        //fetch all posts data
        $routerdata = RouterData ::where('is_deleted', '=',0) -> get();

        //pass posts data to view and load list view
        return view('routerdata.index',['routerdata' => $routerdata]);
    }

    public function details($id)
    {
        //fetch post data
        $post = Post ::find($id);

        //pass posts data to view and load list view
        return view('posts.details', ['post' => $post]);
    }

    public function add()
    {
        //load form view
        return view('routerdata.add');
    }

    public function insert(Request $request)
    {
        //validate post data
        $this -> validate($request, [
            'sap_id' => 'required|unique:router_details|min:18|max:18',
            'host_name' => 'required|unique:router_details|max:14',
            'loopback' => 'required',
            'mac_address' => 'required',
        ]);

        //get post data
        $postData = $request -> all();
        $postData['ip_address']= $request->ip();
        if (!filter_var($request->loopback, FILTER_VALIDATE_IP)) {
            $errorMs= "Loopback (ipv4) is not valid";
            Session ::flash('error_msg', $errorMs);
            return redirect() -> route('routerdata.index');
        }else if(!filter_var($request->mac_address, FILTER_VALIDATE_MAC)){
            $errorMs= "MAC address is not valid";
            Session ::flash('error_msg', $errorMs);
            return redirect() -> route('routerdata.index');
        }
        //insert post data
         Routerdata::create($postData);

        //store status message
        Session ::flash('success_msg', 'Post added successfully!');

        return redirect() -> route('routerdata.index');
    }

    public function edit($id)
    {
        //get post data by id
        $routerdata = Routerdata ::find($id);

        //load form view
        return view('routerdata.edit', ['routerdata' => $routerdata]);
    }

    public function update($id, Request $request)
    {
        //validate post data
        $this -> validate($request, [
            'sap_id' => 'required',
            'host_name' => 'required',
            'loopback' => 'required',
            'mac_address' => 'required',
        ]);

        //get post data
        $postData = $request -> all();

        //update post data
        Routerdata ::find($id) -> update($postData);

        //store status message
        Session ::flash('success_msg', 'Post updated successfully!');

        return redirect() -> route('routerdata.index');
    }

    public function delete($id)
    {
        //update delete status
        $softDelete= array();
        $softDelete['is_deleted']= 1; // soft delete
        Routerdata ::find($id) -> update($softDelete);
        //store status message
        Session ::flash('success_msg', 'Router data deleted successfully!');

        return redirect() -> route('routerdata.index');
    }
}

