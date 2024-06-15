<?php

namespace App\Models;

use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table = 'commandes';
    protected $primaryKey = 'id_commande';
    protected $allowedFields = ['user_id', 'mail', 'produit_id', 'designation', 'qte', 'adresse', 'ville', 'code_postal', 'pays', 'created_at'];

    public function getCommandesUtilisateur($user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->findAll();
    }
}
