<?php

namespace App\Http\Controllers\API\Professor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\SubjectRepository;
use App\Repositories\SubjectCommentRepository;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->subject_repository = new SubjectRepository;
        $this->comment_repository = new SubjectCommentRepository;
    }

    public function index(Request $request)
    {
        //

        $page       = $request->input('page', 1);
        $per_page   = $request->input('per_page', config('constants.per_page'));

        $data = [
            'professor_id'  => $request->input('professor_id')
        ];

        $subject = $this->subject_repository->getAllPaginated($data, $page, $per_page);

        return response()->json(['subjects' => $subject]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data = [
            'professor_id'  => $request->input('professor_id')
        ];

        $subject = $this->subject_repository->getById($id, $data);

        return response()->json($subject);
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

    public function comments(Request $request){
        $data = [
            'professor_id'  => $request->input('professor_id'),
            'subject_id'    => $request->input('subject_id')
        ];

        $page       = $request->input('page');
        $per_page   = $request->input('per_page');

        $comments = $this->comment_repository->getAllPaginated($data, $page, $per_page);

        return response()->json(['comments' => $comments]);
    }
}
