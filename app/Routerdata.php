<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routerdata extends Model
{
    protected $table = 'router_details';
    //fillable fields
    protected $fillable = ['sap_id', 'host_name','loopback','mac_address','is_deleted','ip_address'];
    //custom timestamps name
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
