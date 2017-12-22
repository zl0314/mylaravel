<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BackController;
use App\Model\Tag;
use Illuminate\Support\Facades\DB;

class ArticleController extends BackController
{
    public function __construct ()
    {
        parent::__construct();
        $this->assign( 'here', '文章管理' );
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index ( Request $request )
    {


        $where = [];
        if ( !empty( $request->get( 'category_id' ) ) ) {
            $where['category_id'] = $request->get( 'category_id' );
        }

        $data = Article::where( $where )->Title( $request->get( 'title' ) )->paginate( 15 );

        $vars = [ 'data' => $data ];

        return $this->display( $vars );
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return $this->display();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store ( ArticleRequest $request, Article $model )
    {
        $model->title = $request['title'];
        $model->category_id = $request['category_id'];
        $model->seourl = $request['seourl'];
        $model->intro = $request['intro'];
        $model->content = $request['content'];
        $model->thumb = $request['thumb'];
        $model->recommend_to_index = $request['recommend_to_index'];
        $model->author = $request['author'];
        $model->tags = implode( ',', $request['tags'] );
        $model->save();

        //保存标签
        $model->saveTags( $request );
        flash()->success( '文章添加成功' );

        return redirect( url( '/admin/article' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show ( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ( $id )
    {
        $model = Article::find( $id );

        $vars = [
            'model' => $model,
        ];
        $this->assign( $vars );

        return $this->display( $vars );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update ( ArticleRequest $request, $id )
    {

        $model = Article::find( $id );
        $model->title = $request['title'];
        $model->category_id = $request['category_id'];
        $model->seourl = $request['seourl'];
        $model->intro = $request['intro'];
        $model->content = $request['content'];
        $model->thumb = $request['thumb'];
        $model->recommend_to_index = $request['recommend_to_index'];
        $model->author = $request['author'];
        $model->tags = implode( ',', $request['tags'] );
        $model->save();

        //保存标签
        $model->saveTags( $request, false );

        flash()->success( '修改成功' );

        return redirect( url( '/admin/article' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Article $model, $id )
    {
        $model->destroy( $id );

        return response()->json( [ 'message' => '删除成功' ] );

    }
}
