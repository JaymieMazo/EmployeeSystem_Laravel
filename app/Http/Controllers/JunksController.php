<?php

Namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Company;
Use App\Department;
Use App\Section;
Use App\Employee;


class JunksController extends Controller
{   
    public function get_data(){
        $items=[];
        $deleted=[];
        $items["Company"]= Company::where('deleted_at' , '<>' , 'null')->count();
        $items["Department"]= Department::where('deleted_at' , '<>' , 'null')->count();
        $items["Section"]= Section::where('deleted_at' , '<>' , 'null')->count();
        $items["Employee"]= Employee::where('deleted_at' , '<>' , 'null')->count();

        $items["Company_del"]= Company::where('deleted_at' , '<>' , 'null')->get();
        $items["Department_del"]= Department::where('deleted_at' , '<>' , 'null')->get();
        $items["Section_del"]= Section::where('deleted_at' , '<>' , 'null')->get();
        $items["Employee_del"]= Employee::where('deleted_at' , '<>' , 'null')->get();
        return  $items;
        
    }


    public function retrieve_data(Request $req){
            
    }



}
