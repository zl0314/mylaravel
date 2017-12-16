<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data = Tag::get();

        return view( 'admin.tags.index', [ 'data' => $data ] );
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view( 'admin.tags.create' );
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
        //
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
        $model->destroy($id);
        return response()->json(['message' => '删除成功']);
    }
}
