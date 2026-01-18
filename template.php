<!DOCTYPE html>
<?php

/*
 * adb_simplest/template.phtml
 *
 * Copyright 2023 @ajaxStardust <flux@mx23>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

date_default_timezone_set('EST');
$page_heading = 'Some Text Styles of &#x201c;Chota MicroCSS&#x201d; CSS';
$title = 'TITLE ME PLEASE';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php print $title; ?>
    </title>
    <link rel="icon" type="image/ico" href="favicon.ico">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <!-- link rel="stylesheet" href="https://unpkg.com/chota@latest" -->
    <link href="assets/css/lightslider.css" rel="stylesheet">
    <style>
        .displaynone {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="public/assets/css/extra/chota.min.css">
    <style>
        body.dark {
            --bg-color: #000;
            --bg-secondary-color: #131316;
            --font-color: #f5f5f5;
            --color-grey: #ccc;
            --color-darkGrey: #777;
        }
    </style>
    <script>
        if (window.matchMedia &&
            window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('dark');
        }
    </script>
</head>

<body>

    <div id="pagewidth" class="container">
        <!--    :begin    class:content        -->

        <section id="header">
            <!-- #HEADER -->
            <h1 class="bg-secondary text-primary text-center pe-3">
                Unicode Block “Miscellaneous Symbols and Pictographs”
            </h1>
        </section>
        <section class="content">

<div>

<div class="table-head">
  <div class="text-long-column table-cell">Unicode</div>
  <div class="numeric-cell table-cell">Character</div>
  <div class="table-cell">Name</div>
</div>
<details class="content-item card" href="#x1F300">
  <summary>&#x1F300; &amp;#x1F300;</summary>
  <div class="text">🌀</div>
  <div class="name"><p>Cyclone</p></div>
</details>
<details class="content-item card" href="#x1F301">
  <summary>&#x1F301; &amp;#x1F301;</summary>
  <div class="text">🌁</div>
  <div class="name"><p>Foggy</p></div>
</details>
<details class="content-item card" href="#x1F302">
  <summary>&#x1F302; &amp;#x1F302;</summary>
  <div class="text">🌂</div>
  <div class="name"><p>Closed Umbrella</p></div>
</details>
<details class="content-item card" href="#x1F303">
  <summary>&#x1F303; &amp;#x1F303;</summary>
  <div class="text">🌃</div>
  <div class="name"><p>Night with Stars</p></div>
</details>
<details class="content-item card" href="#x1F304">
  <summary>&#x1F304; &amp;#x1F304;</summary>
  <div class="text">🌄</div>
  <div class="name"><p>Sunrise Over Mountains</p></div>
</details>
<details class="content-item card" href="#x1F305">
  <summary>&#x1F305; &amp;#x1F305;</summary>
  <div class="text">🌅</div>
  <div class="name"><p>Sunrise</p></div>
</details>
<details class="content-item card" href="#x1F306">
  <summary>&#x1F306; &amp;#x1F306;</summary>
  <div class="text">🌆</div>
  <div class="name"><p>Cityscape at Dusk</p></div>
</details>
<details class="content-item card" href="#x1F307">
  <summary>&#x1F307; &amp;#x1F307;</summary>
  <div class="text">🌇</div>
  <div class="name"><p>Sunset Over Buildings</p></div>
</details>
<details class="content-item card" href="#x1F308">
  <summary>&#x1F308; &amp;#x1F308;</summary>
  <div class="text">🌈</div>
  <div class="name"><p>Rainbow</p></div>
</details>
<details class="content-item card" href="#x1F309">
  <summary>&#x1F309; &amp;#x1F309;</summary>
  <div class="text">🌉</div>
  <div class="name"><p>Bridge at Night</p></div>
</details>
<details class="content-item card" href="#x1F30A">
  <summary>&#x1F30A; &amp;#x1F30A;</summary>
  <div class="text">🌊</div>
  <div class="name"><p>Water Wave</p></div>
</details>
<details class="content-item card" href="#x1F30B">
  <summary>&#x1F30B; &amp;#x1F30B;</summary>
  <div class="text">🌋</div>
  <div class="name"><p>Volcano</p></div>
</details>
<details class="content-item card" href="#x1F30C">
  <summary>&#x1F30C; &amp;#x1F30C;</summary>
  <div class="text">🌌</div>
  <div class="name"><p>Milky Way</p></div>
</details>
<details class="content-item card" href="#x1F30D">
  <summary>&#x1F30D; &amp;#x1F30D;</summary>
  <div class="text">🌍</div>
  <div class="name"><p>Earth Globe Europe-Africa</p></div>
</details>
<details class="content-item card" href="#x1F30E">
  <summary>&#x1F30E; &amp;#x1F30E;</summary>
  <div class="text">🌎</div>
  <div class="name"><p>Earth Globe Americas</p></div>
</details>
<details class="content-item card" href="#x1F30F">
  <summary>&#x1F30F; &amp;#x1F30F;</summary>
  <div class="text">🌏</div>
  <div class="name"><p>Earth Globe Asia-Australia</p></div>
</details>
<details class="content-item card" href="#x1F310">
  <summary>&#x1F310; &amp;#x1F310;</summary>
  <div class="text">🌐</div>
  <div class="name"><p>Globe with Meridians</p></div>
</details>
<details class="content-item card" href="#x1F311">
  <summary>&#x1F311; &amp;#x1F311;</summary>
  <div class="text">🌑</div>
  <div class="name"><p>New Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F312">
  <summary>&#x1F312; &amp;#x1F312;</summary>
  <div class="text">🌒</div>
  <div class="name"><p>Waxing Crescent Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F313">
  <summary>&#x1F313; &amp;#x1F313;</summary>
  <div class="text">🌓</div>
  <div class="name"><p>First Quarter Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F314">
  <summary>&#x1F314; &amp;#x1F314;</summary>
  <div class="text">🌔</div>
  <div class="name"><p>Waxing Gibbous Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F315">
  <summary>&#x1F315; &amp;#x1F315;</summary>
  <div class="text">🌕</div>
  <div class="name"><p>Full Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F316">
  <summary>&#x1F316; &amp;#x1F316;</summary>
  <div class="text">🌖</div>
  <div class="name"><p>Waning Gibbous Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F317">
  <summary>&#x1F317; &amp;#x1F317;</summary>
  <div class="text">🌗</div>
  <div class="name"><p>Last Quarter Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F318">
  <summary>&#x1F318; &amp;#x1F318;</summary>
  <div class="text">🌘</div>
  <div class="name"><p>Waning Crescent Moon Symbol</p></div>
</details>
<details class="content-item card" href="#x1F319">
  <summary>&#x1F319; &amp;#x1F319;</summary>
  <div class="text">🌙</div>
  <div class="name"><p>Crescent Moon</p></div>
</details>
<details class="content-item card" href="#x1F31A">
  <summary>&#x1F31A; &amp;#x1F31A;</summary>
  <div class="text">🌚</div>
  <div class="name"><p>New Moon with Face</p></div>
</details>
<details class="content-item card" href="#x1F31B">
  <summary>&#x1F31B; &amp;#x1F31B;</summary>
  <div class="text">🌛</div>
  <div class="name"><p>First Quarter Moon with Face</p></div>
</details>
<details class="content-item card" href="#x1F31C">
  <summary>&#x1F31C; &amp;#x1F31C;</summary>
  <div class="text">🌜</div>
  <div class="name"><p>Last Quarter Moon with Face</p></div>
</details>
<details class="content-item card" href="#x1F31D">
  <summary>&#x1F31D; &amp;#x1F31D;</summary>
  <div class="text">🌝</div>
  <div class="name"><p>Full Moon with Face</p></div>
</details>
<details class="content-item card" href="#x1F31E">
  <summary>&#x1F31E; &amp;#x1F31E;</summary>
  <div class="text">🌞</div>
  <div class="name"><p>Sun with Face</p></div>
</details>
<details class="content-item card" href="#x1F31F">
  <summary>&#x1F31F; &amp;#x1F31F;</summary>
  <div class="text">🌟</div>
  <div class="name"><p>Glowing Star</p></div>
</details>
<details class="content-item card" href="#x1F320">
  <summary>&#x1F320; &amp;#x1F320;</summary>
  <div class="text">🌠</div>
  <div class="name"><p>Shooting Star</p></div>
</details>
<details class="content-item card" href="#x1F321">
  <summary>&#x1F321; &amp;#x1F321;</summary>
  <div class="text">🌡</div>
  <div class="name"><p>Thermometer</p></div>
</details>
<details class="content-item card" href="#x1F322">
  <summary>&#x1F322; &amp;#x1F322;</summary>
  <div class="text">🌢</div>
  <div class="name"><p>Black Droplet</p></div>
</details>
<details class="content-item card" href="#x1F323">
  <summary>&#x1F323; &amp;#x1F323;</summary>
  <div class="text">🌣</div>
  <div class="name"><p>White Sun</p></div>
</details>
<details class="content-item card" href="#x1F324">
  <summary>&#x1F324; &amp;#x1F324;</summary>
  <div class="text">🌤</div>
  <div class="name"><p>White Sun with Small Cloud</p></div>
</details>
<details class="content-item card" href="#x1F325">
  <summary>&#x1F325; &amp;#x1F325;</summary>
  <div class="text">🌥</div>
  <div class="name"><p>White Sun Behind Cloud</p></div>
</details>
<details class="content-item card" href="#x1F326">
  <summary>&#x1F326; &amp;#x1F326;</summary>
  <div class="text">🌦</div>
  <div class="name"><p>White Sun Behind Cloud with Rain</p></div>
</details>
<details class="content-item card" href="#x1F327">
  <summary>&#x1F327; &amp;#x1F327;</summary>
  <div class="text">🌧</div>
  <div class="name"><p>Cloud with Rain</p></div>
</details>
<details class="content-item card" href="#x1F328">
  <summary>&#x1F328; &amp;#x1F328;</summary>
  <div class="text">🌨</div>
  <div class="name"><p>Cloud with Snow</p></div>
</details>
<details class="content-item card" href="#x1F329">
  <summary>&#x1F329; &amp;#x1F329;</summary>
  <div class="text">🌩</div>
  <div class="name"><p>Cloud with Lightning</p></div>
</details>
<details class="content-item card" href="#x1F32A">
  <summary>&#x1F32A; &amp;#x1F32A;</summary>
  <div class="text">🌪</div>
  <div class="name"><p>Cloud with Tornado</p></div>
</details>
<details class="content-item card" href="#x1F32B">
  <summary>&#x1F32B; &amp;#x1F32B;</summary>
  <div class="text">🌫</div>
  <div class="name"><p>Fog</p></div>
</details>
<details class="content-item card" href="#x1F32C">
  <summary>&#x1F32C; &amp;#x1F32C;</summary>
  <div class="text">🌬</div>
  <div class="name"><p>Wind Blowing Face</p></div>
</details>
<details class="content-item card" href="#x1F32D">
  <summary>&#x1F32D; &amp;#x1F32D;</summary>
  <div class="text">🌭</div>
  <div class="name"><p>Hot Dog</p></div>
</details>
<details class="content-item card" href="#x1F32E">
  <summary>&#x1F32E; &amp;#x1F32E;</summary>
  <div class="text">🌮</div>
  <div class="name"><p>Taco</p></div>
</details>
<details class="content-item card" href="#x1F32F">
  <summary>&#x1F32F; &amp;#x1F32F;</summary>
  <div class="text">🌯</div>
  <div class="name"><p>Burrito</p></div>
</details>
<details class="content-item card" href="#x1F330">
  <summary>&#x1F330; &amp;#x1F330;</summary>
  <div class="text">🌰</div>
  <div class="name"><p>Chestnut</p></div>
</details>
<details class="content-item card" href="#x1F331">
  <summary>&#x1F331; &amp;#x1F331;</summary>
  <div class="text">🌱</div>
  <div class="name"><p>Seedling</p></div>
</details>
<details class="content-item card" href="#x1F332">
  <summary>&#x1F332; &amp;#x1F332;</summary>
  <div class="text">🌲</div>
  <div class="name"><p>Evergreen Tree</p></div>
</details>
<details class="content-item card" href="#x1F333">
  <summary>&#x1F333; &amp;#x1F333;</summary>
  <div class="text">🌳</div>
  <div class="name"><p>Deciduous Tree</p></div>
</details>
<details class="content-item card" href="#x1F334">
  <summary>&#x1F334; &amp;#x1F334;</summary>
  <div class="text">🌴</div>
  <div class="name"><p>Palm Tree</p></div>
</details>
<details class="content-item card" href="#x1F335">
  <summary>&#x1F335; &amp;#x1F335;</summary>
  <div class="text">🌵</div>
  <div class="name"><p>Cactus</p></div>
</details>
<details class="content-item card" href="#x1F336">
  <summary>&#x1F336; &amp;#x1F336;</summary>
  <div class="text">🌶</div>
  <div class="name"><p>Hot Pepper</p></div>
</details>
<details class="content-item card" href="#x1F337">
  <summary>&#x1F337; &amp;#x1F337;</summary>
  <div class="text">🌷</div>
  <div class="name"><p>Tulip</p></div>
</details>
<details class="content-item card" href="#x1F338">
  <summary>&#x1F338; &amp;#x1F338;</summary>
  <div class="text">🌸</div>
  <div class="name"><p>Cherry Blossom</p></div>
</details>
<details class="content-item card" href="#x1F339">
  <summary>&#x1F339; &amp;#x1F339;</summary>
  <div class="text">🌹</div>
  <div class="name"><p>Rose</p></div>
</details>
<details class="content-item card" href="#x1F33A">
  <summary>&#x1F33A; &amp;#x1F33A;</summary>
  <div class="text">🌺</div>
  <div class="name"><p>Hibiscus</p></div>
</details>
<details class="content-item card" href="#x1F33B">
  <summary>&#x1F33B; &amp;#x1F33B;</summary>
  <div class="text">🌻</div>
  <div class="name"><p>Sunflower</p></div>
</details>
<details class="content-item card" href="#x1F33C">
  <summary>&#x1F33C; &amp;#x1F33C;</summary>
  <div class="text">🌼</div>
  <div class="name"><p>Blossom</p></div>
</details>
<details class="content-item card" href="#x1F33D">
  <summary>&#x1F33D; &amp;#x1F33D;</summary>
  <div class="text">🌽</div>
  <div class="name"><p>Ear of Maize</p></div>
</details>
<details class="content-item card" href="#x1F33E">
  <summary>&#x1F33E; &amp;#x1F33E;</summary>
  <div class="text">🌾</div>
  <div class="name"><p>Ear of Rice</p></div>
</details>
<details class="content-item card" href="#x1F33F">
  <summary>&#x1F33F; &amp;#x1F33F;</summary>
  <div class="text">🌿</div>
  <div class="name"><p>Herb</p></div>
</details>
<details class="content-item card" href="#x1F340">
  <summary>&#x1F340; &amp;#x1F340;</summary>
  <div class="text">🍀</div>
  <div class="name"><p>Four Leaf Clover</p></div>
</details>
<details class="content-item card" href="#x1F341">
  <summary>&#x1F341; &amp;#x1F341;</summary>
  <div class="text">🍁</div>
  <div class="name"><p>Maple Leaf</p></div>
</details>
<details class="content-item card" href="#x1F342">
  <summary>&#x1F342; &amp;#x1F342;</summary>
  <div class="text">🍂</div>
  <div class="name"><p>Fallen Leaf</p></div>
</details>
<details class="content-item card" href="#x1F343">
  <summary>&#x1F343; &amp;#x1F343;</summary>
  <div class="text">🍃</div>
  <div class="name"><p>Leaf Fluttering In Wind</p></div>
</details>
<details class="content-item card" href="#x1F344">
  <summary>&#x1F344; &amp;#x1F344;</summary>
  <div class="text">🍄</div>
  <div class="name"><p>Mushroom</p></div>
</details>
<details class="content-item card" href="#x1F345">
  <summary>&#x1F345; &amp;#x1F345;</summary>
  <div class="text">🍅</div>
  <div class="name"><p>Tomato</p></div>
</details>
<details class="content-item card" href="#x1F346">
  <summary>&#x1F346; &amp;#x1F346;</summary>
  <div class="text">🍆</div>
  <div class="name"><p>Aubergine</p></div>
</details>
<details class="content-item card" href="#x1F347">
  <summary>&#x1F347; &amp;#x1F347;</summary>
  <div class="text">🍇</div>
  <div class="name"><p>Grapes</p></div>
</details>
<details class="content-item card" href="#x1F348">
  <summary>&#x1F348; &amp;#x1F348;</summary>
  <div class="text">🍈</div>
  <div class="name"><p>Melon</p></div>
</details>
<details class="content-item card" href="#x1F349">
  <summary>&#x1F349; &amp;#x1F349;</summary>
  <div class="text">🍉</div>
  <div class="name"><p>Watermelon</p></div>
</details>
<details class="content-item card" href="#x1F34A">
  <summary>&#x1F34A; &amp;#x1F34A;</summary>
  <div class="text">🍊</div>
  <div class="name"><p>Tangerine</p></div>
</details>
<details class="content-item card" href="#x1F34B">
  <summary>&#x1F34B; &amp;#x1F34B;</summary>
  <div class="text">🍋</div>
  <div class="name"><p>Lemon</p></div>
</details>
<details class="content-item card" href="#x1F34C">
  <summary>&#x1F34C; &amp;#x1F34C;</summary>
  <div class="text">🍌</div>
  <div class="name"><p>Banana</p></div>
</details>
<details class="content-item card" href="#x1F34D">
  <summary>&#x1F34D; &amp;#x1F34D;</summary>
  <div class="text">🍍</div>
  <div class="name"><p>Pineapple</p></div>
</details>
<details class="content-item card" href="#x1F34E">
  <summary>&#x1F34E; &amp;#x1F34E;</summary>
  <div class="text">🍎</div>
  <div class="name"><p>Red Apple</p></div>
</details>
<details class="content-item card" href="#x1F34F">
  <summary>&#x1F34F; &amp;#x1F34F;</summary>
  <div class="text">🍏</div>
  <div class="name"><p>Green Apple</p></div>
</details>
<details class="content-item card" href="#x1F350">
  <summary>&#x1F350; &amp;#x1F350;</summary>
  <div class="text">🍐</div>
  <div class="name"><p>Pear</p></div>
</details>
<details class="content-item card" href="#x1F351">
  <summary>&#x1F351; &amp;#x1F351;</summary>
  <div class="text">🍑</div>
  <div class="name"><p>Peach</p></div>
</details>
<details class="content-item card" href="#x1F352">
  <summary>&#x1F352; &amp;#x1F352;</summary>
  <div class="text">🍒</div>
  <div class="name"><p>Cherries</p></div>
</details>
<details class="content-item card" href="#x1F353">
  <summary>&#x1F353; &amp;#x1F353;</summary>
  <div class="text">🍓</div>
  <div class="name"><p>Strawberry</p></div>
</details>
<details class="content-item card" href="#x1F354">
  <summary>&#x1F354; &amp;#x1F354;</summary>
  <div class="text">🍔</div>
  <div class="name"><p>Hamburger</p></div>
</details>
<details class="content-item card" href="#x1F355">
  <summary>&#x1F355; &amp;#x1F355;</summary>
  <div class="text">🍕</div>
  <div class="name"><p>Slice of Pizza</p></div>
</details>
<details class="content-item card" href="#x1F356">
  <summary>&#x1F356; &amp;#x1F356;</summary>
  <div class="text">🍖</div>
  <div class="name"><p>Meat On Bone</p></div>
</details>
<details class="content-item card" href="#x1F357">
  <summary>&#x1F357; &amp;#x1F357;</summary>
  <div class="text">🍗</div>
  <div class="name"><p>Poultry Leg</p></div>
</details>
<details class="content-item card" href="#x1F358">
  <summary>&#x1F358; &amp;#x1F358;</summary>
  <div class="text">🍘</div>
  <div class="name"><p>Rice Cracker</p></div>
</details>
<details class="content-item card" href="#x1F359">
  <summary>&#x1F359; &amp;#x1F359;</summary>
  <div class="text">🍙</div>
  <div class="name"><p>Rice Ball</p></div>
</details>
<details class="content-item card" href="#x1F35A">
  <summary>&#x1F35A; &amp;#x1F35A;</summary>
  <div class="text">🍚</div>
  <div class="name"><p>Cooked Rice</p></div>
</details>
<details class="content-item card" href="#x1F35B">
  <summary>&#x1F35B; &amp;#x1F35B;</summary>
  <div class="text">🍛</div>
  <div class="name"><p>Curry and Rice</p></div>
</details>
<details class="content-item card" href="#x1F35C">
  <summary>&#x1F35C; &amp;#x1F35C;</summary>
  <div class="text">🍜</div>
  <div class="name"><p>Steaming Bowl</p></div>
</details>
<details class="content-item card" href="#x1F35D">
  <summary>&#x1F35D; &amp;#x1F35D;</summary>
  <div class="text">🍝</div>
  <div class="name"><p>Spaghetti</p></div>
</details>
<details class="content-item card" href="#x1F35E">
  <summary>&#x1F35E; &amp;#x1F35E;</summary>
  <div class="text">🍞</div>
  <div class="name"><p>Bread</p></div>
</details>
<details class="content-item card" href="#x1F35F">
  <summary>&#x1F35F; &amp;#x1F35F;</summary>
  <div class="text">🍟</div>
  <div class="name"><p>French Fries</p></div>
</details>
<details class="content-item card" href="#x1F360">
  <summary>&#x1F360; &amp;#x1F360;</summary>
  <div class="text">🍠</div>
  <div class="name"><p>Roasted Sweet Potato</p></div>
</details>
<details class="content-item card" href="#x1F361">
  <summary>&#x1F361; &amp;#x1F361;</summary>
  <div class="text">🍡</div>
  <div class="name"><p>Dango</p></div>
</details>
<details class="content-item card" href="#x1F362">
  <summary>&#x1F362; &amp;#x1F362;</summary>
  <div class="text">🍢</div>
  <div class="name"><p>Oden</p></div>
</details>
<details class="content-item card" href="#x1F363">
  <summary>&#x1F363; &amp;#x1F363;</summary>
  <div class="text">🍣</div>
  <div class="name"><p>Sushi</p></div>
</details>
<details class="content-item card" href="#x1F364">
  <summary>&#x1F364; &amp;#x1F364;</summary>
  <div class="text">🍤</div>
  <div class="name"><p>Fried Shrimp</p></div>
</details>
<details class="content-item card" href="#x1F365">
  <summary>&#x1F365; &amp;#x1F365;</summary>
  <div class="text">🍥</div>
  <div class="name"><p>Fish Cake with Swirl Design</p></div>
</details>
<details class="content-item card" href="#x1F366">
  <summary>&#x1F366; &amp;#x1F366;</summary>
  <div class="text">🍦</div>
  <div class="name"><p>Soft Ice Cream</p></div>
</details>
<details class="content-item card" href="#x1F367">
  <summary>&#x1F367; &amp;#x1F367;</summary>
  <div class="text">🍧</div>
  <div class="name"><p>Shaved Ice</p></div>
</details>
<details class="content-item card" href="#x1F368">
  <summary>&#x1F368; &amp;#x1F368;</summary>
  <div class="text">🍨</div>
  <div class="name"><p>Ice Cream</p></div>
</details>
<details class="content-item card" href="#x1F369">
  <summary>&#x1F369; &amp;#x1F369;</summary>
  <div class="text">🍩</div>
  <div class="name"><p>Doughnut</p></div>
</details>
<details class="content-item card" href="#x1F36A">
  <summary>&#x1F36A; &amp;#x1F36A;</summary>
  <div class="text">🍪</div>
  <div class="name"><p>Cookie</p></div>
</details>
<details class="content-item card" href="#x1F36B">
  <summary>&#x1F36B; &amp;#x1F36B;</summary>
  <div class="text">🍫</div>
  <div class="name"><p>Chocolate Bar</p></div>
</details>
<details class="content-item card" href="#x1F36C">
  <summary>&#x1F36C; &amp;#x1F36C;</summary>
  <div class="text">🍬</div>
  <div class="name"><p>Candy</p></div>
</details>
<details class="content-item card" href="#x1F36D">
  <summary>&#x1F36D; &amp;#x1F36D;</summary>
  <div class="text">🍭</div>
  <div class="name"><p>Lollipop</p></div>
</details>
<details class="content-item card" href="#x1F36E">
  <summary>&#x1F36E; &amp;#x1F36E;</summary>
  <div class="text">🍮</div>
  <div class="name"><p>Custard</p></div>
</details>
<details class="content-item card" href="#x1F36F">
  <summary>&#x1F36F; &amp;#x1F36F;</summary>
  <div class="text">🍯</div>
  <div class="name"><p>Honey Pot</p></div>
</details>
<details class="content-item card" href="#x1F370">
  <summary>&#x1F370; &amp;#x1F370;</summary>
  <div class="text">🍰</div>
  <div class="name"><p>Shortcake</p></div>
</details>
<details class="content-item card" href="#x1F371">
  <summary>&#x1F371; &amp;#x1F371;</summary>
  <div class="text">🍱</div>
  <div class="name"><p>Bento Box</p></div>
</details>
<details class="content-item card" href="#x1F372">
  <summary>&#x1F372; &amp;#x1F372;</summary>
  <div class="text">🍲</div>
  <div class="name"><p>Pot of Food</p></div>
</details>
<details class="content-item card" href="#x1F373">
  <summary>&#x1F373; &amp;#x1F373;</summary>
  <div class="text">🍳</div>
  <div class="name"><p>Cooking</p></div>
</details>
<details class="content-item card" href="#x1F374">
  <summary>&#x1F374; &amp;#x1F374;</summary>
  <div class="text">🍴</div>
  <div class="name"><p>Fork and Knife</p></div>
</details>
<details class="content-item card" href="#x1F375">
  <summary>&#x1F375; &amp;#x1F375;</summary>
  <div class="text">🍵</div>
  <div class="name"><p>Teacup Without Handle</p></div>
</details>
<details class="content-item card" href="#x1F376">
  <summary>&#x1F376; &amp;#x1F376;</summary>
  <div class="text">🍶</div>
  <div class="name"><p>Sake Bottle and Cup</p></div>
</details>
<details class="content-item card" href="#x1F377">
  <summary>&#x1F377; &amp;#x1F377;</summary>
  <div class="text">🍷</div>
  <div class="name"><p>Wine Glass</p></div>
</details>
<details class="content-item card" href="#x1F378">
  <summary>&#x1F378; &amp;#x1F378;</summary>
  <div class="text">🍸</div>
  <div class="name"><p>Cocktail Glass</p></div>
</details>
<details class="content-item card" href="#x1F379">
  <summary>&#x1F379; &amp;#x1F379;</summary>
  <div class="text">🍹</div>
  <div class="name"><p>Tropical Drink</p></div>
</details>
<details class="content-item card" href="#x1F37A">
  <summary>&#x1F37A; &amp;#x1F37A;</summary>
  <div class="text">🍺</div>
  <div class="name"><p>Beer Mug</p></div>
</details>
<details class="content-item card" href="#x1F37B">
  <summary>&#x1F37B; &amp;#x1F37B;</summary>
  <div class="text">🍻</div>
  <div class="name"><p>Clinking Beer Mugs</p></div>
</details>
<details class="content-item card" href="#x1F37C">
  <summary>&#x1F37C; &amp;#x1F37C;</summary>
  <div class="text">🍼</div>
  <div class="name"><p>Baby Bottle</p></div>
</details>
<details class="content-item card" href="#x1F37D">
  <summary>&#x1F37D; &amp;#x1F37D;</summary>
  <div class="text">🍽</div>
  <div class="name"><p>Fork and Knife with Plate</p></div>
</details>
<details class="content-item card" href="#x1F37E">
  <summary>&#x1F37E; &amp;#x1F37E;</summary>
  <div class="text">🍾</div>
  <div class="name"><p>Bottle with Popping Cork</p></div>
</details>
<details class="content-item card" href="#x1F37F">
  <summary>&#x1F37F; &amp;#x1F37F;</summary>
  <div class="text">🍿</div>
  <div class="name"><p>Popcorn</p></div>
</details>
<details class="content-item card" href="#x1F380">
  <summary>&#x1F380; &amp;#x1F380;</summary>
  <div class="text">🎀</div>
  <div class="name"><p>Ribbon</p></div>
</details>
<details class="content-item card" href="#x1F381">
  <summary>&#x1F381; &amp;#x1F381;</summary>
  <div class="text">🎁</div>
  <div class="name"><p>Wrapped Present</p></div>
</details>
<details class="content-item card" href="#x1F382">
  <summary>&#x1F382; &amp;#x1F382;</summary>
  <div class="text">🎂</div>
  <div class="name"><p>Birthday Cake</p></div>
</details>
<details class="content-item card" href="#x1F383">
  <summary>&#x1F383; &amp;#x1F383;</summary>
  <div class="text">🎃</div>
  <div class="name"><p>Jack-O-Lantern</p></div>
</details>
<details class="content-item card" href="#x1F384">
  <summary>&#x1F384; &amp;#x1F384;</summary>
  <div class="text">🎄</div>
  <div class="name"><p>Christmas Tree</p></div>
</details>
<details class="content-item card" href="#x1F385">
  <summary>&#x1F385; &amp;#x1F385;</summary>
  <div class="text">🎅</div>
  <div class="name"><p>Father Christmas</p></div>
</details>
<details class="content-item card" href="#x1F386">
  <summary>&#x1F386; &amp;#x1F386;</summary>
  <div class="text">🎆</div>
  <div class="name"><p>Fireworks</p></div>
</details>
<details class="content-item card" href="#x1F387">
  <summary>&#x1F387; &amp;#x1F387;</summary>
  <div class="text">🎇</div>
  <div class="name"><p>Firework Sparkler</p></div>
</details>
<details class="content-item card" href="#x1F388">
  <summary>&#x1F388; &amp;#x1F388;</summary>
  <div class="text">🎈</div>
  <div class="name"><p>Balloon</p></div>
</details>
<details class="content-item card" href="#x1F389">
  <summary>&#x1F389; &amp;#x1F389;</summary>
  <div class="text">🎉</div>
  <div class="name"><p>Party Popper</p></div>
</details>
<details class="content-item card" href="#x1F38A">
  <summary>&#x1F38A; &amp;#x1F38A;</summary>
  <div class="text">🎊</div>
  <div class="name"><p>Confetti Ball</p></div>
</details>
<details class="content-item card" href="#x1F38B">
  <summary>&#x1F38B; &amp;#x1F38B;</summary>
  <div class="text">🎋</div>
  <div class="name"><p>Tanabata Tree</p></div>
</details>
<details class="content-item card" href="#x1F38C">
  <summary>&#x1F38C; &amp;#x1F38C;</summary>
  <div class="text">🎌</div>
  <div class="name"><p>Crossed Flags</p></div>
</details>
<details class="content-item card" href="#x1F38D">
  <summary>&#x1F38D; &amp;#x1F38D;</summary>
  <div class="text">🎍</div>
  <div class="name"><p>Pine Decoration</p></div>
</details>
<details class="content-item card" href="#x1F38E">
  <summary>&#x1F38E; &amp;#x1F38E;</summary>
  <div class="text">🎎</div>
  <div class="name"><p>Japanese Dolls</p></div>
</details>
<details class="content-item card" href="#x1F38F">
  <summary>&#x1F38F; &amp;#x1F38F;</summary>
  <div class="text">🎏</div>
  <div class="name"><p>Carp Streamer</p></div>
</details>
<details class="content-item card" href="#x1F390">
  <summary>&#x1F390; &amp;#x1F390;</summary>
  <div class="text">🎐</div>
  <div class="name"><p>Wind Chime</p></div>
</details>
<details class="content-item card" href="#x1F391">
  <summary>&#x1F391; &amp;#x1F391;</summary>
  <div class="text">🎑</div>
  <div class="name"><p>Moon Viewing Ceremony</p></div>
</details>
<details class="content-item card" href="#x1F392">
  <summary>&#x1F392; &amp;#x1F392;</summary>
  <div class="text">🎒</div>
  <div class="name"><p>School Satchel</p></div>
</details>
<details class="content-item card" href="#x1F393">
  <summary>&#x1F393; &amp;#x1F393;</summary>
  <div class="text">🎓</div>
  <div class="name"><p>Graduation Cap</p></div>
</details>
<details class="content-item card" href="#x1F394">
  <summary>&#x1F394; &amp;#x1F394;</summary>
  <div class="text">🎔</div>
  <div class="name"><p>Heart with Tip On the Left</p></div>
</details>
<details class="content-item card" href="#x1F395">
  <summary>&#x1F395; &amp;#x1F395;</summary>
  <div class="text">🎕</div>
  <div class="name"><p>Bouquet of Flowers</p></div>
</details>
<details class="content-item card" href="#x1F396">
  <summary>&#x1F396; &amp;#x1F396;</summary>
  <div class="text">🎖</div>
  <div class="name"><p>Military Medal</p></div>
</details>
<details class="content-item card" href="#x1F397">
  <summary>&#x1F397; &amp;#x1F397;</summary>
  <div class="text">🎗</div>
  <div class="name"><p>Reminder Ribbon</p></div>
</details>
<details class="content-item card" href="#x1F398">
  <summary>&#x1F398; &amp;#x1F398;</summary>
  <div class="text">🎘</div>
  <div class="name"><p>Musical Keyboard with Jacks</p></div>
</details>
<details class="content-item card" href="#x1F399">
  <summary>&#x1F399; &amp;#x1F399;</summary>
  <div class="text">🎙</div>
  <div class="name"><p>Studio Microphone</p></div>
</details>
<details class="content-item card" href="#x1F39A">
  <summary>&#x1F39A; &amp;#x1F39A;</summary>
  <div class="text">🎚</div>
  <div class="name"><p>Level Slider</p></div>
</details>
<details class="content-item card" href="#x1F39B">
  <summary>&#x1F39B; &amp;#x1F39B;</summary>
  <div class="text">🎛</div>
  <div class="name"><p>Control Knobs</p></div>
</details>
<details class="content-item card" href="#x1F39C">
  <summary>&#x1F39C; &amp;#x1F39C;</summary>
  <div class="text">🎜</div>
  <div class="name"><p>Beamed Ascending Musical Notes</p></div>
</details>
<details class="content-item card" href="#x1F39D">
  <summary>&#x1F39D; &amp;#x1F39D;</summary>
  <div class="text">🎝</div>
  <div class="name"><p>Beamed Descending Musical Notes</p></div>
</details>
<details class="content-item card" href="#x1F39E">
  <summary>&#x1F39E; &amp;#x1F39E;</summary>
  <div class="text">🎞</div>
  <div class="name"><p>Film Frames</p></div>
</details>
<details class="content-item card" href="#x1F39F">
  <summary>&#x1F39F; &amp;#x1F39F;</summary>
  <div class="text">🎟</div>
  <div class="name"><p>Admission Tickets</p></div>
</details>
<details class="content-item card" href="#x1F3A0">
  <summary>&#x1F3A0; &amp;#x1F3A0;</summary>
  <div class="text">🎠</div>
  <div class="name"><p>Carousel Horse</p></div>
</details>
<details class="content-item card" href="#x1F3A1">
  <summary>&#x1F3A1; &amp;#x1F3A1;</summary>
  <div class="text">🎡</div>
  <div class="name"><p>Ferris Wheel</p></div>
</details>
<details class="content-item card" href="#x1F3A2">
  <summary>&#x1F3A2; &amp;#x1F3A2;</summary>
  <div class="text">🎢</div>
  <div class="name"><p>Roller Coaster</p></div>
</details>
<details class="content-item card" href="#x1F3A3">
  <summary>&#x1F3A3; &amp;#x1F3A3;</summary>
  <div class="text">🎣</div>
  <div class="name"><p>Fishing Pole and Fish</p></div>
</details>
<details class="content-item card" href="#x1F3A4">
  <summary>&#x1F3A4; &amp;#x1F3A4;</summary>
  <div class="text">🎤</div>
  <div class="name"><p>Microphone</p></div>
</details>
<details class="content-item card" href="#x1F3A5">
  <summary>&#x1F3A5; &amp;#x1F3A5;</summary>
  <div class="text">🎥</div>
  <div class="name"><p>Movie Camera</p></div>
</details>
<details class="content-item card" href="#x1F3A6">
  <summary>&#x1F3A6; &amp;#x1F3A6;</summary>
  <div class="text">🎦</div>
  <div class="name"><p>Cinema</p></div>
</details>
<details class="content-item card" href="#x1F3A7">
  <summary>&#x1F3A7; &amp;#x1F3A7;</summary>
  <div class="text">🎧</div>
  <div class="name"><p>Headphone</p></div>
</details>
<details class="content-item card" href="#x1F3A8">
  <summary>&#x1F3A8; &amp;#x1F3A8;</summary>
  <div class="text">🎨</div>
  <div class="name"><p>Artist Palette</p></div>
</details>
<details class="content-item card" href="#x1F3A9">
  <summary>&#x1F3A9; &amp;#x1F3A9;</summary>
  <div class="text">🎩</div>
  <div class="name"><p>Top Hat</p></div>
</details>
<details class="content-item card" href="#x1F3AA">
  <summary>&#x1F3AA; &amp;#x1F3AA;</summary>
  <div class="text">🎪</div>
  <div class="name"><p>Circus Tent</p></div>
</details>
<details class="content-item card" href="#x1F3AB">
  <summary>&#x1F3AB; &amp;#x1F3AB;</summary>
  <div class="text">🎫</div>
  <div class="name"><p>Ticket</p></div>
</details>
<details class="content-item card" href="#x1F3AC">
  <summary>&#x1F3AC; &amp;#x1F3AC;</summary>
  <div class="text">🎬</div>
  <div class="name"><p>Clapper Board</p></div>
</details>
<details class="content-item card" href="#x1F3AD">
  <summary>&#x1F3AD; &amp;#x1F3AD;</summary>
  <div class="text">🎭</div>
  <div class="name"><p>Performing Arts</p></div>
</details>
<details class="content-item card" href="#x1F3AE">
  <summary>&#x1F3AE; &amp;#x1F3AE;</summary>
  <div class="text">🎮</div>
  <div class="name"><p>Video Game</p></div>
</details>
<details class="content-item card" href="#x1F3AF">
  <summary>&#x1F3AF; &amp;#x1F3AF;</summary>
  <div class="text">🎯</div>
  <div class="name"><p>Direct Hit</p></div>
</details>
<details class="content-item card" href="#x1F3B0">
  <summary>&#x1F3B0; &amp;#x1F3B0;</summary>
  <div class="text">🎰</div>
  <div class="name"><p>Slot Machine</p></div>
</details>
<details class="content-item card" href="#x1F3B1">
  <summary>&#x1F3B1; &amp;#x1F3B1;</summary>
  <div class="text">🎱</div>
  <div class="name"><p>Billiards</p></div>
</details>
<details class="content-item card" href="#x1F3B2">
  <summary>&#x1F3B2; &amp;#x1F3B2;</summary>
  <div class="text">🎲</div>
  <div class="name"><p>Game Die</p></div>
</details>
<details class="content-item card" href="#x1F3B3">
  <summary>&#x1F3B3; &amp;#x1F3B3;</summary>
  <div class="text">🎳</div>
  <div class="name"><p>Bowling</p></div>
</details>
<details class="content-item card" href="#x1F3B4">
  <summary>&#x1F3B4; &amp;#x1F3B4;</summary>
  <div class="text">🎴</div>
  <div class="name"><p>Flower Playing Cards</p></div>
</details>
<details class="content-item card" href="#x1F3B5">
  <summary>&#x1F3B5; &amp;#x1F3B5;</summary>
  <div class="text">🎵</div>
  <div class="name"><p>Musical Note</p></div>
</details>
<details class="content-item card" href="#x1F3B6">
  <summary>&#x1F3B6; &amp;#x1F3B6;</summary>
  <div class="text">🎶</div>
  <div class="name"><p>Multiple Musical Notes</p></div>
</details>
<details class="content-item card" href="#x1F3B7">
  <summary>&#x1F3B7; &amp;#x1F3B7;</summary>
  <div class="text">🎷</div>
  <div class="name"><p>Saxophone</p></div>
</details>
<details class="content-item card" href="#x1F3B8">
  <summary>&#x1F3B8; &amp;#x1F3B8;</summary>
  <div class="text">🎸</div>
  <div class="name"><p>Guitar</p></div>
</details>
<details class="content-item card" href="#x1F3B9">
  <summary>&#x1F3B9; &amp;#x1F3B9;</summary>
  <div class="text">🎹</div>
  <div class="name"><p>Musical Keyboard</p></div>
</details>
<details class="content-item card" href="#x1F3BA">
  <summary>&#x1F3BA; &amp;#x1F3BA;</summary>
  <div class="text">🎺</div>
  <div class="name"><p>Trumpet</p></div>
</details>
<details class="content-item card" href="#x1F3BB">
  <summary>&#x1F3BB; &amp;#x1F3BB;</summary>
  <div class="text">🎻</div>
  <div class="name"><p>Violin</p></div>
</details>
<details class="content-item card" href="#x1F3BC">
  <summary>&#x1F3BC; &amp;#x1F3BC;</summary>
  <div class="text">🎼</div>
  <div class="name"><p>Musical Score</p></div>
</details>
<details class="content-item card" href="#x1F3BD">
  <summary>&#x1F3BD; &amp;#x1F3BD;</summary>
  <div class="text">🎽</div>
  <div class="name"><p>Running Shirt with Sash</p></div>
</details>
<details class="content-item card" href="#x1F3BE">
  <summary>&#x1F3BE; &amp;#x1F3BE;</summary>
  <div class="text">🎾</div>
  <div class="name"><p>Tennis Racquet and Ball</p></div>
</details>
<details class="content-item card" href="#x1F3BF">
  <summary>&#x1F3BF; &amp;#x1F3BF;</summary>
  <div class="text">🎿</div>
  <div class="name"><p>Ski and Ski Boot</p></div>
</details>
<details class="content-item card" href="#x1F3C0">
  <summary>&#x1F3C0; &amp;#x1F3C0;</summary>
  <div class="text">🏀</div>
  <div class="name"><p>Basketball and Hoop</p></div>
</details>
<details class="content-item card" href="#x1F3C1">
  <summary>&#x1F3C1; &amp;#x1F3C1;</summary>
  <div class="text">🏁</div>
  <div class="name"><p>Chequered Flag</p></div>
</details>
<details class="content-item card" href="#x1F3C2">
  <summary>&#x1F3C2; &amp;#x1F3C2;</summary>
  <div class="text">🏂</div>
  <div class="name"><p>Snowboarder</p></div>
</details>
<details class="content-item card" href="#x1F3C3">
  <summary>&#x1F3C3; &amp;#x1F3C3;</summary>
  <div class="text">🏃</div>
  <div class="name"><p>Runner</p></div>
</details>
<details class="content-item card" href="#x1F3C4">
  <summary>&#x1F3C4; &amp;#x1F3C4;</summary>
  <div class="text">🏄</div>
  <div class="name"><p>Surfer</p></div>
</details>
<details class="content-item card" href="#x1F3C5">
  <summary>&#x1F3C5; &amp;#x1F3C5;</summary>
  <div class="text">🏅</div>
  <div class="name"><p>Sports Medal</p></div>
</details>
<details class="content-item card" href="#x1F3C6">
  <summary>&#x1F3C6; &amp;#x1F3C6;</summary>
  <div class="text">🏆</div>
  <div class="name"><p>Trophy</p></div>
</details>
<details class="content-item card" href="#x1F3C7">
  <summary>&#x1F3C7; &amp;#x1F3C7;</summary>
  <div class="text">🏇</div>
  <div class="name"><p>Horse Racing</p></div>
</details>
<details class="content-item card" href="#x1F3C8">
  <summary>&#x1F3C8; &amp;#x1F3C8;</summary>
  <div class="text">🏈</div>
  <div class="name"><p>American Football</p></div>
</details>
<details class="content-item card" href="#x1F3C9">
  <summary>&#x1F3C9; &amp;#x1F3C9;</summary>
  <div class="text">🏉</div>
  <div class="name"><p>Rugby Football</p></div>
</details>
<details class="content-item card" href="#x1F3CA">
  <summary>&#x1F3CA; &amp;#x1F3CA;</summary>
  <div class="text">🏊</div>
  <div class="name"><p>Swimmer</p></div>
</details>
<details class="content-item card" href="#x1F3CB">
  <summary>&#x1F3CB; &amp;#x1F3CB;</summary>
  <div class="text">🏋</div>
  <div class="name"><p>Weight Lifter</p></div>
</details>
<details class="content-item card" href="#x1F3CC">
  <summary>&#x1F3CC; &amp;#x1F3CC;</summary>
  <div class="text">🏌</div>
  <div class="name"><p>Golfer</p></div>
</details>
<details class="content-item card" href="#x1F3CD">
  <summary>&#x1F3CD; &amp;#x1F3CD;</summary>
  <div class="text">🏍</div>
  <div class="name"><p>Racing Motorcycle</p></div>
</details>
<details class="content-item card" href="#x1F3CE">
  <summary>&#x1F3CE; &amp;#x1F3CE;</summary>
  <div class="text">🏎</div>
  <div class="name"><p>Racing Car</p></div>
</details>
<details class="content-item card" href="#x1F3CF">
  <summary>&#x1F3CF; &amp;#x1F3CF;</summary>
  <div class="text">🏏</div>
  <div class="name"><p>Cricket Bat and Ball</p></div>
</details>
<details class="content-item card" href="#x1F3D0">
  <summary>&#x1F3D0; &amp;#x1F3D0;</summary>
  <div class="text">🏐</div>
  <div class="name"><p>Volleyball</p></div>
</details>
<details class="content-item card" href="#x1F3D1">
  <summary>&#x1F3D1; &amp;#x1F3D1;</summary>
  <div class="text">🏑</div>
  <div class="name"><p>Field Hockey Stick and Ball</p></div>
</details>
<details class="content-item card" href="#x1F3D2">
  <summary>&#x1F3D2; &amp;#x1F3D2;</summary>
  <div class="text">🏒</div>
  <div class="name"><p>Ice Hockey Stick and Puck</p></div>
</details>
<details class="content-item card" href="#x1F3D3">
  <summary>&#x1F3D3; &amp;#x1F3D3;</summary>
  <div class="text">🏓</div>
  <div class="name"><p>Table Tennis Paddle and Ball</p></div>
</details>
<details class="content-item card" href="#x1F3D4">
  <summary>&#x1F3D4; &amp;#x1F3D4;</summary>
  <div class="text">🏔</div>
  <div class="name"><p>Snow Capped Mountain</p></div>
</details>
<details class="content-item card" href="#x1F3D5">
  <summary>&#x1F3D5; &amp;#x1F3D5;</summary>
  <div class="text">🏕</div>
  <div class="name"><p>Camping</p></div>
</details>
<details class="content-item card" href="#x1F3D6">
  <summary>&#x1F3D6; &amp;#x1F3D6;</summary>
  <div class="text">🏖</div>
  <div class="name"><p>Beach with Umbrella</p></div>
</details>
<details class="content-item card" href="#x1F3D7">
  <summary>&#x1F3D7; &amp;#x1F3D7;</summary>
  <div class="text">🏗</div>
  <div class="name"><p>Building Construction</p></div>
</details>
<details class="content-item card" href="#x1F3D8">
  <summary>&#x1F3D8; &amp;#x1F3D8;</summary>
  <div class="text">🏘</div>
  <div class="name"><p>House Buildings</p></div>
</details>
<details class="content-item card" href="#x1F3D9">
  <summary>&#x1F3D9; &amp;#x1F3D9;</summary>
  <div class="text">🏙</div>
  <div class="name"><p>Cityscape</p></div>
</details>
<details class="content-item card" href="#x1F3DA">
  <summary>&#x1F3DA; &amp;#x1F3DA;</summary>
  <div class="text">🏚</div>
  <div class="name"><p>Derelict House Building</p></div>
</details>
<details class="content-item card" href="#x1F3DB">
  <summary>&#x1F3DB; &amp;#x1F3DB;</summary>
  <div class="text">🏛</div>
  <div class="name"><p>Classical Building</p></div>
</details>
<details class="content-item card" href="#x1F3DC">
  <summary>&#x1F3DC; &amp;#x1F3DC;</summary>
  <div class="text">🏜</div>
  <div class="name"><p>Desert</p></div>
</details>
<details class="content-item card" href="#x1F3DD">
  <summary>&#x1F3DD; &amp;#x1F3DD;</summary>
  <div class="text">🏝</div>
  <div class="name"><p>Desert Island</p></div>
</details>
<details class="content-item card" href="#x1F3DE">
  <summary>&#x1F3DE; &amp;#x1F3DE;</summary>
  <div class="text">🏞</div>
  <div class="name"><p>National Park</p></div>
</details>
<details class="content-item card" href="#x1F3DF">
  <summary>&#x1F3DF; &amp;#x1F3DF;</summary>
  <div class="text">🏟</div>
  <div class="name"><p>Stadium</p></div>
</details>
<details class="content-item card" href="#x1F3E0">
  <summary>&#x1F3E0; &amp;#x1F3E0;</summary>
  <div class="text">🏠</div>
  <div class="name"><p>House Building</p></div>
</details>
<details class="content-item card" href="#x1F3E1">
  <summary>&#x1F3E1; &amp;#x1F3E1;</summary>
  <div class="text">🏡</div>
  <div class="name"><p>House with Garden</p></div>
</details>
<details class="content-item card" href="#x1F3E2">
  <summary>&#x1F3E2; &amp;#x1F3E2;</summary>
  <div class="text">🏢</div>
  <div class="name"><p>Office Building</p></div>
</details>
<details class="content-item card" href="#x1F3E3">
  <summary>&#x1F3E3; &amp;#x1F3E3;</summary>
  <div class="text">🏣</div>
  <div class="name"><p>Japanese Post Office</p></div>
</details>
<details class="content-item card" href="#x1F3E4">
  <summary>&#x1F3E4; &amp;#x1F3E4;</summary>
  <div class="text">🏤</div>
  <div class="name"><p>European Post Office</p></div>
</details>
<details class="content-item card" href="#x1F3E5">
  <summary>&#x1F3E5; &amp;#x1F3E5;</summary>
  <div class="text">🏥</div>
  <div class="name"><p>Hospital</p></div>
</details>
<details class="content-item card" href="#x1F3E6">
  <summary>&#x1F3E6; &amp;#x1F3E6;</summary>
  <div class="text">🏦</div>
  <div class="name"><p>Bank</p></div>
</details>
<details class="content-item card" href="#x1F3E7">
  <summary>&#x1F3E7; &amp;#x1F3E7;</summary>
  <div class="text">🏧</div>
  <div class="name"><p>Automated Teller Machine</p></div>
</details>
<details class="content-item card" href="#x1F3E8">
  <summary>&#x1F3E8; &amp;#x1F3E8;</summary>
  <div class="text">🏨</div>
  <div class="name"><p>Hotel</p></div>
</details>
<details class="content-item card" href="#x1F3E9">
  <summary>&#x1F3E9; &amp;#x1F3E9;</summary>
  <div class="text">🏩</div>
  <div class="name"><p>Love Hotel</p></div>
</details>
<details class="content-item card" href="#x1F3EA">
  <summary>&#x1F3EA; &amp;#x1F3EA;</summary>
  <div class="text">🏪</div>
  <div class="name"><p>Convenience Store</p></div>
</details>
<details class="content-item card" href="#x1F3EB">
  <summary>&#x1F3EB; &amp;#x1F3EB;</summary>
  <div class="text">🏫</div>
  <div class="name"><p>School</p></div>
</details>
<details class="content-item card" href="#x1F3EC">
  <summary>&#x1F3EC; &amp;#x1F3EC;</summary>
  <div class="text">🏬</div>
  <div class="name"><p>Department Store</p></div>
</details>
<details class="content-item card" href="#x1F3ED">
  <summary>&#x1F3ED; &amp;#x1F3ED;</summary>
  <div class="text">🏭</div>
  <div class="name"><p>Factory</p></div>
</details>
<details class="content-item card" href="#x1F3EE">
  <summary>&#x1F3EE; &amp;#x1F3EE;</summary>
  <div class="text">🏮</div>
  <div class="name"><p>Izakaya Lantern</p></div>
</details>
<details class="content-item card" href="#x1F3EF">
  <summary>&#x1F3EF; &amp;#x1F3EF;</summary>
  <div class="text">🏯</div>
  <div class="name"><p>Japanese Castle</p></div>
</details>
<details class="content-item card" href="#x1F3F0">
  <summary>&#x1F3F0; &amp;#x1F3F0;</summary>
  <div class="text">🏰</div>
  <div class="name"><p>European Castle</p></div>
</details>
<details class="content-item card" href="#x1F3F1">
  <summary>&#x1F3F1; &amp;#x1F3F1;</summary>
  <div class="text">🏱</div>
  <div class="name"><p>White Pennant</p></div>
</details>
<details class="content-item card" href="#x1F3F2">
  <summary>&#x1F3F2; &amp;#x1F3F2;</summary>
  <div class="text">🏲</div>
  <div class="name"><p>Black Pennant</p></div>
</details>
<details class="content-item card" href="#x1F3F3">
  <summary>&#x1F3F3; &amp;#x1F3F3;</summary>
  <div class="text">🏳</div>
  <div class="name"><p>Waving White Flag</p></div>
</details>
<details class="content-item card" href="#x1F3F4">
  <summary>&#x1F3F4; &amp;#x1F3F4;</summary>
  <div class="text">🏴</div>
  <div class="name"><p>Waving Black Flag</p></div>
</details>
<details class="content-item card" href="#x1F3F5">
  <summary>&#x1F3F5; &amp;#x1F3F5;</summary>
  <div class="text">🏵</div>
  <div class="name"><p>Rosette</p></div>
</details>
<details class="content-item card" href="#x1F3F6">
  <summary>&#x1F3F6; &amp;#x1F3F6;</summary>
  <div class="text">🏶</div>
  <div class="name"><p>Black Rosette</p></div>
</details>
<details class="content-item card" href="#x1F3F7">
  <summary>&#x1F3F7; &amp;#x1F3F7;</summary>
  <div class="text">🏷</div>
  <div class="name"><p>Label</p></div>
</details>
<details class="content-item card" href="#x1F3F8">
  <summary>&#x1F3F8; &amp;#x1F3F8;</summary>
  <div class="text">🏸</div>
  <div class="name"><p>Badminton Racquet and Shuttlecock</p></div>
</details>
<details class="content-item card" href="#x1F3F9">
  <summary>&#x1F3F9; &amp;#x1F3F9;</summary>
  <div class="text">🏹</div>
  <div class="name"><p>Bow and Arrow</p></div>
</details>
<details class="content-item card" href="#x1F3FA">
  <summary>&#x1F3FA; &amp;#x1F3FA;</summary>
  <div class="text">🏺</div>
  <div class="name"><p>Amphora</p></div>
</details>
<details href="#x1F3FB" class="content-item card">
  <summary>&#x1F3FB; &amp;#x1F3FB;</summary>
  <p class="text">🏻</p>
  <div class="name hyphenate"><p>Emoji Modifier Fitzpatrick Type-1-2</p></div>
</details>
<details href="#x1F3FC" class="content-item card">
  <summary>&#x1F3FC; &amp;#x1F3FC;</summary>
  <p class="text">🏼</p>
  <div class="name hyphenate"><p>Emoji Modifier Fitzpatrick Type-3</p></div>
</details>
<details href="#x1F3FD" class="content-item card">
  <summary>&#x1F3FD; &amp;#x1F3FD;</summary>
  <p class="text">🏽</p>
  <div class="name hyphenate"><p>Emoji Modifier Fitzpatrick Type-4</p></div>
</details>
<details href="#x1F3FE" class="content-item card">
  <summary>&#x1F3FE; &amp;#x1F3FE;</summary>
  <p class="text">🏾</p>
  <div class="name hyphenate"><p>Emoji Modifier Fitzpatrick Type-5</p></div>
</details>
<details href="#x1F3FF" class="content-item card">
  <summary>&#x1F3FF; &amp;#x1F3FF;</summary>
  <p class="text">🏿</p>
  <div class="name hyphenate"><p>Emoji Modifier Fitzpatrick Type-6</p></div>
</details>
<details href="#x1F400" class="content-item card">
  <summary>&#x1F400; &amp;#x1F400;</summary>
  <p class="text">🐀</p>
  <div class="name hyphenate"><p>Rat</p></div>
</details>
<details href="#x1F401" class="content-item card">
  <summary>&#x1F401; &amp;#x1F401;</summary>
  <p class="text">🐁</p>
  <div class="name hyphenate"><p>Mouse</p></div>
</details>
<details href="#x1F402" class="content-item card">
  <summary>&#x1F402; &amp;#x1F402;</summary>
  <p class="text">🐂</p>
  <div class="name hyphenate"><p>Ox</p></div>
</details>
<details href="#x1F403" class="content-item card">
  <summary>&#x1F403; &amp;#x1F403;</summary>
  <p class="text">🐃</p>
  <div class="name hyphenate"><p>Water Buffalo</p></div>
</details>
<details href="#x1F404" class="content-item card">
  <summary>&#x1F404; &amp;#x1F404;</summary>
  <p class="text">🐄</p>
  <div class="name hyphenate"><p>Cow</p></div>
</details>
<details href="#x1F405" class="content-item card">
  <summary>&#x1F405; &amp;#x1F405;</summary>
  <p class="text">🐅</p>
  <div class="name hyphenate"><p>Tiger</p></div>
</details>
<details href="#x1F406" class="content-item card">
  <summary>&#x1F406; &amp;#x1F406;</summary>
  <p class="text">🐆</p>
  <div class="name hyphenate"><p>Leopard</p></div>
</details>
<details href="#x1F407" class="content-item card">
  <summary>&#x1F407; &amp;#x1F407;</summary>
  <p class="text">🐇</p>
  <div class="name hyphenate"><p>Rabbit</p></div>
</details>
<details href="#x1F408" class="content-item card">
  <summary>&#x1F408; &amp;#x1F408;</summary>
  <p class="text">🐈</p>
  <div class="name hyphenate"><p>Cat</p></div>
</details>
<details href="#x1F409" class="content-item card">
  <summary>&#x1F409; &amp;#x1F409;</summary>
  <p class="text">🐉</p>
  <div class="name hyphenate"><p>Dragon</p></div>
</details>
<details href="#x1F40A" class="content-item card">
  <summary>&#x1F40A; &amp;#x1F40A;</summary>
  <p class="text">🐊</p>
  <div class="name hyphenate"><p>Crocodile</p></div>
</details>
<details href="#x1F40B" class="content-item card">
  <summary>&#x1F40B; &amp;#x1F40B;</summary>
  <p class="text">🐋</p>
  <div class="name hyphenate"><p>Whale</p></div>
</details>
<details href="#x1F40C" class="content-item card">
  <summary>&#x1F40C; &amp;#x1F40C;</summary>
  <p class="text">🐌</p>
  <div class="name hyphenate"><p>Snail</p></div>
</details>
<details href="#x1F40D" class="content-item card">
  <summary>&#x1F40D; &amp;#x1F40D;</summary>
  <p class="text">🐍</p>
  <div class="name hyphenate"><p>Snake</p></div>
</details>
<details href="#x1F40E" class="content-item card">
  <summary>&#x1F40E; &amp;#x1F40E;</summary>
  <p class="text">🐎</p>
  <div class="name hyphenate"><p>Horse</p></div>
</details>
<details href="#x1F40F" class="content-item card">
  <summary>&#x1F40F; &amp;#x1F40F;</summary>
  <p class="text">🐏</p>
  <div class="name hyphenate"><p>Ram</p></div>
</details>
<details href="#x1F410" class="content-item card">
  <summary>&#x1F410; &amp;#x1F410;</summary>
  <p class="text">🐐</p>
  <div class="name hyphenate"><p>Goat</p></div>
</details>
<details href="#x1F411" class="content-item card">
  <summary>&#x1F411; &amp;#x1F411;</summary>
  <p class="text">🐑</p>
  <div class="name hyphenate"><p>Sheep</p></div>
</details>
<details href="#x1F412" class="content-item card">
  <summary>&#x1F412; &amp;#x1F412;</summary>
  <p class="text">🐒</p>
  <div class="name hyphenate"><p>Monkey</p></div>
</details>
<details href="#x1F413" class="content-item card">
  <summary>&#x1F413; &amp;#x1F413;</summary>
  <p class="text">🐓</p>
  <div class="name hyphenate"><p>Rooster</p></div>
</details>
<details href="#x1F414" class="content-item card">
  <summary>&#x1F414; &amp;#x1F414;</summary>
  <p class="text">🐔</p>
  <div class="name hyphenate"><p>Chicken</p></div>
</details>
<details href="#x1F415" class="content-item card">
  <summary>&#x1F415; &amp;#x1F415;</summary>
  <p class="text">🐕</p>
  <div class="name hyphenate"><p>Dog</p></div>
</details>
<details href="#x1F416" class="content-item card">
  <summary>&#x1F416; &amp;#x1F416;</summary>
  <p class="text">🐖</p>
  <div class="name hyphenate"><p>Pig</p></div>
</details>
<details href="#x1F417" class="content-item card">
  <summary>&#x1F417; &amp;#x1F417;</summary>
  <p class="text">🐗</p>
  <div class="name hyphenate"><p>Boar</p></div>
</details>
<details href="#x1F418" class="content-item card">
  <summary>&#x1F418; &amp;#x1F418;</summary>
  <p class="text">🐘</p>
  <div class="name hyphenate"><p>Elephant</p></div>
</details>
<details href="#x1F419" class="content-item card">
  <summary>&#x1F419; &amp;#x1F419;</summary>
  <p class="text">🐙</p>
  <div class="name hyphenate"><p>Octopus</p></div>
</details>
<details href="#x1F41A" class="content-item card">
  <summary>&#x1F41A; &amp;#x1F41A;</summary>
  <p class="text">🐚</p>
  <div class="name hyphenate"><p>Spiral Shell</p></div>
</details>
<details href="#x1F41B" class="content-item card">
  <summary>&#x1F41B; &amp;#x1F41B;</summary>
  <p class="text">🐛</p>
  <div class="name hyphenate"><p>Bug</p></div>
</details>
<details href="#x1F41C" class="content-item card">
  <summary>&#x1F41C; &amp;#x1F41C;</summary>
  <p class="text">🐜</p>
  <div class="name hyphenate"><p>Ant</p></div>
</details>
<details href="#x1F41D" class="content-item card">
  <summary>&#x1F41D; &amp;#x1F41D;</summary>
  <p class="text">🐝</p>
  <div class="name hyphenate"><p>Honeybee</p></div>
</details>
<details href="#x1F41E" class="content-item card">
  <summary>&#x1F41E; &amp;#x1F41E;</summary>
  <p class="text">🐞</p>
  <div class="name hyphenate"><p>Lady Beetle</p></div>
</details>
<details href="#x1F41F" class="content-item card">
  <summary>&#x1F41F; &amp;#x1F41F;</summary>
  <p class="text">🐟</p>
  <div class="name hyphenate"><p>Fish</p></div>
</details>
<details href="#x1F420" class="content-item card">
  <summary>&#x1F420; &amp;#x1F420;</summary>
  <p class="text">🐠</p>
  <div class="name hyphenate"><p>Tropical Fish</p></div>
</details>
<details href="#x1F421" class="content-item card">
  <summary>&#x1F421; &amp;#x1F421;</summary>
  <p class="text">🐡</p>
  <div class="name hyphenate"><p>Blowfish</p></div>
</details>
<details href="#x1F422" class="content-item card">
  <summary>&#x1F422; &amp;#x1F422;</summary>
  <p class="text">🐢</p>
  <div class="name hyphenate"><p>Turtle</p></div>
</details>
<details href="#x1F423" class="content-item card">
  <summary>&#x1F423; &amp;#x1F423;</summary>
  <p class="text">🐣</p>
  <div class="name hyphenate"><p>Hatching Chick</p></div>
</details>
<details href="#x1F424" class="content-item card">
  <summary>&#x1F424; &amp;#x1F424;</summary>
  <p class="text">🐤</p>
  <div class="name hyphenate"><p>Baby Chick</p></div>
</details>
<details href="#x1F425" class="content-item card">
  <summary>&#x1F425; &amp;#x1F425;</summary>
  <p class="text">🐥</p>
  <div class="name hyphenate"><p>Front-Facing Baby Chick</p></div>
</details>
<details href="#x1F426" class="content-item card">
  <summary>&#x1F426; &amp;#x1F426;</summary>
  <p class="text">🐦</p>
  <div class="name hyphenate"><p>Bird</p></div>
</details>
<details href="#x1F427" class="content-item card">
  <summary>&#x1F427; &amp;#x1F427;</summary>
  <p class="text">🐧</p>
  <div class="name hyphenate"><p>Penguin</p></div>
</details>
<details href="#x1F428" class="content-item card">
  <summary>&#x1F428; &amp;#x1F428;</summary>
  <p class="text">🐨</p>
  <div class="name hyphenate"><p>Koala</p></div>
</details>
<details href="#x1F429" class="content-item card">
  <summary>&#x1F429; &amp;#x1F429;</summary>
  <p class="text">🐩</p>
  <div class="name hyphenate"><p>Poodle</p></div>
</details>
<details href="#x1F42A" class="content-item card">
  <summary>&#x1F42A; &amp;#x1F42A;</summary>
  <p class="text">🐪</p>
  <div class="name hyphenate"><p>Dromedary Camel</p></div>
</details>
<details href="#x1F42B" class="content-item card">
  <summary>&#x1F42B; &amp;#x1F42B;</summary>
  <p class="text">🐫</p>
  <div class="name hyphenate"><p>Bactrian Camel</p></div>
</details>
<details href="#x1F42C" class="content-item card">
  <summary>&#x1F42C; &amp;#x1F42C;</summary>
  <p class="text">🐬</p>
  <div class="name hyphenate"><p>Dolphin</p></div>
</details>
<details href="#x1F42D" class="content-item card">
  <summary>&#x1F42D; &amp;#x1F42D;</summary>
  <p class="text">🐭</p>
  <div class="name hyphenate"><p>Mouse Face</p></div>
</details>
<details href="#x1F42E" class="content-item card">
  <summary>&#x1F42E; &amp;#x1F42E;</summary>
  <p class="text">🐮</p>
  <div class="name hyphenate"><p>Cow Face</p></div>
</details>
<details href="#x1F42F" class="content-item card">
  <summary>&#x1F42F; &amp;#x1F42F;</summary>
  <p class="text">🐯</p>
  <div class="name hyphenate"><p>Tiger Face</p></div>
</details>
<details href="#x1F430" class="content-item card">
  <summary>&#x1F430; &amp;#x1F430;</summary>
  <p class="text">🐰</p>
  <div class="name hyphenate"><p>Rabbit Face</p></div>
</details>
<details href="#x1F431" class="content-item card">
  <summary>&#x1F431; &amp;#x1F431;</summary>
  <p class="text">🐱</p>
  <div class="name hyphenate"><p>Cat Face</p></div>
</details>
<details href="#x1F432" class="content-item card">
  <summary>&#x1F432; &amp;#x1F432;</summary>
  <p class="text">🐲</p>
  <div class="name hyphenate"><p>Dragon Face</p></div>
</details>
<details href="#x1F433" class="content-item card">
  <summary>&#x1F433; &amp;#x1F433;</summary>
  <p class="text">🐳</p>
  <div class="name hyphenate"><p>Spouting Whale</p></div>
</details>
<details href="#x1F434" class="content-item card">
  <summary>&#x1F434; &amp;#x1F434;</summary>
  <p class="text">🐴</p>
  <div class="name hyphenate"><p>Horse Face</p></div>
</details>
<details href="#x1F435" class="content-item card">
  <summary>&#x1F435; &amp;#x1F435;</summary>
  <p class="text">🐵</p>
  <div class="name hyphenate"><p>Monkey Face</p></div>
</details>
<details href="#x1F436" class="content-item card">
  <summary>&#x1F436; &amp;#x1F436;</summary>
  <p class="text">🐶</p>
  <div class="name hyphenate"><p>Dog Face</p></div>
</details>
<details href="#x1F437" class="content-item card">
  <summary>&#x1F437; &amp;#x1F437;</summary>
  <p class="text">🐷</p>
  <div class="name hyphenate"><p>Pig Face</p></div>
</details>
<details href="#x1F438" class="content-item card">
  <summary>&#x1F438; &amp;#x1F438;</summary>
  <p class="text">🐸</p>
  <div class="name hyphenate"><p>Frog Face</p></div>
</details>
<details href="#x1F439" class="content-item card">
  <summary>&#x1F439; &amp;#x1F439;</summary>
  <p class="text">🐹</p>
  <div class="name hyphenate"><p>Hamster Face</p></div>
</details>
<details href="#x1F43A" class="content-item card">
  <summary>&#x1F43A; &amp;#x1F43A;</summary>
  <p class="text">🐺</p>
  <div class="name hyphenate"><p>Wolf Face</p></div>
</details>
<details href="#x1F43B" class="content-item card">
  <summary>&#x1F43B; &amp;#x1F43B;</summary>
  <p class="text">🐻</p>
  <div class="name hyphenate"><p>Bear Face</p></div>
</details>
<details href="#x1F43C" class="content-item card">
  <summary>&#x1F43C; &amp;#x1F43C;</summary>
  <p class="text">🐼</p>
  <div class="name hyphenate"><p>Panda Face</p></div>
</details>
<details href="#x1F43D" class="content-item card">
  <summary>&#x1F43D; &amp;#x1F43D;</summary>
  <p class="text">🐽</p>
  <div class="name hyphenate"><p>Pig Nose</p></div>
</details>
<details href="#x1F43E" class="content-item card">
  <summary>&#x1F43E; &amp;#x1F43E;</summary>
  <p class="text">🐾</p>
  <div class="name hyphenate"><p>Paw Prints</p></div>
</details>
<details href="#x1F43F" class="content-item card">
  <summary>&#x1F43F; &amp;#x1F43F;</summary>
  <p class="text">🐿</p>
  <div class="name hyphenate"><p>Chipmunk</p></div>
</details>
<details href="#x1F440" class="content-item card">
  <summary>&#x1F440; &amp;#x1F440;</summary>
  <p class="text">👀</p>
  <div class="name hyphenate"><p>Eyes</p></div>
</details>
<details href="#x1F441" class="content-item card">
  <summary>&#x1F441; &amp;#x1F441;</summary>
  <p class="text">👁</p>
  <div class="name hyphenate"><p>Eye</p></div>
</details>
<details href="#x1F442" class="content-item card">
  <summary>&#x1F442; &amp;#x1F442;</summary>
  <p class="text">👂</p>
  <div class="name hyphenate"><p>Ear</p></div>
</details>
<details href="#x1F443" class="content-item card">
  <summary>&#x1F443; &amp;#x1F443;</summary>
  <p class="text">👃</p>
  <div class="name hyphenate"><p>Nose</p></div>
</details>
<details href="#x1F444" class="content-item card">
  <summary>&#x1F444; &amp;#x1F444;</summary>
  <p class="text">👄</p>
  <div class="name hyphenate"><p>Mouth</p></div>
</details>
<details href="#x1F445" class="content-item card">
  <summary>&#x1F445; &amp;#x1F445;</summary>
  <p class="text">👅</p>
  <div class="name hyphenate"><p>Tongue</p></div>
</details>
<details href="#x1F446" class="content-item card">
  <summary>&#x1F446; &amp;#x1F446;</summary>
  <p class="text">👆</p>
  <div class="name hyphenate"><p>White Up Pointing Backhand Index</p></div>
</details>
<details href="#x1F447" class="content-item card">
  <summary>&#x1F447; &amp;#x1F447;</summary>
  <p class="text">👇</p>
  <div class="name hyphenate"><p>White Down Pointing Backhand Index</p></div>
</details>
<details href="#x1F448" class="content-item card">
  <summary>&#x1F448; &amp;#x1F448;</summary>
  <p class="text">👈</p>
  <div class="name hyphenate"><p>White Left Pointing Backhand Index</p></div>
</details>
<details href="#x1F449" class="content-item card">
  <summary>&#x1F449; &amp;#x1F449;</summary>
  <p class="text">👉</p>
  <div class="name hyphenate"><p>White Right Pointing Backhand Index</p></div>
</details>
<details href="#x1F44A" class="content-item card">
  <summary>&#x1F44A; &amp;#x1F44A;</summary>
  <p class="text">👊</p>
  <div class="name hyphenate"><p>Fisted Hand Sign</p></div>
</details>
<details href="#x1F44B" class="content-item card">
  <summary>&#x1F44B; &amp;#x1F44B;</summary>
  <p class="text">👋</p>
  <div class="name hyphenate"><p>Waving Hand Sign</p></div>
</details>
<details href="#x1F44C" class="content-item card">
  <summary>&#x1F44C; &amp;#x1F44C;</summary>
  <p class="text">👌</p>
  <div class="name hyphenate"><p>Ok Hand Sign</p></div>
</details>
<details href="#x1F44D" class="content-item card">
  <summary>&#x1F44D; &amp;#x1F44D;</summary>
  <p class="text">👍</p>
  <div class="name hyphenate"><p>Thumbs Up Sign</p></div>
</details>
<details href="#x1F44E" class="content-item card">
  <summary>&#x1F44E; &amp;#x1F44E;</summary>
  <p class="text">👎</p>
  <div class="name hyphenate"><p>Thumbs Down Sign</p></div>
</details>
<details href="#x1F44F" class="content-item card">
  <summary>&#x1F44F; &amp;#x1F44F;</summary>
  <p class="text">👏</p>
  <div class="name hyphenate"><p>Clapping Hands Sign</p></div>
</details>
<details href="#x1F450" class="content-item card">
  <summary>&#x1F450; &amp;#x1F450;</summary>
  <p class="text">👐</p>
  <div class="name hyphenate"><p>Open Hands Sign</p></div>
</details>
<details href="#x1F451" class="content-item card">
  <summary>&#x1F451; &amp;#x1F451;</summary>
  <p class="text">👑</p>
  <div class="name hyphenate"><p>Crown</p></div>
</details>
<details href="#x1F452" class="content-item card">
  <summary>&#x1F452; &amp;#x1F452;</summary>
  <p class="text">👒</p>
  <div class="name hyphenate"><p>Womans Hat</p></div>
</details>
<details href="#x1F453" class="content-item card">
  <summary>&#x1F453; &amp;#x1F453;</summary>
  <p class="text">👓</p>
  <div class="name hyphenate"><p>Eyeglasses</p></div>
</details>
<details href="#x1F454" class="content-item card">
  <summary>&#x1F454; &amp;#x1F454;</summary>
  <p class="text">👔</p>
  <div class="name hyphenate"><p>Necktie</p></div>
</details>
<details href="#x1F455" class="content-item card">
  <summary>&#x1F455; &amp;#x1F455;</summary>
  <p class="text">👕</p>
  <div class="name hyphenate"><p>T-Shirt</p></div>
</details>
<details href="#x1F456" class="content-item card">
  <summary>&#x1F456; &amp;#x1F456;</summary>
  <p class="text">👖</p>
  <div class="name hyphenate"><p>Jeans</p></div>
</details>
<details href="#x1F457" class="content-item card">
  <summary>&#x1F457; &amp;#x1F457;</summary>
  <p class="text">👗</p>
  <div class="name hyphenate"><p>Dress</p></div>
</details>
<details href="#x1F458" class="content-item card">
  <summary>&#x1F458; &amp;#x1F458;</summary>
  <p class="text">👘</p>
  <div class="name hyphenate"><p>Kimono</p></div>
</details>
<details href="#x1F459" class="content-item card">
  <summary>&#x1F459; &amp;#x1F459;</summary>
  <p class="text">👙</p>
  <div class="name hyphenate"><p>Bikini</p></div>
</details>
<details href="#x1F45A" class="content-item card">
  <summary>&#x1F45A; &amp;#x1F45A;</summary>
  <p class="text">👚</p>
  <div class="name hyphenate"><p>Womans Clothes</p></div>
</details>
<details href="#x1F45B" class="content-item card">
  <summary>&#x1F45B; &amp;#x1F45B;</summary>
  <p class="text">👛</p>
  <div class="name hyphenate"><p>Purse</p></div>
</details>
<details href="#x1F45C" class="content-item card">
  <summary>&#x1F45C; &amp;#x1F45C;</summary>
  <p class="text">👜</p>
  <div class="name hyphenate"><p>Handbag</p></div>
</details>
<details href="#x1F45D" class="content-item card">
  <summary>&#x1F45D; &amp;#x1F45D;</summary>
  <p class="text">👝</p>
  <div class="name hyphenate"><p>Pouch</p></div>
</details>
<details href="#x1F45E" class="content-item card">
  <summary>&#x1F45E; &amp;#x1F45E;</summary>
  <p class="text">👞</p>
  <div class="name hyphenate"><p>Mans Shoe</p></div>
</details>
<details href="#x1F45F" class="content-item card">
  <summary>&#x1F45F; &amp;#x1F45F;</summary>
  <p class="text">👟</p>
  <div class="name hyphenate"><p>Athletic Shoe</p></div>
</details>
<details href="#x1F460" class="content-item card">
  <summary>&#x1F460; &amp;#x1F460;</summary>
  <p class="text">👠</p>
  <div class="name hyphenate"><p>High-Heeled Shoe</p></div>
</details>
<details href="#x1F461" class="content-item card">
  <summary>&#x1F461; &amp;#x1F461;</summary>
  <p class="text">👡</p>
  <div class="name hyphenate"><p>Womans Sandal</p></div>
</details>
<details href="#x1F462" class="content-item card">
  <summary>&#x1F462; &amp;#x1F462;</summary>
  <p class="text">👢</p>
  <div class="name hyphenate"><p>Womans Boots</p></div>
</details>
<details href="#x1F463" class="content-item card">
  <summary>&#x1F463; &amp;#x1F463;</summary>
  <p class="text">👣</p>
  <div class="name hyphenate"><p>Footprints</p></div>
</details>
<details href="#x1F464" class="content-item card">
  <summary>&#x1F464; &amp;#x1F464;</summary>
  <p class="text">👤</p>
  <div class="name hyphenate"><p>Bust In Silhouette</p></div>
</details>
<details href="#x1F465" class="content-item card">
  <summary>&#x1F465; &amp;#x1F465;</summary>
  <p class="text">👥</p>
  <div class="name hyphenate"><p>Busts In Silhouette</p></div>
</details>
<details href="#x1F466" class="content-item card">
  <summary>&#x1F466; &amp;#x1F466;</summary>
  <p class="text">👦</p>
  <div class="name hyphenate"><p>Boy</p></div>
</details>
<details href="#x1F467" class="content-item card">
  <summary>&#x1F467; &amp;#x1F467;</summary>
  <p class="text">👧</p>
  <div class="name hyphenate"><p>Girl</p></div>
</details>
<details href="#x1F468" class="content-item card">
  <summary>&#x1F468; &amp;#x1F468;</summary>
  <p class="text">👨</p>
  <div class="name hyphenate"><p>Man</p></div>
</details>
<details href="#x1F469" class="content-item card">
  <summary>&#x1F469; &amp;#x1F469;</summary>
  <p class="text">👩</p>
  <div class="name hyphenate"><p>Woman</p></div>
</details>
<details href="#x1F46A" class="content-item card">
  <summary>&#x1F46A; &amp;#x1F46A;</summary>
  <p class="text">👪</p>
  <div class="name hyphenate"><p>Family</p></div>
</details>
<details href="#x1F46B" class="content-item card">
  <summary>&#x1F46B; &amp;#x1F46B;</summary>
  <p class="text">👫</p>
  <div class="name hyphenate"><p>Man and Woman Holding Hands</p></div>
</details>
<details href="#x1F46C" class="content-item card">
  <summary>&#x1F46C; &amp;#x1F46C;</summary>
  <p class="text">👬</p>
  <div class="name hyphenate"><p>Two Men Holding Hands</p></div>
</details>
<details href="#x1F46D" class="content-item card">
  <summary>&#x1F46D; &amp;#x1F46D;</summary>
  <p class="text">👭</p>
  <div class="name hyphenate"><p>Two Women Holding Hands</p></div>
</details>
<details href="#x1F46E" class="content-item card">
  <summary>&#x1F46E; &amp;#x1F46E;</summary>
  <p class="text">👮</p>
  <div class="name hyphenate"><p>Police Officer</p></div>
</details>
<details href="#x1F46F" class="content-item card">
  <summary>&#x1F46F; &amp;#x1F46F;</summary>
  <p class="text">👯</p>
  <div class="name hyphenate"><p>Woman with Bunny Ears</p></div>
</details>
<details href="#x1F470" class="content-item card">
  <summary>&#x1F470; &amp;#x1F470;</summary>
  <p class="text">👰</p>
  <div class="name hyphenate"><p>Bride with Veil</p></div>
</details>
<details href="#x1F471" class="content-item card">
  <summary>&#x1F471; &amp;#x1F471;</summary>
  <p class="text">👱</p>
  <div class="name hyphenate"><p>Person with Blond Hair</p></div>
</details>
<details href="#x1F472" class="content-item card">
  <summary>&#x1F472; &amp;#x1F472;</summary>
  <p class="text">👲</p>
  <div class="name hyphenate"><p>Man with Gua Pi Mao</p></div>
</details>
<details href="#x1F473" class="content-item card">
  <summary>&#x1F473; &amp;#x1F473;</summary>
  <p class="text">👳</p>
  <div class="name hyphenate"><p>Man with Turban</p></div>
</details>
<details href="#x1F474" class="content-item card">
  <summary>&#x1F474; &amp;#x1F474;</summary>
  <p class="text">👴</p>
  <div class="name hyphenate"><p>Older Man</p></div>
</details>
<details href="#x1F475" class="content-item card">
  <summary>&#x1F475; &amp;#x1F475;</summary>
  <p class="text">👵</p>
  <div class="name hyphenate"><p>Older Woman</p></div>
</details>
<details href="#x1F476" class="content-item card">
  <summary>&#x1F476; &amp;#x1F476;</summary>
  <p class="text">👶</p>
  <div class="name hyphenate"><p>Baby</p></div>
</details>
<details href="#x1F477" class="content-item card">
  <summary>&#x1F477; &amp;#x1F477;</summary>
  <p class="text">👷</p>
  <div class="name hyphenate"><p>Construction Worker</p></div>
</details>
<details href="#x1F478" class="content-item card">
  <summary>&#x1F478; &amp;#x1F478;</summary>
  <p class="text">👸</p>
  <div class="name hyphenate"><p>Princess</p></div>
</details>
<details href="#x1F479" class="content-item card">
  <summary>&#x1F479; &amp;#x1F479;</summary>
  <p class="text">👹</p>
  <div class="name hyphenate"><p>Japanese Ogre</p></div>
</details>
<details href="#x1F47A" class="content-item card">
  <summary>&#x1F47A; &amp;#x1F47A;</summary>
  <p class="text">👺</p>
  <div class="name hyphenate"><p>Japanese Goblin</p></div>
</details>
<details href="#x1F47B" class="content-item card">
  <summary>&#x1F47B; &amp;#x1F47B;</summary>
  <p class="text">👻</p>
  <div class="name hyphenate"><p>Ghost</p></div>
</details>
<details href="#x1F47C" class="content-item card">
  <summary>&#x1F47C; &amp;#x1F47C;</summary>
  <p class="text">👼</p>
  <div class="name hyphenate"><p>Baby Angel</p></div>
</details>
<details href="#x1F47D" class="content-item card">
  <summary>&#x1F47D; &amp;#x1F47D;</summary>
  <p class="text">👽</p>
  <div class="name hyphenate"><p>Extraterrestrial Alien</p></div>
</details>
<details href="#x1F47E" class="content-item card">
  <summary>&#x1F47E; &amp;#x1F47E;</summary>
  <p class="text">👾</p>
  <div class="name hyphenate"><p>Alien Monster</p></div>
</details>
<details href="#x1F47F" class="content-item card">
  <summary>&#x1F47F; &amp;#x1F47F;</summary>
  <p class="text">👿</p>
  <div class="name hyphenate"><p>Imp</p></div>
</details>
<details href="#x1F480" class="content-item card">
  <summary>&#x1F480; &amp;#x1F480;</summary>
  <p class="text">💀</p>
  <div class="name hyphenate"><p>Skull</p></div>
</details>
<details href="#x1F481" class="content-item card">
  <summary>&#x1F481; &amp;#x1F481;</summary>
  <p class="text">💁</p>
  <div class="name hyphenate"><p>Information Desk Person</p></div>
</details>
<details href="#x1F482" class="content-item card">
  <summary>&#x1F482; &amp;#x1F482;</summary>
  <p class="text">💂</p>
  <div class="name hyphenate"><p>Guardsman</p></div>
</details>
<details href="#x1F483" class="content-item card">
  <summary>&#x1F483; &amp;#x1F483;</summary>
  <p class="text">💃</p>
  <div class="name hyphenate"><p>Dancer</p></div>
</details>
<details href="#x1F484" class="content-item card">
  <summary>&#x1F484; &amp;#x1F484;</summary>
  <p class="text">💄</p>
  <div class="name hyphenate"><p>Lipstick</p></div>
</details>
<details href="#x1F485" class="content-item card">
  <summary>&#x1F485; &amp;#x1F485;</summary>
  <p class="text">💅</p>
  <div class="name hyphenate"><p>Nail Polish</p></div>
</details>
<details href="#x1F486" class="content-item card">
  <summary>&#x1F486; &amp;#x1F486;</summary>
  <p class="text">💆</p>
  <div class="name hyphenate"><p>Face Massage</p></div>
</details>
<details href="#x1F487" class="content-item card">
  <summary>&#x1F487; &amp;#x1F487;</summary>
  <p class="text">💇</p>
  <div class="name hyphenate"><p>Haircut</p></div>
</details>
<details href="#x1F488" class="content-item card">
  <summary>&#x1F488; &amp;#x1F488;</summary>
  <p class="text">💈</p>
  <div class="name hyphenate"><p>Barber Pole</p></div>
</details>
<details href="#x1F489" class="content-item card">
  <summary>&#x1F489; &amp;#x1F489;</summary>
  <p class="text">💉</p>
  <div class="name hyphenate"><p>Syringe</p></div>
</details>
<details href="#x1F48A" class="content-item card">
  <summary>&#x1F48A; &amp;#x1F48A;</summary>
  <p class="text">💊</p>
  <div class="name hyphenate"><p>Pill</p></div>
</details>
<details href="#x1F48B" class="content-item card">
  <summary>&#x1F48B; &amp;#x1F48B;</summary>
  <p class="text">💋</p>
  <div class="name hyphenate"><p>Kiss Mark</p></div>
</details>
<details href="#x1F48C" class="content-item card">
  <summary>&#x1F48C; &amp;#x1F48C;</summary>
  <p class="text">💌</p>
  <div class="name hyphenate"><p>Love Letter</p></div>
</details>
<details href="#x1F48D" class="content-item card">
  <summary>&#x1F48D; &amp;#x1F48D;</summary>
  <p class="text">💍</p>
  <div class="name hyphenate"><p>Ring</p></div>
</details>
<details href="#x1F48E" class="content-item card">
  <summary>&#x1F48E; &amp;#x1F48E;</summary>
  <p class="text">💎</p>
  <div class="name hyphenate"><p>Gem Stone</p></div>
</details>
<details href="#x1F48F" class="content-item card">
  <summary>&#x1F48F; &amp;#x1F48F;</summary>
  <p class="text">💏</p>
  <div class="name hyphenate"><p>Kiss</p></div>
</details>
<details href="#x1F490" class="content-item card">
  <summary>&#x1F490; &amp;#x1F490;</summary>
  <p class="text">💐</p>
  <div class="name hyphenate"><p>Bouquet</p></div>
</details>
<details href="#x1F491" class="content-item card">
  <summary>&#x1F491; &amp;#x1F491;</summary>
  <p class="text">💑</p>
  <div class="name hyphenate"><p>Couple with Heart</p></div>
</details>
<details href="#x1F492" class="content-item card">
  <summary>&#x1F492; &amp;#x1F492;</summary>
  <p class="text">💒</p>
  <div class="name hyphenate"><p>Wedding</p></div>
</details>
<details href="#x1F493" class="content-item card">
  <summary>&#x1F493; &amp;#x1F493;</summary>
  <p class="text">💓</p>
  <div class="name hyphenate"><p>Beating Heart</p></div>
</details>
<details href="#x1F494" class="content-item card">
  <summary>&#x1F494; &amp;#x1F494;</summary>
  <p class="text">💔</p>
  <div class="name hyphenate"><p>Broken Heart</p></div>
</details>
<details href="#x1F495" class="content-item card">
  <summary>&#x1F495; &amp;#x1F495;</summary>
  <p class="text">💕</p>
  <div class="name hyphenate"><p>Two Hearts</p></div>
</details>
<details href="#x1F496" class="content-item card">
  <summary>&#x1F496; &amp;#x1F496;</summary>
  <p class="text">💖</p>
  <div class="name hyphenate"><p>Sparkling Heart</p></div>
</details>
<details href="#x1F497" class="content-item card">
  <summary>&#x1F497; &amp;#x1F497;</summary>
  <p class="text">💗</p>
  <div class="name hyphenate"><p>Growing Heart</p></div>
</details>
<details href="#x1F498" class="content-item card">
  <summary>&#x1F498; &amp;#x1F498;</summary>
  <p class="text">💘</p>
  <div class="name hyphenate"><p>Heart with Arrow</p></div>
</details>
<details href="#x1F499" class="content-item card">
  <summary>&#x1F499; &amp;#x1F499;</summary>
  <p class="text">💙</p>
  <div class="name hyphenate"><p>Blue Heart</p></div>
</details>
<details href="#x1F49A" class="content-item card">
  <summary>&#x1F49A; &amp;#x1F49A;</summary>
  <p class="text">💚</p>
  <div class="name hyphenate"><p>Green Heart</p></div>
</details>
<details href="#x1F49B" class="content-item card">
  <summary>&#x1F49B; &amp;#x1F49B;</summary>
  <p class="text">💛</p>
  <div class="name hyphenate"><p>Yellow Heart</p></div>
</details>
<details href="#x1F49C" class="content-item card">
  <summary>&#x1F49C; &amp;#x1F49C;</summary>
  <p class="text">💜</p>
  <div class="name hyphenate"><p>Purple Heart</p></div>
</details>
<details href="#x1F49D" class="content-item card">
  <summary>&#x1F49D; &amp;#x1F49D;</summary>
  <p class="text">💝</p>
  <div class="name hyphenate"><p>Heart with Ribbon</p></div>
</details>
<details href="#x1F49E" class="content-item card">
  <summary>&#x1F49E; &amp;#x1F49E;</summary>
  <p class="text">💞</p>
  <div class="name hyphenate"><p>Revolving Hearts</p></div>
</details>
<details href="#x1F49F" class="content-item card">
  <summary>&#x1F49F; &amp;#x1F49F;</summary>
  <p class="text">💟</p>
  <div class="name hyphenate"><p>Heart Decoration</p></div>
</details>
<details href="#x1F4A0" class="content-item card">
  <summary>&#x1F4A0; &amp;#x1F4A0;</summary>
  <p class="text">💠</p>
  <div class="name hyphenate"><p>Diamond Shape with A Dot Inside</p></div>
</details>
<details href="#x1F4A1" class="content-item card">
  <summary>&#x1F4A1; &amp;#x1F4A1;</summary>
  <p class="text">💡</p>
  <div class="name hyphenate"><p>Electric Light Bulb</p></div>
</details>
<details href="#x1F4A2" class="content-item card">
  <summary>&#x1F4A2; &amp;#x1F4A2;</summary>
  <p class="text">💢</p>
  <div class="name hyphenate"><p>Anger Symbol</p></div>
</details>
<details href="#x1F4A3" class="content-item card">
  <summary>&#x1F4A3; &amp;#x1F4A3;</summary>
  <p class="text">💣</p>
  <div class="name hyphenate"><p>Bomb</p></div>
</details>
<details href="#x1F4A4" class="content-item card">
  <summary>&#x1F4A4; &amp;#x1F4A4;</summary>
  <p class="text">💤</p>
  <div class="name hyphenate"><p>Sleeping Symbol</p></div>
</details>
<details href="#x1F4A5" class="content-item card">
  <summary>&#x1F4A5; &amp;#x1F4A5;</summary>
  <p class="text">💥</p>
  <div class="name hyphenate"><p>Collision Symbol</p></div>
</details>
<details href="#x1F4A6" class="content-item card">
  <summary>&#x1F4A6; &amp;#x1F4A6;</summary>
  <p class="text">💦</p>
  <div class="name hyphenate"><p>Splashing Sweat Symbol</p></div>
</details>
<details href="#x1F4A7" class="content-item card">
  <summary>&#x1F4A7; &amp;#x1F4A7;</summary>
  <p class="text">💧</p>
  <div class="name hyphenate"><p>Droplet</p></div>
</details>
<details href="#x1F4A8" class="content-item card">
  <summary>&#x1F4A8; &amp;#x1F4A8;</summary>
  <p class="text">💨</p>
  <div class="name hyphenate"><p>Dash Symbol</p></div>
</details>
<details href="#x1F4A9" class="content-item card">
  <summary>&#x1F4A9; &amp;#x1F4A9;</summary>
  <p class="text">💩</p>
  <div class="name hyphenate"><p>Pile of Poo</p></div>
</details>
<details href="#x1F4AA" class="content-item card">
  <summary>&#x1F4AA; &amp;#x1F4AA;</summary>
  <p class="text">💪</p>
  <div class="name hyphenate"><p>Flexed Biceps</p></div>
</details>
<details href="#x1F4AB" class="content-item card">
  <summary>&#x1F4AB; &amp;#x1F4AB;</summary>
  <p class="text">💫</p>
  <div class="name hyphenate"><p>Dizzy Symbol</p></div>
</details>
<details href="#x1F4AC" class="content-item card">
  <summary>&#x1F4AC; &amp;#x1F4AC;</summary>
  <p class="text">💬</p>
  <div class="name hyphenate"><p>Speech Balloon</p></div>
</details>
<details href="#x1F4AD" class="content-item card">
  <summary>&#x1F4AD; &amp;#x1F4AD;</summary>
  <p class="text">💭</p>
  <div class="name hyphenate"><p>Thought Balloon</p></div>
</details>
<details href="#x1F4AE" class="content-item card">
  <summary>&#x1F4AE; &amp;#x1F4AE;</summary>
  <p class="text">💮</p>
  <div class="name hyphenate"><p>White Flower</p></div>
</details>
<details href="#x1F4AF" class="content-item card">
  <summary>&#x1F4AF; &amp;#x1F4AF;</summary>
  <p class="text">💯</p>
  <div class="name hyphenate"><p>Hundred Points Symbol</p></div>
</details>
<details href="#x1F4B0" class="content-item card">
  <summary>&#x1F4B0; &amp;#x1F4B0;</summary>
  <p class="text">💰</p>
  <div class="name hyphenate"><p>Money Bag</p></div>
</details>
<details href="#x1F4B1" class="content-item card">
  <summary>&#x1F4B1; &amp;#x1F4B1;</summary>
  <p class="text">💱</p>
  <div class="name hyphenate"><p>Currency Exchange</p></div>
</details>
<details href="#x1F4B2" class="content-item card">
  <summary>&#x1F4B2; &amp;#x1F4B2;</summary>
  <p class="text">💲</p>
  <div class="name hyphenate"><p>Heavy Dollar Sign</p></div>
</details>
<details href="#x1F4B3" class="content-item card">
  <summary>&#x1F4B3; &amp;#x1F4B3;</summary>
  <p class="text">💳</p>
  <div class="name hyphenate"><p>Credit Card</p></div>
</details>
<details href="#x1F4B4" class="content-item card">
  <summary>&#x1F4B4; &amp;#x1F4B4;</summary>
  <p class="text">💴</p>
  <div class="name hyphenate"><p>Banknote with Yen Sign</p></div>
</details>
<details href="#x1F4B5" class="content-item card">
  <summary>&#x1F4B5; &amp;#x1F4B5;</summary>
  <p class="text">💵</p>
  <div class="name hyphenate"><p>Banknote with Dollar Sign</p></div>
</details>
<details href="#x1F4B6" class="content-item card">
  <summary>&#x1F4B6; &amp;#x1F4B6;</summary>
  <p class="text">💶</p>
  <div class="name hyphenate"><p>Banknote with Euro Sign</p></div>
</details>
<details href="#x1F4B7" class="content-item card">
  <summary>&#x1F4B7; &amp;#x1F4B7;</summary>
  <p class="text">💷</p>
  <div class="name hyphenate"><p>Banknote with Pound Sign</p></div>
</details>
<details href="#x1F4B8" class="content-item card">
  <summary>&#x1F4B8; &amp;#x1F4B8;</summary>
  <p class="text">💸</p>
  <div class="name hyphenate"><p>Money with Wings</p></div>
</details>
<details href="#x1F4B9" class="content-item card">
  <summary>&#x1F4B9; &amp;#x1F4B9;</summary>
  <p class="text">💹</p>
  <div class="name hyphenate"><p>Chart with Upwards Trend and Yen Sign</p></div>
</details>
<details href="#x1F4BA" class="content-item card">
  <summary>&#x1F4BA; &amp;#x1F4BA;</summary>
  <p class="text">💺</p>
  <div class="name hyphenate"><p>Seat</p></div>
</details>
<details href="#x1F4BB" class="content-item card">
  <summary>&#x1F4BB; &amp;#x1F4BB;</summary>
  <p class="text">💻</p>
  <div class="name hyphenate"><p>Personal Computer</p></div>
</details>
<details href="#x1F4BC" class="content-item card">
  <summary>&#x1F4BC; &amp;#x1F4BC;</summary>
  <p class="text">💼</p>
  <div class="name hyphenate"><p>Briefcase</p></div>
</details>
<details href="#x1F4BD" class="content-item card">
  <summary>&#x1F4BD; &amp;#x1F4BD;</summary>
  <p class="text">💽</p>
  <div class="name hyphenate"><p>Minidisc</p></div>
</details>
<details href="#x1F4BE" class="content-item card">
  <summary>&#x1F4BE; &amp;#x1F4BE;</summary>
  <p class="text">💾</p>
  <div class="name hyphenate"><p>Floppy Disk</p></div>
</details>
<details href="#x1F4BF" class="content-item card">
  <summary>&#x1F4BF; &amp;#x1F4BF;</summary>
  <p class="text">💿</p>
  <div class="name hyphenate"><p>Optical Disc</p></div>
</details>
<details href="#x1F4C0" class="content-item card">
  <summary>&#x1F4C0; &amp;#x1F4C0;</summary>
  <p class="text">📀</p>
  <div class="name hyphenate"><p>Dvd</p></div>
</details>
<details href="#x1F4C1" class="content-item card">
  <summary>&#x1F4C1; &amp;#x1F4C1;</summary>
  <p class="text">📁</p>
  <div class="name hyphenate"><p>File Folder</p></div>
</details>
<details href="#x1F4C2" class="content-item card">
  <summary>&#x1F4C2; &amp;#x1F4C2;</summary>
  <p class="text">📂</p>
  <div class="name hyphenate"><p>Open File Folder</p></div>
</details>
<details href="#x1F4C3" class="content-item card">
  <summary>&#x1F4C3; &amp;#x1F4C3;</summary>
  <p class="text">📃</p>
  <div class="name hyphenate"><p>Page with Curl</p></div>
</details>
<details href="#x1F4C4" class="content-item card">
  <summary>&#x1F4C4; &amp;#x1F4C4;</summary>
  <p class="text">📄</p>
  <div class="name hyphenate"><p>Page Facing Up</p></div>
</details>
<details href="#x1F4C5" class="content-item card">
  <summary>&#x1F4C5; &amp;#x1F4C5;</summary>
  <p class="text">📅</p>
  <div class="name hyphenate"><p>Calendar</p></div>
</details>
<details href="#x1F4C6" class="content-item card">
  <summary>&#x1F4C6; &amp;#x1F4C6;</summary>
  <p class="text">📆</p>
  <div class="name hyphenate"><p>Tear-Off Calendar</p></div>
</details>
<details href="#x1F4C7" class="content-item card">
  <summary>&#x1F4C7; &amp;#x1F4C7;</summary>
  <p class="text">📇</p>
  <div class="name hyphenate"><p>Card Index</p></div>
</details>
<details href="#x1F4C8" class="content-item card">
  <summary>&#x1F4C8; &amp;#x1F4C8;</summary>
  <p class="text">📈</p>
  <div class="name hyphenate"><p>Chart with Upwards Trend</p></div>
</details>
<details href="#x1F4C9" class="content-item card">
  <summary>&#x1F4C9; &amp;#x1F4C9;</summary>
  <p class="text">📉</p>
  <div class="name hyphenate"><p>Chart with Downwards Trend</p></div>
</details>
<details href="#x1F4CA" class="content-item card">
  <summary>&#x1F4CA; &amp;#x1F4CA;</summary>
  <p class="text">📊</p>
  <div class="name hyphenate"><p>Bar Chart</p></div>
</details>
<details href="#x1F4CB" class="content-item card">
  <summary>&#x1F4CB; &amp;#x1F4CB;</summary>
  <p class="text">📋</p>
  <div class="name hyphenate"><p>Clipboard</p></div>
</details>
<details href="#x1F4CC" class="content-item card">
  <summary>&#x1F4CC; &amp;#x1F4CC;</summary>
  <p class="text">📌</p>
  <div class="name hyphenate"><p>Pushpin</p></div>
</details>
<details href="#x1F4CD" class="content-item card">
  <summary>&#x1F4CD; &amp;#x1F4CD;</summary>
  <p class="text">📍</p>
  <div class="name hyphenate"><p>Round Pushpin</p></div>
</details>
<details href="#x1F4CE" class="content-item card">
  <summary>&#x1F4CE; &amp;#x1F4CE;</summary>
  <p class="text">📎</p>
  <div class="name hyphenate"><p>Paperclip</p></div>
</details>
<details href="#x1F4CF" class="content-item card">
  <summary>&#x1F4CF; &amp;#x1F4CF;</summary>
  <p class="text">📏</p>
  <div class="name hyphenate"><p>Straight Ruler</p></div>
</details>
<details href="#x1F4D0" class="content-item card">
  <summary>&#x1F4D0; &amp;#x1F4D0;</summary>
  <p class="text">📐</p>
  <div class="name hyphenate"><p>Triangular Ruler</p></div>
</details>
<details href="#x1F4D1" class="content-item card">
  <summary>&#x1F4D1; &amp;#x1F4D1;</summary>
  <p class="text">📑</p>
  <div class="name hyphenate"><p>Bookmark Tabs</p></div>
</details>
<details href="#x1F4D2" class="content-item card">
  <summary>&#x1F4D2; &amp;#x1F4D2;</summary>
  <p class="text">📒</p>
  <div class="name hyphenate"><p>Ledger</p></div>
</details>
<details href="#x1F4D3" class="content-item card">
  <summary>&#x1F4D3; &amp;#x1F4D3;</summary>
  <p class="text">📓</p>
  <div class="name hyphenate"><p>Notebook</p></div>
</details>
<details href="#x1F4D4" class="content-item card">
  <summary>&#x1F4D4; &amp;#x1F4D4;</summary>
  <p class="text">📔</p>
  <div class="name hyphenate"><p>Notebook with Decorative Cover</p></div>
</details>
<details href="#x1F4D5" class="content-item card">
  <summary>&#x1F4D5; &amp;#x1F4D5;</summary>
  <p class="text">📕</p>
  <div class="name hyphenate"><p>Closed Book</p></div>
</details>
<details href="#x1F4D6" class="content-item card">
  <summary>&#x1F4D6; &amp;#x1F4D6;</summary>
  <p class="text">📖</p>
  <div class="name hyphenate"><p>Open Book</p></div>
</details>
<details href="#x1F4D7" class="content-item card">
  <summary>&#x1F4D7; &amp;#x1F4D7;</summary>
  <p class="text">📗</p>
  <div class="name hyphenate"><p>Green Book</p></div>
</details>
<details href="#x1F4D8" class="content-item card">
  <summary>&#x1F4D8; &amp;#x1F4D8;</summary>
  <p class="text">📘</p>
  <div class="name hyphenate"><p>Blue Book</p></div>
</details>
<details href="#x1F4D9" class="content-item card">
  <summary>&#x1F4D9; &amp;#x1F4D9;</summary>
  <p class="text">📙</p>
  <div class="name hyphenate"><p>Orange Book</p></div>
</details>
<details href="#x1F4DA" class="content-item card">
  <summary>&#x1F4DA; &amp;#x1F4DA;</summary>
  <p class="text">📚</p>
  <div class="name hyphenate"><p>Books</p></div>
</details>
<details href="#x1F4DB" class="content-item card">
  <summary>&#x1F4DB; &amp;#x1F4DB;</summary>
  <p class="text">📛</p>
  <div class="name hyphenate"><p>Name Badge</p></div>
</details>
<details href="#x1F4DC" class="content-item card">
  <summary>&#x1F4DC; &amp;#x1F4DC;</summary>
  <p class="text">📜</p>
  <div class="name hyphenate"><p>Scroll</p></div>
</details>
<details href="#x1F4DD" class="content-item card">
  <summary>&#x1F4DD; &amp;#x1F4DD;</summary>
  <p class="text">📝</p>
  <div class="name hyphenate"><p>Memo</p></div>
</details>
<details href="#x1F4DE" class="content-item card">
  <summary>&#x1F4DE; &amp;#x1F4DE;</summary>
  <p class="text">📞</p>
  <div class="name hyphenate"><p>Telephone Receiver</p></div>
</details>
<details href="#x1F4DF" class="content-item card">
  <summary>&#x1F4DF; &amp;#x1F4DF;</summary>
  <p class="text">📟</p>
  <div class="name hyphenate"><p>Pager</p></div>
</details>
<details href="#x1F4E0" class="content-item card">
  <summary>&#x1F4E0; &amp;#x1F4E0;</summary>
  <p class="text">📠</p>
  <div class="name hyphenate"><p>Fax Machine</p></div>
</details>
<details href="#x1F4E1" class="content-item card">
  <summary>&#x1F4E1; &amp;#x1F4E1;</summary>
  <p class="text">📡</p>
  <div class="name hyphenate"><p>Satellite Antenna</p></div>
</details>
<details href="#x1F4E2" class="content-item card">
  <summary>&#x1F4E2; &amp;#x1F4E2;</summary>
  <p class="text">📢</p>
  <div class="name hyphenate"><p>Public Address Loudspeaker</p></div>
</details>
<details href="#x1F4E3" class="content-item card">
  <summary>&#x1F4E3; &amp;#x1F4E3;</summary>
  <p class="text">📣</p>
  <div class="name hyphenate"><p>Cheering Megaphone</p></div>
</details>
<details href="#x1F4E4" class="content-item card">
  <summary>&#x1F4E4; &amp;#x1F4E4;</summary>
  <p class="text">📤</p>
  <div class="name hyphenate"><p>Outbox Tray</p></div>
</details>
<details href="#x1F4E5" class="content-item card">
  <summary>&#x1F4E5; &amp;#x1F4E5;</summary>
  <p class="text">📥</p>
  <div class="name hyphenate"><p>Inbox Tray</p></div>
</details>
<details href="#x1F4E6" class="content-item card">
  <summary>&#x1F4E6; &amp;#x1F4E6;</summary>
  <p class="text">📦</p>
  <div class="name hyphenate"><p>Package</p></div>
</details>
<details href="#x1F4E7" class="content-item card">
  <summary>&#x1F4E7; &amp;#x1F4E7;</summary>
  <p class="text">📧</p>
  <div class="name hyphenate"><p>E-Mail Symbol</p></div>
</details>
<details href="#x1F4E8" class="content-item card">
  <summary>&#x1F4E8; &amp;#x1F4E8;</summary>
  <p class="text">📨</p>
  <div class="name hyphenate"><p>Incoming Envelope</p></div>
</details>
<details href="#x1F4E9" class="content-item card">
  <summary>&#x1F4E9; &amp;#x1F4E9;</summary>
  <p class="text">📩</p>
  <div class="name hyphenate"><p>Envelope with Downwards Arrow Above</p></div>
</details>
<details href="#x1F4EA" class="content-item card">
  <summary>&#x1F4EA; &amp;#x1F4EA;</summary>
  <p class="text">📪</p>
  <div class="name hyphenate"><p>Closed Mailbox with Lowered Flag</p></div>
</details>
<details href="#x1F4EB" class="content-item card">
  <summary>&#x1F4EB; &amp;#x1F4EB;</summary>
  <p class="text">📫</p>
  <div class="name hyphenate"><p>Closed Mailbox with Raised Flag</p></div>
</details>
<details href="#x1F4EC" class="content-item card">
  <summary>&#x1F4EC; &amp;#x1F4EC;</summary>
  <p class="text">📬</p>
  <div class="name hyphenate"><p>Open Mailbox with Raised Flag</p></div>
</details>
<details href="#x1F4ED" class="content-item card">
  <summary>&#x1F4ED; &amp;#x1F4ED;</summary>
  <p class="text">📭</p>
  <div class="name hyphenate"><p>Open Mailbox with Lowered Flag</p></div>
</details>
<details href="#x1F4EE" class="content-item card">
  <summary>&#x1F4EE; &amp;#x1F4EE;</summary>
  <p class="text">📮</p>
  <div class="name hyphenate"><p>Postbox</p></div>
</details>
<details href="#x1F4EF" class="content-item card">
  <summary>&#x1F4EF; &amp;#x1F4EF;</summary>
  <p class="text">📯</p>
  <div class="name hyphenate"><p>Postal Horn</p></div>
</details>
<details href="#x1F4F0" class="content-item card">
  <summary>&#x1F4F0; &amp;#x1F4F0;</summary>
  <p class="text">📰</p>
  <div class="name hyphenate"><p>Newspaper</p></div>
</details>
<details href="#x1F4F1" class="content-item card">
  <summary>&#x1F4F1; &amp;#x1F4F1;</summary>
  <p class="text">📱</p>
  <div class="name hyphenate"><p>Mobile Phone</p></div>
</details>
<details href="#x1F4F2" class="content-item card">
  <summary>&#x1F4F2; &amp;#x1F4F2;</summary>
  <p class="text">📲</p>
  <div class="name hyphenate">
    <p>Mobile Phone with Rightwards Arrow at Left</p>
  </div>
</details>
<details href="#x1F4F3" class="content-item card">
  <summary>&#x1F4F3; &amp;#x1F4F3;</summary>
  <p class="text">📳</p>
  <div class="name hyphenate"><p>Vibration Mode</p></div>
</details>
<details href="#x1F4F4" class="content-item card">
  <summary>&#x1F4F4; &amp;#x1F4F4;</summary>
  <p class="text">📴</p>
  <div class="name hyphenate"><p>Mobile Phone Off</p></div>
</details>
<details href="#x1F4F5" class="content-item card">
  <summary>&#x1F4F5; &amp;#x1F4F5;</summary>
  <p class="text">📵</p>
  <div class="name hyphenate"><p>No Mobile Phones</p></div>
</details>
<details href="#x1F4F6" class="content-item card">
  <summary>&#x1F4F6; &amp;#x1F4F6;</summary>
  <p class="text">📶</p>
  <div class="name hyphenate"><p>Antenna with Bars</p></div>
</details>
<details href="#x1F4F7" class="content-item card">
  <summary>&#x1F4F7; &amp;#x1F4F7;</summary>
  <p class="text">📷</p>
  <div class="name hyphenate"><p>Camera</p></div>
</details>
<details href="#x1F4F8" class="content-item card">
  <summary>&#x1F4F8; &amp;#x1F4F8;</summary>
  <p class="text">📸</p>
  <div class="name hyphenate"><p>Camera with Flash</p></div>
</details>
<details href="#x1F4F9" class="content-item card">
  <summary>&#x1F4F9; &amp;#x1F4F9;</summary>
  <p class="text">📹</p>
  <div class="name hyphenate"><p>Video Camera</p></div>
</details>
<details href="#x1F4FA" class="content-item card">
  <summary>&#x1F4FA; &amp;#x1F4FA;</summary>
  <p class="text">📺</p>
  <div class="name hyphenate"><p>Television</p></div>
</details>
<details href="#x1F4FB" class="content-item card">
  <summary>&#x1F4FB; &amp;#x1F4FB;</summary>
  <p class="text">📻</p>
  <div class="name hyphenate"><p>Radio</p></div>
</details>
<details href="#x1F4FC" class="content-item card">
  <summary>&#x1F4FC; &amp;#x1F4FC;</summary>
  <p class="text">📼</p>
  <div class="name hyphenate"><p>Videocassette</p></div>
</details>
<details href="#x1F4FD" class="content-item card">
  <summary>&#x1F4FD; &amp;#x1F4FD;</summary>
  <p class="text">📽</p>
  <div class="name hyphenate"><p>Film Projector</p></div>
</details>
<details href="#x1F4FE" class="content-item card">
  <summary>&#x1F4FE; &amp;#x1F4FE;</summary>
  <p class="text">📾</p>
  <div class="name hyphenate"><p>Portable Stereo</p></div>
</details>
<details href="#x1F4FF" class="content-item card">
  <summary>&#x1F4FF; &amp;#x1F4FF;</summary>
  <p class="text">📿</p>
  <div class="name hyphenate"><p>Prayer Beads</p></div>
</details>
<details href="#x1F500" class="content-item card">
  <summary>&#x1F500; &amp;#x1F500;</summary>
  <p class="text">🔀</p>
  <div class="name hyphenate"><p>Twisted Rightwards Arrows</p></div>
</details>
<details href="#x1F501" class="content-item card">
  <summary>&#x1F501; &amp;#x1F501;</summary>
  <p class="text">🔁</p>
  <div class="name hyphenate">
    <p>Clockwise Rightwards and Leftwards Open Circle Arrows</p>
  </div>
</details>
<details href="#x1F502" class="content-item card">
  <summary>&#x1F502; &amp;#x1F502;</summary>
  <p class="text">🔂</p>
  <div class="name hyphenate">
    <p>
      Clockwise Rightwards and Leftwards Open Circle Arrows with Circled One
      Overlay
    </p>
  </div>
</details>
<details href="#x1F503" class="content-item card">
  <summary>&#x1F503; &amp;#x1F503;</summary>
  <p class="text">🔃</p>
  <div class="name hyphenate">
    <p>Clockwise Downwards and Upwards Open Circle Arrows</p>
  </div>
</details>
<details href="#x1F504" class="content-item card">
  <summary>&#x1F504; &amp;#x1F504;</summary>
  <p class="text">🔄</p>
  <div class="name hyphenate">
    <p>Anticlockwise Downwards and Upwards Open Circle Arrows</p>
  </div>
</details>
<details href="#x1F505" class="content-item card">
  <summary>&#x1F505; &amp;#x1F505;</summary>
  <p class="text">🔅</p>
  <div class="name hyphenate"><p>Low Brightness Symbol</p></div>
</details>
<details href="#x1F506" class="content-item card">
  <summary>&#x1F506; &amp;#x1F506;</summary>
  <p class="text">🔆</p>
  <div class="name hyphenate"><p>High Brightness Symbol</p></div>
</details>
<details href="#x1F507" class="content-item card">
  <summary>&#x1F507; &amp;#x1F507;</summary>
  <p class="text">🔇</p>
  <div class="name hyphenate"><p>Speaker with Cancellation Stroke</p></div>
</details>
<details href="#x1F508" class="content-item card">
  <summary>&#x1F508; &amp;#x1F508;</summary>
  <p class="text">🔈</p>
  <div class="name hyphenate"><p>Speaker</p></div>
</details>
<details href="#x1F509" class="content-item card">
  <summary>&#x1F509; &amp;#x1F509;</summary>
  <p class="text">🔉</p>
  <div class="name hyphenate"><p>Speaker with One Sound Wave</p></div>
</details>
<details href="#x1F50A" class="content-item card">
  <summary>&#x1F50A; &amp;#x1F50A;</summary>
  <p class="text">🔊</p>
  <div class="name hyphenate"><p>Speaker with Three Sound Waves</p></div>
</details>
<details href="#x1F50B" class="content-item card">
  <summary>&#x1F50B; &amp;#x1F50B;</summary>
  <p class="text">🔋</p>
  <div class="name hyphenate"><p>Battery</p></div>
</details>
<details href="#x1F50C" class="content-item card">
  <summary>&#x1F50C; &amp;#x1F50C;</summary>
  <p class="text">🔌</p>
  <div class="name hyphenate"><p>Electric Plug</p></div>
</details>
<details href="#x1F50D" class="content-item card">
  <summary>&#x1F50D; &amp;#x1F50D;</summary>
  <p class="text">🔍</p>
  <div class="name hyphenate"><p>Left-Pointing Magnifying Glass</p></div>
</details>
<details href="#x1F50E" class="content-item card">
  <summary>&#x1F50E; &amp;#x1F50E;</summary>
  <p class="text">🔎</p>
  <div class="name hyphenate"><p>Right-Pointing Magnifying Glass</p></div>
</details>
<details href="#x1F50F" class="content-item card">
  <summary>&#x1F50F; &amp;#x1F50F;</summary>
  <p class="text">🔏</p>
  <div class="name hyphenate"><p>Lock with Ink Pen</p></div>
</details>
<details href="#x1F510" class="content-item card">
  <summary>&#x1F510; &amp;#x1F510;</summary>
  <p class="text">🔐</p>
  <div class="name hyphenate"><p>Closed Lock with Key</p></div>
</details>
<details href="#x1F511" class="content-item card">
  <summary>&#x1F511; &amp;#x1F511;</summary>
  <p class="text">🔑</p>
  <div class="name hyphenate"><p>Key</p></div>
</details>
<details href="#x1F512" class="content-item card">
  <summary>&#x1F512; &amp;#x1F512;</summary>
  <p class="text">🔒</p>
  <div class="name hyphenate"><p>Lock</p></div>
</details>
<details href="#x1F513" class="content-item card">
  <summary>&#x1F513; &amp;#x1F513;</summary>
  <p class="text">🔓</p>
  <div class="name hyphenate"><p>Open Lock</p></div>
</details>
<details href="#x1F514" class="content-item card">
  <summary>&#x1F514; &amp;#x1F514;</summary>
  <p class="text">🔔</p>
  <div class="name hyphenate"><p>Bell</p></div>
</details>
<details href="#x1F515" class="content-item card">
  <summary>&#x1F515; &amp;#x1F515;</summary>
  <p class="text">🔕</p>
  <div class="name hyphenate"><p>Bell with Cancellation Stroke</p></div>
</details>
<details href="#x1F516" class="content-item card">
  <summary>&#x1F516; &amp;#x1F516;</summary>
  <p class="text">🔖</p>
  <div class="name hyphenate"><p>Bookmark</p></div>
</details>
<details href="#x1F517" class="content-item card">
  <summary>&#x1F517; &amp;#x1F517;</summary>
  <p class="text">🔗</p>
  <div class="name hyphenate"><p>Link Symbol</p></div>
</details>
<details href="#x1F518" class="content-item card">
  <summary>&#x1F518; &amp;#x1F518;</summary>
  <p class="text">🔘</p>
  <div class="name hyphenate"><p>Radio Button</p></div>
</details>
<details href="#x1F519" class="content-item card">
  <summary>&#x1F519; &amp;#x1F519;</summary>
  <p class="text">🔙</p>
  <div class="name hyphenate"><p>Back with Leftwards Arrow Above</p></div>
</details>
<details href="#x1F51A" class="content-item card">
  <summary>&#x1F51A; &amp;#x1F51A;</summary>
  <p class="text">🔚</p>
  <div class="name hyphenate"><p>End with Leftwards Arrow Above</p></div>
</details>
<details href="#x1F51B" class="content-item card">
  <summary>&#x1F51B; &amp;#x1F51B;</summary>
  <p class="text">🔛</p>
  <div class="name hyphenate">
    <p>On with Exclamation Mark with Left Right Arrow Above</p>
  </div>
</details>
<details href="#x1F51C" class="content-item card">
  <summary>&#x1F51C; &amp;#x1F51C;</summary>
  <p class="text">🔜</p>
  <div class="name hyphenate"><p>Soon with Rightwards Arrow Above</p></div>
</details>
<details href="#x1F51D" class="content-item card">
  <summary>&#x1F51D; &amp;#x1F51D;</summary>
  <p class="text">🔝</p>
  <div class="name hyphenate"><p>Top with Upwards Arrow Above</p></div>
</details>
<details href="#x1F51E" class="content-item card">
  <summary>&#x1F51E; &amp;#x1F51E;</summary>
  <p class="text">🔞</p>
  <div class="name hyphenate"><p>No One Under Eighteen Symbol</p></div>
</details>
<details href="#x1F51F" class="content-item card">
  <summary>&#x1F51F; &amp;#x1F51F;</summary>
  <p class="text">🔟</p>
  <div class="name hyphenate"><p>Keycap Ten</p></div>
</details>
<details href="#x1F520" class="content-item card">
  <summary>&#x1F520; &amp;#x1F520;</summary>
  <p class="text">🔠</p>
  <div class="name hyphenate">
    <p>Input Symbol For Latin Capital Letters</p>
  </div>
</details>
<details href="#x1F521" class="content-item card">
  <summary>&#x1F521; &amp;#x1F521;</summary>
  <p class="text">🔡</p>
  <div class="name hyphenate"><p>Input Symbol For Latin Small Letters</p></div>
</details>
<details href="#x1F522" class="content-item card">
  <summary>&#x1F522; &amp;#x1F522;</summary>
  <p class="text">🔢</p>
  <div class="name hyphenate"><p>Input Symbol For Numbers</p></div>
</details>
<details href="#x1F523" class="content-item card">
  <summary>&#x1F523; &amp;#x1F523;</summary>
  <p class="text">🔣</p>
  <div class="name hyphenate"><p>Input Symbol For Symbols</p></div>
</details>
<details href="#x1F524" class="content-item card">
  <summary>&#x1F524; &amp;#x1F524;</summary>
  <p class="text">🔤</p>
  <div class="name hyphenate"><p>Input Symbol For Latin Letters</p></div>
</details>
<details href="#x1F525" class="content-item card">
  <summary>&#x1F525; &amp;#x1F525;</summary>
  <p class="text">🔥</p>
  <div class="name hyphenate"><p>Fire</p></div>
</details>
<details href="#x1F526" class="content-item card">
  <summary>&#x1F526; &amp;#x1F526;</summary>
  <p class="text">🔦</p>
  <div class="name hyphenate"><p>Electric Torch</p></div>
</details>
<details href="#x1F527" class="content-item card">
  <summary>&#x1F527; &amp;#x1F527;</summary>
  <p class="text">🔧</p>
  <div class="name hyphenate"><p>Wrench</p></div>
</details>
<details href="#x1F528" class="content-item card">
  <summary>&#x1F528; &amp;#x1F528;</summary>
  <p class="text">🔨</p>
  <div class="name hyphenate"><p>Hammer</p></div>
</details>
<details href="#x1F529" class="content-item card">
  <summary>&#x1F529; &amp;#x1F529;</summary>
  <p class="text">🔩</p>
  <div class="name hyphenate"><p>Nut and Bolt</p></div>
</details>
<details href="#x1F52A" class="content-item card">
  <summary>&#x1F52A; &amp;#x1F52A;</summary>
  <p class="text">🔪</p>
  <div class="name hyphenate"><p>Hocho</p></div>
</details>
<details href="#x1F52B" class="content-item card">
  <summary>&#x1F52B; &amp;#x1F52B;</summary>
  <p class="text">🔫</p>
  <div class="name hyphenate"><p>Pistol</p></div>
</details>
<details href="#x1F52C" class="content-item card">
  <summary>&#x1F52C; &amp;#x1F52C;</summary>
  <p class="text">🔬</p>
  <div class="name hyphenate"><p>Microscope</p></div>
</details>
<details href="#x1F52D" class="content-item card">
  <summary>&#x1F52D; &amp;#x1F52D;</summary>
  <p class="text">🔭</p>
  <div class="name hyphenate"><p>Telescope</p></div>
</details>
<details href="#x1F52E" class="content-item card">
  <summary>&#x1F52E; &amp;#x1F52E;</summary>
  <p class="text">🔮</p>
  <div class="name hyphenate"><p>Crystal Ball</p></div>
</details>
<details href="#x1F52F" class="content-item card">
  <summary>&#x1F52F; &amp;#x1F52F;</summary>
  <p class="text">🔯</p>
  <div class="name hyphenate"><p>Six Pointed Star with Middle Dot</p></div>
</details>
<details href="#x1F530" class="content-item card">
  <summary>&#x1F530; &amp;#x1F530;</summary>
  <p class="text">🔰</p>
  <div class="name hyphenate"><p>Japanese Symbol For Beginner</p></div>
</details>
<details href="#x1F531" class="content-item card">
  <summary>&#x1F531; &amp;#x1F531;</summary>
  <p class="text">🔱</p>
  <div class="name hyphenate"><p>Trident Emblem</p></div>
</details>
<details href="#x1F532" class="content-item card">
  <summary>&#x1F532; &amp;#x1F532;</summary>
  <p class="text">🔲</p>
  <div class="name hyphenate"><p>Black Square Button</p></div>
</details>
<details href="#x1F533" class="content-item card">
  <summary>&#x1F533; &amp;#x1F533;</summary>
  <p class="text">🔳</p>
  <div class="name hyphenate"><p>White Square Button</p></div>
</details>
<details href="#x1F534" class="content-item card">
  <summary>&#x1F534; &amp;#x1F534;</summary>
  <p class="text">🔴</p>
  <div class="name hyphenate"><p>Large Red Circle</p></div>
</details>
<details href="#x1F535" class="content-item card">
  <summary>&#x1F535; &amp;#x1F535;</summary>
  <p class="text">🔵</p>
  <div class="name hyphenate"><p>Large Blue Circle</p></div>
</details>
<details href="#x1F536" class="content-item card">
  <summary>&#x1F536; &amp;#x1F536;</summary>
  <p class="text">🔶</p>
  <div class="name hyphenate"><p>Large Orange Diamond</p></div>
</details>
<details href="#x1F537" class="content-item card">
  <summary>&#x1F537; &amp;#x1F537;</summary>
  <p class="text">🔷</p>
  <div class="name hyphenate"><p>Large Blue Diamond</p></div>
</details>
<details href="#x1F538" class="content-item card">
  <summary>&#x1F538; &amp;#x1F538;</summary>
  <p class="text">🔸</p>
  <div class="name hyphenate"><p>Small Orange Diamond</p></div>
</details>
<details href="#x1F539" class="content-item card">
  <summary>&#x1F539; &amp;#x1F539;</summary>
  <p class="text">🔹</p>
  <div class="name hyphenate"><p>Small Blue Diamond</p></div>
</details>
<details href="#x1F53A" class="content-item card">
  <summary>&#x1F53A; &amp;#x1F53A;</summary>
  <p class="text">🔺</p>
  <div class="name hyphenate"><p>Up-Pointing Red Triangle</p></div>
</details>
<details href="#x1F53B" class="content-item card">
  <summary>&#x1F53B; &amp;#x1F53B;</summary>
  <p class="text">🔻</p>
  <div class="name hyphenate"><p>Down-Pointing Red Triangle</p></div>
</details>
<details href="#x1F53C" class="content-item card">
  <summary>&#x1F53C; &amp;#x1F53C;</summary>
  <p class="text">🔼</p>
  <div class="name hyphenate"><p>Up-Pointing Small Red Triangle</p></div>
</details>
<details href="#x1F53D" class="content-item card">
  <summary>&#x1F53D; &amp;#x1F53D;</summary>
  <p class="text">🔽</p>
  <div class="name hyphenate"><p>Down-Pointing Small Red Triangle</p></div>
</details>
<details href="#x1F53E" class="content-item card">
  <summary>&#x1F53E; &amp;#x1F53E;</summary>
  <p class="text">🔾</p>
  <div class="name hyphenate"><p>Lower Right Shadowed White Circle</p></div>
</details>
<details href="#x1F53F" class="content-item card">
  <summary>&#x1F53F; &amp;#x1F53F;</summary>
  <p class="text">🔿</p>
  <div class="name hyphenate"><p>Upper Right Shadowed White Circle</p></div>
</details>
<details href="#x1F540" class="content-item card">
  <summary>&#x1F540; &amp;#x1F540;</summary>
  <p class="text">🕀</p>
  <div class="name hyphenate"><p>Circled Cross Pommee</p></div>
</details>
<details href="#x1F541" class="content-item card">
  <summary>&#x1F541; &amp;#x1F541;</summary>
  <p class="text">🕁</p>
  <div class="name hyphenate"><p>Cross Pommee with Half-Circle Below</p></div>
</details>
<details href="#x1F542" class="content-item card">
  <summary>&#x1F542; &amp;#x1F542;</summary>
  <p class="text">🕂</p>
  <div class="name hyphenate"><p>Cross Pommee</p></div>
</details>
<details href="#x1F543" class="content-item card">
  <summary>&#x1F543; &amp;#x1F543;</summary>
  <p class="text">🕃</p>
  <div class="name hyphenate">
    <p>Notched Left Semicircle with Three Dots</p>
  </div>
</details>
<details href="#x1F544" class="content-item card">
  <summary>&#x1F544; &amp;#x1F544;</summary>
  <p class="text">🕄</p>
  <div class="name hyphenate">
    <p>Notched Right Semicircle with Three Dots</p>
  </div>
</details>
<details href="#x1F545" class="content-item card">
  <summary>&#x1F545; &amp;#x1F545;</summary>
  <p class="text">🕅</p>
  <div class="name hyphenate"><p>Symbol For Marks Chapter</p></div>
</details>
<details href="#x1F546" class="content-item card">
  <summary>&#x1F546; &amp;#x1F546;</summary>
  <p class="text">🕆</p>
  <div class="name hyphenate"><p>White Latin Cross</p></div>
</details>
<details href="#x1F547" class="content-item card">
  <summary>&#x1F547; &amp;#x1F547;</summary>
  <p class="text">🕇</p>
  <div class="name hyphenate"><p>Heavy Latin Cross</p></div>
</details>
<details href="#x1F548" class="content-item card">
  <summary>&#x1F548; &amp;#x1F548;</summary>
  <p class="text">🕈</p>
  <div class="name hyphenate"><p>Celtic Cross</p></div>
</details>
<details href="#x1F549" class="content-item card">
  <summary>&#x1F549; &amp;#x1F549;</summary>
  <p class="text">🕉</p>
  <div class="name hyphenate"><p>Om Symbol</p></div>
</details>
<details href="#x1F54A" class="content-item card">
  <summary>&#x1F54A; &amp;#x1F54A;</summary>
  <p class="text">🕊</p>
  <div class="name hyphenate"><p>Dove of Peace</p></div>
</details>
<details href="#x1F54B" class="content-item card">
  <summary>&#x1F54B; &amp;#x1F54B;</summary>
  <p class="text">🕋</p>
  <div class="name hyphenate"><p>Kaaba</p></div>
</details>
<details href="#x1F54C" class="content-item card">
  <summary>&#x1F54C; &amp;#x1F54C;</summary>
  <p class="text">🕌</p>
  <div class="name hyphenate"><p>Mosque</p></div>
</details>
<details href="#x1F54D" class="content-item card">
  <summary>&#x1F54D; &amp;#x1F54D;</summary>
  <p class="text">🕍</p>
  <div class="name hyphenate"><p>Synagogue</p></div>
</details>
<details href="#x1F54E" class="content-item card">
  <summary>&#x1F54E; &amp;#x1F54E;</summary>
  <p class="text">🕎</p>
  <div class="name hyphenate"><p>Menorah with Nine Branches</p></div>
</details>
<details href="#x1F54F" class="content-item card">
  <summary>&#x1F54F; &amp;#x1F54F;</summary>
  <p class="text">🕏</p>
  <div class="name hyphenate"><p>Bowl of Hygieia</p></div>
</details>
<details href="#x1F550" class="content-item card">
  <summary>&#x1F550; &amp;#x1F550;</summary>
  <p class="text">🕐</p>
  <div class="name hyphenate"><p>Clock Face One Oclock</p></div>
</details>
<details href="#x1F551" class="content-item card">
  <summary>&#x1F551; &amp;#x1F551;</summary>
  <p class="text">🕑</p>
  <div class="name hyphenate"><p>Clock Face Two Oclock</p></div>
</details>
<details href="#x1F552" class="content-item card">
  <summary>&#x1F552; &amp;#x1F552;</summary>
  <p class="text">🕒</p>
  <div class="name hyphenate"><p>Clock Face Three Oclock</p></div>
</details>
<details href="#x1F553" class="content-item card">
  <summary>&#x1F553; &amp;#x1F553;</summary>
  <p class="text">🕓</p>
  <div class="name hyphenate"><p>Clock Face Four Oclock</p></div>
</details>
<details href="#x1F554" class="content-item card">
  <summary>&#x1F554; &amp;#x1F554;</summary>
  <p class="text">🕔</p>
  <div class="name hyphenate"><p>Clock Face Five Oclock</p></div>
</details>
<details href="#x1F555" class="content-item card">
  <summary>&#x1F555; &amp;#x1F555;</summary>
  <p class="text">🕕</p>
  <div class="name hyphenate"><p>Clock Face Six Oclock</p></div>
</details>
<details href="#x1F556" class="content-item card">
  <summary>&#x1F556; &amp;#x1F556;</summary>
  <p class="text">🕖</p>
  <div class="name hyphenate"><p>Clock Face Seven Oclock</p></div>
</details>
<details href="#x1F557" class="content-item card">
  <summary>&#x1F557; &amp;#x1F557;</summary>
  <p class="text">🕗</p>
  <div class="name hyphenate"><p>Clock Face Eight Oclock</p></div>
</details>
<details href="#x1F558" class="content-item card">
  <summary>&#x1F558; &amp;#x1F558;</summary>
  <p class="text">🕘</p>
  <div class="name hyphenate"><p>Clock Face Nine Oclock</p></div>
</details>
<details href="#x1F559" class="content-item card">
  <summary>&#x1F559; &amp;#x1F559;</summary>
  <p class="text">🕙</p>
  <div class="name hyphenate"><p>Clock Face Ten Oclock</p></div>
</details>
<details href="#x1F55A" class="content-item card">
  <summary>&#x1F55A; &amp;#x1F55A;</summary>
  <p class="text">🕚</p>
  <div class="name hyphenate"><p>Clock Face Eleven Oclock</p></div>
</details>
<details href="#x1F55B" class="content-item card">
  <summary>&#x1F55B; &amp;#x1F55B;</summary>
  <p class="text">🕛</p>
  <div class="name hyphenate"><p>Clock Face Twelve Oclock</p></div>
</details>
<details href="#x1F55C" class="content-item card">
  <summary>&#x1F55C; &amp;#x1F55C;</summary>
  <p class="text">🕜</p>
  <div class="name hyphenate"><p>Clock Face One-Thirty</p></div>
</details>
<details href="#x1F55D" class="content-item card">
  <summary>&#x1F55D; &amp;#x1F55D;</summary>
  <p class="text">🕝</p>
  <div class="name hyphenate"><p>Clock Face Two-Thirty</p></div>
</details>
<details href="#x1F55E" class="content-item card">
  <summary>&#x1F55E; &amp;#x1F55E;</summary>
  <p class="text">🕞</p>
  <div class="name hyphenate"><p>Clock Face Three-Thirty</p></div>
</details>
<details href="#x1F55F" class="content-item card">
  <summary>&#x1F55F; &amp;#x1F55F;</summary>
  <p class="text">🕟</p>
  <div class="name hyphenate"><p>Clock Face Four-Thirty</p></div>
</details>
<details href="#x1F560" class="content-item card">
  <summary>&#x1F560; &amp;#x1F560;</summary>
  <p class="text">🕠</p>
  <div class="name hyphenate"><p>Clock Face Five-Thirty</p></div>
</details>
<details href="#x1F561" class="content-item card">
  <summary>&#x1F561; &amp;#x1F561;</summary>
  <p class="text">🕡</p>
  <div class="name hyphenate"><p>Clock Face Six-Thirty</p></div>
</details>
<details href="#x1F562" class="content-item card">
  <summary>&#x1F562; &amp;#x1F562;</summary>
  <p class="text">🕢</p>
  <div class="name hyphenate"><p>Clock Face Seven-Thirty</p></div>
</details>
<details href="#x1F563" class="content-item card">
  <summary>&#x1F563; &amp;#x1F563;</summary>
  <p class="text">🕣</p>
  <div class="name hyphenate"><p>Clock Face Eight-Thirty</p></div>
</details>
<details href="#x1F564" class="content-item card">
  <summary>&#x1F564; &amp;#x1F564;</summary>
  <p class="text">🕤</p>
  <div class="name hyphenate"><p>Clock Face Nine-Thirty</p></div>
</details>
<details href="#x1F565" class="content-item card">
  <summary>&#x1F565; &amp;#x1F565;</summary>
  <p class="text">🕥</p>
  <div class="name hyphenate"><p>Clock Face Ten-Thirty</p></div>
</details>
<details href="#x1F566" class="content-item card">
  <summary>&#x1F566; &amp;#x1F566;</summary>
  <p class="text">🕦</p>
  <div class="name hyphenate"><p>Clock Face Eleven-Thirty</p></div>
</details>
<details href="#x1F567" class="content-item card">
  <summary>&#x1F567; &amp;#x1F567;</summary>
  <p class="text">🕧</p>
  <div class="name hyphenate"><p>Clock Face Twelve-Thirty</p></div>
</details>
<details href="#x1F568" class="content-item card">
  <summary>&#x1F568; &amp;#x1F568;</summary>
  <p class="text">🕨</p>
  <div class="name hyphenate"><p>Right Speaker</p></div>
</details>
<details href="#x1F569" class="content-item card">
  <summary>&#x1F569; &amp;#x1F569;</summary>
  <p class="text">🕩</p>
  <div class="name hyphenate"><p>Right Speaker with One Sound Wave</p></div>
</details>
<details href="#x1F56A" class="content-item card">
  <summary>&#x1F56A; &amp;#x1F56A;</summary>
  <p class="text">🕪</p>
  <div class="name hyphenate"><p>Right Speaker with Three Sound Waves</p></div>
</details>
<details href="#x1F56B" class="content-item card">
  <summary>&#x1F56B; &amp;#x1F56B;</summary>
  <p class="text">🕫</p>
  <div class="name hyphenate"><p>Bullhorn</p></div>
</details>
<details href="#x1F56C" class="content-item card">
  <summary>&#x1F56C; &amp;#x1F56C;</summary>
  <p class="text">🕬</p>
  <div class="name hyphenate"><p>Bullhorn with Sound Waves</p></div>
</details>
<details href="#x1F56D" class="content-item card">
  <summary>&#x1F56D; &amp;#x1F56D;</summary>
  <p class="text">🕭</p>
  <div class="name hyphenate"><p>Ringing Bell</p></div>
</details>
<details href="#x1F56E" class="content-item card">
  <summary>&#x1F56E; &amp;#x1F56E;</summary>
  <p class="text">🕮</p>
  <div class="name hyphenate"><p>Book</p></div>
</details>
<details href="#x1F56F" class="content-item card">
  <summary>&#x1F56F; &amp;#x1F56F;</summary>
  <p class="text">🕯</p>
  <div class="name hyphenate"><p>Candle</p></div>
</details>
<details href="#x1F570" class="content-item card">
  <summary>&#x1F570; &amp;#x1F570;</summary>
  <p class="text">🕰</p>
  <div class="name hyphenate"><p>Mantelpiece Clock</p></div>
</details>
<details href="#x1F571" class="content-item card">
  <summary>&#x1F571; &amp;#x1F571;</summary>
  <p class="text">🕱</p>
  <div class="name hyphenate"><p>Black Skull and Crossbones</p></div>
</details>
<details href="#x1F572" class="content-item card">
  <summary>&#x1F572; &amp;#x1F572;</summary>
  <p class="text">🕲</p>
  <div class="name hyphenate"><p>No Piracy</p></div>
</details>
<details href="#x1F573" class="content-item card">
  <summary>&#x1F573; &amp;#x1F573;</summary>
  <p class="text">🕳</p>
  <div class="name hyphenate"><p>Hole</p></div>
</details>
<details href="#x1F574" class="content-item card">
  <summary>&#x1F574; &amp;#x1F574;</summary>
  <p class="text">🕴</p>
  <div class="name hyphenate"><p>Man In Business Suit Levitating</p></div>
</details>
<details href="#x1F575" class="content-item card">
  <summary>&#x1F575; &amp;#x1F575;</summary>
  <p class="text">🕵</p>
  <div class="name hyphenate"><p>Sleuth or Spy</p></div>
</details>
<details href="#x1F576" class="content-item card">
  <summary>&#x1F576; &amp;#x1F576;</summary>
  <p class="text">🕶</p>
  <div class="name hyphenate"><p>Dark Sunglasses</p></div>
</details>
<details href="#x1F577" class="content-item card">
  <summary>&#x1F577; &amp;#x1F577;</summary>
  <p class="text">🕷</p>
  <div class="name hyphenate"><p>Spider</p></div>
</details>
<details href="#x1F578" class="content-item card">
  <summary>&#x1F578; &amp;#x1F578;</summary>
  <p class="text">🕸</p>
  <div class="name hyphenate"><p>Spider Web</p></div>
</details>
<details href="#x1F579" class="content-item card">
  <summary>&#x1F579; &amp;#x1F579;</summary>
  <p class="text">🕹</p>
  <div class="name hyphenate"><p>Joystick</p></div>
</details>
<details href="#x1F57A" class="content-item card">
  <summary>&#x1F57A; &amp;#x1F57A;</summary>
  <p class="text">🕺</p>
  <div class="name hyphenate"><p>Man Dancing</p></div>
</details>
<details href="#x1F57B" class="content-item card">
  <summary>&#x1F57B; &amp;#x1F57B;</summary>
  <p class="text">🕻</p>
  <div class="name hyphenate"><p>Left Hand Telephone Receiver</p></div>
</details>
<details href="#x1F57C" class="content-item card">
  <summary>&#x1F57C; &amp;#x1F57C;</summary>
  <p class="text">🕼</p>
  <div class="name hyphenate"><p>Telephone Receiver with Page</p></div>
</details>
<details href="#x1F57D" class="content-item card">
  <summary>&#x1F57D; &amp;#x1F57D;</summary>
  <p class="text">🕽</p>
  <div class="name hyphenate"><p>Right Hand Telephone Receiver</p></div>
</details>
<details href="#x1F57E" class="content-item card">
  <summary>&#x1F57E; &amp;#x1F57E;</summary>
  <p class="text">🕾</p>
  <div class="name hyphenate"><p>White Touchtone Telephone</p></div>
</details>
<details href="#x1F57F" class="content-item card">
  <summary>&#x1F57F; &amp;#x1F57F;</summary>
  <p class="text">🕿</p>
  <div class="name hyphenate"><p>Black Touchtone Telephone</p></div>
</details>
<details href="#x1F580" class="content-item card">
  <summary>&#x1F580; &amp;#x1F580;</summary>
  <p class="text">🖀</p>
  <div class="name hyphenate"><p>Telephone On Top of Modem</p></div>
</details>
<details href="#x1F581" class="content-item card">
  <summary>&#x1F581; &amp;#x1F581;</summary>
  <p class="text">🖁</p>
  <div class="name hyphenate"><p>Clamshell Mobile Phone</p></div>
</details>
<details href="#x1F582" class="content-item card">
  <summary>&#x1F582; &amp;#x1F582;</summary>
  <p class="text">🖂</p>
  <div class="name hyphenate"><p>Back of Envelope</p></div>
</details>
<details href="#x1F583" class="content-item card">
  <summary>&#x1F583; &amp;#x1F583;</summary>
  <p class="text">🖃</p>
  <div class="name hyphenate"><p>Stamped Envelope</p></div>
</details>
<details href="#x1F584" class="content-item card">
  <summary>&#x1F584; &amp;#x1F584;</summary>
  <p class="text">🖄</p>
  <div class="name hyphenate"><p>Envelope with Lightning</p></div>
</details>
<details href="#x1F585" class="content-item card">
  <summary>&#x1F585; &amp;#x1F585;</summary>
  <p class="text">🖅</p>
  <div class="name hyphenate"><p>Flying Envelope</p></div>
</details>
<details href="#x1F586" class="content-item card">
  <summary>&#x1F586; &amp;#x1F586;</summary>
  <p class="text">🖆</p>
  <div class="name hyphenate"><p>Pen Over Stamped Envelope</p></div>
</details>
<details href="#x1F587" class="content-item card">
  <summary>&#x1F587; &amp;#x1F587;</summary>
  <p class="text">🖇</p>
  <div class="name hyphenate"><p>Linked Paperclips</p></div>
</details>
<details href="#x1F588" class="content-item card">
  <summary>&#x1F588; &amp;#x1F588;</summary>
  <p class="text">🖈</p>
  <div class="name hyphenate"><p>Black Pushpin</p></div>
</details>
<details href="#x1F589" class="content-item card">
  <summary>&#x1F589; &amp;#x1F589;</summary>
  <p class="text">🖉</p>
  <div class="name hyphenate"><p>Lower Left Pencil</p></div>
</details>
<details href="#x1F58A" class="content-item card">
  <summary>&#x1F58A; &amp;#x1F58A;</summary>
  <p class="text">🖊</p>
  <div class="name hyphenate"><p>Lower Left Ballpoint Pen</p></div>
</details>
<details href="#x1F58B" class="content-item card">
  <summary>&#x1F58B; &amp;#x1F58B;</summary>
  <p class="text">🖋</p>
  <div class="name hyphenate"><p>Lower Left Fountain Pen</p></div>
</details>
<details href="#x1F58C" class="content-item card">
  <summary>&#x1F58C; &amp;#x1F58C;</summary>
  <p class="text">🖌</p>
  <div class="name hyphenate"><p>Lower Left Paintbrush</p></div>
</details>
<details href="#x1F58D" class="content-item card">
  <summary>&#x1F58D; &amp;#x1F58D;</summary>
  <p class="text">🖍</p>
  <div class="name hyphenate"><p>Lower Left Crayon</p></div>
</details>
<details href="#x1F58E" class="content-item card">
  <summary>&#x1F58E; &amp;#x1F58E;</summary>
  <p class="text">🖎</p>
  <div class="name hyphenate"><p>Left Writing Hand</p></div>
</details>
<details href="#x1F58F" class="content-item card">
  <summary>&#x1F58F; &amp;#x1F58F;</summary>
  <p class="text">🖏</p>
  <div class="name hyphenate"><p>Turned Ok Hand Sign</p></div>
</details>
<details href="#x1F590" class="content-item card">
  <summary>&#x1F590; &amp;#x1F590;</summary>
  <p class="text">🖐</p>
  <div class="name hyphenate"><p>Raised Hand with Fingers Splayed</p></div>
</details>
<details href="#x1F591" class="content-item card">
  <summary>&#x1F591; &amp;#x1F591;</summary>
  <p class="text">🖑</p>
  <div class="name hyphenate">
    <p>Reversed Raised Hand with Fingers Splayed</p>
  </div>
</details>
<details href="#x1F592" class="content-item card">
  <summary>&#x1F592; &amp;#x1F592;</summary>
  <p class="text">🖒</p>
  <div class="name hyphenate"><p>Reversed Thumbs Up Sign</p></div>
</details>
<details href="#x1F593" class="content-item card">
  <summary>&#x1F593; &amp;#x1F593;</summary>
  <p class="text">🖓</p>
  <div class="name hyphenate"><p>Reversed Thumbs Down Sign</p></div>
</details>
<details href="#x1F594" class="content-item card">
  <summary>&#x1F594; &amp;#x1F594;</summary>
  <p class="text">🖔</p>
  <div class="name hyphenate"><p>Reversed Victory Hand</p></div>
</details>
<details href="#x1F595" class="content-item card">
  <summary>&#x1F595; &amp;#x1F595;</summary>
  <p class="text">🖕</p>
  <div class="name hyphenate">
    <p>Reversed Hand with Middle Finger Extended</p>
  </div>
</details>
<details href="#x1F596" class="content-item card">
  <summary>&#x1F596; &amp;#x1F596;</summary>
  <p class="text">🖖</p>
  <div class="name hyphenate">
    <p>Raised Hand with Part Between Middle and Ring Fingers</p>
  </div>
</details>
<details href="#x1F597" class="content-item card">
  <summary>&#x1F597; &amp;#x1F597;</summary>
  <p class="text">🖗</p>
  <div class="name hyphenate"><p>White Down Pointing Left Hand Index</p></div>
</details>
<details href="#x1F598" class="content-item card">
  <summary>&#x1F598; &amp;#x1F598;</summary>
  <p class="text">🖘</p>
  <div class="name hyphenate"><p>Sideways White Left Pointing Index</p></div>
</details>
<details href="#x1F599" class="content-item card">
  <summary>&#x1F599; &amp;#x1F599;</summary>
  <p class="text">🖙</p>
  <div class="name hyphenate"><p>Sideways White Right Pointing Index</p></div>
</details>
<details href="#x1F59A" class="content-item card">
  <summary>&#x1F59A; &amp;#x1F59A;</summary>
  <p class="text">🖚</p>
  <div class="name hyphenate"><p>Sideways Black Left Pointing Index</p></div>
</details>
<details href="#x1F59B" class="content-item card">
  <summary>&#x1F59B; &amp;#x1F59B;</summary>
  <p class="text">🖛</p>
  <div class="name hyphenate"><p>Sideways Black Right Pointing Index</p></div>
</details>
<details href="#x1F59C" class="content-item card">
  <summary>&#x1F59C; &amp;#x1F59C;</summary>
  <p class="text">🖜</p>
  <div class="name hyphenate"><p>Black Left Pointing Backhand Index</p></div>
</details>
<details href="#x1F59D" class="content-item card">
  <summary>&#x1F59D; &amp;#x1F59D;</summary>
  <p class="text">🖝</p>
  <div class="name hyphenate"><p>Black Right Pointing Backhand Index</p></div>
</details>
<details href="#x1F59E" class="content-item card">
  <summary>&#x1F59E; &amp;#x1F59E;</summary>
  <p class="text">🖞</p>
  <div class="name hyphenate"><p>Sideways White Up Pointing Index</p></div>
</details>
<details href="#x1F59F" class="content-item card">
  <summary>&#x1F59F; &amp;#x1F59F;</summary>
  <p class="text">🖟</p>
  <div class="name hyphenate"><p>Sideways White Down Pointing Index</p></div>
</details>
<details href="#x1F5A0" class="content-item card">
  <summary>&#x1F5A0; &amp;#x1F5A0;</summary>
  <p class="text">🖠</p>
  <div class="name hyphenate"><p>Sideways Black Up Pointing Index</p></div>
</details>
<details href="#x1F5A1" class="content-item card">
  <summary>&#x1F5A1; &amp;#x1F5A1;</summary>
  <p class="text">🖡</p>
  <div class="name hyphenate"><p>Sideways Black Down Pointing Index</p></div>
</details>
<details href="#x1F5A2" class="content-item card">
  <summary>&#x1F5A2; &amp;#x1F5A2;</summary>
  <p class="text">🖢</p>
  <div class="name hyphenate"><p>Black Up Pointing Backhand Index</p></div>
</details>
<details href="#x1F5A3" class="content-item card">
  <summary>&#x1F5A3; &amp;#x1F5A3;</summary>
  <p class="text">🖣</p>
  <div class="name hyphenate"><p>Black Down Pointing Backhand Index</p></div>
</details>
<details href="#x1F5A4" class="content-item card">
  <summary>&#x1F5A4; &amp;#x1F5A4;</summary>
  <p class="text">🖤</p>
  <div class="name hyphenate"><p>Black Heart</p></div>
</details>
<details href="#x1F5A5" class="content-item card">
  <summary>&#x1F5A5; &amp;#x1F5A5;</summary>
  <p class="text">🖥</p>
  <div class="name hyphenate"><p>Desktop Computer</p></div>
</details>
<details href="#x1F5A6" class="content-item card">
  <summary>&#x1F5A6; &amp;#x1F5A6;</summary>
  <p class="text">🖦</p>
  <div class="name hyphenate"><p>Keyboard and Mouse</p></div>
</details>
<details href="#x1F5A7" class="content-item card">
  <summary>&#x1F5A7; &amp;#x1F5A7;</summary>
  <p class="text">🖧</p>
  <div class="name hyphenate"><p>Three Networked Computers</p></div>
</details>
<details href="#x1F5A8" class="content-item card">
  <summary>&#x1F5A8; &amp;#x1F5A8;</summary>
  <p class="text">🖨</p>
  <div class="name hyphenate"><p>Printer</p></div>
</details>
<details href="#x1F5A9" class="content-item card">
  <summary>&#x1F5A9; &amp;#x1F5A9;</summary>
  <p class="text">🖩</p>
  <div class="name hyphenate"><p>Pocket Calculator</p></div>
</details>
<details href="#x1F5AA" class="content-item card">
  <summary>&#x1F5AA; &amp;#x1F5AA;</summary>
  <p class="text">🖪</p>
  <div class="name hyphenate"><p>Black Hard Shell Floppy Disk</p></div>
</details>
<details href="#x1F5AB" class="content-item card">
  <summary>&#x1F5AB; &amp;#x1F5AB;</summary>
  <p class="text">🖫</p>
  <div class="name hyphenate"><p>White Hard Shell Floppy Disk</p></div>
</details>
<details href="#x1F5AC" class="content-item card">
  <summary>&#x1F5AC; &amp;#x1F5AC;</summary>
  <p class="text">🖬</p>
  <div class="name hyphenate"><p>Soft Shell Floppy Disk</p></div>
</details>
<details href="#x1F5AD" class="content-item card">
  <summary>&#x1F5AD; &amp;#x1F5AD;</summary>
  <p class="text">🖭</p>
  <div class="name hyphenate"><p>Tape Cartridge</p></div>
</details>
<details href="#x1F5AE" class="content-item card">
  <summary>&#x1F5AE; &amp;#x1F5AE;</summary>
  <p class="text">🖮</p>
  <div class="name hyphenate"><p>Wired Keyboard</p></div>
</details>
<details href="#x1F5AF" class="content-item card">
  <summary>&#x1F5AF; &amp;#x1F5AF;</summary>
  <p class="text">🖯</p>
  <div class="name hyphenate"><p>One Button Mouse</p></div>
</details>
<details href="#x1F5B0" class="content-item card">
  <summary>&#x1F5B0; &amp;#x1F5B0;</summary>
  <p class="text">🖰</p>
  <div class="name hyphenate"><p>Two Button Mouse</p></div>
</details>
<details href="#x1F5B1" class="content-item card">
  <summary>&#x1F5B1; &amp;#x1F5B1;</summary>
  <p class="text">🖱</p>
  <div class="name hyphenate"><p>Three Button Mouse</p></div>
</details>
<details href="#x1F5B2" class="content-item card">
  <summary>&#x1F5B2; &amp;#x1F5B2;</summary>
  <p class="text">🖲</p>
  <div class="name hyphenate"><p>Trackball</p></div>
</details>
<details href="#x1F5B3" class="content-item card">
  <summary>&#x1F5B3; &amp;#x1F5B3;</summary>
  <p class="text">🖳</p>
  <div class="name hyphenate"><p>Old Personal Computer</p></div>
</details>
<details href="#x1F5B4" class="content-item card">
  <summary>&#x1F5B4; &amp;#x1F5B4;</summary>
  <p class="text">🖴</p>
  <div class="name hyphenate"><p>Hard Disk</p></div>
</details>
<details href="#x1F5B5" class="content-item card">
  <summary>&#x1F5B5; &amp;#x1F5B5;</summary>
  <p class="text">🖵</p>
  <div class="name hyphenate"><p>Screen</p></div>
</details>
<details href="#x1F5B6" class="content-item card">
  <summary>&#x1F5B6; &amp;#x1F5B6;</summary>
  <p class="text">🖶</p>
  <div class="name hyphenate"><p>Printer Icon</p></div>
</details>
<details href="#x1F5B7" class="content-item card">
  <summary>&#x1F5B7; &amp;#x1F5B7;</summary>
  <p class="text">🖷</p>
  <div class="name hyphenate"><p>Fax Icon</p></div>
</details>
<details href="#x1F5B8" class="content-item card">
  <summary>&#x1F5B8; &amp;#x1F5B8;</summary>
  <p class="text">🖸</p>
  <div class="name hyphenate"><p>Optical Disc Icon</p></div>
</details>
<details href="#x1F5B9" class="content-item card">
  <summary>&#x1F5B9; &amp;#x1F5B9;</summary>
  <p class="text">🖹</p>
  <div class="name hyphenate"><p>Document with Text</p></div>
</details>
<details href="#x1F5BA" class="content-item card">
  <summary>&#x1F5BA; &amp;#x1F5BA;</summary>
  <p class="text">🖺</p>
  <div class="name hyphenate"><p>Document with Text and Picture</p></div>
</details>
<details href="#x1F5BB" class="content-item card">
  <summary>&#x1F5BB; &amp;#x1F5BB;</summary>
  <p class="text">🖻</p>
  <div class="name hyphenate"><p>Document with Picture</p></div>
</details>
<details href="#x1F5BC" class="content-item card">
  <summary>&#x1F5BC; &amp;#x1F5BC;</summary>
  <p class="text">🖼</p>
  <div class="name hyphenate"><p>Frame with Picture</p></div>
</details>
<details href="#x1F5BD" class="content-item card">
  <summary>&#x1F5BD; &amp;#x1F5BD;</summary>
  <p class="text">🖽</p>
  <div class="name hyphenate"><p>Frame with Tiles</p></div>
</details>
<details href="#x1F5BE" class="content-item card">
  <summary>&#x1F5BE; &amp;#x1F5BE;</summary>
  <p class="text">🖾</p>
  <div class="name hyphenate"><p>Frame with An X</p></div>
</details>
<details href="#x1F5BF" class="content-item card">
  <summary>&#x1F5BF; &amp;#x1F5BF;</summary>
  <p class="text">🖿</p>
  <div class="name hyphenate"><p>Black Folder</p></div>
</details>
<details href="#x1F5C0" class="content-item card">
  <summary>&#x1F5C0; &amp;#x1F5C0;</summary>
  <p class="text">🗀</p>
  <div class="name hyphenate"><p>Folder</p></div>
</details>
<details href="#x1F5C1" class="content-item card">
  <summary>&#x1F5C1; &amp;#x1F5C1;</summary>
  <p class="text">🗁</p>
  <div class="name hyphenate"><p>Open Folder</p></div>
</details>
<details href="#x1F5C2" class="content-item card">
  <summary>&#x1F5C2; &amp;#x1F5C2;</summary>
  <p class="text">🗂</p>
  <div class="name hyphenate"><p>Card Index Dividers</p></div>
</details>
<details href="#x1F5C3" class="content-item card">
  <summary>&#x1F5C3; &amp;#x1F5C3;</summary>
  <p class="text">🗃</p>
  <div class="name hyphenate"><p>Card File Box</p></div>
</details>
<details href="#x1F5C4" class="content-item card">
  <summary>&#x1F5C4; &amp;#x1F5C4;</summary>
  <p class="text">🗄</p>
  <div class="name hyphenate"><p>File Cabinet</p></div>
</details>
<details href="#x1F5C5" class="content-item card">
  <summary>&#x1F5C5; &amp;#x1F5C5;</summary>
  <p class="text">🗅</p>
  <div class="name hyphenate"><p>Empty Note</p></div>
</details>
<details href="#x1F5C6" class="content-item card">
  <summary>&#x1F5C6; &amp;#x1F5C6;</summary>
  <p class="text">🗆</p>
  <div class="name hyphenate"><p>Empty Note Page</p></div>
</details>
<details href="#x1F5C7" class="content-item card">
  <summary>&#x1F5C7; &amp;#x1F5C7;</summary>
  <p class="text">🗇</p>
  <div class="name hyphenate"><p>Empty Note Pad</p></div>
</details>
<details href="#x1F5C8" class="content-item card">
  <summary>&#x1F5C8; &amp;#x1F5C8;</summary>
  <p class="text">🗈</p>
  <div class="name hyphenate"><p>Note</p></div>
</details>
<details href="#x1F5C9" class="content-item card">
  <summary>&#x1F5C9; &amp;#x1F5C9;</summary>
  <p class="text">🗉</p>
  <div class="name hyphenate"><p>Note Page</p></div>
</details>
<details href="#x1F5CA" class="content-item card">
  <summary>&#x1F5CA; &amp;#x1F5CA;</summary>
  <p class="text">🗊</p>
  <div class="name hyphenate"><p>Note Pad</p></div>
</details>
<details href="#x1F5CB" class="content-item card">
  <summary>&#x1F5CB; &amp;#x1F5CB;</summary>
  <p class="text">🗋</p>
  <div class="name hyphenate"><p>Empty Document</p></div>
</details>
<details href="#x1F5CC" class="content-item card">
  <summary>&#x1F5CC; &amp;#x1F5CC;</summary>
  <p class="text">🗌</p>
  <div class="name hyphenate"><p>Empty Page</p></div>
</details>
<details href="#x1F5CD" class="content-item card">
  <summary>&#x1F5CD; &amp;#x1F5CD;</summary>
  <p class="text">🗍</p>
  <div class="name hyphenate"><p>Empty Pages</p></div>
</details>
<details href="#x1F5CE" class="content-item card">
  <summary>&#x1F5CE; &amp;#x1F5CE;</summary>
  <p class="text">🗎</p>
  <div class="name hyphenate"><p>Document</p></div>
</details>
<details href="#x1F5CF" class="content-item card">
  <summary>&#x1F5CF; &amp;#x1F5CF;</summary>
  <p class="text">🗏</p>
  <div class="name hyphenate"><p>Page</p></div>
</details>
<details href="#x1F5D0" class="content-item card">
  <summary>&#x1F5D0; &amp;#x1F5D0;</summary>
  <p class="text">🗐</p>
  <div class="name hyphenate"><p>Pages</p></div>
</details>
<details href="#x1F5D1" class="content-item card">
  <summary>&#x1F5D1; &amp;#x1F5D1;</summary>
  <p class="text">🗑</p>
  <div class="name hyphenate"><p>Wastebasket</p></div>
</details>
<details href="#x1F5D2" class="content-item card">
  <summary>&#x1F5D2; &amp;#x1F5D2;</summary>
  <p class="text">🗒</p>
  <div class="name hyphenate"><p>Spiral Note Pad</p></div>
</details>
<details href="#x1F5D3" class="content-item card">
  <summary>&#x1F5D3; &amp;#x1F5D3;</summary>
  <p class="text">🗓</p>
  <div class="name hyphenate"><p>Spiral Calendar Pad</p></div>
</details>
<details href="#x1F5D4" class="content-item card">
  <summary>&#x1F5D4; &amp;#x1F5D4;</summary>
  <p class="text">🗔</p>
  <div class="name hyphenate"><p>Desktop Window</p></div>
</details>
<details href="#x1F5D5" class="content-item card">
  <summary>&#x1F5D5; &amp;#x1F5D5;</summary>
  <p class="text">🗕</p>
  <div class="name hyphenate"><p>Minimize</p></div>
</details>
<details href="#x1F5D6" class="content-item card">
  <summary>&#x1F5D6; &amp;#x1F5D6;</summary>
  <p class="text">🗖</p>
  <div class="name hyphenate"><p>Maximize</p></div>
</details>
<details href="#x1F5D7" class="content-item card">
  <summary>&#x1F5D7; &amp;#x1F5D7;</summary>
  <p class="text">🗗</p>
  <div class="name hyphenate"><p>Overlap</p></div>
</details>
<details href="#x1F5D8" class="content-item card">
  <summary>&#x1F5D8; &amp;#x1F5D8;</summary>
  <p class="text">🗘</p>
  <div class="name hyphenate">
    <p>Clockwise Right and Left Semicircle Arrows</p>
  </div>
</details>
<details href="#x1F5D9" class="content-item card">
  <summary>&#x1F5D9; &amp;#x1F5D9;</summary>
  <p class="text">🗙</p>
  <div class="name hyphenate"><p>Cancellation X</p></div>
</details>
<details href="#x1F5DA" class="content-item card">
  <summary>&#x1F5DA; &amp;#x1F5DA;</summary>
  <p class="text">🗚</p>
  <div class="name hyphenate"><p>Increase Font Size Symbol</p></div>
</details>
<details href="#x1F5DB" class="content-item card">
  <summary>&#x1F5DB; &amp;#x1F5DB;</summary>
  <p class="text">🗛</p>
  <div class="name hyphenate"><p>Decrease Font Size Symbol</p></div>
</details>
<details href="#x1F5DC" class="content-item card">
  <summary>&#x1F5DC; &amp;#x1F5DC;</summary>
  <p class="text">🗜</p>
  <div class="name hyphenate"><p>Compression</p></div>
</details>
<details href="#x1F5DD" class="content-item card">
  <summary>&#x1F5DD; &amp;#x1F5DD;</summary>
  <p class="text">🗝</p>
  <div class="name hyphenate"><p>Old Key</p></div>
</details>
<details href="#x1F5DE" class="content-item card">
  <summary>&#x1F5DE; &amp;#x1F5DE;</summary>
  <p class="text">🗞</p>
  <div class="name hyphenate"><p>Rolled-Up Newspaper</p></div>
</details>
<details href="#x1F5DF" class="content-item card">
  <summary>&#x1F5DF; &amp;#x1F5DF;</summary>
  <p class="text">🗟</p>
  <div class="name hyphenate"><p>Page with Circled Text</p></div>
</details>
<details href="#x1F5E0" class="content-item card">
  <summary>&#x1F5E0; &amp;#x1F5E0;</summary>
  <p class="text">🗠</p>
  <div class="name hyphenate"><p>Stock Chart</p></div>
</details>
<details href="#x1F5E1" class="content-item card">
  <summary>&#x1F5E1; &amp;#x1F5E1;</summary>
  <p class="text">🗡</p>
  <div class="name hyphenate"><p>Dagger Knife</p></div>
</details>
<details href="#x1F5E2" class="content-item card">
  <summary>&#x1F5E2; &amp;#x1F5E2;</summary>
  <p class="text">🗢</p>
  <div class="name hyphenate"><p>Lips</p></div>
</details>
<details href="#x1F5E3" class="content-item card">
  <summary>&#x1F5E3; &amp;#x1F5E3;</summary>
  <p class="text">🗣</p>
  <div class="name hyphenate"><p>Speaking Head In Silhouette</p></div>
</details>
<details href="#x1F5E4" class="content-item card">
  <summary>&#x1F5E4; &amp;#x1F5E4;</summary>
  <p class="text">🗤</p>
  <div class="name hyphenate"><p>Three Rays Above</p></div>
</details>
<details href="#x1F5E5" class="content-item card">
  <summary>&#x1F5E5; &amp;#x1F5E5;</summary>
  <p class="text">🗥</p>
  <div class="name hyphenate"><p>Three Rays Below</p></div>
</details>
<details href="#x1F5E6" class="content-item card">
  <summary>&#x1F5E6; &amp;#x1F5E6;</summary>
  <p class="text">🗦</p>
  <div class="name hyphenate"><p>Three Rays Left</p></div>
</details>
<details href="#x1F5E7" class="content-item card">
  <summary>&#x1F5E7; &amp;#x1F5E7;</summary>
  <p class="text">🗧</p>
  <div class="name hyphenate"><p>Three Rays Right</p></div>
</details>
<details href="#x1F5E8" class="content-item card">
  <summary>&#x1F5E8; &amp;#x1F5E8;</summary>
  <p class="text">🗨</p>
  <div class="name hyphenate"><p>Left Speech Bubble</p></div>
</details>
<details href="#x1F5E9" class="content-item card">
  <summary>&#x1F5E9; &amp;#x1F5E9;</summary>
  <p class="text">🗩</p>
  <div class="name hyphenate"><p>Right Speech Bubble</p></div>
</details>
<details href="#x1F5EA" class="content-item card">
  <summary>&#x1F5EA; &amp;#x1F5EA;</summary>
  <p class="text">🗪</p>
  <div class="name hyphenate"><p>Two Speech Bubbles</p></div>
</details>
<details href="#x1F5EB" class="content-item card">
  <summary>&#x1F5EB; &amp;#x1F5EB;</summary>
  <p class="text">🗫</p>
  <div class="name hyphenate"><p>Three Speech Bubbles</p></div>
</details>
<details href="#x1F5EC" class="content-item card">
  <summary>&#x1F5EC; &amp;#x1F5EC;</summary>
  <p class="text">🗬</p>
  <div class="name hyphenate"><p>Left Thought Bubble</p></div>
</details>
<details href="#x1F5ED" class="content-item card">
  <summary>&#x1F5ED; &amp;#x1F5ED;</summary>
  <p class="text">🗭</p>
  <div class="name hyphenate"><p>Right Thought Bubble</p></div>
</details>
<details href="#x1F5EE" class="content-item card">
  <summary>&#x1F5EE; &amp;#x1F5EE;</summary>
  <p class="text">🗮</p>
  <div class="name hyphenate"><p>Left Anger Bubble</p></div>
</details>
<details href="#x1F5EF" class="content-item card">
  <summary>&#x1F5EF; &amp;#x1F5EF;</summary>
  <p class="text">🗯</p>
  <div class="name hyphenate"><p>Right Anger Bubble</p></div>
</details>
<details href="#x1F5F0" class="content-item card">
  <summary>&#x1F5F0; &amp;#x1F5F0;</summary>
  <p class="text">🗰</p>
  <div class="name hyphenate"><p>Mood Bubble</p></div>
</details>
<details href="#x1F5F1" class="content-item card">
  <summary>&#x1F5F1; &amp;#x1F5F1;</summary>
  <p class="text">🗱</p>
  <div class="name hyphenate"><p>Lightning Mood Bubble</p></div>
</details>
<details href="#x1F5F2" class="content-item card">
  <summary>&#x1F5F2; &amp;#x1F5F2;</summary>
  <p class="text">🗲</p>
  <div class="name hyphenate"><p>Lightning Mood</p></div>
</details>
<details href="#x1F5F3" class="content-item card">
  <summary>&#x1F5F3; &amp;#x1F5F3;</summary>
  <p class="text">🗳</p>
  <div class="name hyphenate"><p>Ballot Box with Ballot</p></div>
</details>
<details href="#x1F5F4" class="content-item card">
  <summary>&#x1F5F4; &amp;#x1F5F4;</summary>
  <p class="text">🗴</p>
  <div class="name hyphenate"><p>Ballot Script X</p></div>
</details>
<details href="#x1F5F5" class="content-item card">
  <summary>&#x1F5F5; &amp;#x1F5F5;</summary>
  <p class="text">🗵</p>
  <div class="name hyphenate"><p>Ballot Box with Script X</p></div>
</details>
<details href="#x1F5F6" class="content-item card">
  <summary>&#x1F5F6; &amp;#x1F5F6;</summary>
  <p class="text">🗶</p>
  <div class="name hyphenate"><p>Ballot Bold Script X</p></div>
</details>
<details href="#x1F5F7" class="content-item card">
  <summary>&#x1F5F7; &amp;#x1F5F7;</summary>
  <p class="text">🗷</p>
  <div class="name hyphenate"><p>Ballot Box with Bold Script X</p></div>
</details>
<details href="#x1F5F8" class="content-item card">
  <summary>&#x1F5F8; &amp;#x1F5F8;</summary>
  <p class="text">🗸</p>
  <div class="name hyphenate"><p>Light Check Mark</p></div>
</details>
<details href="#x1F5F9" class="content-item card">
  <summary>&#x1F5F9; &amp;#x1F5F9;</summary>
  <p class="text">🗹</p>
  <div class="name hyphenate"><p>Ballot Box with Bold Check</p></div>
</details>
<details href="#x1F5FA" class="content-item card">
  <summary>&#x1F5FA; &amp;#x1F5FA;</summary>
  <p class="text">🗺</p>
  <div class="name hyphenate"><p>World Map</p></div>
</details>
<details href="#x1F5FB" class="content-item card">
  <summary>&#x1F5FB; &amp;#x1F5FB;</summary>
  <p class="text">🗻</p>
  <div class="name hyphenate"><p>Mount Fuji</p></div>
</details>
<details href="#x1F5FC" class="content-item card">
  <summary>&#x1F5FC; &amp;#x1F5FC;</summary>
  <p class="text">🗼</p>
  <div class="name hyphenate"><p>Tokyo Tower</p></div>
</details>
<details href="#x1F5FD" class="content-item card">
  <summary>&#x1F5FD; &amp;#x1F5FD;</summary>
  <p class="text">🗽</p>
  <div class="name hyphenate"><p>Statue of Liberty</p></div>
</details>
<details href="#x1F5FE" class="content-item card">
  <summary>&#x1F5FE; &amp;#x1F5FE;</summary>
  <p class="text">🗾</p>
  <div class="name hyphenate"><p>Silhouette of Japan</p></div>
</details>
<details href="#x1F5FF" class="content-item card">
  <summary>&#x1F5FF; &amp;#x1F5FF;</summary>
  <p class="text">🗿</p>
  <div class="name hyphenate"><p>Moyai</p></div>
</details>

<h2>References</h2>


</details>
                <!-- END NOTES -->
                <!-- END NOTES -->


            </div> <!-- $ end .notes div -->
        </section>

        <footer class="footer px-4">
            <!--    .FOOTER     -->
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust"
                            target="_blank" title="View original">@ajaxStardust</details> <em>Laravel</em> notes:</div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light text-end"><kbd>
                            2026-Jan-15
                        </kbd></div>
                </div>
            </div>
        </footer>
    </div><!--    $ :end    END class.content (former id.maincol)    $    -->
<script src="public/assets/js/showme-hideme.js"></script>
</body>


</html>
