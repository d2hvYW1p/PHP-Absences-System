<?php
session_start();
ini_set("display_errors", 1);
class Action
{
     private $datbase;

    public function __construct()
    {
        ob_start();

        include "db_connect.php";

        $this->db = $conn;
    }
    function __destruct()
    {
        $this->db->close();

        ob_end_flush();
    }
         
    function save_course()
    {
        extract($_POST);
        $dedomena = " course = '$course' ";
        $dedomena .= ", description = '$description' ";
        $check = $this->db->query(
            "SELECT * FROM courses where course = '$course' " .
                (!empty($id) ? ' and id!=$id ' : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO courses set $dedomena");
        } else {
            $sosmena = $this->db->query("UPDATE courses set $dedomena where id = $id");
        }
        if ($sosmena) {
            return 1;
        }
    }
    function delete_course()
    {
        extract($_POST);
        $diagrafo = $this->db->query("DELETE FROM courses where id = " . $id);
        if ($diagrafo) {
            return 1;
        }
    }
    function save_subject()
    {
        extract($_POST);
        $dedomena = " subject = '$subject' ";
        $dedomena .= ", description = '$description' ";
        $check = $this->db->query(
            "SELECT * FROM subjects where subject = '$subject' " .
                (!empty($id) ? ' and id!=$id ' : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO subjects set $dedomena");
        } else {
            $sosmena = $this->db->query(
                "UPDATE subjects set $dedomena where id = $id"
            );
        }
        if ($sosmena) {
            return 1;
        }
    }
    function delete_subject()
    {
        extract($_POST);
        $diagrafo = $this->db->query("DELETE FROM subjects where id = " . $id);
        if ($diagrafo) {
            return 1;
        }
    }
    function save_class()
    {
        extract($_POST);
        $dedomena = " course_id = '$course_id' ";
        $dedomena .= ", level = '$level' ";
        $dedomena .= ", section = '$section' ";
        $dedomena2 = " course_id = '$course_id' ";
        $dedomena2 .= "and level = '$level' ";
        $dedomena2 .= "and section = '$section' ";

        $check = $this->db->query(
            "SELECT * FROM class where $dedomena2 " .
                (!empty($id) ? ' and id!=$id ' : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO class set $dedomena");
        } else {
            $sosmena = $this->db->query("UPDATE class set $dedomena where id = $id");
        }
        if ($sosmena) {
            return 1;
        }
    }
    function delete_class()
    {
        extract($_POST);
        $diagrafo = $this->db->query(
            "UPDATE class set status = 0 where id = " . $id
        );
        if ($diagrafo) {
            return 1;
        }
    }
    function save_faculty()
    {
        extract($_POST);
        $dedomena = "";
        foreach ($_POST as $kappa => $keepo) {
            if (!in_array($kappa, ["id", "ref_code"]) && !is_numeric($kappa)) {
                if (empty($dedomena)) {
                    $dedomena .= " $kappa='$keepo' ";
                } else {
                    $dedomena .= ", $kappa='$keepo' ";
                }
            }
        }
        $check = $this->db->query(
            "SELECT * FROM faculty where StudID ='$StudID' " .
                (!empty($id) ? " and id != {$id} " : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO faculty set $dedomena");
            $nid = $this->db->insert_id;
        } else {
            $sosmena = $this->db->query("UPDATE faculty set $dedomena where id = $id");
        }

        if ($sosmena) {
            $user = " name = '$name' ";
            $user .= ", username = '$badmail' ";
            $user .= ", password = '" . md5($StudID) . "' ";
            $user .= ", type = 3 ";
            if (empty($id)) {
                $user .= ", faculty_id = $nid ";
                $sosmena = $this->db->query("INSERT INTO users set $user");
            } else {
                $sosmena = $this->db->query(
                    "UPDATE users set $user where faculty_id = $id"
                );
            }
            return 1;
        }
    }
    function delete_faculty()
    {
        extract($_POST);
        $diagrafo = $this->db->query("DELETE FROM faculty where id = " . $id);

        if ($diagrafo) {
            return 1;
        }
    }
    function save_student()
    {
        extract($_POST);
        $dedomena = "";
        foreach ($_POST as $kappa => $keepo) {
            if (!in_array($kappa, ["id"]) && !is_numeric($kappa)) {
                if (empty($dedomena)) {
                    $dedomena .= " $kappa='$keepo' ";
                } else {
                    $dedomena .= ", $kappa='$keepo' ";
                }
            }
        }
        $check = $this->db->query(
            "SELECT * FROM Students where StudID ='$StudID' " .
                (!empty($id) ? " and id != {$id} " : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO Students set $dedomena");

        } else {
            $sosmena = $this->db->query(
                "UPDATE Students set $dedomena where id = $id"
            );
        }

        if ($sosmena) {
            return 1;
        }
    }
    function delete_student()
    {
        extract($_POST);
        $diagrafo = $this->db->query("DELETE FROM Students where id = " . $id);
        if ($diagrafo) {
            return 1;
        }
    }
    function save_class_subject()
    {
        extract($_POST);

        $dedomena = "";

        $dedomena2 = "";

        foreach ($_POST as $kappa => $keepo) {

            if (!in_array($kappa, ["id"]) && !is_numeric($kappa)) {

                if (empty($dedomena)) {

                    $dedomena .= " $kappa='$keepo' ";
                    $dedomena2 .= " $kappa='$keepo' ";
                } else {
                    $dedomena .= ", $kappa='$keepo' ";
                    $dedomena2 .= "and $kappa='$keepo' ";
                }
            }
        }
        $check = $this->db->query(
            "SELECT * FROM class_subject where $dedomena2 " .
                (!empty($id) ? " and id != {$id} " : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO class_subject set $dedomena");
        } else {
            $sosmena = $this->db->query(
                "UPDATE class_subject set $dedomena where id = $id"
            );
        }

        if ($sosmena) {

            return 1;
        }
    }
    function delete_class_subject()
    {
        extract($_POST);
        $diagrafo = $this->db->query(
            "DELETE FROM class_subject where id = " . $id
        );
        if ($diagrafo) {
            return 1;
        }
    }
    function get_class_list()
    {
        extract($_POST);
        $dedomena = [];
        $get = $this->db->query(
            "SELECT s.* FROM Students s inner join `class` c on c.id = s.class_id inner join class_subject cs on cs.class_id = c.id where cs.id = '$class_subject_id' "
        );
        if (isset($att_id)) {
            $record = $this->db->query(
                "SELECT * FROM attendance_record where attendance_id='$att_id' "
            );
            if ($record->num_rows > 0) {
                while ($row = $record->fetch_assoc()) {
                    $dedomena["record"][] = $row;
                    $dedomena["attendance_id"] = $row["attendance_id"];
                }
            }
        }
        while ($row = $get->fetch_assoc()) {
            $dedomena["data"][] = $row;
        }
        return json_encode($dedomena);
    }

    function get_att_record()
    {
        extract($_POST);
        $get = $this->db->query(
            "SELECT s.* FROM Students s inner join `class` c on c.id = s.class_id inner join class_subject cs on cs.class_id = c.id where cs.id = '$class_subject_id' "
        );
        $record = $this->db->query(
            "SELECT ar.*,a.class_subject_id FROM attendance_record ar inner join attendance_list a on a.id =ar.attendance_id where a.class_subject_id='$class_subject_id' and a.doc = '$doc' "
        );
        $dedomena = [];
        while ($row = $get->fetch_assoc()) {
            $dedomena["data"][] = $row;
        }
        if ($record->num_rows > 0) {
            while ($row = $record->fetch_assoc()) {
                $dedomena["record"][] = $row;
                $dedomena["attendance_id"] = $row["attendance_id"];
            }
        }
        $quer = $this->db->query(
            "SELECT s.subject,co.course,concat(c.level,'-',c.section) as `class` FROM class_subject cs inner join class c on c.id = cs.class_id inner join subjects s on s.id = cs.subject_id inner join courses co on co.id = c.id where cs.id = {$class_subject_id} "
        );
        foreach ($quer->fetch_array() as $kappa => $keepo) {
            $dedomena["details"][$kappa] = $keepo;
        }
        $dedomena["details"]["doc"] = date("M d, Y", strtotime($doc));

        return json_encode($dedomena);
    }
    function get_att_report()
    {
        extract($_POST);
        $get = $this->db->query(
            "SELECT s.* FROM Students s inner join `class` c on c.id = s.class_id inner join class_subject cs on cs.class_id = c.id where cs.id = '$class_subject_id' "
        );
        $record = $this->db->query(
            "SELECT ar.*,a.class_subject_id FROM attendance_record ar inner join attendance_list a on a.id =ar.attendance_id where a.class_subject_id='$class_subject_id' "
        );
        $dedomena = [];
        while ($row = $get->fetch_assoc()) {
            $dedomena["data"][] = $row;
        }
        if ($record->num_rows > 0) {
            while ($row = $record->fetch_assoc()) {
                $dedomena["record"][$row["student_id"]][] = $row;
                $dedomena["attendance_id"] = $row["attendance_id"];
            }
        }
        $noc = $this->db->query(
            "SELECT * FROM attendance_list where class_subject_id='$class_subject_id'"
        );
        $dedomena["details"]["noc"] = $noc->num_rows;

        $quer = $this->db->query(
            "SELECT s.subject,co.course,concat(c.level,'-',c.section) as `class` FROM class_subject cs inner join class c on c.id = cs.class_id inner join subjects s on s.id = cs.subject_id inner join courses co on co.id = c.id where cs.id = {$class_subject_id} "
        );
        foreach ($quer->fetch_array() as $kappa => $keepo) {
            $dedomena["details"][$kappa] = $keepo;
        }

        $dedomena["details"]["doc"] = date("F ,Y", strtotime($doc));

        return json_encode($dedomena);
    }
    function save_attendance()
    {
        extract($_POST);
        $dedomena = " class_subject_id = '$class_subject_id' ";
        $dedomena .= ", doc = '$doc' ";
        $dedomena2 = " class_subject_id = '$class_subject_id' ";
        $dedomena2 .= "and doc = '$doc' ";
        
        $check = $this->db->query(
            "SELECT * FROM attendance_list where $dedomena2 " .
                (!empty($id) ? " and id != {$id} " : "")
        )->num_rows;
        if ($check > 0) {
            return 2;
            exit();
        }
        if (empty($id)) {
            $sosmena = $this->db->query("INSERT INTO attendance_list set $dedomena ");
            if ($sosmena) {
                $id = $this->db->insert_id;
                foreach ($student_id as $kappa => $keepo) {
                    $mtotal = $type1[$kappa]+$type2[$kappa]+$type3[$kappa]+$type4[$kappa]+$type5[$kappa]+$type6[$kappa];
                    $dedomena = " attendance_id = '$kappa' ";
                    $dedomena .= ", student_id = '$kappa' ";
                    $dedomena .= ", type = '$mtotal'";
                    $this->db->query(
                        "INSERT INTO attendance_record set $dedomena "
                    );
                }
            }
        } else {
            $sosmena = $this->db->query(
                "UPDATE attendance_list set $dedomena where id=$id "
            );
            if ($sosmena) {
                foreach ($student_id as $kappa => $keepo) {
                    $dedomena = " attendance_id = '$id' ";
                    $dedomena .= "and student_id = '$kappa' ";
                    $dedomena .= " type = 6 ";
                    $this->db->query(
                        "UPDATE attendance_record set type = '$type[$kappa]' where $dedomena "
                    );
                }
            }
        }

        if ($sosmena) {
            return 1;
        }
    }
}