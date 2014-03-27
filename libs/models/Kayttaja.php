<?php

class Kayttaja {

    private $kayttajatunnus;
    private $salasana;
    private $sahkoposti;

    public function __construct($kayttajatunnus, $salasana, $sahkoposti) {
        $this->kayttajatunnus = $kayttajatunnus;
        $this->salasana = $salasana;
        $this->sahkoposti = $sahkoposti;
    }

//    public function __construct() {
//    }

    /* Tähän gettereitä ja settereitä */

    public function setKayttajatunnus($kayttajatunnus){
        $this->kayttajatunnus = $kayttajatunnus;
    }

    public function setSalasana($salasana){
        $this->salasana = $salasana;
    }

    public function setSahkoposti($sahkoposti){
        $this->sahkoposti = $sahkoposti;
    }

    public function getKayttajatunnus(){
        return $this->kayttajatunnus ;
    }

    public function getSalasana(){
        return $this->salasana;
    }

    public function getSahkoposti(){
        return $this->sahkoposti;
    }

    public static function getKayttajat() {
        $sql = "SELECT kayttajatunnus, salasana, sahkoposti FROM Kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja($tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
//            $kayttaja = new Kayttaja();
//            $kayttaja->setId($tulos->kayttajatunnus);
//            $kayttaja->setTunnus($tulos->salasana);
//            $kayttaja->setSalanana($tulos->sahkoposti);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

}