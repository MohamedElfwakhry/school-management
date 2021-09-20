<?php

use Illuminate\Support\Facades\Config;

function upload($file, $dir)
{
    $image = time() . '.' . $file->getClientOriginalExtension();
    $file->move('uploads' . '/' . $dir, $image);
    return $image;
}
