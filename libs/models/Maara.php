<?php

class Maara {

    private $reseptiID;
    private $vaihenumero;
    private $raakaaineID;
    private $maara;
    private $mittayksikko;

    public function __construct() {
        
    }

    public function setReseptiID($reseptiID) {
        $this->reseptiID = $reseptiID;
    }

    public function setVaihenumero($vaihenumero) {
        $this->vaihenumero = $vaihenumero;
    }

    public function setRaakaaineID($raakaaineID) {
        $this->raakaaineID = $raakaaineID;
    }

    public function setMaara($maara) {
        $this->maara = $maara;
    }

    public function setMittayksikko($mittayksikko) {
        $this->mittayksikko = $mittayksikko;
    }

    public function getReseptiID() {
        return $this->reseptiID;
    }

    public function getVaihenumero() {
        return $this->vaihenumero;
    }

    public function getRaakaaineID() {
        return $this->raakaaineID;
    }

    public function getMaara() {
        return $this->maara;
    }

    public function getMittayksikko() {
        return $this->mittayksikko;
    }

    public function onkoKelvollinen() {

        if (!is_numeric($this->maara)) {
            $this->virheet["maara"] = "Raaka-ainemäärän tulee olla numero.";
        } elseif ($this->maara <= 0) {
            $this->virheet["maara"] = "Raaka-ainemäärän tulee olla positiivinen.";
        } else {
            unset($this->virheet["maara"]);
        }

        if ($this->onkoRaakaaineellaMaara($this->reseptiID, $this->vaihenumero, $this->raakaaineID)) {
            $this->virheet["raakaaineellaonjomaara"] = "Sama raaka-aine voi olla kussakin vaiheessa vain kerran.";
        } else {
            unset($this->virheet["raakaaineellaonjomaara"]);
        }

        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function onkoRaakaaineellaMaara($reseptiid, $vaihenumero, $raakaaineid) {
        $sql = "SELECT count(*) FROM maara WHERE reseptiid = ? AND vaihenumero = ? AND raakaaineid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($reseptiid, $vaihenumero, $raakaaineid));

        $lkm = $kysely->fetchColumn();

        if ($lkm == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO maara (reseptiid, vaihenumero, raakaaineid, maara, mittayksikko) VALUES (?,?,?,?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getReseptiID()), htmlspecialchars($this->getVaihenumero()), htmlspecialchars($this->getRaakaaineID()), htmlspecialchars($this->getMaara()), htmlspecialchars($this->getMittayksikko())));
    }

    public static function haeMaaraReseptiVaiheJaRaakaaineIDeilla($reseptiid, $vaihenumero, $raakaaineid) {
        $sql = "SELECT reseptiid, vaihenumero, raakaaineid, maara, mittayksikko FROM maara WHERE reseptiid = ? AND vaihenumero = ? AND raakaaineid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($reseptiid, $vaihenumero, $raakaaineid));

        $tulos = $kysely->fetchObject();
        $maara = new Maara();
        $maara->setReseptiID($tulos->reseptiid);
        $maara->setVaihenumero($tulos->vaihenumero);
        $maara->setRaakaaineID($tulos->raakaaineid);
        $maara->getMaara($tulos->maara);
        $maara->getMittayksikko($tulos->mittayksikko);

        return $maara;
    }

    public static function haeMaaratReseptiIDllaJaVaiheNROlla($reseptiid, $vaihenumero) {
        $sql = "SELECT reseptiid, vaihenumero, raakaaineid, maara, mittayksikko FROM maara WHERE reseptiid = ? AND vaihenumero = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($reseptiid, $vaihenumero));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $maara = new Maara();
            $maara->setReseptiID($tulos->reseptiid);
            $maara->setVaihenumero($tulos->vaihenumero);
            $maara->setRaakaaineID($tulos->raakaaineid);
            $maara->setMaara($tulos->maara);
            $maara->setMittayksikko($tulos->mittayksikko);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 

            $tulokset[] = $maara;
        }
        return $tulokset;
    }

////   TODO poista OSA AINAKIN
////    public static function etsiReseptiIDlla($id) {
////        $sql = "SELECT nimi, kuvaus, raakaaineluokitus ,kayttotilanneluokitus, annosmaara, kayttajaid FROM valmistusvaihe where reseptiid = ?";
////        $kysely = getTietokantayhteys()->prepare($sql);
////        $kysely->execute(array($id));
////
////        $tulos = $kysely->fetchObject();
////        if ($tulos == null) {
////            echo "null";
////            return null;
////        } else {
////            $kayttaja = new Kayttaja();
////            $kayttaja->setKayttajaID($tulos->kayttajaid);
////            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
////            $kayttaja->setSalasana($tulos->salasana);
////            $kayttaja->setSahkoposti($tulos->sahkoposti);
////            return $kayttaja;
////        }
////    
////    
////    }
////    public function muokkaa() {
////        $sql = "UPDATE kayttaja SET kayttajatunnus =?, salasana=?, sahkoposti=? WHERE kayttajaid=?";
////        $kysely = getTietokantayhteys()->prepare($sql);
////        $ok = $kysely->execute(array(htmlspecialchars($this->getKayttajatunnus()), htmlspecialchars($this->getSalasana()), htmlspecialchars($this->getSahkoposti()), $this->getKayttajaID()));
//////        echo 'testing face info ';
//////        echo 'MUOKATUN KÄYTTÄJÄN TUNNUS=';
//////        echo htmlspecialchars($this->getKayttajatunnus());
////    }
////
////    public function poista() {
////        $sql = "DELETE FROM kayttaja WHERE kayttajaid=?";
////        $kysely = getTietokantayhteys()->prepare($sql);
////        $ok = $kysely->execute(array($this->getKayttajaID()));
////    }
}

?>
