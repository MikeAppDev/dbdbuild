<?php

namespace App\Controller\Admin;

use App\Entity\Build;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BuildCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Build::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        yield TextField::new('title');
        yield SlugField::new('slug')->setTargetFieldName('title');
        yield TextEditorField::new('content');
        yield TextField::new('featuredText');

        yield AssociationField::new('categories');
        yield AssociationField::new('killers');

        yield DateTimeField::new('createdAt')
            ->hideOnForm();
        yield DateTimeField::new('updatedAt')
            ->hideOnForm();
        yield ImageField::new('image')
            ->setBasePath('image/build')
            ->setUploadDir('public/image/build');
        yield AssociationField::new('perk1');
    }
    
}
