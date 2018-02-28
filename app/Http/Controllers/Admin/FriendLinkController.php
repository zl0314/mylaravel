<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\FriendLinkRequest;
use App\Model\FriendLink;
use App\Http\Controllers\Admin\BackController;

class FriendLinkController  extends BackController
{

    public function __construct ()
    {
        parent::__construct();
        $this->assign( 'here', ' 友情链接管理' );
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data = \App\Model\FriendLink::paginate(15);

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
     * @param FriendLinkRequest $request
     * @param FriendLink        $model
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store ( FriendLinkRequest $request, FriendLink $model )
    {
        $model->create( $request->post() );
        flash()->success( '文章分类添加成功' );

        return redirect( url( 'admin/friend_link' ) );
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
        $model = FriendLink::find( $id );

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
        $model = FriendLink::find( $id );
        $model->name = $request['name'];
        $model->save();

        flash()->success( '修改成功' );

        return redirect( url( '/admin/friend_link' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( $id, FriendLink $model )
    {
        $model->destroy( $id );

        return response()->json( [ 'message' => '删除成功' ] );
    }
}
