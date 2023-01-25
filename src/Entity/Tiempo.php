<?php

namespace App\Entity;

use App\Repository\TiempoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TiempoRepository::class)]
class Tiempo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\Column]
    private ?int $time = null;

    #[ORM\OneToOne(mappedBy: 'times', cascade: ['persist', 'remove'])]
    private ?Category $category = null;

    #[ORM\OneToOne(mappedBy: 'time', cascade: ['persist', 'remove'])]
    private ?Servicio $servicio = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        // set the owning side of the relation if necessary
        if ($category->getTimes() !== $this) {
            $category->setTimes($this);
        }

        $this->category = $category;

        return $this;
    }

    public function getServicio(): ?Servicio
    {
        return $this->servicio;
    }

    public function setServicio(Servicio $servicio): self
    {
        // set the owning side of the relation if necessary
        if ($servicio->getTime() !== $this) {
            $servicio->setTime($this);
        }

        $this->servicio = $servicio;

        return $this;
    }
}
