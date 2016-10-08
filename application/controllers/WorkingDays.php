<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WorkingDays extends CI_Controller {

    public function ViewDays($sort_by = 'kwd', $sort_order = 'asc', $offset = 0) {
        $this->load->model('Daysmodel');
        //pass messages
        $data['gens'] = $this->Daysmodel->getViewDays();
        $limit = 10;
        $results = $this->Daysmodel->searchViewDays($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("WorkingDays/ViewDays/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; Αρχική';
        $config['last_link'] = 'Τελευταία &raquo;';
        $config['total_rows'] = $this->db->count_all('days');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'name' => 'Ημέρα Εβδομάδος'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('WorkingDays', $data);
    }

    public function ViewDaysCreationForm() {
        $this->load->view('workingDaysCreationForm');
    }

    public function CreateDays() {

        $this->load->model('Daysmodel');
        $this->load->library('form_validation');
        $error = '';

        $this->form_validation->set_rules('name', 'Ημέρα', 'trim|required|is_unique[days.name]xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('workingDaysCreationForm', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $name = stripslashes($_POST['name']);
                $data = array(
                    'kwd' => NULL,
                    'name' => $name
                );
                $this->Daysmodel->add_Days($data);
                $this->session->set_flashdata('success_msg', ''
                        . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                        . 'Η <strong>καταχώρηση</strong> πραγματοποιήθηκε με επιτυχία!'
                        . '</div>');
                redirect('WorkingDays/ViewDays');
            }
        }
    }

    public function ViewDaysDelete($kwd) {

        $this->load->model('Daysmodel');
        $this->Daysmodel->DaysDelete($kwd);
        $this->session->set_flashdata('delete_msg', ''
                . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                . 'Η <strong>διαγραφή</strong> πραγματοποιήθηκε με επιτυχία!'
                . '</div>');

        redirect('WorkingDays/ViewDays');
    }

    public function ViewDaysEditForm($kwd, $sort_by = 'kwd', $sort_order = 'asc', $offset = 0) {

        $this->load->model('Daysmodel');
        $data['edit'] = $this->Daysmodel->getEditDays($kwd);
        $this->load->view('workingDaysEditForm', $data);
    }

    public function ViewDaysEditSubmitForm() {

        $this->load->model('Daysmodel');
        $this->load->library('form_validation');
        $error = '';
        $name = stripslashes($_POST['name']);
        $kwd = stripslashes($_POST['kwd']);

        $this->form_validation->set_rules('name', 'Ημέρα', 'trim|required|is_unique[days.name]xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $error = $this->session->set_flashdata('edit_msg', ''
                    . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία δεν</strong>  πραγματοποιήθηκε με επιτυχία! Προσπαθήστε ξανά!'
                    . '</div>');
            $data['edit'] = null;
            $this->load->view('workingDaysEditForm', $data);
        } else {

            $name = stripslashes($_POST['name']);
            $kwd = stripslashes($_POST['kwd']);

            $data = array(
                'kwd' => $kwd,
                'name' => $name
            );
            $this->Daysmodel->EditDays($kwd, $data);
            $this->session->set_flashdata('success_msg', ''
                    . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία</strong> πραγματοποιήθηκε με επιτυχία!'
                    . '</div>');

            redirect('WorkingDays/ViewDays');
        }
    }

}
