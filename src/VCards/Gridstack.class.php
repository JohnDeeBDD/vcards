<?php

namespace VCards;

class Gridstack{

	public function saveLayoutData(){}
	public function getLayoutData(){}
	public function ShortCodeOutput($args) {
		//JS:
		\wp_enqueue_script('vcards-gridstack-h5', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-h5.js');
		\wp_enqueue_script('vcards-gridstack-poly-js',       \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-poly.js');
		\wp_enqueue_script('vcards-gridstack-jq', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-jq.js');
		\wp_enqueue_script('jquery');
		\wp_enqueue_script('vcards-editor',\get_site_url().'/wp-content/plugins/vcards/src/VCards/gs.editor.js', ['jquery', 'wp-api'], '1.0', true );
		
		//CSS:
		\wp_enqueue_style('vcards-gridstack-css', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack.css');

		//HTML:
		$html = "";
		$html = $this->returnJSData($args);
		$html = $html . ($this->getHTML());
		return $html;
	}

	public function returnJSData($args){
		if(isset($args['id'])){
			$VCardPostID = $args['id'];
			if (\current_user_can( "install_plugins")){
				$editor = "true;";	
			}else{
				$editor = "false;";
			}
			$output = <<<OUTPUT
<script>
let VCardPostID = $VCardPostID;
let VCardEditorBool = $editor
</script>
OUTPUT;
	return $output;
		}else{
			die("something is wrong. VCards Gridstack.class.php returnJSData() line 37");
		}
	}

	public function getHTML(){
		$output = <<<OUTPUT
<div class="container">
<div class="breakout"></div>
<div class="container-fluid">
    <a onClick="saveGrid()" class="btn btn-primary" style="cursor:pointer">Save</a>
    <a onClick="loadGrid()" class="btn btn-primary" style="cursor:pointer">Load</a>
    <a onClick="addWidget()" class="btn btn-primary" style="cursor:pointer">AddWidget</a>
    <a onClick="clearGrid()" class="btn btn-primary" style="cursor:pointer">Clear</a>
    <br/><br/>
    <div id="gridCont"><div class="grid-stack"></div></div>
    <hr/>
    <textarea id="saved-data" cols="100" rows="20" readonly="readonly" style="display:none;"></textarea>
</div>
</div>
OUTPUT;
		return $output;
	}

}