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
            $this->CI =& get_instance();
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
                $sWhere .= $this->fields[$i] . " LIKE '%" . pg_escape_string($this->CI->input->post('sSearch')) . "%' OR ";
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
        
        $rResult = pg_query($this->connection,$sQuery);
        $iFilteredTotal = $aResultFilterTotal[0];

        $sQuery = "
		SELECT COUNT(*)
		FROM   $this->table
	";
        $rResultTotal = mysql_query($sQuery, $gaSql['link']) or die(mysql_error());
        $aResultTotal = mysql_fetch_array($rResultTotal);
        $iTotal = $aResultTotal[0];


        $output = array(
            "sEcho" => intval($this->CI->input->post('sEcho')),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        while ($aRow = mysql_fetch_array($rResult)) {
            $row = array();
            for ($i = 0; $i < count($this->fields); $i++) {
                if ($this->fields[$i] == "version") {
                    $row[] = ($aRow[$this->fields[$i]] == "0") ? '-' : $aRow[$this->fields[$i]];
                } else if ($this->fields[$i] != ' ') {
                    $row[] = $aRow[$this->fields[$i]];
                }
            }
            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

}

/* End of file Someclass.php */