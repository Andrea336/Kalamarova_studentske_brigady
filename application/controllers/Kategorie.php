<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorie extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['title'] = 'Kategórie';
        $data['query'] = $this->general_model->select('*', 'kategoria_brigada');

        $this->template->render('kategorie', $data);
    }

    public function create()
    {
        $data['title'] = 'Vytvoriť kategóriu';

        $this->form_validation->set_rules('nazov', 'Názov', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('kategorie_create', $data);
        } else
        {
            $data = array(
                'nazov' => $this->input->post('nazov'),
            );

            $this->general_model->insert('kategoria_brigada', $data);

            $this->session->set_flashdata('inserted', '1');
            redirect(base_url() . 'kategorie');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Upraviť kategóriu';
        $data['query'] = $this->general_model->select_by_id('*', 'kategoria_brigada', $id);

        $this->form_validation->set_rules('nazov', 'Názov', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('kategorie_edit', $data);
        } else
        {
            $data = array(
                'nazov' => $this->input->post('nazov'),
            );

            $this->general_model->update('kategoria_brigada.id', $id, 'kategoria_brigada', $data);

            $this->session->set_flashdata('updated', '1');
            redirect(base_url() . 'kategorie');
        }
    }

    public function destroy($id)
    {
        $query = $this->general_model->delete('id', $id, 'kategoria_brigada');

        if ($query)
        {
            $this->session->set_flashdata('remove', TRUE);
        } else
        {
            $this->session->set_flashdata('remove', FALSE);
        }

        redirect(base_url() . 'kategorie');
    }
}