<?php

namespace Revys\RevyAdmin\App;

use Symfony\Component\Finder\SplFileInfo;

class Indexer
{
    protected static $cache_directory = "admin";
    protected static $map_file = "autoload_map.php";

    protected static $map = [];

    public function __construct()
    {
        self::$cache_directory = storage_path('revy') . DIRECTORY_SEPARATOR . self::$cache_directory;
        self::$map_file = self::$cache_directory . DIRECTORY_SEPARATOR . self::$map_file;

        if (! is_dir(self::$cache_directory))
            \File::makeDirectory(self::$cache_directory, 0777, true);
    }

    /**
     * @param string $class
     * @return string
     */
    public function getMappedClass($class)
    {
        if (! self::$map)
            self::$map = include_once self::$map_file;

        $mappedClass = str_replace('\Revys\\RevyAdmin', 'Admin', $class);

        if (isset(self::$map[$mappedClass]))
            return '\\' . $mappedClass;

        return $class;
    }

    public function index()
    {
        $map = array();

        $directories = array(
            base_path('admin')
        );

        foreach ($directories as $directory) {
            $files = \File::allFiles($directory);

            if (count($files)) {
                foreach ($files as $file) {
                    $class = self::getClassName($file);
                    $map[$class] = true;
                }
            }
        }

        $content = '<?php return ' . var_export($map, true) . ';';

        file_put_contents(self::$map_file, $content);
    }

    public static function getClassName(SplFileInfo $file)
    {
        $src = file_get_contents($file);

        if (preg_match('/^namespace\s+(.+?);\s*$/sm', $src, $m))
            $namespace = $m[1];

        return (isset($namespace) ? $namespace . '\\' : '') . str_replace('.php', '', $file->getFileName());
    }
}