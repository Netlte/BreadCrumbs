<?php declare(strict_types = 1);

namespace Netlte\BreadCrumbs\Tests\Cases\Unit;

use Netlte\BreadCrumbs\Bread;
use Netlte\BreadCrumbs\Tests\Helpers\PresenterFactory;
use Netlte\BreadCrumbs\Tests\Helpers\TestingTemplateFactory;
use Nette\ComponentModel\IComponent;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../bootstrap.php';

class BreadTest extends TestCase {

	/** @var Bread|IComponent|null */
	private $bread;

	public function setUp(): void {
		$factory = new PresenterFactory();
		$presenter = $factory->create();
		$this->bread = $presenter->getComponent('bread');
	}

	public function testRender(): void {
		/** @var Bread $bread */
		$bread = $this->bread;

		$bread->setTemplateFactory(new TestingTemplateFactory());

		\ob_start();
		$bread->render();
		$result = \ob_get_clean();

		Assert::equal('TestingTemplate', $result);
	}

	public function testProps(): void {
		/** @var Bread $bread */
		$bread = $this->bread;

		$bread::$ICON_PREFIX = 'Testing';
		$bread->setIcon('Icon');

		Assert::equal('Icon', $bread->getIcon());
		Assert::equal('TestingIcon', $bread->getFQNIcon());

		Assert::equal(0, \count($bread->getBreadCrumbs()));

		$bread->addBreadCrumb('Testing', 'test');

		Assert::equal(1, \count($bread->getBreadCrumbs()));
		Assert::equal('Testing', $bread->getBreadCrumbs()[0]->getTitle());
		Assert::equal('test', $bread->getBreadCrumbs()[0]->getLink());
		Assert::equal([], $bread->getBreadCrumbs()[0]->getArgs());


	}

}

(new BreadTest())->run();