<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'unsubscribed_status',
        'first_name',
        'last_name',
        'phone',
        'email',
        'sticky_phone_number_id',
        'twitter_id',
        'fb_messenger_id',
        'created_at',
        'updated_at',
        'time_zone',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'team_id' => 'integer',
        'sticky_phone_number_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the custom_attributes for the contact.
     */
    public function customAttributes()
    {
        return $this->hasMany(CustomAttribute::class);
    }
}
