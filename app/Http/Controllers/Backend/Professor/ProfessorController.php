<?php

namespace App\Http\Controllers\Backend\Professor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProfessorRepository;

use App\Services\Util\FileService;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->professor_repository = new ProfessorRepository;

        $this->file_service         = new FileService('backend');
    }


    public function index()
    {
        //
        $data = [
            'professors' => $this->professor_repository->paginated()
        ];

        return view('professors.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('professors.create');
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
        if($request->hasFile('image')){
            $image = $this->file_service->upload($request->file('image'));
        }
        else $image = null;

        $data = [
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
            'image'         => $image
        ];

        $professor = $this->professor_repository->store($data);

        return redirect()->route('professors.show', $professor->id);
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
        $data = [
            'professor' => $this->professor_repository->find($id),
        ];

        return view('professors.show', $data);
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
        $data = [
            'professor' => $this->professor_repository->find($id),
        ];

        return view('professors.edit', $data);
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
        if($request->hasFile('image')){
            $image = $this->file_service->upload($request->file('image'));
        }
        else $image = null;

        $data = [
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email')
        ];

        if($image){
            $data['image']  = $image;
        }

        $professor = $this->professor_repository->update($id, $data);

        return redirect()->route('professors.show', $professor->id);
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
        $this->professor_repository->delete($id);

        return redirect()->back();
    }
}
