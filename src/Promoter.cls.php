<?php
class Promoter {
    private $promoterId;
    private $companyName;
    private $listOfEvents;

    function __construct ($prmId = null, $cN = null)
    {
        $this->promoterId = $prmId;
        $this->companyName = $cN;
    }
    
    /**
     * @return string
     */
    public function getPromoterId()
    {
        return $this->promoterId;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function getListOfEvents()
    {
        return $this->listOfEvents;
    }


    public function setListOfEvents($listOfEvents)
    {
        $this->listOfEvents = $listOfEvents;
    }
    /**
     * @param string $promoterId
     */
    public function setPromoterId($promoterId)
    {
        $this->promoterId = $promoterId;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }
}

