<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function ViewProducts($sort_by = 'kwd', $sort_order = 'asc', $offset = 0) {
        $this->load->model('Productsmodel');
        //pass messages
        $data['gens'] = $this->Productsmodel->getViewProducts();
        $limit = 10;
        $results = $this->Productsmodel->searchViewProducts($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Products/ViewProducts/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; Αρχική';
        $config['last_link'] = 'Τελευταία &raquo;';
        $config['total_rows'] = $this->db->count_all('proionta');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'proion' => 'Ονομασία Λαϊκής'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('products', $data);
    }

    public function ViewProductsCreationForm() {
        $this->load->view('productsCreationForm');
    }

    public function CreateProducts() {

        $this->load->model('Productsmodel');
        $this->load->library('form_validation');
        $error = '';

        $this->form_validation->set_rules('proion', 'Ονομασία Προϊόντος', 'trim|required|is_unique[proionta.proion]xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('productsCreationForm', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $proion = stripslashes($_POST['proion']);
                $data = array(
                    'kwd' => NULL,
                    'proion' => $proion
                );
                $this->Productsmodel->add_Products($data);
                $this->session->set_flashdata('success_msg', ''
                        . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                        . 'Η <strong>καταχώρηση</strong> πραγματοποιήθηκε με επιτυχία!'
                        . '</div>');
                redirect('Products/ViewProducts');
            }
        }
    }

    public function ViewProductsDelete($kwd) {

        $this->load->model('Productsmodel');
        $this->Productsmodel->ProductsDelete($kwd);
        $this->session->set_flashdata('delete_msg', ''
                . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                . 'Η <strong>διαγραφή</strong> πραγματοποιήθηκε με επιτυχία!'
                . '</div>');

        redirect('Products/ViewProducts');
    }

    public function ViewProductsEditForm($kwd, $sort_by = 'kwd', $sort_order = 'asc', $offset = 0) {

        $this->load->model('Productsmodel');
        $data['edit'] = $this->Productsmodel->getEditProducts($kwd);
        $this->load->view('productsEditForm', $data);
    }

    public function ViewProductsEditSubmitForm() {

        $this->load->model('Productsmodel');
        $this->load->library('form_validation');
        $error = '';
        $proion = stripslashes($_POST['proion']);
        $kwd = stripslashes($_POST['kwd']);

        $this->form_validation->set_rules('proion', 'Ονομασία Προϊόντος', 'trim|required|is_unique[proionta.proion]xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $error = $this->session->set_flashdata('edit_msg', ''
                    . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία δεν</strong>  πραγματοποιήθηκε με επιτυχία! Προσπαθήστε ξανά!'
                    . '</div>');
            $data['edit'] = null;
            $this->load->view('productsEditForm', $data);
        } else {

            $proion = stripslashes($_POST['proion']);
            $kwd = stripslashes($_POST['kwd']);

            $data = array(
                'kwd' => $kwd,
                'proion' => $proion
            );
            $this->Productsmodel->EditProducts($kwd, $data);
            $this->session->set_flashdata('success_msg', ''
                    . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία</strong> πραγματοποιήθηκε με επιτυχία!'
                    . '</div>');

            redirect('Products/ViewProducts');
        }
    }

}
