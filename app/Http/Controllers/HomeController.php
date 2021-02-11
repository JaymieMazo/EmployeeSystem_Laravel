<?php

Namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Company;
Use App\Department;
Use App\Section;
Use App\Employee;
Use App\User;


class HomeController extends Controller
{   
    public function get_data(){
        $items=[];
        $items["Company"]= Company::where('deleted_at' ,  null)->count();
        $items["Department"]= Department::where('deleted_at' ,null)->count();
        $items["Section"]= Section::where('deleted_at' ,null)->count();
        $items["Employee"]= Employee::where('deleted_at' , null)->count();
        $items["User"]= User::where('deleted_at' , null)->count();
        $items["Admin"]= User::where('deleted_at' , null)->count();

        return  $items;
        
    }

    public function retrieve_data(Request $req){
            
    }
}
