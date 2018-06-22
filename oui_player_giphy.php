<?php

/*
 * This file is part of oui_player_giphy,
 * a oui_player v2+ extension to easily embed
 * Giphy customizable players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_player_giphy
 *
 * Copyright (C) 2018 Nicolas Morand
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA..
 */

/**
 * Vimeo
 *
 * @package Oui\Player
 */

namespace Oui\Player {

    if (class_exists('Oui\Player\Provider')) {

        class Giphy extends Provider
        {
            protected static $patterns = array(
                'video' => array(
                    'scheme' => '#^(http|https)://giphy\.com/(embed/|gifs/[\S]+[-])([0-9a-zA-Z]+)$#i',
                    'id'     => '3',
                ),
            );
            protected static $src = '//giphy.com/';
            protected static $glue = array('embed/', '', '');
            protected static $dims = array(
                'width'    => array(
                    'default' => '480',
                ),
                'height'   => array(
                    'default' => '480',
                ),
                'ratio'    => array(
                    'default' => '',
                ),
            );
        }
    }
}

namespace {
    function oui_giphy($atts) {
        return oui_player(array_merge(array('provider' => 'giphy'), $atts));
    }

    function oui_if_giphy($atts, $thing) {
        return oui_if_player(array_merge(array('provider' => 'giphy'), $atts), $thing);
    }
}
