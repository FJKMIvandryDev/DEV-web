<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\DataTable;


class DTresponse
{
    private $draw;
    private $recordsTotal;
    private $recordsFiltered;
    private $data;
 
    public function __construct()
    {
        
    }
    
    public function setDraw($draw)
    {
        $this->draw = $draw;
    }
    
    public function getDraw()
    {
        return $this->draw;
    }
    
        public function setRecordsTotal($recordsTotal)
    {
        $this->recordsTotal = $recordsTotal;
    }
    
    public function getRecordsTotal()
    {
        return $this->recordsTotal;
    }
    
        public function setRecordsFiltered($recordsFiltered)
    {
        $this->recordsFiltered = $recordsFiltered;
    }
    
    public function getRecordsFiltered()
    {
        return $this->recordsFiltered;
    }
    
        public function setData($data)
    {
        $this->data = $data;
    }
    
    public function getData()
    {
        return $this->data;
    }
}
