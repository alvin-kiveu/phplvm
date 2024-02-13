<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Roles extends Model
{
   // Define the table associated with the model (optional)
   protected $table = 'roles';

   // Define fillable attributes (optional)
   protected $fillable = [
       'name',
       // other attributes...
   ];


}
