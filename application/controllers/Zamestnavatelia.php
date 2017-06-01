<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zamestnavatelia extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['title'] = 'Zamestnávatelia';
        $data['query'] = $this->general_model->select('*', 'zamestnavatel');

        $this->template->render('zamestnavatelia', $data);
    }

    public function create()
    {
        $data['title'] = 'Vytvoriť nového zamestnávateľa';

        $this->form_validation->set_rules('meno', 'Meno', 'trim|required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'trim|required');
        $this->form_validation->set_rules('firma', 'firma', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('zamestnavatelia_create', $data);
        } else
        {
            $data = array(
                'meno' => $this->input->post('meno'),
                'priezvisko' => $this->input->post('priezvisko'),
                'firma' => $this->input->post('firma'),
            );

            $this->general_model->insert('zamestnavatel', $data);

            $this->session->set_flashdata('inserted', '1');
            redirect(base_url() . 'zamestnavatelia');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Upraviť zamestnávateľa';
        $data['query'] = $this->general_model->select_by_id('*', 'zamestnavatel', $id);

        $this->form_validation->set_rules('meno', 'Meno', 'trim|required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'trim|required');
        $this->form_validation->set_rules('firma', 'firma', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('zamestnavatelia_edit', $data);
        } else
        {
            $data = array(
                'meno' => $this->input->post('meno'),
                'priezvisko' => $this->input->post('priezvisko'),
                'firma' => $this->input->post('firma'),
            );

            $this->general_model->update('zamestnavatel.id', $id, 'zamestnavatel', $data);

            $this->session->set_flashdata('updated', '1');
            redirect(base_url() . 'zamestnavatelia');
        }
    }

    public function destroy($id)
    {
        $query = $this->general_model->delete('id', $id, 'zamestnavatel');

        if ($query)
        {
            $this->session->set_flashdata('remove', TRUE);
        } else
        {
            $this->session->set_flashdata('remove', FALSE);
        }

        redirect(base_url() . 'zamestnavatelia');
    }
}