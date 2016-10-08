<?php

Class Daysmodel extends CI_Model {

    public function getViewDays() {
        $query = $this->db->query("SELECT * FROM days ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'kwd' => $row->kwd,
                'name' => $row->name
            ));
        }
        return $results;
    }

    function searchViewDays($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('kwd', 'name');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'kwd';

        $query = $this->db->select('*')
                ->from('days')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('days');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    function add_Days($data) {

        $this->db->insert('days', $data);
        return;
    }

   

    public function getEditDays($kwd) {
        $query = $this->db->query("SELECT * FROM days WHERE kwd='" . $kwd . "' ");
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
    public function EditDays($kwd, $data) {

        $this->db->where('kwd', $kwd);
        $this->db->update('days', $data);
    }

    //Delete
    function DaysDelete($kwd) {
        $this->db->where('kwd', $kwd);
        $this->db->delete('days');
    }

}
