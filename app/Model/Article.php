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

    /**
     * 得到推荐到首页的文章
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeRecommend ( $query )
    {
        return $query->where( 'recommend_to_index', 1 );
    }

    public function category ()
    {
        //return $this->belongsTo( 'App\Model\Category', 'category_id' );
        return $this->belongsTo( 'App\Model\Category' );
    }

    public function tags ()
    {
        return $this->morphToMany( 'App\Model\Tag', 'tagable' );
    }

    /**
     * 保存标签
     *
     * @param $request
     */
    public function saveTags ( $model, $request, $updateTagWeight = true )
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
                if ( $updateTagWeight ) {
                    Tag::where( $tag_where )->update( [ 'weight' => $tag_row->weight + 1 ] );
                }
            }
        }

        //再重新插入
        if ( !empty( $tags_data ) ) {
            $model->tags()->createMany( $tags_data );
        }
    }

    //编辑文章时，获取标签字符串
    public function getArticleTags ( $model )
    {
        $tag_str = '';
        $con = ',';
        foreach ( $model->tags as $tag ) {
            $tag_str .= $con . $tag->name;
        }

        return $tag_str;
    }
}
