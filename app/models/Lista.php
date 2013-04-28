<?php

class Lista extends Eloquent {

    public funtion tasks() {
        return $this->hasMany('Task', 'list_id');
    }

}