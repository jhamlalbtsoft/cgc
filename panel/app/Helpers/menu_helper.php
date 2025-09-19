<?php
    
    function get_activemenu($sub_menu_name) {
        $session = \Config\Services::session();
        $session_sub_menu = $session->get('menuname');
        if ($session_sub_menu == $sub_menu_name) {
            return 'active';
        }
        return "";
    }

    function set_Topmenu_Open($top_menu_name) { 
        $session = \Config\Services::session();
        $session_top_menu = $session->get('top_menu');
        if ($session_top_menu == $top_menu_name) {
            return 'menu-open';
        }
        return "";
    }

    function set_Topmenu($top_menu_name) { 
        $session = \Config\Services::session();
        $session_top_menu = $session->get('top_menu');
        if ($session_top_menu == $top_menu_name) {
            return 'active';
        }
        return "";
    }

    function set_Submenu($sub_menu_name) {
        $session = \Config\Services::session();
        $session_sub_menu = $session->get('sub_menu');
        if ($session_sub_menu == $sub_menu_name) {
            return 'active text-info';
        }
        return "";
    }

    function set_SubSubmenu($sub_menu_name) {
        $session = \Config\Services::session();
        $session_sub_menu = $session->get('subsub_menu');
        if ($session_sub_menu == $sub_menu_name) {
            return 'active';
        }
        return "";
    }

    function get_location_name() {
        $session = \Config\Services::session();
        return $session->get('locationname');
    }

    function get_location_namefull() {
        $session = \Config\Services::session();
        echo $session->get('locationname');
    }

    function get_location_id() {
        $session = \Config\Services::session();
        return $session->get('locationid');
    }

    function get_user_id() {
        $session = \Config\Services::session();
        return $session->get('id');
    }

    function get_guesthouse_id() {
        $session = \Config\Services::session();
        return $session->get('gh_id');
    }

    function get_user_name() {
        $session = \Config\Services::session();
        return $session->get('username');
    }

    // function get_location_id() {
    //     $session = \Config\Services::session();
    //     return $session->get('locationid');
    // }

    function get_sidebar() {
        $session = \Config\Services::session();
        return $session->get('sidebar');
    }

    function permission_check($permission_id,$form_id,$st)
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $query=$db->query('select p.'.$st.' from m_permission p left join m_submenu sm on sm.id=p.submenu_id where p.user_id='.$permission_id.' and sm.name="'.$form_id.'" and p.'.$st.'=1');
        if(count($query->getResult())>0)
        {
         return '1';
        }
        else{
         return '0';
        }
    }