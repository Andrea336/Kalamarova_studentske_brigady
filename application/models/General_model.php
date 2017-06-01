<?php

class General_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    function first_chart()
    {
//       "SELECT concat(student.meno, ' ', student.priezvisko) AS meno, SUM(brigada_student.pocet_hodin*brigada.hodinova_sadzba) AS zarobok FROM student INNER JOIN brigada_student ON brigada_student.id = student.id INNER JOIN brigada ON brigada_student.brigada_id = brigada.id GROUP BY (meno) ORDER BY zarobok"

        $this->db->select('concat(student.meno, " ", student.priezvisko) AS meno, SUM(brigada_student.pocet_hodin*brigada.hodinova_sadzba) AS zarobok')
            ->from('student')
            ->join('brigada_student', 'brigada_student.id = student.id')
            ->join('brigada', 'brigada_student.brigada_id = brigada.id')
            ->group_by('meno')
            ->order_by('zarobok');

        return $this->db->get();
    }

    function second_chart()
    {
//        SELECT COUNT(student.id) AS pocet, krajina.nazov AS krajina FROM student INNER JOIN krajina ON krajina.id = student.krajina_id GROUP BY krajina

        $this->db->select('COUNT(student.id) AS pocet, krajina.nazov AS krajina')
            ->from('student')
            ->join('krajina', 'krajina.id = student.krajina_id')
            ->group_by('krajina')
            ->order_by('pocet');

        return $this->db->get();
    }

    function get_brigady()
    {
        $this->db->select('brigada.id AS id, brigada.nazov AS nazov, kategoria_brigada.nazov AS kategoria, zamestnavatel.firma AS zamestnavatel')
            ->from('brigada')
            ->join('kategoria_brigada', 'brigada.kategoria_brigada_id = kategoria_brigada.id')
            ->join('zamestnavatel', 'brigada.zamestnavatel_id = zamestnavatel.id');
        return $this->db->get();
    }

    function get_studenti()
    {
        $this->db->select('student.id AS id, student.meno AS meno, student.priezvisko AS priezvisko, student.predchadzajuce_skusenosti AS predchadzajuce_skusenosti, student.zrucnosti AS zrucnosti, student.preferencie AS preferencie, student.adresa AS adresa, krajina.nazov as krajina')
            ->from('student')
            ->join('krajina', 'student.krajina_id = krajina.id');
        return $this->db->get();
    }

    function get_student($id)
    {
        $this->db->select('student.id AS id, student.meno AS meno, student.priezvisko AS priezvisko, student.predchadzajuce_skusenosti AS predchadzajuce_skusenosti, student.zrucnosti AS zrucnosti, student.preferencie AS preferencie, student.adresa AS adresa, krajina.nazov as krajina')
            ->from('student')
            ->join('krajina', 'student.krajina_id = krajina.id')
            ->where('student.id', $id)
            ->limit(1);
        return $this->db->get();
    }

    function get_brigada($id)
    {
        $this->db->select('brigada.id AS id, brigada.nazov AS nazov, brigada.napln_prace AS napln_prace, brigada.hodinova_sadzba AS hodinova_sadzba, kategoria_brigada.nazov AS kategoria, zamestnavatel.firma AS zamestnavatel')
            ->from('brigada')
            ->join('kategoria_brigada', 'brigada.kategoria_brigada_id = kategoria_brigada.id')
            ->join('zamestnavatel', 'brigada.zamestnavatel_id = zamestnavatel.id')
            ->where('brigada.id', $id)
            ->limit(1);
        return $this->db->get();
    }

    function get_kategoria_dropdown()
    {
        $this->db->order_by('nazov')->select('id, nazov')->from('kategoria_brigada');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->nazov;
            }
            return $dropdownlist;
        }
    }

    function get_brigady_studenti($id)
    {
        $this->db->select('brigada_student.id AS id, brigada.nazov AS nazov, brigada.hodinova_sadzba AS hodinova_sadzba, brigada_student.odkedy AS odkedy, brigada_student.dokedy AS dokedy, brigada_student.provizia AS provizia, brigada_student.pocet_hodin AS pocet_hodin, (pocet_hodin*hodinova_sadzba) AS cisty_zarobok')
            ->from('brigada_student')
            ->join('brigada', 'brigada.id = brigada_student.brigada_id')
            ->where('student_id', $id);
        return $this->db->get();
    }

    function get_brigada_student($id)
    {
        $this->db->select('brigada_student.id AS id, brigada_student.student_id AS student_id, brigada_student.brigada_id AS brigada_id, brigada.nazov AS nazov, brigada.hodinova_sadzba AS hodinova_sadzba, brigada_student.odkedy AS odkedy, brigada_student.dokedy AS dokedy, brigada_student.provizia AS provizia, brigada_student.pocet_hodin AS pocet_hodin, (pocet_hodin*hodinova_sadzba) AS cisty_zarobok')
            ->from('brigada_student')
            ->join('brigada', 'brigada.id = brigada_student.brigada_id')
            ->where('brigada_student.id', $id)
            ->limit(1);
        return $this->db->get();
    }

    function get_krajina_dropdown()
    {
        $this->db->order_by('nazov')->select('id, nazov')->from('krajina');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->nazov;
            }
            return $dropdownlist;
        }
    }

    function get_student_dropdown()
    {
        $this->db->order_by('meno')->select('id, meno, priezvisko')->from('student');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->meno . ' ' . $dropdown->priezvisko;
            }
            return $dropdownlist;
        }
    }

    function get_brigada_dropdown()
    {
        $this->db->order_by('nazov')->select('id, nazov')->from('brigada');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->nazov;
            }
            return $dropdownlist;
        }
    }

    function get_zamestnavatel_dropdown()
    {
        $this->db->order_by('firma')->select('id, firma')->from('zamestnavatel');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->firma;
            }
            return $dropdownlist;
        }
    }

    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function update($column, $value, $table, $data)
    {
        $this->db->where($column, $value);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }

    function select($columns, $table)
    {
        $this->db->select($columns)->from($table);
        return $this->db->get();
    }

    function select_by_id($columns, $table, $id)
    {
        $this->db
            ->select($columns)
            ->from($table)
            ->where($table . '.id', $id)
            ->limit(1);
        return $this->db->get();
    }

    function delete($column, $value, $table)
    {
        $this->db->where($column, $value)
            ->delete($table);

        if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }


}