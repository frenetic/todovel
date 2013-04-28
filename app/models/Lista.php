<?php

class Lista extends Eloquent {

    public function tasks() {
        return $this->hasMany('Task', 'list_id');
    }

}