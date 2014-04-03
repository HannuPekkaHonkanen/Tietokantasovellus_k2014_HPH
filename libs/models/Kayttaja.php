<?php

class Kayttaja {

    private $kayttajaID;
    private $kayttajatunnus;
    private $salasana;
    private $sahkoposti;

    public function __construct($kayttajaID, $kayttajatunnus, $salasana, $sahkoposti) {
        $this->kayttajaID = $kayttajaID;
        $this->kayttajatunnus = $kayttajatunnus;
        $this->salasana = $salasana;
        $this->sahkoposti = $sahkoposti;
    }

//    public function __construct() {
//    }

    /* Tähän gettereitä ja settereitä */

    public function setKayttajaID($kayttajaID) {
        $this->kayttajaID = $kayttajaID;
    }

    public function setKayttajatunnus($kayttajatunnus) {
        $this->kayttajatunnus = $kayttajatunnus;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

    public function setSahkoposti($sahkoposti) {
        $this->sahkoposti = $sahkoposti;
    }

    public function getKayttajaID() {
        return $this->kayttajaID;
    }

    public function getKayttajatunnus() {
        return $this->kayttajatunnus;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getSahkoposti() {
        return $this->sahkoposti;
    }

    public static function getKayttajat() {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
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

    public static function getKayttajatSivulla($sivu, $montako) {
//        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus";
//        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus LIMIT 6 OFFSET 2";
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus LIMIT ? OFFSET ?";
        $kysely = getTietokantayhteys()->prepare($sql);
//        $kysely->execute();
        $kysely->execute(array($montako, ($sivu - 1) * $montako));
//        $xx=6;
//        $yy=2;
//        $kysely->execute(array($xx, $yy));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
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

    /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */

    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        $sql = "SELECT kayttajaID, kayttajatunnus, salasana, sahkoposti from Kayttaja where kayttajatunnus = ? AND salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja, $salasana));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja($tulos->kayttajaID, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
            return $kayttaja;
        }
    }

    public static function etsiKayttajaIDlla($id) {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti from Kayttaja where kayttajaid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            echo "null";
            return null;
        } else {
            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
            return $kayttaja;
        }
    }

    public static function lukumaara() {
        $sql = "SELECT count(*) FROM Kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        return $kysely->fetchColumn();
    }

}