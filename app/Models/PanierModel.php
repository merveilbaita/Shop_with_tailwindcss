<?php

namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'paniers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'produit_id','mail', 'designation','qte', 'adresse', 'ville', 'code_postal', 'pays', 'date_ajout','total'];
}
