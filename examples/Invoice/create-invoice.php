<?php
/**
 * @package Redbitcz\SimpleShop\Api
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@simpleshop.cz>
 */

require_once __DIR__ . '/../config.php';

$simpleshop_api = new SimpleShopApi\Client(SIMPLESHOP_API_LOGIN, SIMPLESHOP_API_KEY);

/**
 * Podklady pro vytvoření faktury
 *
 * Některá čísla v příkladu jsou číselná označení systémových typů.
 * Například: 'type' => 1 znamená, že vytvořený doklad bude Faktura a nikoliv třeba Výzva k platbě.
 * Popis všech dostupných parametrů najdete v dokumentaci:
 * @link https://simpleshopcz.docs.apiary.io/#reference/faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě SimpleShopEnum, například:.
 * 'type' => SimpleShopEnum::DOCUMENT_TYPE_FAKTURA
 */
$params = [
    'type' => 1,
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
    'currency' => 'EUR',
    'items' => [
        [
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 15,
        ],
        [
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 15,
        ],
        [
            'text' => 'Doprava',
            'unit_price' => 0,
            'vat_rate' => 0,
        ]
    ],
    'action_after_create_send_to_eet' => true
];

$invoice = $simpleshop_api->createInvoice($params);
?>

<h2>Vytvoření faktury</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($invoice, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
