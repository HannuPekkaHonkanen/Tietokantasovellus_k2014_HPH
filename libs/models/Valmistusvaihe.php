<?php

class Valmistusvaihe {

    private $reseptiID;
    private $vaihenumero;
    private $nimi;
    private $ohjeet;
    private $kuva;

    public function __construct() {
        
    }

    public function setReseptiID($reseptiID) {
        $this->reseptiID = $reseptiID;
    }

    public function setVaihenumero($vaihenumero) {
        $this->vaihenumero = $vaihenumero;
    }

    public function setOhjeet($ohjeet) {
        $this->ohjeet = $ohjeet;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setKuva($kuva) {
        $this->kuva = $kuva;
    }

    public function getReseptiID() {
        return $this->reseptiID;
    }

    public function getVaihenumero() {
        return $this->vaihenumero;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getOhjeet() {
        return $this->ohjeet;
    }

    public function getKuva() {
        return $this->kuva;
    }

    public function onkoKelvollinen() {

        if (trim($this->nimi) == "") {
            $this->virheet["nimi"] = "Nimi ei saa olla tyhjä.";
        } else {
            unset($this->virheet["nimi"]);
        }

        if (trim($this->ohjeet) == "") {
            $this->virheet["nimi"] = "Ohjeet ei saa olla tyhjä.";
        } else {
            unset($this->virheet["nimi"]);
        }

        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO valmistusvaihe (reseptiid, nimi, ohjeet, kuva) VALUES (?,?,?,?) RETURNING vaihenumero";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getReseptiID()), htmlspecialchars($this->getNimi()), htmlspecialchars($this->getOhjeet()), htmlspecialchars($this->getKuva())));
        $this->vaihenumero = $kysely->fetchColumn();
    }

    public static function haeVaiheetReseptiIDlla($id) {
        $sql = "SELECT reseptiid, vaihenumero, nimi, ohjeet, kuva FROM valmistusvaihe WHERE reseptiid = ? ORDER BY vaihenumero";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $valmistusvaihe = new Valmistusvaihe();
            $valmistusvaihe->setReseptiID($tulos->reseptiid);
            $valmistusvaihe->setVaihenumero($tulos->vaihenumero);
            $valmistusvaihe->setNimi($tulos->nimi);
            $valmistusvaihe->setOhjeet($tulos->ohjeet);
            $valmistusvaihe->setKuva($tulos->kuva);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 

            $tulokset[] = $valmistusvaihe;
        }
        return $tulokset;
    }

//   TODO OSA VARMAAN POISTETTAVAA
//    public static function etsiReseptiIDlla($id) {
//        $sql = "SELECT nimi, kuvaus, raakaaineluokitus ,kayttotilanneluokitus, annosmaara, kayttajaid FROM valmistusvaihe where reseptiid = ?";
//        $kysely = getTietokantayhteys()->prepare($sql);
//        $kysely->execute(array($id));
//
//        $tulos = $kysely->fetchObject();
//        if ($tulos == null) {
//            echo "null";
//            return null;
//        } else {
//            $kayttaja = new Kayttaja();
//            $kayttaja->setKayttajaID($tulos->kayttajaid);
//            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
//            $kayttaja->setSalasana($tulos->salasana);
//            $kayttaja->setSahkoposti($tulos->sahkoposti);
//            return $kayttaja;
//        }
//    
//    
//    }
//    public function muokkaa() {
//        $sql = "UPDATE kayttaja SET kayttajatunnus =?, salasana=?, sahkoposti=? WHERE kayttajaid=?";
//        $kysely = getTietokantayhteys()->prepare($sql);
//        $ok = $kysely->execute(array(htmlspecialchars($this->getKayttajatunnus()), htmlspecialchars($this->getSalasana()), htmlspecialchars($this->getSahkoposti()), $this->getKayttajaID()));
////        echo 'testing face info ';
////        echo 'MUOKATUN KÄYTTÄJÄN TUNNUS=';
////        echo htmlspecialchars($this->getKayttajatunnus());
//    }
//
//    public function poista() {
//        $sql = "DELETE FROM kayttaja WHERE kayttajaid=?";
//        $kysely = getTietokantayhteys()->prepare($sql);
//        $ok = $kysely->execute(array($this->getKayttajaID()));
//    }
}

?>
