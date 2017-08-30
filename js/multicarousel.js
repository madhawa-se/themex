//////////////////
/*detect bootstrap breakpont events*/
var currMqIdx = undefined;
var mqDetector,mqSelectors;

function init(){
    blocks=$(".testz .slider-card");
    $( window ).resize(checkForResize);
    mqDetector = $("#mq-detector");
    mqSelectors = [
        mqDetector.find(".visible-xs"),mqDetector.find(".visible-sm"),mqDetector.find(".visible-md"), mqDetector.find(".visible-lg")
    ];
    checkForResize();
}


var checkForResize = function() {
    for (var i = 0; i <= mqSelectors.length; i++) {
        if (mqSelectors[i].is(":visible")) {
            if (currMqIdx != i) {
                currMqIdx = i;
                var blockAmount=parseInt(mqSelectors[i].data("size"));
                collapseBlocks(blockAmount);
            }
            break;
        }
    }
};

$(window).on('resize', checkForResize);

//////////////////

var blocks,preHtml;
var pre='<div class="item active"><div class="row text-center">';
var pre2='<div class="item"><div class="row text-center">';

var preFirst="<div id='Carousel' class='carousel slide'><div class='carousel-inner'>";
var preFirstEnd="</div></div>";
var post="</div></div>";
var blockOn=true;

$(document).ready(function(){
    init();
});

function collapseBlocks(blockAmount){
    //divide carousel image items according to given blocks
    var htmlContent="";
    var s=0;
    var pages=Math.ceil(blocks.length/blockAmount);
    blockOn=true;
    for(var i=0;i<pages;i++){
        if(blockOn){
            blockOn=!blockOn;
            preHtml=pre;
        }else{
            preHtml=pre2; 
        }
        htmlContent+=preHtml;
        for(var x=0;x<blockAmount && s<blocks.length;x++){
            console.log("s  "+s);
            htmlContent+=blocks[s++].outerHTML;

        }
        htmlContent+=post;

    }
    var cInner=$(".testz .carousel-inner");
    console.log(cInner);
    if(cInner){
      // $(".carousel-inner").html(htmlContent);
    }else{
        $(".testz").html(preFirst+htmlContent+preFirstEnd);
        console.log(preFirst+htmlContent+preFirstEnd);
    }
}
