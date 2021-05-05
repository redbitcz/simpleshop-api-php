<?php
/**
 * @package Redbitcz\Vyfakturuj\SimpleShopAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@simpleshop.cz>
 */

require_once __DIR__ . '/../config.php';

$simpleshop_api = new SimpleShopApi\Client(SIMPLESHOP_API_LOGIN, SIMPLESHOP_API_KEY, 'https://api.simpleshop.cz/2.0/');

/**
 * Zadejte informace o produktech pro vyhledání
 *
 * Seznam dostupných parametrů je popsán v dokumentaci:
 * @link https://simpleshopcz.docs.apiary.io/#reference/produkty
 */
$opt = [
    'date_created_from' => '2021-01-01',
    'date_created_to' => '2021-10-31',
];

$products = $simpleshop_api->getProducts($opt);
?>

<h2>Vyhledání produktů</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
