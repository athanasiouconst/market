<?php

Class PublicMarketmodel extends CI_Model {

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

    function searchViewPublicMarket($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('kwd', 'name');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'kwd';

        $query = $this->db->select('*')
                ->from('laikh')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('laikh');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    function add_PublicMarket($data) {

        $this->db->insert('laikh', $data);
        return;
    }

    

    public function getEditPublicMarket($kwd) {
        $query = $this->db->query("SELECT * FROM laikh WHERE kwd='" . $kwd . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'kwd' => $row->kwd,
                'name' => $row->name
            ));
        }
        return $results;
    }

    //Update 
    public function EditPublicMarket($kwd, $data) {

        $this->db->where('kwd', $kwd);
        $this->db->update('laikh', $data);
    }

    //Delete
    function PublicMarketDelete($kwd) {
        $this->db->where('kwd', $kwd);
        $this->db->delete('laikh');
    }

}
