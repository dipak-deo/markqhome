<?php
namespace App\Traits;

trait FilesystemTrait{
    public static function getFile($id,$field="image")
    {
        $model = class_basename(get_class());  
        $modelnamespace = '\App\Models\\'.$model;
        $findData = $modelnamespace::findorFail($id); 
        return $findData->$field;
    }

    public static function deleteFile($file)
    {
        $filepath = public_path($file);
        if (file_exists($filepath) && is_file($filepath)) {
            unlink($filepath);
            return true;
        }else{
            return true;
        }
    }

    public static function uploadFile($files,$custom_path='')
    {
        $model = class_basename(get_class());
 
        
        if (is_array($files)) {
            $path = '/uploads'.$custom_path.'/'.strtolower($model).'/';
            $uploadedPaths = [];
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $filepath = $path . $filename;
                    $file->move(public_path($path), $filename);
                    $uploadedPaths[] = $filepath;
                } else {
                    $uploadedPaths[] = NULL;
                }
            }
            return $uploadedPaths;
        } else {
            $path = '/uploads'.$custom_path.'/'.strtolower($model).'/';
            if ($files->isValid()) {
                $extension = $files->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $filepath = $path . $filename;
                $files->move(public_path($path), $filename);
                return $filepath;
            } else {
                return NULL;
            }
        }
    }
}