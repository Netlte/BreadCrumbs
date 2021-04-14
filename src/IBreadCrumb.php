<?php declare(strict_types = 1);

namespace Netlte\BreadCrumbs;


/**
 * @author       Tomáš Holan <tomas@holan.dev>
 * @package      netlte/breadcrumbs
 * @copyright    Copyright © 2021, Tomáš Holan [www.holan.dev]
 */
interface IBreadCrumb {

	public function getTitle(): string;

	public function getLink(): string;

	/**
	 * @return array|mixed[]
	 */
	public function getArgs(): array;

}
