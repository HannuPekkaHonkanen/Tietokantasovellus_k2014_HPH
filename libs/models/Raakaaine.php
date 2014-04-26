<?php

class Raakaaine {

    private $raakaaineID;
    private $nimi;
    private $yksikkohinta;
    private $tilavuuspaino;
    private $kappalepaino;
    private $energiaa;
    private $proteiinia;
    private $hyvaaRasvaa;
    private $pahaaRasvaa;
    private $hiilihydraatteja;
    private $joistaSokereita;
    private $joistaLaktoosia;
    private $ravintokuitua;
    private $suolaa;

    public function __construct() {
    }

    public function setRaakaaineID($raakaaineID) {
        $this->raakaaineID = $raakaaineID;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setYksikkohinta($yksikkohinta) {
        $this->yksikkohinta = $yksikkohinta;
    }

    public function setTilavuuspaino($tilavuuspaino) {
        $this->tilavuuspaino = $tilavuuspaino;
    }

    public function setKappalepaino($kappalepaino) {
        $this->kappalepaino = $kappalepaino;
    }

    public function setEnergiaa($energiaa) {
        $this->energiaa = $energiaa;
    }

    public function setProteiinia($proteiinia) {
        $this->proteiinia = $proteiinia;
    }

    public function setHyvaaRasvaa($hyvaaRasvaa) {
        $this->hyvaaRasvaa = $hyvaaRasvaa;
    }

    public function setPahaaRasvaa($pahaaRasvaa) {
        $this->pahaaRasvaa = $pahaaRasvaa;
    }

    public function setHiilihydraatteja($hiilihydraatteja) {
        $this->hiilihydraatteja = $hiilihydraatteja;
    }

    public function setJoistaSokereita($joistaSokereita) {
        $this->joistaSokereita = $joistaSokereita;
    }

    public function setJoistaLaktoosia($joistaLaktoosia) {
        $this->joistaLaktoosia = $joistaLaktoosia;
    }

    public function setRavintokuitua($ravintokuitua) {
        $this->ravintokuitua = $ravintokuitua;
    }

    public function setSuolaa($suolaa) {
        $this->suolaa = $suolaa;
    }

    public function getRaakaaineID() {
        return $this->raakaaineID;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getYksikkohinta() {
        return $this->yksikkohinta;
    }

    public function getTilavuuspaino() {
        return $this->tilavuuspaino;
    }

    public function getKappalepaino() {
        return $this->kappalepaino;
    }

    public function getEnergiaa() {
        return $this->energiaa;
    }

    public function getProteiinia() {
        return $this->proteiinia;
    }

    public function getHyvaaRasvaa() {
        return $this->hyvaaRasvaa;
    }

    public function getPahaaRasvaa() {
        return $this->pahaaRasvaa;
    }

    public function getHiilihydraatteja() {
        return $this->hiilihydraatteja;
    }

    public function getJoistaSokereita() {
        return $this->joistaSokereita;
    }

    public function getJoistaLaktoosia() {
        return $this->joistaLaktoosia;
    }

    public function getRavintokuitua() {
        return $this->ravintokuitua;
    }

    public function getSuolaa() {
        return $this->suolaa;
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO raakaaine (nimi, yksikkohinta) VALUES (?,NULL) RETURNING raakaaineid";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getNimi())));
        $this->raakaaineID = $kysely->fetchColumn();
    }

    public function vieYksikkohintaKantaan() {
        $sql = "UPDATE raakaaine SET yksikkohinta =? WHERE raakaaineid=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getYksikkohinta()), $this->getRaakaaineID()));
    }
    

}

?>
