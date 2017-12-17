<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;
use App\Http\Controllers\Admin\BackController;

class TagController extends BackController
{
    public function __construct ()
    {
        parent::__construct();
        $this->assign( 'here', '标签管理' );
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data = Tag::paginate(15);

        return $this->display( [ 'data' => $data ] );
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
    public function store ( TagRequest $request, Tag $model )
    {
        $model->create( $request->post() );
        flash()->success( '标签添加成功' );

        return redirect( url( 'admin/tag' ) );
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
        $model = Tag::find( $id );

        return $this->display( [
            'model' => $model,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update ( Request $request, $id )
    {
        $model = Tag::find( $id );
        $model->name = $request['name'];
        $model->save();

        flash()->success( '修改成功' );

        return redirect( url( '/admin/tag' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( $id, Tag $model )
    {
        $model->destroy( $id );

        return response()->json( [ 'message' => '删除成功' ] );
    }
}
