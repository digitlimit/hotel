<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

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
        'name',//Room Name (e.g. A1, B2, C4)
        'hotel_id',//Hotel  ID : ID of hotel [room belongsTo hotel]
        'room_type_id',//Room Type : ID of room type [room hasOne room_type]
        //'room_capacity_id',//Room Capacity : ID of room capacity [room hasOne room_capacity]
        'image',//Room Image
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
     * Room Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }


    /**
     * Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
