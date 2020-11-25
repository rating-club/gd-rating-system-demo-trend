<?php

if (!defined('ABSPATH')) { exit; }

class gdrts_trend_render_single_thumbs_rating extends gdrts_render_single_thumbs_rating {
    protected function _render_thumbs_text($atts, $links = null) {
        $active = $atts['allow_rating'] && $this->owner()->calc('allowed') && $this->owner()->calc('open');
        $labels = is_null($atts['labels']) ? (array)$this->owner()->args('labels') : $atts['labels'];
        $sign = $atts['show_signs'];

        if (is_null($links)) {
            $links = $labels;
        }

        $html_up = '<span class="gdrts-thumb-symbol gdrts-thumb-up-symbol">'.$links['up'].'</span>';
        $html_down = '<span class="gdrts-thumb-symbol gdrts-thumb-down-symbol">'.$links['down'].'</span>';

        $higher = $this->owner()->calc('up') >= $this->owner()->calc('down') ? 'up' : 'down';

        $the_sign = $sign && $this->value('rating', false) > 0 ? '+' : '';

        $extra_classes = $atts['passive_mode'] ? 'gdrts-passive-rating' : '';
        $input = $atts['input_value'] ? $this->owner()->calc('rating_own') : '';

        $extra_classes.= $this->value('rating', false) != 0 ? ' gdrts-higher-is-'.$higher : 'gdrts-higher-is-zero';

        $render = '<div data-rating="'.$this->value('rating', false).'" class="'.$this->_render_classes($active, $extra_classes).'">';
            if ($active) {
                $render.= $this->_accessibility_block($input, $labels);
            }

            $render.= '<input type="hidden" value="'.$input.'" name="'.$atts['input_name'].'" />';
            $render.= '<div data-count="'.$this->owner()->calc('up').'" class="gdrts-thumb gdrts-thumb-up'.($input == 'up' ? ' gdrts-thumb-selected' : ($input == 'down' ? ' gdrts-thumb-selected' : '')).($higher == 'up' ? ' gdrts-thumb-higher' : ' gdrts-thumb-lower').'" style="font-size: '.$this->owner()->args('style_size').'px;">';
                $render.= '<div title="'.$labels['up'].' ('.$this->owner()->calc('up').')" class="gdrts-thumb-link" data-rating="up">'.$html_up.'</div>';
            $render.= '</div>';

            $render.= '<div class="gdrts-thumb-rating">'.$the_sign.$this->owner()->calculate_compact_votes($this->value('rating', false)).'</div>';

            $render.= '<div data-count="'.$this->owner()->calc('down').'" class="gdrts-thumb gdrts-thumb-down'.($input == 'down' ? ' gdrts-thumb-selected' : ($input == 'down' ? ' gdrts-thumb-selected' : '')).($higher == 'down' ? ' gdrts-thumb-higher' : ' gdrts-thumb-lower').'" style="font-size: '.$this->owner()->args('style_size').'px;">';
                $render.= '<div title="'.$labels['down'].' ('.$this->owner()->calc('down').')" class="gdrts-thumb-link" data-rating="down">'.$html_down.'</div>';
            $render.= '</div>';
        $render.= '</div>';

        return $render;
    }

    protected function _render_thumbs_image($atts) {
        $size = $this->owner()->args('style_size');

        $html = '<span class="gdrts-thumb-image" style="width: '.$size.'px; height: '.$size.'px; background-size: '.(2 * $size).'px '.(2 * $size).'px;"></span>';

        $html_up = '';
        $html_down = '';

        $active = $atts['allow_rating'] && $this->owner()->calc('allowed') && $this->owner()->calc('open');
        $labels = is_null($atts['labels']) ? (array)$this->owner()->args('labels') : $atts['labels'];
        $sign = $atts['show_signs'];

        $higher = $this->owner()->calc('up') >= $this->owner()->calc('down') ? 'up' : 'down';

        $the_sign = $sign && $this->value('rating', false) > 0 ? '+' : '';

        $extra_classes = $atts['passive_mode'] ? 'gdrts-passive-rating' : '';
        $input = $atts['input_value'] ? $this->owner()->calc('rating_own') : '';

        $extra_classes.= $this->value('rating', false) != 0 ? ' gdrts-higher-is-'.$higher : 'gdrts-higher-is-zero';

        $render = '<div data-rating="'.$this->value('rating', false).'" class="'.$this->_render_classes($active, $extra_classes).'">';
            if ($active) {
                $render.= $this->_accessibility_block($input, $labels);
            }

            $render.= '<input type="hidden" value="'.$input.'" name="'.$atts['input_name'].'" />';
            $render.= '<div data-count="'.$this->owner()->calc('up').'" aria-hidden="true" class="gdrts-thumb gdrts-thumb-up'.($input == 'up' ? ' gdrts-thumb-selected' : ($input == 'down' ? ' gdrts-thumb-selected' : '')).($higher == 'up' ? ' gdrts-thumb-higher' : ' gdrts-thumb-lower').'" style="font-size: '.$this->owner()->args('style_size').'px;">';
                $render.= '<div title="'.$labels['up'].'" class="gdrts-thumb-link" data-rating="up" style="width: '.$size.'px; height: '.$size.'px;">'.$html.$html_up.'</div>';
            $render.= '</div>';

            $render.= '<div class="gdrts-thumb-rating">'.$the_sign.$this->owner()->calculate_compact_votes($this->value('rating', false)).'</div>';

            $render.= '<div data-count="'.$this->owner()->calc('down').'" aria-hidden="true" class="gdrts-thumb gdrts-thumb-down'.($input == 'down' ? ' gdrts-thumb-selected' : ($input == 'down' ? ' gdrts-thumb-selected' : '')).($higher == 'down' ? ' gdrts-thumb-higher' : ' gdrts-thumb-lower').'" style="font-size: '.$this->owner()->args('style_size').'px;">';
                $render.= '<div title="'.$labels['down'].'" class="gdrts-thumb-link" data-rating="down" style="width: '.$size.'px; height: '.$size.'px;">'.$html.$html_down.'</div>';
            $render.= '</div>';
        $render.= '</div>';
        
        return $render;
    }
}
