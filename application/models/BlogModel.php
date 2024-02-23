<?php
final class BlogModel extends CI_Model
{
    public $table = "blog";
    public function insert($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function get_records()
    {
        $result = $this->db->get($this->table)->result();
        return $result;
    }

    public function insert_blog($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function findby_id($id)
    {
        $result = $this->db->get_where($this->table, array("blog_id" => $id))->row();
        return $result;
    }

    public function update($id, $data)
    {
        $result = $this->db->update($this->table, $data, array("blog_id" => $id));
        return $result;
    }

    public function delete($id)
    {
        $result = $this->db->delete($this->table, array("blog_id" => $id));
        return $result;
    }
}


?>