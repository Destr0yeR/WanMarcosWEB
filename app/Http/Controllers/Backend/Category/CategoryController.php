<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CategoryRepository;

use App\Services\Util\FileService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->category_repository = new CategoryRepository;

        $this->file_service         = new FileService('backend');
    }

    public function index()
    {
        //
        $data = [
            'categories' => $this->category_repository->paginated()
        ];

        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
        $image = $request->file('image');

        $image = $this->file_service->upload($image);

        $data = [
            'name'              => $request->input('name'),
            'default_image_url' => $image
        ];

        $category = $this->category_repository->store($data);

        return redirect()->route('categories.show', $category->id);
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
            'category'             => $this->category_repository->find($id)
        ];

        return view('categories.show', $data);
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
            'category'             => $this->category_repository->find($id)
        ];

        return view('categories.edit', $data);
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
            $image = $request->file('image');
                
            $image = $this->file_service->upload($image);

            $data['default_image_url'] = $image;
        }

        $data['name'] = $request->input('name');

        $category = $this->category_repository->update($id, $data);

        return redirect()->route('categories.show', $category->id);
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
