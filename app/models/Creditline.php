<?php

class Creditline extends Eloquent {

public function from()
    {
        return $this->belongsTo('User');
    }

public function to()
    {
        return $this->belongsTo('User');
    }

public function good_id()
    {
        return $this->belongsTo('Good');
    }

}
