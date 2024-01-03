<?php

namespace App\Test\Controller;

use App\Entity\Researcher;
use App\Repository\ResearcherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ResearcherControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ResearcherRepository $repository;
    private string $path = '/rese0archer/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Researcher::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Researcher index');

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
            'researcher[first_name]' => 'Testing',
            'researcher[last_name]' => 'Testing',
            'researcher[email]' => 'Testing',
            'researcher[phone_number]' => 'Testing',
        ]);

        self::assertResponseRedirects('/rese0archer/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Researcher();
        $fixture->setFirst_name('My Title');
        $fixture->setLast_name('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone_number('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Researcher');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Researcher();
        $fixture->setFirst_name('My Title');
        $fixture->setLast_name('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone_number('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'researcher[first_name]' => 'Something New',
            'researcher[last_name]' => 'Something New',
            'researcher[email]' => 'Something New',
            'researcher[phone_number]' => 'Something New',
        ]);

        self::assertResponseRedirects('/rese0archer/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getFirst_name());
        self::assertSame('Something New', $fixture[0]->getLast_name());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPhone_number());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Researcher();
        $fixture->setFirst_name('My Title');
        $fixture->setLast_name('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone_number('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/rese0archer/');
    }
}
