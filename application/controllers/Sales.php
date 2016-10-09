<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function ViewSales($sort_by = 'aa', $sort_order = 'asc', $offset = 0) {
        $this->load->model('Salesmodel');
        //pass messages
        $data['gens'] = $this->Salesmodel->getViewSales();
        $limit = 10;
        $results = $this->Salesmodel->searchViewSales($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Sales/ViewSales/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; Αρχική';
        $config['last_link'] = 'Τελευταία &raquo;';
        $config['total_rows'] = $this->db->count_all('pwlhseis');
        $config['uri_segment'] = 10;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'hmnia' => 'Ημερομηνία',
            'name' => 'Ονομασία Λαϊκής',
            'proion' => 'Προϊόν',
            'arx_posot' => 'Αρχική Ποσότητα',
            'posot_epistr' => 'Επιστρεφόμενη Ποσότητα',
            'posot_pwlhs' => 'Ποσότητα Πώλησης',
            'ajia_agoras' => 'Αξία Αγοράς',
            'kostos' => 'Κόστος',
            'hmera' => 'Ημέρα',
            'mhnas' => 'Μήνας',
            'etos' => 'Έτος'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('sales', $data);
    }

    public function ViewSalesCreationForm() {

        $this->load->model('Salesmodel');
        //pass messages
        $data['gens'] = $this->Salesmodel->getViewPublicMarket();
        $results = $this->Salesmodel->searchViewPublicMarket();
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        $data['fields'] = array(
            'name' => 'Ονομασία Λαϊκής'
        );


        //pass messages
        $data['gensProd'] = $this->Salesmodel->getViewProducts();
        $resultsProd = $this->Salesmodel->searchViewProducts();
        $data['genProd'] = $resultsProd['rows'];
        $data['num_result'] = $resultsProd['num_rows'];




        $this->load->view('salesCreationForm', $data);
    }

    public function CreateSales() {

        $this->load->model('Salesmodel');
        $this->load->library('form_validation');
        $error = '';

        $this->form_validation->set_rules('hmnia', 'Ημερομηνία', 'trim|required|xss_clean');
        $this->form_validation->set_rules('laikh', 'Λαϊκή Αγορά', 'trim|required|callback_Select_LAIKH|xss_clean');
        $this->form_validation->set_rules('proion', 'Προϊόν', 'trim|required|callback_Select_PROION|xss_clean');
        $this->form_validation->set_rules('arx_posot', 'Αρχική Ποσότητα Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('posot_epistr', 'Ποσότητα Επιστροφής Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('posot_pwlhs', 'Ποσότητα Πώλησης Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('ajia_agoras', 'Αξία Αγοράς Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('kostos', 'Κόστος Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('hmera', 'Ημέρα', 'trim|required|callback_Select_HMERA|xss_clean');
        $this->form_validation->set_rules('mhnas', 'Μήνα', 'trim|required|callback_Select_MHNAS|xss_clean');
        $this->form_validation->set_rules('etos', 'Έτος', 'trim|required|callback_Select_ETOS|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->model('Salesmodel');
            //pass messages
            $data['gens'] = $this->Salesmodel->getViewPublicMarket();
            $results = $this->Salesmodel->searchViewPublicMarket();
            $data['gen'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];
            $data['fields'] = array(
                'name' => 'Ονομασία Λαϊκής'
            );


            //pass messages
            $data['gensProd'] = $this->Salesmodel->getViewProducts();
            $resultsProd = $this->Salesmodel->searchViewProducts();
            $data['genProd'] = $resultsProd['rows'];
            $data['num_result'] = $resultsProd['num_rows'];
            $this->load->view('salesCreationForm', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $hmnia = stripslashes($_POST['hmnia']);
                $laikh = stripslashes($_POST['laikh']);
                $proion = stripslashes($_POST['proion']);
                $arx_posot = stripslashes($_POST['arx_posot']);
                $posot_epistr = stripslashes($_POST['posot_epistr']);
                $posot_pwlhs = stripslashes($_POST['posot_pwlhs']);
                $ajia_agoras = stripslashes($_POST['ajia_agoras']);
                $kostos = stripslashes($_POST['kostos']);
                $hmera = stripslashes($_POST['hmera']);
                $mhnas = stripslashes($_POST['mhnas']);
                $etos = stripslashes($_POST['etos']);
                $data = array(
                    'aa' => NULL,
                    'hmnia' => $hmnia,
                    'laikh' => $laikh,
                    'proion' => $proion,
                    'arx_posot' => $arx_posot,
                    'posot_epistr' => $posot_epistr,
                    'posot_pwlhs' => $posot_pwlhs,
                    'ajia_agoras' => $ajia_agoras,
                    'kostos' => $kostos,
                    'hmera' => $hmera,
                    'mhnas' => $mhnas,
                    'etos' => $etos
                );
                $this->Salesmodel->add_Sales($data);
                $this->session->set_flashdata('success_msg', ''
                        . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                        . 'Η <strong>καταχώρηση</strong> πραγματοποιήθηκε με επιτυχία!'
                        . '</div>');
                redirect('Sales/ViewSales');
            }
        }
    }

    function Select_LAIKH($laikh) {

        if ($laikh == "-1") {
            $this->form_validation->set_message('Select_LAIKH', 'Επιλέξτε από το πεδίο  Λαϊκή Αγορά');
            return false;
        } else {
            return true;
        }
    }

    function Select_PROION($proion) {

        if ($proion == "-1") {
            $this->form_validation->set_message('Select_PROION', 'Επιλέξτε από το πεδίο   Επιλογή Προϊόντος');
            return false;
        } else {
            return true;
        }
    }

    function Select_HMERA($hmera) {

        if ($hmera == "-1") {
            $this->form_validation->set_message('Select_HMERA', 'Επιλέξτε από το πεδίο Ημέρα');
            return false;
        } else {
            return true;
        }
    }

    function Select_MHNAS($mhnas) {

        if ($mhnas == "-1") {
            $this->form_validation->set_message('Select_MHNAS', 'Επιλέξτε από το πεδίο  Μήνας');
            return false;
        } else {
            return true;
        }
    }

    function Select_ETOS($etos) {

        if ($etos == "-1") {
            $this->form_validation->set_message('Select_ETOS', 'Επιλέξτε από το πεδίο  Έτος');
            return false;
        } else {
            return true;
        }
    }

    public function ViewSalesDelete($aa) {

        $this->load->model('Salesmodel');
        $this->Salesmodel->SalesDelete($aa);
        $this->session->set_flashdata('delete_msg', ''
                . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                . 'Η <strong>διαγραφή</strong> πραγματοποιήθηκε με επιτυχία!'
                . '</div>');

        redirect('Sales/ViewSales');
    }

    public function ViewSalesEditForm($aa, $sort_by = 'aa', $sort_order = 'asc', $offset = 0) {

        $this->load->model('Salesmodel');
        //pass messages
        $data['gens'] = $this->Salesmodel->getViewPublicMarket();
        $results = $this->Salesmodel->searchViewPublicMarket();
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        $data['fields'] = array(
            'name' => 'Ονομασία Λαϊκής'
        );


        //pass messages
        $data['gensProd'] = $this->Salesmodel->getViewProducts();
        $resultsProd = $this->Salesmodel->searchViewProducts();
        $data['genProd'] = $resultsProd['rows'];
        $data['num_result'] = $resultsProd['num_rows'];

        
        $data['edit'] = $this->Salesmodel->getEditSales($aa);
        $this->load->view('salesEditForm', $data);
    }

    public function ViewSalesEditSubmitForm() {

        $this->load->model('Salesmodel');
        $this->load->library('form_validation');
        $error = '';
        $aa = stripslashes($_POST['aa']);
        $hmnia = stripslashes($_POST['hmnia']);
        //$laikh = stripslashes($_POST['laikh']);
        //$proion = stripslashes($_POST['proion']);
        $arx_posot = stripslashes($_POST['arx_posot']);
        $posot_epistr = stripslashes($_POST['posot_epistr']);
        $posot_pwlhs = stripslashes($_POST['posot_pwlhs']);
        $ajia_agoras = stripslashes($_POST['ajia_agoras']);
        $kostos = stripslashes($_POST['kostos']);
        $hmera = stripslashes($_POST['hmera']);
        $mhnas = stripslashes($_POST['mhnas']);
        $etos = stripslashes($_POST['etos']);

        $this->form_validation->set_rules('hmnia', 'Ημερομηνία', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('laikh', 'Λαϊκή Αγορά', 'trim|required|callback_Select_LAIKH|xss_clean');
        //$this->form_validation->set_rules('proion', 'Προϊόν', 'trim|required|callback_Select_PROION|xss_clean');
        $this->form_validation->set_rules('arx_posot', 'Αρχική Ποσότητα Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('posot_epistr', 'Ποσότητα Επιστροφής Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('posot_pwlhs', 'Ποσότητα Πώλησης Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('ajia_agoras', 'Αξία Αγοράς Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('kostos', 'Κόστος Προϊόντος', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('hmera', 'Ημέρα', 'trim|required|callback_Select_HMERA|xss_clean');
        $this->form_validation->set_rules('mhnas', 'Μήνα', 'trim|required|callback_Select_MHNAS|xss_clean');
        $this->form_validation->set_rules('etos', 'Έτος', 'trim|required|callback_Select_ETOS|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            //pass messages
            $data['gens'] = $this->Salesmodel->getViewPublicMarket();
            $results = $this->Salesmodel->searchViewPublicMarket();
            $data['gen'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];
            $data['fields'] = array(
                'name' => 'Ονομασία Λαϊκής'
            );


            //pass messages
            $data['gensProd'] = $this->Salesmodel->getViewProducts();
            $resultsProd = $this->Salesmodel->searchViewProducts();
            $data['genProd'] = $resultsProd['rows'];
            $data['num_result'] = $resultsProd['num_rows'];
            $error = $this->session->set_flashdata('edit_msg', ''
                    . '<div class="alert alert-danger" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία δεν</strong>  πραγματοποιήθηκε με επιτυχία! Προσπαθήστε ξανά!'
                    . '</div>');
            $data['edit'] = null;
            //$this->load->view('salesEditForm', $data);
            redirect('Sales/ViewSales');
        } else {

            $aa = stripslashes($_POST['aa']);
            $hmnia = stripslashes($_POST['hmnia']);
            //$laikh = stripslashes($_POST['laikh']);
            //$proion = stripslashes($_POST['proion']);
            $arx_posot = stripslashes($_POST['arx_posot']);
            $posot_epistr = stripslashes($_POST['posot_epistr']);
            $posot_pwlhs = stripslashes($_POST['posot_pwlhs']);
            $ajia_agoras = stripslashes($_POST['ajia_agoras']);
            $kostos = stripslashes($_POST['kostos']);
            $hmera = stripslashes($_POST['hmera']);
            $mhnas = stripslashes($_POST['mhnas']);
            $etos = stripslashes($_POST['etos']);

            $data = array(
                'aa' => $aa,
                'hmnia' => $hmnia,
                //'laikh' => $laikh,
                //'proion' => $proion,
                'arx_posot' => $arx_posot,
                'posot_epistr' => $posot_epistr,
                'posot_pwlhs' => $posot_pwlhs,
                'ajia_agoras' => $ajia_agoras,
                'kostos' => $kostos,
                'hmera' => $hmera,
                'mhnas' => $mhnas,
                'etos' => $etos
            );
            $this->Salesmodel->EditSales($aa, $data);
            $this->session->set_flashdata('success_msg', ''
                    . '<div class="alert alert-success" style="font-size: 24px;" style="padding-left: 40%; width: 70%;">'
                    . 'Η <strong>επεξεργασία</strong> πραγματοποιήθηκε με επιτυχία!'
                    . '</div>');

            redirect('Sales/ViewSales');
        }
    }

}
