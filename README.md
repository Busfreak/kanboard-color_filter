# kanboard-color_filter

This plugin provides additional color-based filter for the single board-view and the dashboard.
* name each color for tasks with your own description (translation overwrite)
* adjust style for color_picker in task edit (CSS overwrite)
* add filter for colors in board-view and the personal dashboard (hook to template:app:filters_helper:after in app/filters_helper)
* overwrite task/color_picker for displaying color name
* change the systemwide colornames in each projct based on ProjectMetadata

Create a folder Color_filter in the plugin folder an copy all files inside. Adjust color names in Locale.

The plugin depends on Kanboard 1.0.27.