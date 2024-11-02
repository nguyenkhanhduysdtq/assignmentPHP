<?php
class UserField
{
    private $id;
    private $user;
    private $field;
    private $assigned_at;




    public function getter_id()
    {
        return $this->id;
    }


    public function setter_id($id)
    {
        $this->id = $id;
    }

    public function getter_user()
    {
        return $this->user;
    }


    public function setter_user($user)
    {
        $this->user = $user;
    }

    public function getter_field()
    {
        return $this->field;
    }


    public function setter_field($field)
    {
        $this->field = $field;
    }

    public function getter_assigned_at()
    {
        return $this->assigned_at;
    }


    public function setter_assigned_at($assigned_at)
    {
        $this->assigned_at = $assigned_at;
    }
}
