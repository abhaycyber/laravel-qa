<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

protected $fillable = [

    'title', 'body'

];    
    
public function user(){

return $this->belongTo(User::class);

//after that You can achive this
//$question = Question::find(1);
//$question->user-name; or any other info user have

}


}
