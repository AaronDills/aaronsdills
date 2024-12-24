<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guestbook';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'message'];

}
