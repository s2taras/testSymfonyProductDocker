<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductType;
use App\Service\ProductInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /** @var ProductInterface */
    protected $productManager;

    /**
     * ProductController constructor.
     * @param ProductInterface $productManager
     */
    public function __construct(ProductInterface $productManager)
    {
        $this->productManager = $productManager;
    }

    /**
     * @return ProductInterface
     */
    public function getProductManager(): ProductInterface
    {
        return $this->productManager;
    }

    /**
     * @Route("/", name="product_list", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $query = $request->get('query');
        $foundProducts = $this->getProductManager()->search($query);

        return $this->render('product/index.html.twig', [
            'products' => $foundProducts
        ]);
    }

    /**
     * @Route("/product/new", name="product_new", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newProduct = $form->getData();

            $this->getProductManager()->save($newProduct);

            return $this->redirectToRoute('product_list');
        }

        return $this->render('product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/product/edit/{id}", name="product_edit", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, int $id): Response
    {
        $product = $this->getProductManager()->findById($id);

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->getProductManager()->save($product);

            return $this->redirectToRoute('product_list');
        }

        return $this->render('product/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/product/delete/{id}", name="product_delete", methods={"GET", "DELETE"})
     * @param int $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        $this->getProductManager()->delete($id);

        return $this->render('product/delete.html.twig');
    }
}