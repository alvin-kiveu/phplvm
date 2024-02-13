<?php

namespace Addons\MyAddon\Models;

use Illuminate\Database\Eloquent\Model;

class MyAddonModel extends Model
{
    protected $table = 'myaddon_table';
    protected $fillable = ['name', 'email'];
}
