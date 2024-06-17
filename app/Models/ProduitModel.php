<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table      = 'produits';
    protected $primaryKey = 'id_produit';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['designation','description','description_courte','categories',  'img', 'prix', 'qte'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_creation';
    protected $updatedField  = 'date_modification';
    protected $deletedField  = 'date_suppression';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Methode de recuperation des produits par catégorie
    public function getProduitsByCategorie($categorie)
    {
        return $this->where('categories', $categorie)->findAll();
    }

    // Methode pour recuperer tous le categories
    public function getCategories()
    {
        return $this->select('categories')->distinct()->findAll();
    }

    public function searchProducts($query)
    {
        // Recherchez dans les champs 'designation' et 'description'
        // Utilisez like() ou orLike() selon vos besoins
        return $this->like('categories', $query)
                    ->orLike('designation', $query)
                    ->findAll();
    }


}
