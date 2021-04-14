<?php declare(strict_types = 1);

namespace Netlte\BreadCrumbs;

use Netlte\UI\AbstractControl;


/**
 * @author       Tomáš Holan <tomas@holan.dev>
 * @package      netlte/breadcrumbs
 * @copyright    Copyright © 2021, Tomáš Holan [www.holan.dev]
 */
class Bread extends AbstractControl {

	public const DEFAULT_TEMPLATE = __DIR__ . \DIRECTORY_SEPARATOR . 'templates' . \DIRECTORY_SEPARATOR . 'breadcrumbs.latte';

	public const DEFAULT_ICON_PREFIX = 'fa fa-';

	public static string $DEFAULT_TEMPLATE = self::DEFAULT_TEMPLATE;

	public static string $ICON_PREFIX = self::DEFAULT_ICON_PREFIX;

	/** @var IBreadCrumb[] */
	private array $nodes = [];

	private ?string $icon = 'dashboard';

	/**
	 * @param array|mixed[] $args
	 * @return $this
	 */
	public function addBreadCrumb(string $title, string $link, array $args = []): self {
		$this->nodes[] = new BreadCrumb($title, $link, $args);

		return $this;
	}

	/**
	 * @return IBreadCrumb[]
	 */
	public function getBreadCrumbs(): array {
		return $this->nodes;
	}

	public function getIcon(): ?string {
		return $this->icon;
	}

	public function getFQNIcon(): ?string {
		return $this->getIcon() === null ? null : self::$ICON_PREFIX . $this->getIcon();
	}

	public function setIcon(?string $icon = null): self {
		$this->icon = $icon;
		return $this;
	}

	public function render(): void {
		$this->getTemplate()->setTranslator($this->getTranslator());
		$this->getTemplate()->setFile($this->getTemplateFile() ?? self::$DEFAULT_TEMPLATE);
		$this->getTemplate()->render();
	}


}
