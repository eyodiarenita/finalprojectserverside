<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->keywords;
        $totalrow = 10;
        if(strlen($keywords)){
            $data = project::where('nim', 'like', "%$keywords%")
                    ->orWhere('name', 'like', "%$keywords%")
                    ->orWhere('major', 'like', "%$keywords%")
                    ->paginate($totalrow);
        } else{
            $data = project::orderBy('nim','desc')->paginate($totalrow);
        }
        
        return view('project.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nim',$request->nim);
        Session::flash('name',$request->name);
        Session::flash('major',$request->major);

        $request->validate([
            'nim'=>'required|numeric|unique:project,nim',
            'name'=>'required',
            'major'=>'required',
        ],[
            'nim.numeric'=>'nim must be in numeric form',
            'nim.unique'=> 'The filled nim already exists in the database.',
        ]);
        $data = [
            'nim'=>$request->nim,
            'name'=>$request->name,
            'major'=>$request->major,
        ];
        project::create($data);
        return redirect()->to('final')->with('success', 'successfully added data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim) {
        $data = project::where('nim', $nim)->firstOrFail();
        return view('project.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $nim)
    {
         $request->validate([
             'name'=>'required',
             'major'=>'required',
         ]);
         
         $item = Project::where('nim', $nim)->firstOrFail();
         $item->name = $request->name;
         $item->major = $request->major;
         $item->save();
         
        //project::where('nim', $nim)->update($data);
        return redirect()->to('final')->with('success', 'successfully updated the data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim)
    {
       project::where('nim',$nim)->delete();
       return redirect()->to('final')->with('success','succeeded in deleting data');
    }
}
