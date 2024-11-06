<?php
class UserField
{
    private $id;
    private $username;
    private $field_name;
    private $assigned_at;



    public function getter_id()
    {
        return $this->id;
    }


    public function setter_id($id)
    {
        $this->id = $id;
    }


    public function getter_field_name()
    {
        return $this->field_name;
    }


    public function setter_field_name($field_name)
    {
        $this->field_name = $field_name;
    }

    public function getter_assigned_at()
    {
        return $this->assigned_at;
    }


    public function setter_assigned_at($assigned_at)
    {
        $this->assigned_at = $assigned_at;
    }

    public function getter_username()
    {
        return $this->username;
    }



    public function setter_username($username)
    {
        $this->username = $username;
    }
}
