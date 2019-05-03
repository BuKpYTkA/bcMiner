<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 02.05.2019
 * Time: 16:08
 */

namespace app\services\DirScanner;

/**
 * Class DirScannerService
 * @package app\services
 */
class DirScannerService implements DirScannerServiceInterface
{

    /**
     * @param string $directory
     * @return array
     */
    public function scan(string $directory)
    {
        $scannedFiled = scandir($directory);
        return array_diff($scannedFiled, ['..', '.']);
    }

}