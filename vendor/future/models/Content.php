<?php
/**
 * Модель работы с контентом
 *
 * @user Moiseenko
 * @date 30.05.2016
 * @time 16:41
 * @copyright Future CMF
 */

namespace future\models;

/**
 * Class Content
 * @package future\models
 */
class Content extends Model
{
	/**
	 * Content constructor.
	 */
	public function __construct()
	{
		$this->render();
	}

	protected function render(): void
	{
		echo (new View())->render('views/layouts/future-theme/index');
	}
}
