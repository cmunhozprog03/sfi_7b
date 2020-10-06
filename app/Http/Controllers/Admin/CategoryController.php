<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryTableRequest;
use App\Models\Category;


class CategoryController extends Controller
{

    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors =\App\Models\Sector::all('id', 'name');

        return view('admin.categories.create', compact('sectors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryTableRequest $request)
    {
        $data = $request->all();


        $sectors = $request->get('sectors', null);


        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('categories');
            $data['image'] = $imagePath;
        }

        $category = $this->category->create($data);

        $category->sectors()->sync($sectors);

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$category = Category::find($id))
            return redirect()->back();

        $sectors =\App\Models\Sector::all('id', 'name');

        return view('admin.categories.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        $sectors = \App\Models\Sector::all('id', 'name');
        return view('admin.categories.edit', compact('category', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryTableRequest $request, $id)
    {
        $data = $request->all();
        $sectors = $request->get('sectors', null);


        $category = Category::find($id);
        $category->update($data);

        if(!is_null($sectors))

            $category->sectors()->sync($sectors);



        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('categories');
            $data['image'] = $imagePath;
        }



        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        $filename = $category->image;
        $category->delete();
        Storage::delete($filename);
        return redirect()->route('categorias.index');
    }
}
