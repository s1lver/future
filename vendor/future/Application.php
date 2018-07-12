<?php
/**
 * Модель приложения
 *
 * @user Moiseenko
 * @date 30.05.2016
 * @time 15:31
 * @copyright Future CMF
 */

namespace future;

use future\models\Autoload;
use future\models\Content;

require_once 'models/Autoload.php';

/**
 * Class Application
 * @package future
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
	private function autoloadInit(): void
	{
		$autoload = new Autoload();
		$autoload->add(__NAMESPACE__, __DIR__);
		$autoload->register();
	}
}
