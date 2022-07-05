<?php

namespace VCards;

class Gridstack{

	public function saveLayoutData(){}
	public function getLayoutData(){}
	public function ShortCodeOutput() {
		//JS:

		\wp_enqueue_script('vcards-gridstack-h5', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-h5.js');
		\wp_enqueue_script('vcards-gridstack-poly-js',       \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-poly.js');
		\wp_enqueue_script('vcards-gridstack-jq', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack-jq.js');
		\wp_enqueue_script('jquery');
		\wp_enqueue_script('vcards-editor',\get_site_url().'/wp-content/plugins/vcards/src/VCards/gs.editor.js');

		//CSS:
		\wp_enqueue_style('vcards-gridstack-css', \get_site_url().'/wp-content/plugins/vcards/src/Gridstack/gridstack.css');

		//HTML:
		return ($this->getHTML());
	}

	public function getHTML(){
		$output = <<<OUTPUT
<style>
/* Optional styles for demos */
.btn-primary {
  color: #fff;
  background-color: #007bff;
}
.btn {
  display: inline-block;
  padding: .375rem .75rem;
  line-height: 1.5;
  border-radius: .25rem;
}
a {
  text-decoration: none;
}
h1 {
  font-size: 2.5rem;
  margin-bottom: .5rem;
}
.grid-stack {
  background: #FAFAD2;
}
.grid-stack-item-content {
  color: #2c3e50;
  text-align: center;
  background-color: #18bc9c;
}
.grid-stack-item-removing {
  opacity: 0.5;
}
.container-fluid{
  margin:1em -100%; /* old browsers fallback */
  margin:1em calc(50% - 50vw);
  background-color:rgba(255,0,255,0.5);
}
body, html {
  overflow-x: hidden;
  margin: 0;
  padding: 0;
}
div {
  padding:0.5em;
}
.container {
  width:300px;
  background-color:rgba(255,255,0,0.5);
  margin:auto;
}
.breakout {
  margin:1em -100%; /* old browsers fallback */
  margin:1em calc(50% - 50vw);
  background-color:rgba(255,0,255,0.5)
}
</style>
<div class="container">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.

  <div class="breakout">
    Break out of container
  </div>

Lorem ip
<div class="container-fluid">
    <h1>Serialization demo</h1>
    <a onClick="saveGrid()" class="btn btn-primary" href="#">Save</a>
    <a onClick="loadGrid()" class="btn btn-primary" href="#">Load</a>
    <a onClick="saveFullGrid()" class="btn btn-primary" href="#">Save Full</a>
    <a onClick="loadFullGrid()" class="btn btn-primary" href="#">Load Full</a>
    <a onClick="clearGrid()" class="btn btn-primary" href="#">Clear</a>
    <br/><br/>
    <div id="gridCont"><div class="grid-stack"></div></div>
    <hr/>
    <textarea id="saved-data" cols="100" rows="20" readonly="readonly"></textarea>
</div>
OUTPUT;
		return $output;
	}

}