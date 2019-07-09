<?php
namespace App\Model\Table;

use Core\Model\Table;

class CategoryTable extends Table
{

    public function allInId(string $ids)
    {
        return $this->query("SELECT c.*, pc.post_id
                FROM post_category pc 
                LEFT JOIN category c on pc.category_id = c.id
                WHERE post_id IN (" . $ids . ")");
    }

    public function allByLimit(int $limit, int $offset)
    {
        return $this->query("SELECT * FROM {$this->table} LIMIT {$limit}  OFFSET {$offset}");
    }
}
