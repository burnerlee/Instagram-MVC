<?php

namespace Model;

class Feed {

    public static function get_all() {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM feeds");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
}
