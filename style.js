var nav = document.getElementById('nav').offsetHeight;
var content = document.getElementById('content');
content.style.paddingTop = 70+nav+"px";
var filterButtonContainer = document.getElementById('filterButtonContainer');
var filterButton = document.getElementById('filterButton');

function onElementHeightChange(nav, callback){
    var lastHeight = nav.offsetHeight, newHeight;
    (function run(){
        newHeight = nav.offsetHeight;
        if( lastHeight !== newHeight )
            callback();
        lastHeight = newHeight;
        content.style.paddingTop = 70+lastHeight+"px";
        filterButtonContainer.style.marginTop = (lastHeight)+(filterButton.offsetHeight/2)+"px";

        if( nav.onElementHeightChangeTimer )
            clearTimeout(nav.onElementHeightChangeTimer);

        nav.onElementHeightChangeTimer = setTimeout(run, 200);
    })();
}

onElementHeightChange(document.getElementById('nav'), function(){
});

var filtersBlock = document.getElementById('filtersBlock');
filtersBlock.style.marginTop = nav+"px";

function showFiltersBlock()
{
	filtersBlock.style.display = "block";
	crossButton.style.display = "block";
	filterButton.style.display = "none";
}

var crossButton = document.getElementById('crossButton');

function closeFiltersBlock()
{
	filtersBlock.style.display = "none";
	crossButton.style.display = "none";
	filterButton.style.display = "block";
}
