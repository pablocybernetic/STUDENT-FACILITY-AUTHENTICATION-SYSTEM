<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Student;
use Illuminate\Http\Request;
// 
class StudentController extends Controller{
     //should not be used by a mobile client
    public function index(Request $request){
        if(is_null($request->reg_no)){
            return Student::All();  
        }else{
            return Student::where('reg_no',$request->reg_no)->get();       
        }                  
    }     

    
    public function store(Request $request){
        //we will have to pass this as JSON data
        return Student::create([
            'reg_no'=> $request->input('reg_no'),
            'name'=> $request->input('name'),
            'campus'=> $request->input('campus'),
            'Department'=> $request->input('Department'),
            'Faculty'=> $request->input('Faculty'),
            'course'=> $request->input('course')
        ]);
    }    
 

   
    public function update(Request $request, Student $student){
        $student -> update();

        // $student -> update([
        //     // 'reg_no'=> $request->input('reg_no'),
        //     // 'name'=> $request->input('name'),
        //     // 'campus'=> $request->input('campus'),
        //     // 'Department'=> $request->input('Department'),
        //     // 'Faculty'=> $request->input('Faculty'),
        //     // 'course'=> $request->input('course')
        // ]);         
        return $student;
    }

    
    public function destroy(Student $student){
        $student -> delete();
        return response(null, 204);
    }
}
