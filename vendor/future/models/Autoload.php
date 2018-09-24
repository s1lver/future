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
 * @package future\models
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
	public function add($namespace, $rootDir): bool
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
	public function register(): void
	{
		spl_autoload_register([$this, 'autoloadNamespace']);
	}

	/**
	 * Функция автозагрузки классов на основе пространства имен
	 *
	 * @param string $class
	 * @return bool
	 */
	protected function autoloadNamespace($class): bool
	{
		$pathParts = explode('\\', $class);

		if (is_array($pathParts)) {
			array_shift($pathParts);
			$filePath = $this->namespacesMap[$this->namespace].DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $pathParts).'.php';

			if (file_exists($filePath)) {
				/** @noinspection PhpIncludeInspection */
				require_once $filePath;
			}
		}

		return false;
	}
}
