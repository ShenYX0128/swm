<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'type';

    protected $primaryKey = 'id';

    static public function getSubCates($cates=[],$pid=0)
    {
        if(empty($cates)){
            $cates=self::get();
        }

        $arr=[];
        foreach($cates as $k=>$v){
            if($v->pid==$pid){
               $v->sub=self::getSubCates($cates,$v->id);
               foreach($v->sub as $kk=>$vv)
               {
                $vv->sub=self::getSubCates($cates,$vv->id);
               }
                $arr[]=$v;
            }
        }
        return $arr;
    }

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];


}
