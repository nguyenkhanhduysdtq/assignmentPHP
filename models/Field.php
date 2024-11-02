<?php
class Field
{
    private $id;
    private $nameField;
    private $start_time;
    private $end_time;
    private $group; // model group
    private $status;



    public function getter_id()
    {
        return $this->id;
    }


    public function setter_id($id)
    {
        $this->id = $id;
    }

    public function getter_nameField()
    {
        return $this->nameField;
    }


    public function setter_nameField($name)
    {
        $this->nameField = $name;
    }




    public function getter_start_time()
    {
        return $this->start_time;
    }


    public function setter_start_time($start_time)
    {
        $this->start_time = $start_time;
    }

    public function getter_end_time()
    {
        return $this->end_time;
    }


    public function setter_end_time($end_time)
    {
        $this->end_time = $end_time;
    }




    public function getter_group()
    {
        return $this->group;
    }



    public function setter_group($group)
    {
        $this->group = $group;
    }



    public function getter_status()
    {
        return $this->status;
    }


    public function setter_status($status)
    {
        $this->status = $status;
    }
}
