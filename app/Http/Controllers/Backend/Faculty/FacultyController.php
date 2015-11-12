<?php

namespace App\Http\Controllers\Backend\Faculty;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FacultyRepository;

use App\Services\Util\FileService;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->faculty_repository   = new FacultyRepository;
        $this->file_service         = new FileService('backend');
    }

    public function index()
    {
        //
        $data = [
            'faculties' => $this->faculty_repository->paginated()
        ];

        return view('faculties.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('faculties.create');
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
            'name'  => $request->input('name')
        ];

        $faculty = $this->faculty_repository->store($data);

        return redirect()->route('faculties.show', $faculty->id);
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
            'faculty' => $this->faculty_repository->find($id)
        ];

        return view('faculties.show', $data);
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
            'faculty' => $this->faculty_repository->find($id)
        ];

        return view('faculties.edit', $data);
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
            'name'  => $request->input('name')
        ];

        $faculty = $this->faculty_repository->update($id, $data);

        return redirect()->route('faculties.show', $faculty->id);
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
    }
}
