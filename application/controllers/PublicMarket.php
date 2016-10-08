<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicMarket extends CI_Controller {

    public function ViewPublicMarket($sort_by = 'kwd', $sort_order = 'asc', $offset = 0) {
        $this->load->model('PublicMarketmodel');
        //pass messages
        $data['gens'] = $this->PublicMarketmodel->getViewPublicMarket();
        $limit = 10;
        $results = $this->PublicMarketmodel->searchViewPublicMarket($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("PublicMarket/ViewPublicMarket/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; Αρχική';
        $config['last_link'] = 'Τελευταία &raquo;';
        $config['total_rows'] = $this->db->count_all('laikh');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'name' => 'Ονομασία Λαϊκής'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('publicMarket', $data);
    }

    public function ViewPublicMarketCreationForm() {
        $this->load->view('publicMarketCreationForm');
    }

    public function CreatePublicMarket() {

        $this->load->model('PublicMarketmodel');
        $this->load->library('form_validation');
        $error = '';

        $this->form_validation->set_rules('name', 'Ονομασία Λαϊκής Αγοράς', 'trim|required|is_unique[laikh.name]xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('publicMarketCreationForm', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $name = stripslashes($_POST['name']);
                $data = array(
                    'kwd' => NULL,
                    'name' => $name
                );
                $this->PublicMarketmodel->add_PublicMarket($data);
                $this->session->set_flashdata('success_msg', ''
                        . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                        . 'Η <strong>καταχώρηση</strong> πραγματοποιήθηκε με επιτυχία!'
                        . '</div>');
                redirect('PublicMarket/ViewPublicMarket');
            }
        }
    }

    public function ViewPublicMarketDelete($kwd) {

        $this->load->model('PublicMarketmodel');
        $this->PublicMarketmodel->PublicMarketDelete($kwd);
        $this->session->set_flashdata('delete_msg', ''
                . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                . 'Η <strong>διαγραφή</strong> πραγματοποιήθηκε με επιτυχία!'
                . '</div>');

        redirect('PublicMarket/ViewPublicMarket');
    }

    public function ViewPublicMarketEditForm($kwd, $sort_by = 'kwd', $sort_order = 'asc', $offset = 0) {

        $this->load->model('PublicMarketmodel');
        $data['edit'] = $this->PublicMarketmodel->getEditPublicMarket($kwd);
        $this->load->view('publicMarketEditForm', $data);
    }

    public function ViewPublicMarketEditSubmitForm() {

        $this->load->model('PublicMarketmodel');
        $this->load->library('form_validation');
        $error = '';
        $name = stripslashes($_POST['name']);
        $kwd = stripslashes($_POST['kwd']);

        $this->form_validation->set_rules('name', 'Ονομασία Λαϊκής Αγοράς', 'trim|required|is_unique[laikh.name]xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $error = $this->session->set_flashdata('edit_msg', ''
                    . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία δεν</strong>  πραγματοποιήθηκε με επιτυχία! Προσπαθήστε ξανά!'
                    . '</div>');
            $data['edit'] = null;
            $this->load->view('publicMarketEditForm', $data);
        } else {

            $name = stripslashes($_POST['name']);
            $kwd = stripslashes($_POST['kwd']);

            $data = array(
                'kwd' => $kwd,
                'name' => $name
            );
            $this->PublicMarketmodel->EditPublicMarket($kwd, $data);
            $this->session->set_flashdata('success_msg', ''
                    . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία</strong> πραγματοποιήθηκε με επιτυχία!'
                    . '</div>');

            redirect('PublicMarket/ViewPublicMarket');
        }
    }

}
