<?php
class Db_log
{
    function logQueries()
    {
        $CI = & get_instance();
        $uri = $CI->uri->segment(1);
        if($uri == null) {
            $url = 'default';
        } else {
            $url = $CI->uri->segment(1);
        }
        if(is_dir(APPPATH . 'logs/'.$url.'Controller'))
        {
            $filepath = APPPATH . 'logs/'.$url.'Controller/queryLog.txt';
            $handle = fopen($filepath, "a+");
            $query = "[".date('j F Y - H:i:s')." / ".$_SERVER['REMOTE_ADDR']." ] From " . $url . "Controller" . " has response: " . $CI->router->method . " => " . http_response_code();
            fwrite($handle, $query . "\n");
            fclose($handle);
        } else {
            if($CI->uri->segment(1) != null)
            {
                mkdir(APPPATH . 'logs/'.$CI->uri->segment(1).'Controller');
            } else {
                mkdir(APPPATH . 'logs/defaultController');
            }
            
        }
    }


}