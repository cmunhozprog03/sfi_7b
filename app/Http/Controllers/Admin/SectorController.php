<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Http\Requests\SectorTableRequest;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    private $sector;

    public function __construct(Sector $sector)
    {
        $this->sector = $sector;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = $this->sector->paginate(5);
        return view('admin.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SectorTableRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorTableRequest $request)
    {
        $data = $request->all();


        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('sectors');
            $data['image'] = $imagePath;
        }


        $sector = $this->sector->create($data);
        return redirect()->route('setores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!$sector = Sector::find($id))
            return redirect()->back();

        return view('admin.sectors.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = Sector::find($id);
        return view('admin.sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectorTableRequest $request, $id)
    {
        $data = $request->all();

        $sector = Sector::find($id);



        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('sectors');
            $data['image'] = $imagePath;
        }

        $sector->update($data);

        return redirect()->route('setores.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sector = Sector::find($id);
        $filename = $sector->image;
        $sector->delete();
        Storage::delete($filename);
        return redirect()->route('setores.index');

        /*
        if ( $sector->delete() ) {
            // Deleta a imagem (Não esqueça: use Illuminate\Support\Facades\Storage;)
            Storage::delete("public/sectors/{$sector->image}"); // true ou false

            // Redireciona, informando que deu tudo certo!
            return redirect()->route('setores.index')->with('success', 'Sucesso ao deletar!');
        }
        */





    }

    /*
     * Método Search
     */
    /*
    public function search(Request $request)
    {
        $sectors = $this->sector->search($request->filter);

        return view('admin.sectors.index', compact('sectors'));
    }
*/

}
