<?php

class Valmistusvaihe {

    private $reseptiID;
    private $jarjestysnumero;
    private $nimi;
    private $ohjeet;
    private $kuva;

    public function __construct() {
        
    }

    public function setReseptiID($kayttajaID) {
        $this->reseptiID = $kayttajaID;
    }

    public function setJarjestysnumero($jarjestysnumero) {
        $this->jarjestysnumero = $jarjestysnumero;
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

    public function getJarjestysnumero() {
        return $this->jarjestysnumero;
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

    public function getVirheet() {
//        return $this->virheet["annosmaara"]+$this->virheet["nimi"];
        return $this->virheet;
    }

//    public function lisaaKantaan() {
//        $sql = "INSERT INTO valmistusvaihe (nimi, kuvaus, raakaaineluokitus ,kayttotilanneluokitus, annosmaara, kayttajaid) VALUES (?,?,?,?,?,?) RETURNING reseptiid";
//        $kysely = getTietokantayhteys()->prepare($sql);
//        $ok = $kysely->execute(array(htmlspecialchars($this->getNimi()), htmlspecialchars($this->getKuvaus()), htmlspecialchars($this->getRaakaaineluokitus()), htmlspecialchars($this->getKayttotilanneluokitus()), htmlspecialchars($this->getAnnosmaara()), htmlspecialchars($this->kayttajaID)));
//        $this->reseptiID = $kysely->fetchColumn();
//    }


    public static function haeVaiheetReseptiIDlla($id) {
        $sql = "SELECT reseptiid, jarjestysnumero, nimi, ohjeet, kuva FROM valmistusvaihe WHERE reseptiid = ? ORDER BY jarjestysnumero";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $valmistusvaihe = new Valmistusvaihe();
            $valmistusvaihe->setReseptiID($tulos->reseptiid);
            $valmistusvaihe->setJarjestysnumero($tulos->jarjestysnumero);
            $valmistusvaihe->setNimi($tulos->nimi);
            $valmistusvaihe->setOhjeet($tulos->ohjeet);
            $valmistusvaihe->setKuva($tulos->kuva);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 

            $tulokset[] = $valmistusvaihe;
        }
        return $tulokset;
    }

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
