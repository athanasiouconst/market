<?php

Class Productsmodel extends CI_Model {

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

    function searchViewProducts($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('kwd', 'proion');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'kwd';

        $query = $this->db->select('*')
                ->from('proionta')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('proionta');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    function add_Products($data) {

        $this->db->insert('proionta', $data);
        return;
    }

    

    public function getEditProducts($kwd) {
        $query = $this->db->query("SELECT * FROM proionta WHERE kwd='" . $kwd . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'kwd' => $row->kwd,
                'proion' => $row->proion
            ));
        }
        return $results;
    }

    //Update 
    public function EditProducts($kwd, $data) {

        $this->db->where('kwd', $kwd);
        $this->db->update('proionta', $data);
    }

    //Delete
    function ProductsDelete($kwd) {
        $this->db->where('kwd', $kwd);
        $this->db->delete('proionta');
    }

}
