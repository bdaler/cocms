<?php
/**
 * Created by PhpStorm.
 * User: bdaler
 * Date: 18.04.16
 * Time: 16:44
 */
class Content{
    public $cid;
    public $ctitle;
    public $curl;
    public $ctext;
    public $cmenuid;
    public $ccategotyid;
    public $cstatus;
    public $cauthor;
    public $ckeywords;
    public $cdescr;
    public $caddeddate;

    public function getCid()
    {
        return $this->cid;
    }

    public function setCid($cid)
    {
        $this->cid = $cid;
        return $this;
    }

    public function getCtitle()
    {
        return $this->ctitle;
    }

    public function setCtitle($ctitle)
    {
        $this->ctitle = $ctitle;
        return $this;
    }

    public function getCurl()
    {
        return $this->curl;
    }

    public function setCurl($curl)
    {
        $this->curl = $curl;
        return $this;
    }

    public function getCtext()
    {
        return $this->ctext;
    }

    public function setCtext($ctext)
    {
        $this->ctext = $ctext;
        return $this;
    }

    public function getCmenuid()
    {
        return $this->cmenuid;
    }

    public function setCmenuid($cmenuid)
    {
        $this->cmenuid = $cmenuid;
        return $this;
    }

    public function getCcategotyid()
    {
        return $this->ccategotyid;
    }

    public function setCcategotyid($ccategotyid)
    {
        $this->ccategotyid = $ccategotyid;
        return $this;
    }

    public function getCstatus()
    {
        return $this->cstatus;
    }

    public function setCstatus($cstatus)
    {
        $this->cstatus = $cstatus;
        return $this;
    }
    public function getCauthor()
    {
        return $this->cauthor;
    }

    public function setCauthor($cauthor)
    {
        $this->cauthor = $cauthor;
        return $this;
    }

    public function getCkeywords()
    {
        return $this->ckeywords;
    }

    public function setCkeywords($ckeywords)
    {
        $this->ckeywords = $ckeywords;
        return $this;
    }

    public function getCdescr()
    {
        return $this->cdescr;
    }

    public function setCdescr($cdescr)
    {
        $this->cdescr = $cdescr;
        return $this;
    }

    public function getCaddeddate()
    {
        return $this->caddeddate;
    }

    public function setCaddeddate($caddeddate)
    {
        $this->caddeddate = $caddeddate;
        return $this;
    }
}