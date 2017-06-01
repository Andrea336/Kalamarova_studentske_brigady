<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
    /**
     * Template constructor.
     */
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    function render($page, $data = NULL)
    {
        $this->ci->load->view('layout/header', $data);

        if (isset($_SESSION['updated']))
        {
            $data['flash'] = 'Záznam bol aktualizovaný.';
            $data['flash_class'] = 'success';
        }

        if (isset($_SESSION['inserted']))
        {
            $data['flash'] = 'Záznam bol pridaný.';
            $data['flash_class'] = 'success';
        }

        if (isset($_SESSION['remove']))
        {
            if ($_SESSION['remove'] == FALSE)
            {
                $data['flash'] = 'Aktuálny záznam sa nedá odstrániť, pretože sa práve používa.';
                $data['flash_class'] = 'danger';
            }
            if ($_SESSION['remove'] == TRUE)
            {
                $data['flash'] = 'Záznam bol odstránený.';
                $data['flash_class'] = 'success';
            }
        }

        $this->ci->load->view('layout/navigation', $data);
        $this->ci->load->view($page, $data);
        $this->ci->load->view('layout/footer');
    }
}