<?php

namespace App\Controller\Admin;

use App\Entity\Killer;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KillerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Killer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        
        yield SlugField::new('slug')
            ->setTargetFieldName('name');
    }
    
}
