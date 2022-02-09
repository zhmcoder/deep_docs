<?php


namespace Andruby\DeepDocs\Models;


use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author()
    {
        return $this->hasOne(AdminUser::class, 'id', 'oper_user_id')
            ->select(['id', 'name']);
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')
            ->select(['id', 'title']);
    }
}