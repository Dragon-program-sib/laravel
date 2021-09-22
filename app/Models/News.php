<?php declare(strict_types=1);

namespace App\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';

    public function getNews(): array
    {
        return DB::table($this->table)->get();
    }

    public function getNewsById($id)
    {
        return DB::table($this->table)->find($id);
    }
}
