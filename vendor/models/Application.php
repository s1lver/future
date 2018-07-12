<?php
/**
 * Модель приложения
 *
 * @user Moiseenko
 * @date 30.05.2016
 * @time 15:31
 * @copyright Future CMF
 */

namespace future\models;

require_once 'Autoload.php';

/**
 * Class Application
 * @package future\models
 */
class Application
{
	public $content;

	/**
	 * Application constructor.
	 */
	public function __construct()
	{
		$this->autoloadInit();

		$this->content = new Content();
	}

	/**
	 * Функция инициализации автозагрузки классов
	 */
	private function autoloadInit()
	{
		$autoload = new \Autoload();
		$autoload->add('models', __DIR__);
		$autoload->register();
	}
}
