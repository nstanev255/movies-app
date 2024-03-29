<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Movies extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'movies';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            Storage::delete(Str::replaceFirst('storage/', 'public/', $obj->image));
        });
    }

    public function setImageAttribute($value) {
        $arr_name = 'image';
        $dest_path = 'movie_covers';

        if($value == null) {
            Storage::delete(Str::replaceFirst('storage/', 'public/', $this->{$arr_name}));

            $this->attributes[$arr_name] = null;
        }

        $disk = "public";

        $this->uploadFileToDisk($value, $arr_name, $disk, $dest_path, $fileName = null);
        $this->attributes[$arr_name] = 'storage/' . $this->attributes[$arr_name];
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    // The genres relation...
    public function genres(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Genres::class, 'genre_movie', 'movie_id', 'genre_id');
    }

    // The producers relation...
    public function producers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Producers::class, 'producer_movie', 'movie_id', 'producer_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
