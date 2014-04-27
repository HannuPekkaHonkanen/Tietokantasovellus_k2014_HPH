<?php

class OstoslistanRivi {

    private $raakaaineNimi;
    private $raakaaineMaara;
    private $raakaaineYksikko;

    public function __construct() {
        
    }

    public function setRaakaaineNimi($raakaaineNimi) {
        $this->raakaaineNimi = $raakaaineNimi;
    }

    public function setRaakaaineMaara($raakaaineMaara) {
        $this->raakaaineMaara = $raakaaineMaara;
    }

    public function setRaakaaineYksikko($raakaaineYksikko) {
        $this->raakaaineYksikko = $raakaaineYksikko;
    }

    public function getRaakaaineNimi() {
        return $this->raakaaineNimi;
    }

    public function getRaakaaineMaara() {
        return $this->raakaaineMaara;
    }

    public function getRaakaaineYksikko() {
        return $this->raakaaineYksikko;
    }


    public static function haeOstoslistanRivit($id) {
//        reseptin kenttää kuvaus ei listassa tarvita
        $sql = "SELECT maara.raakaaineid, raakaaine.nimi, SUM(maara.maara), maara.mittayksikko 
            FROM maara, raakaaine 
            WHERE reseptiid=? AND maara.raakaaineid=raakaaine.raakaaineid 
            GROUP BY maara.raakaaineid, mittayksikko, raakaaine.nimi 
            ORDER BY raakaaine.nimi";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $ostoslistanRivi = new OstoslistanRivi();
            $ostoslistanRivi->setRaakaaineNimi($tulos->nimi);
            $ostoslistanRivi->setRaakaaineMaara($tulos->sum);
            $ostoslistanRivi->setRaakaaineYksikko($tulos->mittayksikko);

            $tulokset[] = $ostoslistanRivi;
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
