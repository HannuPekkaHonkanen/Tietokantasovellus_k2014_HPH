<?php

class Kayttaja {

    private $kayttajaID;
    private $kayttajatunnus;
    private $salasana;
    private $sahkoposti;

    public function __construct() {
    }

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
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM kayttaja ORDER BY kayttajatunnus";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.

            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    public static function getKayttajatSivulla($sivu, $montako) {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM kayttaja ORDER BY kayttajatunnus LIMIT ? OFFSET ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($montako, ($sivu - 1) * $montako));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);

            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */

    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti from kayttaja where kayttajatunnus = ? AND salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array(htmlspecialchars($kayttaja), htmlspecialchars($salasana)));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);
            return $kayttaja;
        }
    }

    public static function etsiKayttajaIDlla($id) {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti from kayttaja where kayttajaid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            echo "null";
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);
            return $kayttaja;
        }
    }

    public static function lukumaara() {
        $sql = "SELECT count(*) FROM kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        return $kysely->fetchColumn();
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO kayttaja (kayttajatunnus, salasana, sahkoposti) VALUES (?,?,?) RETURNING kayttajaid";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getKayttajatunnus()), htmlspecialchars($this->getSalasana()), htmlspecialchars($this->getSahkoposti())));
//        echo'ok=';
//        echo $ok;
        $this->kayttajaID = $kysely->fetchColumn();
//        echo ' id=';
//        echo $this->getKayttajaID();
    }

    public function muokkaa() {
        $sql = "UPDATE kayttaja SET kayttajatunnus =?, salasana=?, sahkoposti=? WHERE kayttajaid=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getKayttajatunnus()), htmlspecialchars($this->getSalasana()), htmlspecialchars($this->getSahkoposti()), $this->getKayttajaID()));
//        echo 'testing face info ';
//        echo 'MUOKATUN KÄYTTÄJÄN TUNNUS=';
//        echo htmlspecialchars($this->getKayttajatunnus());
    }

    public function poista() {
        $sql = "DELETE FROM kayttaja WHERE kayttajaid=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getKayttajaID()));
    }

}