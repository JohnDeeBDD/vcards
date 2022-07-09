console.log("gs.editor.js!");
console.log("sc ID " + VCardPostID);
const grid=GridStack.init({
    minRow: 1, // don't let it collapse when empty
    cellHeight: '7rem'
});

let gridData=new Array();
let widgetCount=0;

jQuery(document).ready(function(){
    
grid.on('added removed change', function(e, items) {
    let str = '';
    items.forEach(function(item) { str += ' (x,y)=' + item.x + ',' + item.y; });
    console.log(e.type + ' ' + items.length + ' items:' + str );
});
let serializedData = [
    {x: 0, y: 0, w: 2, h: 2, id: '0'},
    {x: 3, y: 1, h: 2, id: '1', content: "<button onclick=\"alert('clicked!')\">Press me</button>"},
    {x: 4, y: 1, id: '2'},
    {x: 2, y: 3, w: 3, id: '3'},
    {x: 1, y: 3, id: '4'}
];
serializedData.forEach((n, i) =>
    n.content = `<button onClick="grid.removeWidget(this.parentNode.parentNode)">X</button><br> ${i}<br> ${n.content ? n.content : ''}`);
let serializedFull;

console.log("is editor allowed?"); //ref: Gridstack::returnJSData()
if(VCardEditorBool){
    console.log("Yes. VCardEditorBool = true.");
     }else{
    console.log("No. VCardEditorBool = false.");
}


console.log("doing initial setup AJAX");
console.log("doing /wp-json/vcards/v1/get-vcard-data");
console.log("vcard-post-id: " + VCardPostID);
jQuery.ajax({

        url: "/wp-json/vcards/v1/get-vcard-data",
        data: {
            '_wpnonce'          : wpApiSettings.nonce,
            'vcard-post-id'     : VCardPostID,
        },
        method: 'POST'
    }).complete(function(data){
        console.log("AJAX success get-vcard-data");
        console.log("VCardPostID " + VCardPostID);
        console.log(data);
        loadGrid(data);
    });


// 2.x method - just saving list of widgets with content (default)
loadGrid = function(data) {
    gridData=data;
    widgetCount=data.length;
    grid.load(data, true); // update things
}
// 2.x method
saveGrid = function() {
    delete serializedFull;
    serializedData = grid.save();
    document.querySelector('#saved-data').value = JSON.stringify(serializedData, null, '  ');
    console.log(serializedData);
    VCards.setData(serializedData);
}
// 3.1 full method saving the grid options + children (which is recursive for nested grids)
saveFullGrid = function() {
    serializedFull = grid.save(true, true);
    serializedData = serializedFull.children;
    document.querySelector('#saved-data').value = JSON.stringify(serializedFull, null, '  ');
}
// 3.1 full method to reload from scratch - delete the grid and add it back from JSON
loadFullGrid = function() {
    if (!serializedFull) return;
    grid.destroy(true); // nuke everything
    grid = GridStack.addGrid(document.querySelector('#gridCont'), serializedFull)
}
clearGrid = function() {
    gridData=new Array();
    widgetCount=0;
    grid.removeAll();
}

});


const VCards = {};
VCards.setData = function(data){
    console.log("doing VCards.setData()");
    console.log("Sending...");
    console.log("vcard-post-id: " + VCardPostID);
    jQuery.ajax({

        url: "/wp-json/vcards/v1/set-vcard-data",
        data: {
            '_wpnonce'          : wpApiSettings.nonce,
            'data'              : data,
            'vcard-post-id'     : VCardPostID,
        },
        method: 'POST',
        success: function (data) {
            console.log("AJAX success VCards.setData()");
            console.log(data);
        },
        error: function (errorThrown) {
            console.log("Error");
            console.log(errorThrown);
        }
    });
}


function addWidget(){
    i=widgetCount++;
    n={x: 0, y: 0, w: 2, h: 2, id: i};
    n.content = `<button onClick="grid.removeWidget(this.parentNode.parentNode)">X</button><br> ${i}<br> ${n.content ? n.content : ''}`;
    gridData.push(n);
    loadGrid(gridData);
}