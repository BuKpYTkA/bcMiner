<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 02.05.2019
 * Time: 16:12
 */

namespace app\services\DirScanner;

/**
 * Class DirScannerService
 * @package app\services
 */
interface DirScannerServiceInterface
{
    /**
     * @param string $directory
     * @return array
     */
    public function scan(string $directory);
}