<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded = [];

    public function scopeTitle ( $query, $title )
    {
        if ( !empty( $title ) ) {
            return $query->where( 'title', 'like', '%' . $title . '%' );
        }
    }

    public function category ()
    {
        return $this->hasOne( 'App\Model\Category', 'id', 'category_id' );
    }

    /**
     * 保存标签
     *
     * @param $request
     */
    public function saveTags ( $request, $updateTagWeight = true )
    {
        //保存标签
        $tags = $request['tags'];
        $tags_data = [];
        foreach ( $tags as $tag ) {
            //查询Tag是否存在
            $tag_where = [ 'name' => $tag ];
            $tag_row = Tag::where( $tag_where )->first();
            if ( empty( $tag_row ) ) {
                $tags_data[] = [
                    'name'       => $tag,
                    'created_at' => date( 'Y-m-d H:i:s' ),
                    'updated_at' => date( 'Y-m-d H:i:s' ),
                ];
            } else {
                if($updateTagWeight){
                    Tag::where( $tag_where )->update( [ 'weight' => $tag_row->weight + 1 ] );
                }
            }
        }
        Tag::insert( $tags_data );
    }
}
