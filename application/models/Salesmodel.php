<?php

Class Salesmodel extends CI_Model {

    public function getViewSales() {
        $query = $this->db->query("SELECT * FROM pwlhseis"
                . " JOIN proionta ON pwlhseis.proion=proionta.kwd"
                . " JOIN laikh ON pwlhseis.laikh=laikh.kwd"
                );
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'aa' => $row->aa,
                'hmnia' => $row->hmnia, 
                'laikh.name' => $row->name, 
                'proionta.proion' => $row->proion, 
                'arx_posot' => $row->arx_posot,
                'posot_epistr' => $row->posot_epistr, 
                'posot_pwlhs' => $row->posot_pwlhs,
                'ajia_agoras' => $row->ajia_agoras, 
                'kostos' => $row->kostos, 
                'hmera' => $row->hmera,
                'mhnas' => $row->mhnas, 
                'etos' => $row->etos
            ));
        }
        return $results;
    }
    

    function searchViewSales($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('aa', 'hmnia', 'laikh.name', 'proion', 'arx_posot', 'posot_epistr', 'posot_pwlhs', 'ajia_agoras', 'kostos', 'hmera', 'mhnas', 'etos');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'aa';

        $query = $this->db->select('*')
                ->from('pwlhseis')
                ->join('proionta', 'proionta.kwd = pwlhseis.proion', 'left outer')
                ->join('laikh', 'laikh.kwd = pwlhseis.laikh', 'left outer')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('pwlhseis');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    
    public function getViewPublicMarket() {
        $query = $this->db->query("SELECT * FROM laikh ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'kwd' => $row->kwd,
                'name' => $row->name
            ));
        }
        return $results;
    }

    function searchViewPublicMarket() {
        //results
      
        $query = $this->db->select('*')
                ->from('laikh');
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('laikh');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewProducts() {
        $query = $this->db->query("SELECT * FROM proionta ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'kwd' => $row->kwd,
                'proion' => $row->proion
            ));
        }
        return $results;
    }

    function searchViewProducts() {
        //results
        $query = $this->db->select('*')
                ->from('proionta');
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('proionta');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }
    
    function add_Sales($data) {

        $this->db->insert('pwlhseis', $data);
        return;
    }

    public function getEditSales($aa) {
        $query = $this->db->query("SELECT * FROM pwlhseis "
                . " JOIN proionta ON pwlhseis.proion=proionta.kwd"
                . " JOIN laikh ON pwlhseis.laikh=laikh.kwd"
                . " WHERE aa='" . $aa . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'aa' => $row->aa,
                'hmnia' => $row->hmnia, 
                'laikh' => $row->name, 
                'proion' => $row->proion, 
                'arx_posot' => $row->arx_posot,
                'posot_epistr' => $row->posot_epistr, 
                'posot_pwlhs' => $row->posot_pwlhs,
                'ajia_agoras' => $row->ajia_agoras, 
                'kostos' => $row->kostos, 
                'hmera' => $row->hmera,
                'mhnas' => $row->mhnas, 
                'etos' => $row->etos
            ));
        }
        return $results;
    }

    //Update 
    public function EditSales($aa, $data) {

        $this->db->where('aa', $aa);
        $this->db->update('pwlhseis', $data);
    }

    //Delete
    function SalesDelete($aa) {
        $this->db->where('aa', $aa);
        $this->db->delete('pwlhseis');
    }

}
