<?php
// +----------------------------------------------------------------------
// | 文件: index.php
// +----------------------------------------------------------------------
// | 功能: mysql数据库表model
// +----------------------------------------------------------------------
// | 时间: 2021-12-01 10:20
// +----------------------------------------------------------------------
// | 作者: rangangwei<gangweiran@tencent.com>
// +----------------------------------------------------------------------

namespace App;

use Illuminate\Database\Eloquent\Model;

// Counters 定义数据库model
class Counters extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'count', 'createdAt', 'updateAt',
    ];

    protected $table = 'Counters';
    public $timestamps = false;
    protected $primaryKey = 'id';
}