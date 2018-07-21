<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'performance', 'operation'
    ];

    public function getPerformanceAttribute($performance)
    {
    	
    	switch ($performance) {
    		case 1:
    			return 'ADP';
    			break;
    		
    		case 2:
    			return 'Ascenso';
    			break;
    		
    		
    		case 3:
    			return 'Aumento de sueldo';
    			break;
    		
    		case 4:
                return 'Trabajo extraordinario';
    			break;
    		
    		case 5:
                return 'Horas extras';
    			break;

            case 6:
                return 'Falsedad de material';
                break;

            case 7:
                return 'Amonestación escrita';
                break;

            case 8:
                return 'Ausencia sin permiso';
                break;
    	}
    }
    	
}
