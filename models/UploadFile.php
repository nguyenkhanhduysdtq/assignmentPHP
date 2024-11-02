<?php
class UploadFile
{
    private $id;
    private $filePath;
    private $fileType;
    private $fileSize;
    private $uploaded_at;



    public function getter_id()
    {
        return $this->id;
    }


    public function setter_id($id)
    {
        $this->id = $id;
    }

    public function getter_filePath()
    {
        return $this->filePath;
    }


    public function setter_filePath($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getter_fileType()
    {
        return $this->fileType;
    }


    public function setter_fileType($fileType)
    {
        $this->fileType = $fileType;
    }

    public function getter_fileSize()
    {
        return $this->fileSize;
    }


    public function setter_fileSize($fileSize)
    {
        $this->fileSize = $fileSize;
    }

    public function getter_uploaded_at()
    {
        return $this->uploaded_at;
    }


    public function setter_uploaded_at($uploaded_at)
    {
        $this->uploaded_at = $uploaded_at;
    }
}
