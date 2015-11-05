<?php

namespace App\Services\Util;

use Config;
use App\Services\API\Auth\AuthService;

class FileService {

    public function __construct(){
        $this->date_time_service = new DateTimeService;
        $this->auth_service      = new AuthService;
    }

    public function upload($file){
        $name = $this->date_time_service->getDateTime().'_'.$this->auth_service->getUser()->id;

        $upload_path = Config::get('paths.upload_image');

        $extension = $file->getClientOriginalExtension();
        $file_path = $name.'.'.$extension;
        $file->move($upload_path, $file_path);

        return $upload_path.'/'.$file_path;
    }
}