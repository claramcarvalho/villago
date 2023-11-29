<?php
class Event {
    private $eventID;
    private $eventName;
    private $eventAddress;
    private $lat;
    private $lng;
    private $eventDate;
    private $countryId;
    private $size;
    
    function __construct ($eId = null, $eN = null, $eA = null, $lat = null, $lng = null, $eD = null, $ctrId = null, $s = null)
    {
        $this->eventID = $eId;
        $this->eventName = $eN;
        $this->eventAddress = $eA;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->eventDate = $eD;
        $this->countryId = $ctrId;
        $this->size = $s;
    }
    
    /**
     * @return string
     */
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @return string
     */
    public function getEventAddress()
    {
        return $this->eventAddress;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @return string
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $eventID
     */
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;
    }

    /**
     * @param string $eventName
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    /**
     * @param string $eventAddress
     */
    public function setEventAddress($eventAddress)
    {
        $this->eventAddress = $eventAddress;
    }

    /**
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @param string $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * @param string $eventDate
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @param string $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    public static function getAllEvents($connection)
    {
        $counter = 0;
        $query = "SELECT *
                    FROM event";
        
        $Events = $connection->query($query);

        foreach ($Events as $oneEvent)
        {
            $eId = $oneEvent["EventId"];
            $eN = $oneEvent["Name"];
            $eAd = $oneEvent["Address"];
            $eLat = $oneEvent["Latitude"];
            $eLng = $oneEvent["Longitude"];
            $eD = $oneEvent["Date"];
            $ctrId = $oneEvent["CountryId"];
            $s = $oneEvent["Size"];

            $event = new Event($eId, $eN, $eAd, $eLat, $eLng, $eD, $ctrId, $s);
            $listOFevents[$counter++] = $event;
        }
        return serialize($listOFevents);
    }
}

