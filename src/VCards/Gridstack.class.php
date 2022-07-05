<?php

namespace VCards;

class Gridstack{

	public function saveLayoutData(){}
	public function getLayoutData(){}
	public function ShortCodeOutput() {
		//JS:
		\wp_enqueue_script('vcards-editor', \get_site_url().'/wp-content/plugins/vcards/src/VCards/gs.editor.js');
		\wp_enqueue_script('vcards-gridstack-h5', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-h5.js');
		\wp_enqueue_script('jquery');

		//CSS:
		\wp_enqueue_style('vcards-gridstack-css', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack.css');

		//HTML:
		return ($this->getHTML());
	}

	public function getHTML(){
		$output = <<<OUTPUT
<style type="text/css">
  .grid-stack { background: #FAFAD2; }
  .grid-stack-item-content { background-color: #18BC9C; }
</style>
Add XXCard   Remove Card
<div class="grid-stack"></div>

<script type="text/javascript">
  var items = [
    {content: 'my first widget'}, // will default to location (0,0) and 1x1
    {w: 2, content: 'another longer widget!'} // will be placed next at (1,0) and 2x1
  ];
  var grid = GridStack.init();
  grid.load(items);
</script>
OUTPUT;
		return $output;
	}

}