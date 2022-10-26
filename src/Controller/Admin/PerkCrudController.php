<?php

namespace App\Controller\Admin;

use App\Entity\Perk;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PerkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Perk::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
            yield TextField::new('name');
            yield SlugField::new('slug')->setTargetFieldName('name');
            yield TextEditorField::new('description');
            yield ChoiceField::new('category')->setChoices([
                // $value => $badgeStyleName
                'Killer' => 'Killer',
                'Survivor' => 'Survivor',
            ]);
            // yield ImageField::new('image');
        
    }
    
}
