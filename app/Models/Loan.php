<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory; 
    
    
    public function user()
    {
        return $this->belongsTo(Loan::class);
    }

    public function loanCategory()
    {
        return $this->belongsToMany(LoanCategory::class);
    }



}
