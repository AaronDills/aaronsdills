<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProhibitedWords extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prohibited_words';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
