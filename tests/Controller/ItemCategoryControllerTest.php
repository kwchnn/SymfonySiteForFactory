<?php

namespace App\Test\Controller;

use App\Entity\ItemCategory;
use App\Repository\ItemCategoryRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ItemCategoryControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ItemCategoryRepository $repository;
    private string $path = '/item/category/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(ItemCategory::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ItemCategory index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'item_category[parentId]' => 'Testing',
            'item_category[sort]' => 'Testing',
            'item_category[switch]' => 'Testing',
            'item_category[name]' => 'Testing',
            'item_category[url]' => 'Testing',
            'item_category[icon]' => 'Testing',
            'item_category[shortDescription]' => 'Testing',
            'item_category[description]' => 'Testing',
            'item_category[params]' => 'Testing',
            'item_category[bottomText]' => 'Testing',
            'item_category[seoTitle]' => 'Testing',
            'item_category[seoDescription]' => 'Testing',
        ]);

        self::assertResponseRedirects('/item/category/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ItemCategory();
        $fixture->setParentId('My Title');
        $fixture->setSort('My Title');
        $fixture->setSwitch('My Title');
        $fixture->setName('My Title');
        $fixture->setUrl('My Title');
        $fixture->setIcon('My Title');
        $fixture->setShortDescription('My Title');
        $fixture->setDescription('My Title');
        $fixture->setParams('My Title');
        $fixture->setBottomText('My Title');
        $fixture->setSeoTitle('My Title');
        $fixture->setSeoDescription('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ItemCategory');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ItemCategory();
        $fixture->setParentId('My Title');
        $fixture->setSort('My Title');
        $fixture->setSwitch('My Title');
        $fixture->setName('My Title');
        $fixture->setUrl('My Title');
        $fixture->setIcon('My Title');
        $fixture->setShortDescription('My Title');
        $fixture->setDescription('My Title');
        $fixture->setParams('My Title');
        $fixture->setBottomText('My Title');
        $fixture->setSeoTitle('My Title');
        $fixture->setSeoDescription('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'item_category[parentId]' => 'Something New',
            'item_category[sort]' => 'Something New',
            'item_category[switch]' => 'Something New',
            'item_category[name]' => 'Something New',
            'item_category[url]' => 'Something New',
            'item_category[icon]' => 'Something New',
            'item_category[shortDescription]' => 'Something New',
            'item_category[description]' => 'Something New',
            'item_category[params]' => 'Something New',
            'item_category[bottomText]' => 'Something New',
            'item_category[seoTitle]' => 'Something New',
            'item_category[seoDescription]' => 'Something New',
        ]);

        self::assertResponseRedirects('/item/category/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getParentId());
        self::assertSame('Something New', $fixture[0]->getSort());
        self::assertSame('Something New', $fixture[0]->getSwitch());
        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getUrl());
        self::assertSame('Something New', $fixture[0]->getIcon());
        self::assertSame('Something New', $fixture[0]->getShortDescription());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getParams());
        self::assertSame('Something New', $fixture[0]->getBottomText());
        self::assertSame('Something New', $fixture[0]->getSeoTitle());
        self::assertSame('Something New', $fixture[0]->getSeoDescription());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new ItemCategory();
        $fixture->setParentId('My Title');
        $fixture->setSort('My Title');
        $fixture->setSwitch('My Title');
        $fixture->setName('My Title');
        $fixture->setUrl('My Title');
        $fixture->setIcon('My Title');
        $fixture->setShortDescription('My Title');
        $fixture->setDescription('My Title');
        $fixture->setParams('My Title');
        $fixture->setBottomText('My Title');
        $fixture->setSeoTitle('My Title');
        $fixture->setSeoDescription('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/item/category/');
    }
}
