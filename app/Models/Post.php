<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //要先指定這個model要對應處裡哪個資料表
    protected $table = 'posts';

    //若model不需要時間戳記的話
    //public $timestamps = false;

    //允許批量賦值的欄位,保護盲目存入資料庫用的,因為若盲目的存入使用者資訊,使用者就可以隨意修改任何模型的屬性
    protected $fillable = [
    	'title',
    	'excerpt',
        'content',
        'status',
        'comment_status',
        'modified_date',
        'modified_time',
        'parent'
    ];

    //此資料表有沒有關聯性欄位
    //每個post都有一個author_id要關聯
	protected function author(){
		return $this->belongsTo(User::class);
	}
    /*    					關聯法
	*	被關聯（user）                		關聯（posts）
	*	hasOne 一對一							belongsTo
	*	hasMany 一對多(一個user有很多post)		belongsTo
	*	belongsToMany 多對多					belongsToMany
	*/

}
