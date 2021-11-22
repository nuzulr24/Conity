<?php (defined('BASEPATH')) or exit('No direct script access allowed');

function loadPath($dir, $filter = array(), $results = array())
{

    $directory = $dir . '/' . $filter['assets'] . '/' . $filter['path'] . '/';
    if (file_exists($directory) && is_dir($directory)) {

        $scan_arr = scandir($directory);
        $files_arr = array_diff($scan_arr, array('.', '..'));

        foreach ($files_arr as $file) {
            $file_path = $directory . $file;
            $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
            if ($file_ext == $filter['ext']) {
                $results[] = $file_path;
            }
        }
    } else {
        return null;
    }

    return $results;

}
