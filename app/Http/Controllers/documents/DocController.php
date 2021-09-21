<?php

namespace App\Http\Controllers\documents;
use App\Http\Controllers\Controller;

 use App\Models\Media;
// use App\Models\Devoirs_effectuer;
// use App\Models\Devoirs_et_correction;
use Illuminate\Http\Request;

class DocController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $medias = Media::all();
        $perPage = 10;
        return view('document.doc',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
     public function create()
    {
        //$id = Auth::user()->id;
        //$user= User::all();
       
    return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required|min:4|max:20',
            'description' => 'required|min:4',
            'file'=>'required|mimes:pdf,docx,doc,txt'
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $fich = $request->file('file')->getClientOriginalName();
            $data['file'] = $request->file('file')
                ->storeAs('files',$fich, 'public');
                $data['file'] = $fich;
        }

       
        Media::create($data);

        return redirect('/documents/create')->with('flash_message', 'Sujet  Ajouté Avec Succes !!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\View\View
    //  */
    // public function show($id)
    // {
    //     $devoir_effectuer = Devoirs_effectuer::findOrFail($id);

    //         $candidat = Candidat::where('id',$devoir_effectuer->candidat_id)->get()->first();
    //         $devoir_et_correction = Devoirs_et_correction::where('id',$devoir_effectuer->devoirs_et_correction_id)->get()->first();

    //     $ariane = ['devoir_effectuer','Details'];
    //     return view('admin.devoir.show', compact('devoir_et_correction','devoir_effectuer','ariane','candidat',));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\View\View
    //  */
    // public function edit($id)
    // {
    //     $candidat = Candidat::all();
    //     $devoir_effectuer = Devoirs_effectuer::findOrFail($id);
    //     $devoir_et_correction = Devoirs_et_correction::all();

    //     //$user=User::all();
    //     $ariane = ['devoir_et_correction','Modification'];
    //     return view('admin.devoir.edit', compact('devoir_et_correction','ariane','formateur'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
	// 		'nom_devoir' => 'required',
	// 		'description' => 'required',
    //         'formateur_id' => 'required',
	// 	]);

    //     $data = $request->all();

    //     if ($request->hasFile('fichier_devoir')) {
    //         $fich=$request->file('fichier_devoir')->getClientOriginalName();
    //         $data['fichier_devoir'] = $request->file('fichier_devoir')
    //             ->storeAs('uploads',$fich, 'public');
    //             $data['fichier_devoir']=$fich;
    //     }

    //     if ($request->hasFile('fichier_correction')) {
    //         $file=$request->file('fichier_correction')->getClientOriginalName();
    //         $data['fichier_correction'] = $request->file('fichier_correction')
    //             ->storeAs('uploads',$file, 'public');
    //             $data['fichier_correction']=$file;
    //     }

    //     $devoir_et_correction = Devoirs_et_correction::findOrFail($id);
    //     $devoir_et_correction->update($data);

    //     return redirect('admin/devoir/index')->with('flash_message', 'Devoir Modifier Avec succes!');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  */
    // public function destroy($id)
    // {
    //     Devoirs_et_correction::destroy($id);

    //     //return response()->json(['status'=>'candidat Supprimer avec Succes']);
    //     return redirect('admin/devoir/index')->with('del_message', 'Devoir Suprimer Avec succes!');
    // }
}
