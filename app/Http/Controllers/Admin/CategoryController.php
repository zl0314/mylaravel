<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use App\Http\Controllers\Admin\BackController;

class CategoryController extends BackController
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data = Category::get();

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
     * @param CategoryRequest $request
     * @param Category        $model
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store ( CategoryRequest $request, Category $model )
    {
        $model->create( $request->post() );
        flash()->success( '文章分类添加成功' );

        return redirect( url( 'admin/category' ) );
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
        $model = Category::find( $id );

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
        $model = Category::find( $id );
        $model->name = $request['name'];
        $model->save();

        flash()->success( '修改成功' );

        return redirect( url( '/admin/category' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( $id, Category $model )
    {
        $model->destroy( $id );

        return response()->json( [ 'message' => '删除成功' ] );
    }
}
