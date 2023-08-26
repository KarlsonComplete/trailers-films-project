<?php

namespace App\Controller\Admin;

use App\Entity\SubGenre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SubGenreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubGenre::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
