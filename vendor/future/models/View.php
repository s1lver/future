<?php
/**
 * @user Moiseenko
 * @date 20.07.2018
 * @time 18:19
 * @copyright Future CMF
 */

namespace future\models;

/**
 * Class View
 * @package future\models
 */
class View
{
	/**
	 * @param string $file
	 * @param array $params
	 * @return string
	 */
	public function render($file, array $params = []): string
	{
		$path = getenv('DOCUMENT_ROOT').DIRECTORY_SEPARATOR.$file;

		return $this->renderPhpFile($path, $params);
	}

	/**
	 * @param string $file
	 * @param array $params
	 * @return string
	 */
	private function renderPhpFile($file, array $params = []): string
	{
		ob_start();
		ob_implicit_flush(false);
		extract($params, EXTR_OVERWRITE);

		/** @noinspection PhpIncludeInspection */
		require $file.'.php';

		return ob_get_clean();
	}
}
