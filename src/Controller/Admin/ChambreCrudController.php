<?php

namespace App\Controller\Admin;

use App\Entity\Chambre;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChambreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chambre::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('descrition'),
            ImageField::new('photo')->setUploadDir('public/uploads/images/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenUpdating()->setFormTypeOptions([
                'required' => false, // Rendre le champ non requis lors de la mise à jour
            ]),
            ImageField::new('photo')->setUploadDir('public/uploads/images/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenCreating(),
            DateTimeField::new('date_enregistrement')->setFormat('d/M/Y à Hs')->hideOnForm(),
            MoneyField::new('prix')->setCurrency('EUR')->setNumDecimals(2),
        ];
    }
    public function createEntity(string $entityFqcn)
    {
        $produit =new $entityFqcn;
        $produit->setDateEnregistrement(new \DateTime);
        return $produit;
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
