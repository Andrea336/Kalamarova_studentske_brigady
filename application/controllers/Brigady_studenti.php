<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brigady_studenti extends CI_Controller {

    public function create()
    {
        $data['title'] = 'Pridelenie brigády pre študenta';
        $data['student'] = $this->general_model->get_student_dropdown();
        $data['brigada'] = $this->general_model->get_brigada_dropdown();

        $this->form_validation->set_rules('student', 'Študent', 'trim|required');
        $this->form_validation->set_rules('brigada', 'Brigáda', 'trim|required');
        $this->form_validation->set_rules('odkedy', 'Odkedy', 'trim|required');
        $this->form_validation->set_rules('dokedy', 'Dokedy', 'trim|required');
        $this->form_validation->set_rules('provizia', 'Provízia', 'trim|required|numeric');
        $this->form_validation->set_rules('pocet_hodin', 'Provízia', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('brigady_studenti_create', $data);
        } else
        {
            $data = array(
                'student_id' => $this->input->post('student'),
                'brigada_id' => $this->input->post('brigada'),
                'odkedy' => $this->input->post('odkedy'),
                'dokedy' => $this->input->post('dokedy'),
                'provizia' => $this->input->post('provizia'),
                'pocet_hodin' => $this->input->post('pocet_hodin')
            );

            $this->general_model->insert('brigada_student', $data);

            $this->session->set_flashdata('inserted', '1');
            redirect(base_url() . 'studenti');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Upraviť brigádu pre študenta';
        $data['query'] = $this->general_model->get_brigada_student($id);
        $data['student'] = $this->general_model->get_student_dropdown();
        $data['brigada'] = $this->general_model->get_brigada_dropdown();

        $this->form_validation->set_rules('student', 'Študent', 'trim|required');
        $this->form_validation->set_rules('brigada', 'Brigáda', 'trim|required');
        $this->form_validation->set_rules('odkedy', 'Odkedy', 'trim|required');
        $this->form_validation->set_rules('dokedy', 'Dokedy', 'trim|required');
        $this->form_validation->set_rules('provizia', 'Provízia', 'trim|required|numeric');
        $this->form_validation->set_rules('pocet_hodin', 'Provízia', 'trim|required|numeric');


        if ($this->form_validation->run() == FALSE)
        {
            $this->template->render('brigady_studenti_edit', $data);
        } else
        {
            $data = array(
                'student_id' => $this->input->post('student'),
                'brigada_id' => $this->input->post('brigada'),
                'odkedy' => $this->input->post('odkedy'),
                'dokedy' => $this->input->post('dokedy'),
                'provizia' => $this->input->post('provizia'),
                'pocet_hodin' => $this->input->post('pocet_hodin')
            );

            $this->general_model->update('brigada_student.id', $id, 'brigada_student', $data);

            $this->session->set_flashdata('updated', '1');
            redirect(base_url() . 'studenti');
        }
    }

    public function destroy($id)
    {
        $query = $this->general_model->delete('id', $id, 'brigada_student');

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