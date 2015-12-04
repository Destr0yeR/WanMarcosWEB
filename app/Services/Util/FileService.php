<?php

namespace App\Services\Util;

use Config;
use App\Services\API\Auth\AuthService;
use App\Services\Backend\Auth\AuthService as _AuthService;

use Image;

class FileService {

    public function __construct($auth = 'api'){
        $this->date_time_service = new DateTimeService;
        
        if($auth == 'api')$this->auth_service   = new AuthService;
        else $this->auth_service                = new _AuthService;     
        
    }

    public function upload($file, $type = 'image'){

        $name = $this->date_time_service->getDateTime().'_'.$this->auth_service->getUser()->id.'_'.$type;
        $name = str_replace(' ', '', $name);

        $upload_path = Config::get('paths.upload_image');

        $extension = $file->getClientOriginalExtension();
        $file_path = $name.'.'.$extension;
        $file->move($upload_path, $file_path);

        $img = Image::make($upload_path.'/'.$file_path);
        
        $img->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save($upload_path.'/'.$file_path);

        return $upload_path.'/'.$file_path;
    }
}