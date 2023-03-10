<?php

if (class_exists("WP_Widget")) {
    class gdlbWidget extends WP_Widget {
        function gdlbWidget() {
            $widget_ops = array("classname" => "widget_gd_linkedin_badge", "description" => __("Add simple link to LinkedIn Profile page.", "gd-linkedin-badge"));
            $this->WP_Widget("gdlb_widget", "GD LinkedIn Badge", $widget_ops);
        }

        function widget($args, $instance) {
            global $gdlb;
            extract($args, EXTR_SKIP);

            $title = trim($instance["title"]);
            $text = __($instance["text"]);
            $description = __($instance["description"]);
            $url = $instance["url"];
            $badge = $instance["badge"];

            echo $before_widget;
            if ($title != "")
                echo $before_title.__($title).$after_title;
            if ($description != "")
                echo '<p style="text-align: center">'.$description.'</p>';
            echo $gdlb->make_badge($url, $text, $badge);
            echo $after_widget;
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;

            $instance["title"] = strip_tags(stripslashes($new_instance["title"]));
            $instance["url"] = $new_instance["url"];
            $instance["text"] = $new_instance["text"];
            $instance["description"] = $new_instance["description"];
            $instance["badge"] = $new_instance["badge"];

            return $instance;
        }

        function form($instance) {
            global $gdlb;
            $instance = wp_parse_args((array)$instance, $gdlb->default_options);

            $title = $instance["title"];
            $text = $instance["text"];
            $description = $instance["description"];
            $url = $instance["url"];
            $badge = $instance["badge"];

            include(GDLI_BADGE_PATH."forms/form_new.php");
        }
    }
}

?>