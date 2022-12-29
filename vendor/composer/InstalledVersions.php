<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => 'f318ed6ed9b8ffb2272b3a10053199ab33b9d561',
    'name' => 'codeigniter4/codeigniter4',
  ),
  'versions' => 
  array (
    'codeigniter/coding-standard' => 
    array (
      'pretty_version' => 'v1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '462ba163240ac7114978a1ff6d0608be1b37eafc',
    ),
    'codeigniter4/codeigniter4' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => 'f318ed6ed9b8ffb2272b3a10053199ab33b9d561',
    ),
    'composer/pcre' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '4482b6409ca6bfc2af043a5711cd21ac3e7a8dfb',
    ),
    'composer/semver' => 
    array (
      'pretty_version' => '3.3.2',
      'version' => '3.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '3953f23262f2bff1919fc82183ad9acb13ff62c9',
    ),
    'composer/xdebug-handler' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ced299686f41dce890debac69273b47ffe98a40c',
    ),
    'doctrine/annotations' => 
    array (
      'pretty_version' => '1.13.3',
      'version' => '1.13.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '648b0343343565c4a056bfc8392201385e8d89f0',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '1.4.1',
      'version' => '1.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '10dcfce151b967d20fde1b34ae6640712c3891bc',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.3',
      'version' => '1.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c268e882d4dbdd85e36e4ad69e02dc284f89d229',
    ),
    'fakerphp/faker' => 
    array (
      'pretty_version' => 'v1.20.0',
      'version' => '1.20.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '37f751c67a5372d4e26353bd9384bc03744ec77b',
    ),
    'friendsofphp/php-cs-fixer' => 
    array (
      'pretty_version' => 'v3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1975e4453eb2726d1f50da0ce7fa91295029a4fa',
    ),
    'kint-php/kint' => 
    array (
      'pretty_version' => '4.2.3',
      'version' => '4.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7601bfd95ccc50a1b903c2764b31d00919e8edd9',
    ),
    'laminas/laminas-escaper' => 
    array (
      'pretty_version' => '2.12.0',
      'version' => '2.12.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ee7a4c37bf3d0e8c03635d5bddb5bb3184ead490',
    ),
    'mikey179/vfsstream' => 
    array (
      'pretty_version' => 'v1.6.11',
      'version' => '1.6.11.0',
      'aliases' => 
      array (
      ),
      'reference' => '17d16a85e6c26ce1f3e2fa9ceeacdc2855db1e9f',
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '14daed4296fae74d9e3201d2c4925d1acb7aa614',
    ),
    'nexusphp/cs-config' => 
    array (
      'pretty_version' => 'v3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5ed4f472b3a9d385212c4446dd01e88037948919',
    ),
    'nexusphp/tachycardia' => 
    array (
      'pretty_version' => 'v1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a9a0335e36fa297d6df0174ef090890618bce3fe',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.15.1',
      'version' => '4.15.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ef6c55a3f47f89d7a374e6f835197a0b5fcf900',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '97803eca37d319dfa7826cc2437fc020857acb53',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
    ),
    'php-cs-fixer/diff' => 
    array (
      'pretty_version' => 'v2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '29dc0d507e838c4580d018bd8b5cb412474f7ec3',
    ),
    'phpstan/phpstan' => 
    array (
      'pretty_version' => '1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a59c8b5bfd4a236f27efc8b5ce72c313c2b54b5f',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '9.2.18',
      'version' => '9.2.18.0',
      'aliases' => 
      array (
      ),
      'reference' => '12fddc491826940cf9b7e88ad9664cf51f0f6d0a',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '3.0.6',
      'version' => '3.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
    ),
    'phpunit/php-invoker' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '5.0.3',
      'version' => '5.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '9.5.26',
      'version' => '9.5.26.0',
      'aliases' => 
      array (
      ),
      'reference' => '851867efcbb6a1b992ec515c71cdcf20d895e9d2',
    ),
    'predis/predis' => 
    array (
      'pretty_version' => 'v2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ff59f745815150c65ed388f7d64e7660fe961771',
    ),
    'psr/cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd11b50ad223250cf17b86e38383413f5a6764bf8',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.2',
      'version' => '1.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '513e0666f7216c7459170d56df27dfcefe1689ea',
    ),
    'psr/event-dispatcher' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
      ),
    ),
    'rector/rector' => 
    array (
      'pretty_version' => '0.13.10',
      'version' => '0.13.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd1e069db8ad3b4aea2b968248370c21415e4c180',
    ),
    'sebastian/cli-parser' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '442e7c7e687e42adc03470c7b668bc4b2402c0b2',
    ),
    'sebastian/code-unit' => 
    array (
      'pretty_version' => '1.0.8',
      'version' => '1.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '1fc9f64c0927627ef78ba436c9b17d967e68e120',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '4.0.8',
      'version' => '4.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa0f136dd2334583309d32b62544682ee972b51a',
    ),
    'sebastian/complexity' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '739b35e53379900cc9ac327b2147867b8b6efd88',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '3461e3fccc7cfdfc2720be910d3bd73c69be590d',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '5.1.4',
      'version' => '5.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1b5dff7bb151a4db11d49d90e5408e4e938270f7',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '4.0.5',
      'version' => '4.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac230ed27f0f98f597c8a2b6eb7ac563af5e5b9d',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '5.0.5',
      'version' => '5.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ca8db5a5fc9c8646244e629625ac486fa286bf2',
    ),
    'sebastian/lines-of-code' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c1c2e997aa3146983ed888ad08b15470a2e22ecc',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5c9eeac41b290a3712d88851518825ad78f45c71',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd9d8cf3c5804de4341c283ed787f099f5506172',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
    ),
    'sebastian/type' => 
    array (
      'pretty_version' => '3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fb3fe09c5f0bae6bc27ef3ce933a1e0ed9464b6e',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c1022351a901512170118436c764e473f6de8c',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v5.4.15',
      'version' => '5.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ea59bb0edfaf9f28d18d8791410ee0355f317669',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v2.5.2',
      'version' => '2.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e8b495ea28c1d97b5e0c121748d6f9b53d075c66',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v5.4.9',
      'version' => '5.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '8e6ce1cc0279e3ff3c8ff0f43813bc88d21ca1bc',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v2.5.2',
      'version' => '2.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f98b54df6ad059855739db6fcbc2d36995283fe1',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.0',
      ),
    ),
    'symfony/filesystem' => 
    array (
      'pretty_version' => 'v5.4.13',
      'version' => '5.4.13.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac09569844a9109a5966b9438fc29113ce77cf51',
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v5.4.11',
      'version' => '5.4.11.0',
      'aliases' => 
      array (
      ),
      'reference' => '7872a66f57caffa2916a584db1aa7f12adc76f8c',
    ),
    'symfony/options-resolver' => 
    array (
      'pretty_version' => 'v5.4.11',
      'version' => '5.4.11.0',
      'aliases' => 
      array (
      ),
      'reference' => '54f14e36aa73cb8f7261d7686691fd4d75ea2690',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6fd1b9a79f6e3cf65f9e679b23af304cd9e010d4',
    ),
    'symfony/polyfill-intl-grapheme' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '433d05519ce6990bf3530fba6957499d327395c2',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '219aa369ceff116e673852dce47c3a41794c14bd',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9344f9cb97f3b19424af1a21a3b0e75b0a7d8d7e',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e440d35fa0286f77fb45b79a03fedbeda9307e85',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cfa0ae98841b9e461207c13ab093d76b0fa7bace',
    ),
    'symfony/polyfill-php81' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '13f6d1271c663dc5ae9fb843a8f16521db7687a1',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v5.4.11',
      'version' => '5.4.11.0',
      'aliases' => 
      array (
      ),
      'reference' => '6e75fe6874cbc7e4773d049616ab450eff537bf1',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v2.5.2',
      'version' => '2.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '4b426aac47d6427cc1a1d0f7e2ac724627f5966c',
    ),
    'symfony/stopwatch' => 
    array (
      'pretty_version' => 'v5.4.13',
      'version' => '5.4.13.0',
      'aliases' => 
      array (
      ),
      'reference' => '6df7a3effde34d81717bbef4591e5ffe32226d69',
    ),
    'symfony/string' => 
    array (
      'pretty_version' => 'v5.4.15',
      'version' => '5.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '571334ce9f687e3e6af72db4d3b2a9431e4fd9ed',
    ),
    'tecnickcom/tcpdf' => 
    array (
      'pretty_version' => '6.5.0',
      'version' => '6.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cc54c1503685e618b23922f53635f46e87653662',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '34a41e998c2183e22995f158c581e7b5e755ab9e',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
