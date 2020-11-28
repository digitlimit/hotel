<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';

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
        'room_type_id',//Room Type ID *Required
        'currency',//Price Currency (e.g. USD)
        'amount',//Room price e.g 200
        //'type',//Price Types *Required (regular or dynamic)
        //'weekday', //Weekday for Price e.g Tuesday
        //'date_from',//Dynamic price date range : from
        //'date_to'//Dynamic price date range : to
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
     * Room Type - Price based on room type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }
}
