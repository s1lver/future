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
<<<<<<< HEAD:core/models/Application.php
	public function __construct()
=======
	function __construct()
>>>>>>> aab371d3fe3dc42ae5a7dbea6a571e6012c19c8c:vendor/models/Application.php
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
