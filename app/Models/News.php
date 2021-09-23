<?php declare(strict_types=1);

namespace App\Models;

use Faker\Factory;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';

    /*public function getNews(): Collection
    {
        //return DB::table($this->table)->get();
        return DB::table($this->table)->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)->find($id);
    }*/
}
