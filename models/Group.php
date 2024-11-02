<?php
class Group
{
    private $id;
    private $nameGroup;
    private $subject_one;
    private $subject_two;
    private $subject_three;



    public function getter_id()
    {
        return $this->id;
    }


    public function setter_id($id)
    {
        $this->id = $id;
    }

    public function getter_nameGroup()
    {
        return $this->nameGroup;
    }


    public function setter_nameGroup($nameGroup)
    {
        $this->nameGroup = $nameGroup;
    }

    public function getter_subject_one()
    {
        return $this->subject_one;
    }


    public function setter_subject_one($subject_one)
    {
        $this->subject_one = $subject_one;
    }

    public function getter_subject_two()
    {
        return $this->subject_two;
    }


    public function setter_subject_two($subject_two)
    {
        $this->subject_two = $subject_two;
    }

    public function getter_subject_three()
    {
        return $this->subject_three;
    }


    public function setter_subject_three($subject_three)
    {
        $this->subject_three = $subject_three;
    }
}
