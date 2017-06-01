<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studenti extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['title'] = 'Študenti';
        $data['query'] = $this->general_model->get_studenti();

        $this->template->render('studenti', $data);
    }

    public function create()
    {
        $data['title'] = 'Vytvoriť nového študenta';
        $data['krajina'] = $this->general_model->get_krajina_dropdown();

        $this->form_validation->set_rules('meno', 'Meno', 'trim|required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'trim|required');
        $this->form_validation->set_rules('preferencie', 'Preferencie', 'trim|required');
        $this->form_validation->set_rules('predchadzajuce_skusenosti', 'Predchádzajúce skúsenosti', 'trim|required');
        $this->form_validation->set_rules('zrucnosti', 'Zručnosti', 'trim|required');
        $this->form_validation->set_rules('adresa', 'Adresa', 'trim|required');
        $this->form_validation->set_rules('krajina', 'Krajina', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('studenti_create', $data);
        } else
        {
            $data = array(
                'meno' => $this->input->post('meno'),
                'priezvisko' => $this->input->post('priezvisko'),
                'preferencie' => $this->input->post('preferencie'),
                'predchadzajuce_skusenosti' => $this->input->post('predchadzajuce_skusenosti'),
                'zrucnosti' => $this->input->post('zrucnosti'),
                'adresa' => $this->input->post('adresa'),
                'krajina_id' => $this->input->post('krajina')
            );

            $this->general_model->insert('student', $data);

            $this->session->set_flashdata('inserted', '1');
            redirect(base_url() . 'studenti');
        }
    }

    public function show($id)
    {
        $data['title'] = 'Detail študenta';
        $data['query'] = $this->general_model->get_student($id);
        $data['brigady_studenti'] = $this->general_model->get_brigady_studenti($id);
        $this->template->render('studenti_show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Upraviť študenta';
        $data['query'] = $this->general_model->get_student($id);
        $data['krajina'] = $this->general_model->get_krajina_dropdown();

        $this->form_validation->set_rules('meno', 'Meno', 'trim|required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'trim|required');
        $this->form_validation->set_rules('preferencie', 'Preferencie', 'trim|required');
        $this->form_validation->set_rules('predchadzajuce_skusenosti', 'Predchádzajúce skúsenosti', 'trim|required');
        $this->form_validation->set_rules('zrucnosti', 'Zručnosti', 'trim|required');
        $this->form_validation->set_rules('adresa', 'Adresa', 'trim|required');
        $this->form_validation->set_rules('krajina', 'Krajina', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('studenti_edit', $data);
        } else
        {
            $data = array(
                'meno' => $this->input->post('meno'),
                'priezvisko' => $this->input->post('priezvisko'),
                'preferencie' => $this->input->post('preferencie'),
                'predchadzajuce_skusenosti' => $this->input->post('predchadzajuce_skusenosti'),
                'zrucnosti' => $this->input->post('zrucnosti'),
                'adresa' => $this->input->post('adresa'),
                'krajina_id' => $this->input->post('krajina')
            );

            $this->general_model->update('student.id', $id, 'student', $data);

            $this->session->set_flashdata('updated', '1');
            redirect(base_url() . 'studenti');
        }
    }

    public function destroy($id)
    {
        $query = $this->general_model->delete('id', $id, 'student');

        if ($query)
        {
            $this->session->set_flashdata('remove', TRUE);
        } else
        {
            $this->session->set_flashdata('remove', FALSE);
        }

        redirect(base_url() . 'studenti');
    }
}