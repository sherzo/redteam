<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Chat extends Model
{
    use SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transmitter_id', 'receiver_id'
    ];    

    public function transmitter()
    {
    	return $this->belongsTo('App\User', 'transmitter_id');
    }

    public function receiver()
    {
    	return $this->belongsTo('App\User', 'receiver_id');
    }

    public function messages()
    {
    	return $this->hasMany(Message::class);
    }

    public static function getOrCreate(User $transmitter, User $receiver)
    {
    	$chat = self::where('transmitter_id', $transmitter->id)
    		->where('receiver_id', $receiver->id)
    		->orWhere(function($query) use ($transmitter, $receiver){
    			$query->where('transmitter_id', $receiver->id)
    			->where('receiver_id', $transmitter->id);
    		})->first();

    	if(!$chat) {
    		$chat = self::create([
    			'transmitter_id' => $transmitter->id,
    			'receiver_id' => $receiver->id
    		]);
    	}
    	
    	return $chat;
    }
}
