<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brigady extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['title'] = 'Brigády';
        $data['query'] = $this->general_model->get_brigady();

        $this->template->render('brigady', $data);
    }

    public function create()
    {
        $data['title'] = 'Vytvoriť novú brigádu';
        $data['kategoria'] = $this->general_model->get_kategoria_dropdown();
        $data['zamestnavatel'] = $this->general_model->get_zamestnavatel_dropdown();

        $this->form_validation->set_rules('nazov', 'Názov', 'trim|required');
        $this->form_validation->set_rules('napln_prace', 'Náplň práce', 'trim|required');
        $this->form_validation->set_rules('hodinova_sadzba', 'Hodinová sadzba', 'trim|required|numeric');
        $this->form_validation->set_rules('kategoria', 'Kategória', 'trim|required');
        $this->form_validation->set_rules('zamestnavatel', 'Zamestnávateľ', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('brigady_create', $data);
        } else
        {
            $data = array(
                'nazov' => $this->input->post('nazov'),
                'napln_prace' => $this->input->post('napln_prace'),
                'hodinova_sadzba' => $this->input->post('hodinova_sadzba'),
                'kategoria_brigada_id' => $this->input->post('kategoria'),
                'zamestnavatel_id' => $this->input->post('zamestnavatel')
            );

            $this->general_model->insert('brigada', $data);

            $this->session->set_flashdata('inserted', '1');
            redirect(base_url() . 'brigady');
        }
    }

    public function show($id)
    {
        $data['title'] = 'Detail brigády';
        $data['query'] = $this->general_model->get_brigada($id);
        $this->template->render('brigady_show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Upraviť brigádu';
        $data['query'] = $this->general_model->get_brigada($id);
        $data['kategoria'] = $this->general_model->get_kategoria_dropdown();
        $data['zamestnavatel'] = $this->general_model->get_zamestnavatel_dropdown();

        $this->form_validation->set_rules('nazov', 'Názov', 'trim|required');
        $this->form_validation->set_rules('napln_prace', 'Náplň práce', 'trim|required');
        $this->form_validation->set_rules('hodinova_sadzba', 'Hodinová sadzba', 'trim|required|numeric');
        $this->form_validation->set_rules('kategoria', 'Kategória', 'trim|required');
        $this->form_validation->set_rules('zamestnavatel', 'Zamestnávateľ', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('brigady_edit', $data);
        } else
        {
            $data = array(
                'nazov' => $this->input->post('nazov'),
                'napln_prace' => $this->input->post('napln_prace'),
                'hodinova_sadzba' => $this->input->post('hodinova_sadzba'),
                'kategoria_brigada_id' => $this->input->post('kategoria'),
                'zamestnavatel_id' => $this->input->post('zamestnavatel')
            );

            $this->general_model->update('brigada.id', $id, 'brigada', $data);

            $this->session->set_flashdata('updated', '1');
            redirect(base_url() . 'brigady');
        }
    }

    public function destroy($id)
    {
        $query = $this->general_model->delete('id', $id, 'brigada');

        if ($query)
        {
            $this->session->set_flashdata('remove', TRUE);
        } else
        {
            $this->session->set_flashdata('remove', FALSE);
        }

        redirect(base_url() . 'brigady');
    }
}