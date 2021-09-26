<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    /*public function getCategories()
    {
        //return DB::select("SELECT id, title, description, created_at FROM {$this->table}");

        return DB::select("SELECT id, title, description, created_at FROM {$this->table} WHERE id = :id", [
            'id' => 2
        ]);

        return DB::table($this->table)->get();
    }*

    public function getCategoryById(int $id)
    {
        return DB::table($this->table)->find($id);
    }*/

    // We say to update everything except the id field.
    protected $guarded = [
        'id'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
