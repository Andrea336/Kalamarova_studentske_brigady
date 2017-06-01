<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domov extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['title'] = 'Domov';
        $data['first_chart'] = $this->general_model->first_chart();
        $data['second_chart'] = $this->general_model->second_chart();
        $this->template->render('domov', $data);
    }
}
