<?php

namespace App\Http\Controllers\Backend\Place;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PlaceRepository;

use App\Services\Util\FileService;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->place_repository = new PlaceRepository;

        $this->file_service         = new FileService('backend');
    }

    public function index()
    {
        //
        $data = [
            'places' => $this->place_repository->paginated()
        ];

        return view('places.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('places.create');
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
            'image'     => $image,
            'name'      => $request->input('name'),
            'latitude'  => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ];

        $place = $this->place_repository->store($data);

        return redirect()->route('places.show', $place->id);
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
            'place' => $this->place_repository->find($id)
        ];

        return view('places.show', $data);
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
            'place' => $this->place_repository->find($id)
        ];

        return view('places.edit', $data);
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
            'name'      => $request->input('name'),
            'latitude'  => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ];

        if($request->hasFile('image')){
            $image = $this->file_service->upload($request->file('image'));
            $data['image'] = $image;
        }

        $place = $this->place_repository->update($id, $data);

        return redirect()->route('places.show', $place->id);
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
        $this->place_repository->delete($id);

        return redirect()->back();
    }
}
