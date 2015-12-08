# kanboard-color_filter

This plugin provides additional color-based filter for the board-view.
* name each color for tasks with your own description (translation overwrite)
* adjust style for color_picker in task edit (CSS overwrite)
* add filter for colors in board-view (hook to template:project:header:after)
* overwrite task/color_picker for displaying color name

Create a folder Color_filter in the plugin folder an copy all files inside. Adjust color names in Locale.

Tested with Kanboard 1.0.21

Changes for 1.0.22:
Event removed: "session.bootstrap" use "app.boostrap" instead