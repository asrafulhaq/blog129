<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Photo update 
     */
    public function fileUpload($request, $field_name, $path, string $data = NULL)
    {
        if ($request->hasFile($field_name)) {
            $file = $request->file($field_name);
            $unique_name = md5(time() . rand()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $unique_name);

            if (file_exists($path . $data) && $data != NULL) {
                unlink($path . $data);
            }
        } else {
            $unique_name = $data;
        }

        return $unique_name;
    }

    /**
     * Make slug 
     */
    public function makeSlug($title)
    {
        $lowerdata = strtolower($title);
        return str_replace(' ', '-', $lowerdata);
    }

    /**
     * Array to JSON Convert 
     */
    public function jsonencode(array $arr)
    {
        return json_encode($arr);
    }


    /**
     * JSON  to Array  Convert 
     */
    public function jsondecode(string $str, $type = false)
    {
        return json_decode($str, $type);
    }

    /**
     * Video link modify 
     */
    public function videoLink($link)
    {

        if (str_contains($link, 'youtube.com')) {
            return str_replace('watch?v=', 'embed/', $link);
        } else if (str_contains($link, 'vimeo.com')) {
            return str_replace('vimeo.com', 'player.vimeo.com/video', $link);
        } else {
            return 'Invalid Link';
        }
    }
}
