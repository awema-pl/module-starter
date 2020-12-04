<?php

namespace AwemaPL\Starter\Sections\Creators\Models;

use Illuminate\Database\Eloquent\Model;
use AwemaPL\Starter\Sections\Creators\Models\Contracts\History as HistoryContract;

class History extends Model implements HistoryContract
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('starter.database.tables.starter_histories');
    }


}
