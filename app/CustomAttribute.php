<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomAttribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the contact of the custom_attribute.
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
