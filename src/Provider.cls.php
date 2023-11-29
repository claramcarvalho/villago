<?php
class Provider {
    private $providerId;
    private $address;
    private $companyName;
    private $lat;
    private $lng;

    function __construct ($prvId = null, $ad = null, $cN = null, $lat = null, $lng = null)
    {
        $this->providerId = $prvId;
        $this->address = $ad;
        $this->companyName = $cN;
        $this->lat = $lat;
        $this->lng = $lng;
    }
    
    /**
     * @return string
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param string $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    public static function getAllProviders($connection)
    {
        $counter = 0;
        $query = "SELECT *
                    FROM provider";
        
        $Providers = $connection->query($query);

        foreach ($Providers as $oneProvider)
        {
            $prvId = $oneProvider["ProviderId"];
            $prvAd = $oneProvider["Address"];
            $prvN = $oneProvider["CompanyName"];
            $prvLat = $oneProvider["Latitude"];
            $prvLng = $oneProvider["Longitude"];

            $prv = new Provider($prvId, $prvAd, $prvN, $prvLat, $prvLng);
            $listOfProviders[$counter++] = $prv;
        }

        return serialize($listOfProviders);
    }

    public function getServiceByProviderId ($connection)
    {
        $id = $this->providerId;
        $sqlStmt = "SELECT *
                        FROM providerservice j
                        LEFT JOIN service s ON (j.ServiceId = s.ServiceId)
                        LEFT JOIN language l ON (j.LanguageId = l.LanguageId)
                        WHERE j.ProviderId = :id";
        
        $prepare = $connection->prepare($sqlStmt);
        $prepare->bindValue(":id",$id);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $courseObj = "";
        
        if (sizeof($result)>0)
        {
            $counter = 0;
            foreach ($result as $oneLine)
            {
                $oneService = array();
                
                $oneService["ServiceDescription"] = $oneLine["Description"];
                $oneService["ServiceLanguage"] = $oneLine["Name"];                
                
                $listOfServices[$counter++]=$oneService;
            }
            return serialize($listOfServices);
        }
    }
}

