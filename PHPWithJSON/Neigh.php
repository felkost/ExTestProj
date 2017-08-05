<?php

class Neigh implements JsonSerializable
{
    public $id;
    public $name;
    public $value;
    function __construct()
    {
        $this->id = 0;
        $this->name = "empty";
        $this->value = 0.0;
    }
    public static function construct($id, $name, $value)
    {
        $data = new Neigh();
        $data->id = $id;
        $data->name = $name;
        $data->value = $value;
        return $data;
    }
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value
        ];
    }
    
}