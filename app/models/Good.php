<?php

class Good extends Eloquent {


public function goods()
    	{
        	return $this->hasMany('Creditline');
    	}

}
