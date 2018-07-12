<?php
/**
 * Автозагрузка классов
 *
 * @user Moiseenko
 * @date 30.05.2016
 * @time 14:53
 * @copyright Future CMF
 */

namespace future\models;

/**
 * Class Autoload
 */
class Autoload
{
	protected $namespacesMap = [];
	protected $namespace;

	/**
	 * Функция добавления пространств имен
	 *
	 * @param string $namespace Пространство имен
	 * @param string $rootDir Корневая директория
	 *
	 * @return bool
	 */
	public function add($namespace, $rootDir)
	{
		if (is_dir($rootDir)) {
			$this->namespace = $namespace;
			$this->namespacesMap[$namespace] = $rootDir;

			return true;
		}

		return false;
	}

	/**
	 * Функция регистрации автозагрузки классов
	 */
	public function register()
	{
		spl_autoload_register([$this, 'autoloadNamespace']);
	}

	/**
	 * Функция автозагрузки классов на основе пространства имен
	 *
	 * @param string $class
	 * @return bool
	 */
	protected function autoloadNamespace($class)
	{
		$pathParts = explode('\\', $class);

		if (is_array($pathParts)) {
			array_shift($pathParts);
			$filePath = $this->namespacesMap[$this->namespace].DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $pathParts).'.php';

<<<<<<< HEAD:vendor/future/models/Autoload.php
			if (file_exists($filePath)) {
=======
			if (null !== $className) {
				$filePath = $this->namespacesMap[$this->namespace].'/'.$className.'.php';
>>>>>>> dffd9dd8258868486f4d0bb3cfea0b5719a25782:vendor/models/Autoload.php
				/** @noinspection PhpIncludeInspection */
				require_once $filePath;
			}
		}

		return false;
	}
}
