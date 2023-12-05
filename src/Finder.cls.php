<?php
class Finder {
    private $finderId;
    private $name;
    private $phone;
    private $email;
    private $password;
    private $providerId;
    private $promoterId;

    function __construct ($fId = null, $n = null, $ph = null, $e = null, $pass = null, $prvId = null, $prmId = null)
    {
        $this->finderId = $fId;
        $this->name = $n;
        $this->phone = $ph;
        $this->email = $e;
        $this->password = $pass;
        $this->providerId = $prvId;
        $this->promoterId = $prmId;
    }
    
    /**
     * @return string
     */
    public function getFinderId()
    {
        return $this->finderId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
    public function getPromoterId()
    {
        return $this->promoterId;
    }

    /**
     * @param string $finderId
     */
    public function setFinderId($finderId)
    {
        $this->finderId = $finderId;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param string $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }

    /**
     * @param string $promoterId
     */
    public function setPromoterId($promoterId)
    {
        $this->promoterId = $promoterId;
    }


    public function getFinderByEmail($connection){
        $email=$this->email;
        $sqlStmt="select * from finder where Email=:email";
        
        $prepare=$connection->prepare($sqlStmt);
        $prepare->bindvalue(":email",$email);
        $prepare->execute();
        
        $result=$prepare->fetchAll();
        
        $tObj="";
        
        if (sizeOf($result)>0){
            
            $tObj = new Finder();
            
            foreach ($result as $oneRec){
                
                $tObj->finderId=$oneRec["FinderId"];
                $tObj->name=$oneRec["Name"];
                $tObj->phone=$oneRec["Phone"];
                $tObj->email=$oneRec["Email"];
                $tObj->password=$oneRec["Password"];
                $tObj->providerId=$oneRec["PromoterId"];
                $tObj->promoterId=$oneRec["ProviderId"];

            }
        }
        return serialize($tObj);
    }
}

