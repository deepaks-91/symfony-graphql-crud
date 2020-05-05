<?php
namespace App\GraphQL\Resolver;


use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductResolver implements ResolverInterface, AliasedInterface
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $argument)
    {
        return $this->em->getRepository('App:ProductListing')->find($argument['id']);
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'Product'
        ];
    }
}