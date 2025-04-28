<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Post\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['gallery', 'category'])->get();
        return $posts;
        return view('auth.posts.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('auth.posts.create', [ 'categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        // Validando os dados
        try{
            // Iniciando a transação                            
            DB::beginTransaction();
            // Gravando o arquivo
            // Verificando se o arquivo foi enviado 
            if($request->has('file')){  
            // Pegando o arquivo
            $file = $request->file;
            // Pegando o nome original do arquivo
            $fileName = time(). $file->getClientOriginalName();
            // Variavel para o caminho da imagem
            $imagePath = public_path('images/posts');
            // Armazenando o arquivo
            $file -> move($imagePath, $fileName);

            $gallery = Gallery::create([
                'image' => $fileName
            ]);
        }
        // Criando o post
        Post::create([
            'category_id' => $request->category,
            'is_publish' => $request->is_publish,
            'title' => $request->title,
            'description' => $request->description,
            'gallery_id' => $gallery->id
        ]);
            DB::commit();
        }
        // Caso ocorra algum erro, desfaz as transações
        catch(\Exception $ex){
            DB::rollBack();
            dd($ex->getMessage());
        }
        // alerta de criacao de post
        $request -> session()->flash('alert-success', 'Post Created Successfully');
        // Volta ao index
        return to_route('posts.index');
        //return 'success';
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
    }
}
