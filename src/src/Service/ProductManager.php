<?php


namespace App\Service;


use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;

class ProductManager implements ProductInterface
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * ProductManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return ManagerRegistry
     */
    public function getDoctrine(): ManagerRegistry
    {
        return $this->doctrine;
    }

    /**
     * @return Product[]|array
     */
    public function getProducts(): array
    {
        return $this->getDoctrine()->getRepository(Product::class)->findAll();
    }

    /**
     * @param Product $product
     * @return int
     */
    public function save(Product $product): int
    {
        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();

        return $product->getId();
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository(Product::class)->find($id);
        $em->remove($product);
        $em->flush();
    }

    /**
     * @param int $id
     * @return Product|object
     */
    public function findById(int $id): Product
    {
        return $this->getDoctrine()->getManager()->getRepository(Product::class)->find($id);
    }

    /**
     * @param string $search
     * @return Product[]|array
     */
    public function search(?string $search): array
    {
        return $this->getDoctrine()->getRepository(Product::class)->findBySearchQuery($search);
    }
}