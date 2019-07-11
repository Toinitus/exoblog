<?php
namespace App\Model\Table;

use Core\Model\Table;

class Orders_lineTable extends Table
{
    public function getPanier($id)
    {
        return $this->query("SELECT * FROM {$this->table} 
                    JOIN beer ON $this->table.beer_id = beer.id
                    WHERE user_id = ?", [$id]);
    }

    

}
