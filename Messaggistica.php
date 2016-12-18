<?php

require_once "Helpers.php";

/**
 * Description of Messaggistica
 *
 * @author gianl
 */
class Messaggistica {

    private $id;
    private $type;
    private $from_id;
    private $to_id;
    private $time;
    private $text;
    private $attachment_id;
    private $session_id;
    private $seen;

    function getId() {
        return $this->id;
    }

    function getType() {
        return $this->type;
    }

    function getFrom_id() {
        return $this->from_id;
    }

    function getTo_id() {
        return $this->to_id;
    }

    function getTime() {
        return $this->time;
    }

    function getText() {
        return $this->text;
    }

    function getAttachment_id() {
        return $this->attachment_id;
    }

    function getSession_id() {
        return $this->session_id;
    }

    function getSeen() {
        return $this->seen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setFrom_id($from_id) {
        $this->from_id = $from_id;
    }

    function setTo_id($to_id) {
        $this->to_id = $to_id;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setAttachment_id($attachment_id) {
        $this->attachment_id = $attachment_id;
    }

    function setSession_id($session_id) {
        $this->session_id = $session_id;
    }

    function setSeen($seen) {
        $this->seen = $seen;
    }

    function __construct($id, $type="", $from_id="", $to_id="", $time="", 
            $text="", $attachment_id="", $session_id="", $seen="") {
        $this->id = $id;
        $this->type = $type;
        $this->from_id = $from_id;
        $this->to_id = $to_id;
        $this->time = $time;
        $this->text = $text;
        $this->attachment_id = $attachment_id;
        $this->session_id = $session_id;
        $this->seen = $seen;
    }

    /**
     * Estrae tutti i messaggi non letti e li conta
     * @return mixed Una lista di oggetti messaggi oppure false in caso di errore
     */
    public static function selectNonLetti($idUtente) {
        $sql = "SELECT t1.id, t1.type, t1.from_id, t1.to_id, t1.time, " .
                " t1.text, t1.attachment_id, t1.session_id, t1.seen ".
                " FROM msg_messaggi as t1 " .
                " WHERE t1.seen = 0 " .
                " AND t1.to_id = '$idUtente' ".
                " ORDER BY t1.time DESC";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Messaggistica($row["id"], $row["type"], 
                    $row["from_id"], $row["to_id"], $row["time"], $row["text"]
                    , $row["attachment_id"], $row["session_id"], $row["seen"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }
}
