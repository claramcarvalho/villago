<?php
class Provider {
    private $providerId;
    private $address;
    private $companyName;
    private $lat;
    private $lng;
    private $listServiceCards = [];

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

    public static function returnArray($arr) {
        $cpt = count($arr);
    
        if ($cpt > 0){
            foreach($arr as $oneDim) {
                echo $oneDim["title"].",".$oneDim["desc"].",".$oneDim["language"]."|";
            }
        } else {
            echo "empty";
        }
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
  
    public static function generateServiceCards($connection) {

        $cpt = 0;
        $query = "SELECT P.COMPANYNAME, S.DESCRIPTION, L.NAME FROM PROVIDERSERVICE PS JOIN PROVIDER P ON P.PROVIDERID = PS.PROVIDERID JOIN SERVICE S ON S.SERVICEID = PS.SERVICEID JOIN LANGUAGE L ON L.LANGUAGEID = PS.LANGUAGEID";
        
        foreach ($connection->query($query) as $oneRow) {
            $listServiceCards[$cpt]["title"] = $oneRow["COMPANYNAME"];
            $listServiceCards[$cpt]["desc"] = $oneRow["DESCRIPTION"];
            $listServiceCards[$cpt]["language"] = $oneRow["NAME"]; 

            $cpt++;            
        }      
        return serialize($listServiceCards);
    }



    public static function selectByService($connection,$serv) {
    
        $cpt = 0;
        $sqlStatement = "SELECT P.COMPANYNAME, S.DESCRIPTION, L.NAME FROM PROVIDERSERVICE PS JOIN PROVIDER P ON P.PROVIDERID = PS.PROVIDERID JOIN SERVICE S ON S.SERVICEID = PS.SERVICEID JOIN LANGUAGE L ON L.LANGUAGEID = PS.LANGUAGEID WHERE S.DESCRIPTION = :serv";
        
        $prepare = $connection->prepare($sqlStatement);
        $prepare->bindValue(":serv",$serv);
        $prepare->execute();
        $result = $prepare->fetchAll();

        foreach ($result as $oneRow) {
            $listServiceCards[$cpt]["title"] = $oneRow["COMPANYNAME"];
            $listServiceCards[$cpt]["desc"] = $oneRow["DESCRIPTION"];
            $listServiceCards[$cpt]["language"] = $oneRow["NAME"]; 

            $cpt++;            
        }      

        return serialize($listServiceCards);
    }

    public static function selectByLanguage($connection,$lang) {
    
        $cpt = 0;
        $sqlStatement = "SELECT P.COMPANYNAME, S.DESCRIPTION, L.NAME FROM PROVIDERSERVICE PS JOIN PROVIDER P ON P.PROVIDERID = PS.PROVIDERID JOIN SERVICE S ON S.SERVICEID = PS.SERVICEID JOIN LANGUAGE L ON L.LANGUAGEID = PS.LANGUAGEID WHERE L.NAME = :lang";
        
        $prepare = $connection->prepare($sqlStatement);
        $prepare->bindValue(":lang",$lang);
        $prepare->execute();
        $result = $prepare->fetchAll();

        foreach ($result as $oneRow) {
            $listServiceCards[$cpt]["title"] = $oneRow["COMPANYNAME"];
            $listServiceCards[$cpt]["desc"] = $oneRow["DESCRIPTION"];
            $listServiceCards[$cpt]["language"] = $oneRow["NAME"]; 

            $cpt++;            
        }      

        return serialize($listServiceCards);
    }
    
}

