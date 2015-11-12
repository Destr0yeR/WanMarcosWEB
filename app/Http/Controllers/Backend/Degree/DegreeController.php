<?php

namespace App\Http\Controllers\Backend\Degree;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\DegreeRepository;
use App\Repositories\FacultyRepository;

use App\Services\Util\FileService;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->degree_repository    = new DegreeRepository;
        $this->faculty_repository   = new FacultyRepository;
        $this->file_service         = new FileService('backend');
    }

    public function index()
    {
        //
        $data = [
            'degrees' => $this->degree_repository->paginated()
        ];

        return view('degrees.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'faculties' => $this->faculty_repository->lists()
        ];

        return view('degrees.create', $data);
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
        $data = [
            'name'          => $request->input('name'),
            'faculty_id'    => $request->input('faculty_id')
        ];

        $degree = $this->degree_repository->store($data);

        return redirect()->route('degrees.show', $degree->id);
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
            'degree' => $this->degree_repository->find($id)
        ];

        return view('degrees.show', $data);
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
            'degree'    => $this->degree_repository->find($id),
            'faculties' => $this->faculty_repository->lists()
        ];

        return view('degrees.edit', $data);
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
        $data = [
            'name'          => $request->input('name'),
            'faculty_id'    => $request->input('faculty_id')
        ];

        $degree = $this->degree_repository->update($id, $data);

        return redirect()->route('degrees.show', $degree->id);
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
        $this->degree_repository->delete($id);

        return back();
    }
}
