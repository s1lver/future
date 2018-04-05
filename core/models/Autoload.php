<?php
/**
 * Автозагрузка классов
 *
 * @user Moiseenko
 * @date 30.05.2016
 * @time 14:53
 * @copyright Future CMF
 */

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
	 * @param string $namespace	 Пространство имен
	 * @param string $rootDir	 Корневая директория
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
	 *
	 * @return bool
	 */
	protected function autoloadNamespace($class)
	{
		$pathParts = explode('\\', $class);

		if (is_array($pathParts)) {
			$className = array_pop($pathParts);

			if (null !== $className) {
				$filePath = $this->namespacesMap[$this->namespace].'/'.$className.'.php';
				/** @noinspection PhpIncludeInspection */
				require_once $filePath;

				return true;
			}
		}

		return false;
	}
}
