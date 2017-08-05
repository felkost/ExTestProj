<?php

use PHPUnit\Framework\TestCase;

class DataClassTest extends TestCase
{
    public function testData1()
    {
        $data = new Neigh();
        $this->assertEquals("empty",$data->name);
    }

    public function testData2()
    {
        $arr = [];
        for($i=0; $i<3; ++$i)
            $arr[] = Neigh::construct($i, "name".$i, $i/10.0);
        
        $data = new DataClass(1, new Neigh(), $arr);
        $data->data->name = "2. Працює Neigh в DataClass";
        
        //print_r($data);        
        $this->assertEquals("2. Працює Neigh в DataClass",$data->data->name);

        $Answer = $data->toJSON();

        $FOUT=fopen("DataClass.json","w");
        fputs($FOUT,$Answer);
        fclose($FOUT);

        $InputData = file_get_contents('DataClass.json');
        $dataNew = DataClass::fromJSON($InputData);
        //print_r($dataNew);

        $this->assertEquals($data,$dataNew);
    }

    public function testData3()
    {
        $this->assertEquals(true, true);
        
//        $arr = array( 'dog', 'cat', 'bee' ,'fox');
//        //print_r($arr);
//        
//        unset($arr[1]);
//        //print_r($arr);
//        
//        
//        for($i=0; $i<count($arr); ++$i)
//            echo $arr[$i]."\n";
//
//        $fruits = array(
//            'red' => 'Apples',
//            'yellow' => 'Bananas',
//            'beige' => 'Cantaloupes',
//            'brown' => 'Dates'
//        );
//        print_r($fruits);
//
//        unset($fruits['yellow']);
//        print_r($fruits);
    }
}
