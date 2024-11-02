<?php
class FildProfile
{
    private $id;
    private $user;
    private $field;
    private $score;
    private $uploadFile;
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


    public function setter_status($status)
    {
        $this->status = $status;
    }

    public function getter_score()
    {
        return $this->score;
    }


    public function setter_score($score)
    {
        $this->score = $score;
    }

    public function getter_upload_file()
    {
        return $this->uploadFile;
    }


    public function setter_upload_file($uploadFile)
    {
        $this->uploadFile = $uploadFile;
    }
}
