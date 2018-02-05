<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ { Category, User, Image };

use App\Repositories\Eloquent\EloquentImageRepository;

use Kurt\Repoist\Repositories\Eloquent\Criteria\EagerLoad;

class ImageController extends Controller
{
    
    
    protected $repository;
    /**
     * Create a new ImageController instance.
     *
     * @param  \App\Repositories\Eloquent\EloquentImageRepository $repository
     */
    public function __construct(EloquentImageRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function category($category)
    {
        //
        //
        
        $category = Category::where('slug', $category)->first();
        $images = Image::where('category_id', $category->id )->paginate(config('app.pagination'));
        return view('home', compact('images'))->with('category', $category);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('images.create');
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
        
        $request->validate([
            'image' => 'required|image|max:2000',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);
        $this->repository->store($request);
        return back()->with('ok', __("L'image a bien été enregistrée"));
        
        
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
        $id->delete();
        return back();
    }
    
    
    public function user(User $user)
    {
        $images = $this->repository->getImagesForUser($user->id);
        return view('home', compact('user', 'images'));
    }
    
    
    
    
}
