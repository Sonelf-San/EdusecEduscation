<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    //

    protected $search = [
        'q' => null,
        'limit' => 20
    ];

    public function index(Request $request)
    {
        $search = $this->search;
        $admins = new Admin();

        if ($request->get('q')) {
            $search['q'] = $request->get('q');
            $admins = $admins->where('name', 'like', '%' . $search['q'] . '%');
        }

        if ($request->get('limit')) {
            $search['limit'] = $request->get('limit');
        }
        $admins = $admins->paginate($search['limit']);
        return view('admin.admin.index', compact('admins', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required'       => __('Champ de nom obligatoire'),
            'email.required' => __('Champ de courriel obligatoire'),
            'email.email'         => __('L\'email doit être et l\'email'),
            'email.unique'         => __('Cet e-mail a déjà été utilisé pour un autre administrateur'),
            'phone.required'         => __('Champ de téléphone requis'),
            'password.required'         => __('Champ de mot de passe obligatoire'),
            'password.min'         => __('Le mot de passe doit être composé de 8 caractères'),
            'password.confirmed'         => __('La confirmation du mot de passe ne correspond pas'),
        ];

        $validator = Validator::make($request->all(), [
            'name'         => 'required',
            'email'         => ['required', 'string', 'email', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone'         => ['required', 'string'],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = \Hash::make($request->password);
        $admin = \App\Admin::create($input);
        return redirect()->to(route('admin.administrator.index'))->with('success', "admin created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Admin::findOrFail($id);
        return view('admin.admin.show', compact('user'));
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

        session()->flash('success', 'Mise à jour réussie');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        if($user->super_admin){
            session()->flash('error', 'L\'action ne peut pas être effectuée sur le super administrateur');
        }else{
            if($user->id == \Auth::user()->id){
                session()->flash('error', 'Impossible d\'effectuer cette action sur vous-même');
            }else{
                $user->delete();
                session()->flash('success', 'Admin supprimé avec succès');
            }
        }
        return redirect()->to(route('admin.administrator.index'));
    }
}
