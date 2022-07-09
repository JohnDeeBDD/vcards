<?php

namespace VCards;

class ColumnsFeature{

	public function set_custom_edit_vcard_columns($columns){
		unset($columns['categories']);
		unset($columns['tags']);
		$columns['shortcode'] = __('Short Code', 'vcards');
		return $columns;
	}

	public function custom_vcard_column($column, $post_id){
		switch ($column) {
			case 'shortcode' :
				echo ("[vcard id=" . $post_id . "]");
				break;
		}
	}

	public function renderJQueryForEditScreen(){

		$output = <<<OUTPUT
<script>
jQuery( document ).ready(function() {
    jQuery("span").filter(function() { return (jQuery(this).text() === 'Title') }).text("VCard Rec ID"); 
    jQuery(".column-author").text("Creator");
    
});
</script>
OUTPUT;
		echo $output;
	}

	public function doRemoveQuickEditLink( $actions, $post ) {
		//this function should be called from the 'post_row_actions' filter
		unset($actions['inline hide-if-no-js']);
		return $actions;
	}
}