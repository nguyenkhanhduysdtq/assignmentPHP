<?php
class FileProfile
{
    private $id;
    private $user;
    private $field;
    private $score_subject_one;
    private $score_subject_two;
    private $score_subject_three;
    private $status;




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

    public function getter_status()
    {
        return $this->status;
    }

    public function getter_score_subject_one()
    {
        return $this->score_subject_one;
    }


    public function setter_score_subject_one($score_subject_one)
    {
        $this->score_subject_one = $score_subject_one;
    }

    public function getter_score_subject_two()
    {
        return $this->score_subject_two;
    }


    public function setter_score_subject_two($score_subject_two)
    {
        $this->score_subject_two = $score_subject_two;
    }

    public function getter_score_subject_three()
    {
        return $this->score_subject_three;
    }


    public function setter_score_subject_three($score_subject_three)
    {
        $this->score_subject_three = $score_subject_three;
    }


    public function setter_status($status)
    {
        $this->status = $status;
    }
}
