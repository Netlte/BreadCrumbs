<?php declare(strict_types = 1);

namespace Netlte\BreadCrumbs;


/**
 * @author       Tomáš Holan <tomas@holan.dev>
 * @package      netlte/breadcrumbs
 * @copyright    Copyright © 2021, Tomáš Holan [www.holan.dev]
 */
class BreadCrumb implements IBreadCrumb {

	private string $title;

	private string $link;

	/** @var array|mixed[] */
	private array $args = [];


	/**
	 * BreadCrumb constructor.
	 * @param array|mixed[]  $args
	 */
	public function __construct(string $title, string $link, array $args = []) {
		$this->title = $title;
		$this->link = $link;
		$this->args = $args;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}

	public function getLink(): string {
		return $this->link;
	}

	public function setLink(string $link): self {
		$this->link = $link;
		return $this;
	}

	/**
	 * @return array|mixed[]
	 */
	public function getArgs(): array {
		return $this->args;
	}

	/**
	 * @param array|mixed[] $args
	 * @return $this
	 */
	public function setArgs(array $args = []): self {
		$this->args = $args;
		return $this;
	}
}
