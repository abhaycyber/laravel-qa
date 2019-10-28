<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

protected $fillable = [

    'title', 'body'

];    
    
public function user(){

return $this->belongsTo(User::class);

//after that You can achive this
//$question = Question::find(1);
//$question->user-name; or any other info user have

}


public function setTitleAttribute($value){

    $this->attributes['title'] = $value;
    $this->attributes['slug'] = str_slug($value);
    
       }
    

}
