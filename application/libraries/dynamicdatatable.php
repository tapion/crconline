<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dynamicdatatable {

    private $table;
    private $fields = array();
    private $connection;
    private $CI;

    function __construct($params) {
        if (is_array($params)) {
            $this->table = $params['table'];
            $this->fields = $params['fields'];
            $this->connection = $params['connection'];
            $this->CI = & get_instance();
            $this->CI->load->helper('form');
        } else {
            exit('Parametros incorrectos');
        }
    }

    public function filtro() {
        $sLimit = "";
        if ($this->CI->input->post('iDisplayLength') && $this->CI->input->post('iDisplayLength') != '-1') {
            $sLimit = "LIMIT " . intval($this->CI->input->post('iDisplayLength')) . " OFFSET  " . intval($this->CI->input->post('iDisplayStart'));
        }
        $sOrder = "";
        if ($this->CI->input->post('iSortCol_0')) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($this->CI->input->post('iSortingCols')); $i++) {
                if ($this->CI->input->post('bSortable_' . intval($this->CI->input->post('iSortCol_' . $i))) == "true") {
                    $sOrder .= intval($this->CI->input->post('iSortCol_' . $i)) .
                            ($this->CI->input->post('sSortDir_' . $i) === 'asc' ? ' asc' : ' desc') . ", ";
                }
            }
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        $sWhere = "";
        if ($this->CI->input->post('sSearch') && $this->CI->input->post('sSearch') != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($this->fields); $i++) {
                if ($this->CI->input->post('bSearchable_' . $i) && $this->CI->input->post('bSearchable_' . $i) == "true") {
                    $sWhere .= $this->fields[$i] . " LIKE '%" . pg_escape_string($this->CI->input->post('sSearch')) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        for ($i = 0; $i < count($this->fields); $i++) {
            if ($this->CI->input->post('bSearchable_' . $i) && $this->CI->input->post('bSearchable_' . $i) == "true" && $this->CI->input->post('sSearch_' . $i) != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $this->fields[$i] . " LIKE '%" . pg_escape_string($this->CI->input->post('sSearch_' . $i)) . "%' ";
            }
        }

        $sQuery = 'SELECT COUNT(*) OVER() as total_registros, ' . implode(",", $this->fields) . ' FROM ' . $this->table . ' ' . $sWhere . $sOrder . $sLimit;
//        exit($sQuery);
        $rResult = pg_query($this->connection, $sQuery);
        $output = array(
            "sEcho" => intval($this->CI->input->post('sEcho')),
            "iTotalRecords" => 0,
            "iTotalDisplayRecords" => 0,
            "aaData" => array()
        );

        $contador = $iTotal = 0;
        while ($aRow = pg_fetch_array($rResult, NULL, PGSQL_NUM)) {
            $row = array();
            for ($i = 1; $i < count($this->fields) + 1; $i++) {
                $row[] = $aRow[$i];
            }
            $output['aaData'][] = $row;
            $iTotal = $aRow[0];
            $contador ++;
        }
        $output['iTotalRecords'] = $iTotal;
        $output['iTotalDisplayRecords'] = $contador;
        echo json_encode($output);
    }

}