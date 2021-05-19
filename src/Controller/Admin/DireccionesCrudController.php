<?php

namespace App\Controller\Admin;

use App\Entity\Direcciones;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DireccionesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Direcciones::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            AssociationField::new('cliente'),
            TextField::new('nombre'),
            TextField::new('apellido'),
            TextField::new('direccion'),
            AssociationField::new('pais'),
            TextField::new('ciudad'),
            TextField::new('telefono'),
            TextField::new('movil'),
        ];
    }
    
}
