<?php

namespace App\Librairies;
use App\Models\Stockage;
use App\Librairies\Reference;
use Illuminate\Support\Facades\DB;

class Article 
{
    public $Ref,$Name,$PrixVente, $PrixAchat,$NbrPaquet,$NbrMagasin, $NbrBoutique;
    public $qte_seuil,$Statut;
    
    public function __construct($ref = NULL)
    {
       if(isset($ref))
       {
             $art =  Stockage::where('ref', $ref)->first(); 
             $this->Populate($art); 
       }else{
           
           $this->setRef(Reference::Make_Product_ref());
       }
    }


    private function Populate(Stockage $art)
    {
        $this->Ref = $art->ref;
        $this->Name = $art->name;
        $this->PrixVente = $art->prix_vente;
        $this->PrixAchat = $art->prix_achat;
        $this->NbrPaquet = $art->nombre_paquet;
        $this->NbrMagasin = $art->qte_magasin;
        $this->NbrBoutique = $art->qte_boutique;
        $this->qte_seuil = $art->qte_seuil;
        $this->Statut = $art->statut;
    }
    

    public function SaveProduct()
    {
        $Store = [
              'name'=>$this->getName(),
              'prix_vente'=>$this->getPrixVente(),
              'prix_achat'=>$this->getPrixAchat(),
              'nombre_paquet'=>$this->getNbrPaquet(),
              'qte_magasin'=>$this->getNbrMagasin(),
              'qte_boutique'=>$this->getNbrBoutique(),
              'qte_seuil'=>$this->getQte_seuil()
        ];

        $Article  = Stockage::where('ref', $this->getRef())->first();
     
        if(empty($Article))
        {
             $Store['ref'] = $this->getRef();
             Stockage::Create($Store);
        }else{

            DB::table('stockages')->where('ref',$this->getRef())->update($Store);
        }
    }

    public function deleteItem($ref)
    {
        DB::delete('delete stockages where ref = ?', [$ref]);
    }

    public function SetBoutique($ref,$qte,$action)
    { $Nbr = 0;
       if($action === 'add')
       {
           $Nbr =  $this->getNbrBoutique()+$qte;
       }
       if($action === 'sub')
       {
           $Nbr =  $this->getNbrBoutique()-$qte;
       }

       if($action === 'affect')
       {
           $Nbr = $qte;
       }

       $this->setNbrBoutique($Nbr);

       DB::update('update stockages set qte_boutique = ? where ref = ?', [$this->getNbrBoutique(), $ref]);
    }
    

    public function SetMa($ref,$qte,$action)
    { $Nbr = 0;
       if($action === 'add')
       {
           $Nbr =  $this->getNbrBoutique()+$qte;
       }
       if($action === 'sub')
       {
           $Nbr =  $this->getNbrBoutique()-$qte;
       }

       if($action === 'affect')
       {
           $Nbr = $qte;
       }

       $this->setNbrBoutique($Nbr);

       DB::update('update stockages set qte_boutique = ? where ref = ?', [$this->getNbrBoutique(), $ref]);
    }



    /**
     * Get the value of Ref
     */ 
    public function getRef()
    {
        return $this->Ref;
    }

    /**
     * Set the value of Ref
     *
     * @return  self
     */ 
    public function setRef($Ref)
    {
        $this->Ref = $Ref;

        return $this;
    }

    /**
     * Get the value of Name
     */ 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get the value of PrixVente
     */ 
    public function getPrixVente()
    {
        return $this->PrixVente;
    }

    /**
     * Set the value of PrixVente
     *
     * @return  self
     */ 
    public function setPrixVente($PrixVente)
    {
        $this->PrixVente = $PrixVente;

        return $this;
    }

    /**
     * Get the value of PrixAchat
     */ 
    public function getPrixAchat()
    {
        return $this->PrixAchat;
    }

    /**
     * Set the value of PrixAchat
     *
     * @return  self
     */ 
    public function setPrixAchat($PrixAchat)
    {
        $this->PrixAchat = $PrixAchat;

        return $this;
    }

    /**
     * Get the value of NbrPaquet
     */ 
    public function getNbrPaquet()
    {
        return $this->NbrPaquet;
    }

    /**
     * Set the value of NbrPaquet
     *
     * @return  self
     */ 
    public function setNbrPaquet($NbrPaquet)
    {
        $this->NbrPaquet = $NbrPaquet;

        return $this;
    }

    /**
     * Get the value of NbrMagasin
     */ 
    public function getNbrMagasin()
    {
        return $this->NbrMagasin;
    }

    /**
     * Set the value of NbrMagasin
     *
     * @return  self
     */ 
    public function setNbrMagasin($NbrMagasin)
    {
        $this->NbrMagasin = $NbrMagasin;

        return $this;
    }

    /**
     * Get the value of NbrBoutique
     */ 
    public function getNbrBoutique()
    {
        return $this->NbrBoutique;
    }

    /**
     * Set the value of NbrBoutique
     *
     * @return  self
     */ 
    public function setNbrBoutique($NbrBoutique)
    {
        $this->NbrBoutique = $NbrBoutique;

        return $this;
    }

    /**
     * Get the value of qte_seuil
     */ 
    public function getQte_seuil()
    {
        return $this->qte_seuil;
    }

    /**
     * Set the value of qte_seuil
     *
     * @return  self
     */ 
    public function setQte_seuil($qte_seuil)
    {
        $this->qte_seuil = $qte_seuil;

        return $this;
    }

    /**
     * Get the value of Statut
     */ 
    public function getStatut()
    {
        return $this->Statut;
    }

    /**
     * Set the value of Statut
     *
     * @return  self
     */ 
    public function setStatut($Statut)
    {
        $this->Statut = $Statut;

        return $this;
    }
}