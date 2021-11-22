<?php (defined('BASEPATH')) or exit('No direct script access allowed');

function frontend_db($view, $data = [])
{
    $ci = &get_instance();
    $load = $ci->load->database();
    $load->db->cache_on();
    return $load->db->get_where($view, $data)->row_array();
    $load->db->cache_off();
}

if (!function_exists('display')) {
    function display($role, $view, $vars = array(), $output = false)
    {
        $ci = &get_instance();

        $init_frontend = frontend_db('tbl_website', ['id' => 1]);

        if (empty($init_frontend)) {
            $vars['title'] = 'Default';
            $vars['description'] = 'Default Description';
            $vars['keywords'] = 'Default Keywords';
        } else {
            $vars['description'] = $init_frontend['description'];
            $vars['keywords'] = $init_frontend['keywords'];
        }

        $vars['assetsjs'] = loadPath(ASSETPATH, array(
            'ext' => 'js',
            'assets' => 'frontend',
            'path' => 'js',
        ));
        $vars['assetscss'] = loadPath(ASSETPATH, array(
            'ext' => 'css',
            'assets' => 'frontend',
            'path' => 'css',
        ));

        if ($role == 1) {
            $ci->load->view('main_frontend/header.php', $vars);
            $ci->load->view($view, $vars);
            $ci->load->view('main_frontend/footer.php', $vars);
        } else {
            $ci->load->view('backend_frontend/header.php', $vars);
            $ci->load->view($view, $vars);
            $ci->load->view('backend_frontend/footer.php', $vars);
        }
    }
}

if (!function_exists('active_link')) {
    function activate_menu($controller)
    {
        $ci = get_instance();
        $class = $ci->uri->segment(1);
        return ($class == $controller) ? 'active' : '';
    }
}
