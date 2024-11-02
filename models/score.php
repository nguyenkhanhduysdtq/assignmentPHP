<?php
class Score
{
    private $id;
    private $score_subject_one;
    private $score_subject_two;
    private $score_subject_three;



    public function getter_id()
    {
        return $this->id;
    }


    public function setter_id($id)
    {
        $this->id = $id;
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
}
