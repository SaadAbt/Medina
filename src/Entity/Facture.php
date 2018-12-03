<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateFacture;

    /**
     * @ORM\Column(type="float")
     */
    private $Total;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Commande", mappedBy="facture", cascade={"persist", "remove"})
     */
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->DateFacture;
    }

    public function setDateFacture(\DateTimeInterface $DateFacture): self
    {
        $this->DateFacture = $DateFacture;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->Total;
    }

    public function setTotal(float $Total): self
    {
        $this->Total = $Total;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        // set (or unset) the owning side of the relation if necessary
        $newFacture = $commande === null ? null : $this;
        if ($newFacture !== $commande->getFacture()) {
            $commande->setFacture($newFacture);
        }

        return $this;
    }
}
