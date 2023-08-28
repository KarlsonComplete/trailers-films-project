<?php

namespace App\Controller\Admin;

use App\Entity\SubGenre;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class SubGenreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubGenre::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Genre SubGenre')
            ->setEntityLabelInPlural('Genre SubGenre')
            ->setSearchFields(['title']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('genre'));
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield AssociationField::new('genre');
    }


}
