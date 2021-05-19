<?php

namespace App\Controller\Admin;

use App\Entity\Clientes;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Clientes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('identificacion'),
            TextField::new('nombre_cliente'),
            TextField::new('apellido_cliente'),
            TextField::new('email_cliente'),
        ];
    }
}
