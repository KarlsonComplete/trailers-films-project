<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
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

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield ImageField::new('pathPhoto')->setBasePath('/public/uploads/images')->setUploadDir('/public/uploads/images/')
        ->setLabel('Photo');
        yield TextareaField::new('descriptionFilm')->setLabel('Description')->setMaxLength(10);
        yield AssociationField::new('year');
        yield AssociationField::new('countries');
        yield AssociationField::new('genres');
        yield AssociationField::new('subGenres');

    }
}
