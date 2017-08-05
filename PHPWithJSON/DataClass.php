<?php

//require_once "Neigh.php";

class DataClass implements JsonSerializable
{
    public $id;
    public $data;
    public $listNeigh;

    function __construct($id, $data, $list)
    {
        $this->id = $id;
        $this->data = $data;
        $this->listNeigh = $list;
        
        $x = new Neigh();
        $x->name = "1. Працює Neigh в DataClass";
        $c = $x->name;
        echo "$c\n";
    }
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'data' => $this->data,
            'listNeigh' => $this->listNeigh
        ];
    }
    public function toJSON(){
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }

    public static function fromJSON($dataJson){
        $dataNew = json_decode($dataJson);
        $dNeigh = Neigh::construct($dataNew->data->id, $dataNew->data->name, $dataNew->data->value);
        $listNeigh = [];
        foreach($dataNew->listNeigh as $elem) {
            $listNeigh[] = Neigh::construct($elem->id, $elem->name, $elem->value);
        }
        $dataDataClass = new DataClass($dataNew->id, $dNeigh, $listNeigh);
        return $dataDataClass;
    }
}