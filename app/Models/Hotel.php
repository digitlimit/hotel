<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotels';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        //Hotel Name
        'name',

        //Hotel Address
        'address',

        //Hotel City
        'city',

        //Hotel State
        'state',

        //Hotel Country
        'country',

        //Hotel Zip Code
        'zip_code',

        //Hotel Email
        'email',

        //Hotel Phone number
        'phone',
        //Hotel Image
        'image'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Rooms
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
