<?php


namespace App\GraphQL\Mutation;


use App\Entity\ProductListing;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;


class ProductMutation implements MutationInterface, AliasedInterface
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function createProduct(Argument $args)
    {
        $input = $args['input'];
        $product = new ProductListing();
        $product->setTitle($input['title']);
        $product->setDescription($input['description']);
        $product->setPrice($input['price']);
        $product->setIsPublished($input['is_published']);

        $this->em->persist($product);
        $this->em->flush();

        return $product;

    }

    public function deleteProduct(Argument $args)
    {
        $input = $args['input'];
        $product = $this->em->getRepository('App:ProductListing')->find($input['id']);
        if($product)
        {
            $this->em->remove($product);
            $this->em->flush();
            return $product;
        }else{
            return false;
        }

    }

    public function updateProduct(Argument $args)
    {
        $input = $args['input'];
        $product = $this->em->getRepository('App:ProductListing')->find($input['id']);
        if(!$product)
        {
            return "Product not found";
        }else{
            $product->setTitle($input['title']);
            $product->setDescription($input['description']);
            $product->setPrice($input['price']);
            $product->setIsPublished($input['is_published']);
            $this->em->flush();
            return $product;
        }

    }

    public static function getAliases(): array
    {
        return [
            'createProduct' => 'create_product',
            'deleteProduct' => 'delete_product',
            'updateProduct' => 'update_product'
        ];
    }
}