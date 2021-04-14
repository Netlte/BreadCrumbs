<?php declare(strict_types = 1);

namespace Netlte\BreadCrumbs\Tests\Helpers;

use Netlte\BreadCrumbs\Bread;
use Nette\Application\UI\Presenter;

final class TestingPresenter extends Presenter {

	protected function createComponentBread(): Bread {
		return new Bread();
	}
}