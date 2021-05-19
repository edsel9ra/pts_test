<?php

namespace App\Controller\Admin;

use App\Entity\Paises;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaisesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paises::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('nombre_pais'),
        ];
    }
}
