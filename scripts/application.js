
var fullurl = "";
var origin ="";
    var img = new Image();
    var ctx = document.getElementById('canvas').getContext('2d');
    var waitImg = new Image();
    var waitRender = "";
    var filter = $.cookie("flagSelected");

function getStream() {
        $.ajax ({
            type: "post",
            url:"get_stream.php",
            data: {filter:filter},
            dataType: "json",
            success: function(response) {
                //console.log(response["url"]); //DEBUG ONLY
                clearInterval(refresh);
                showLoadingImg();
                clearInterval(waitRender);
                render();
                img.src = response["url"];
                
                var flagImg = document.getElementById("origin");
                flagImg.src = "flag-icon-css-master/flags/4x3/"+response["origin"]+".svg";
                var originP = document.getElementById("originP");
                //console.log(getCountryName(response["origin"])); //DEBUG ONLY
                originP.innerHTML = "Country: "+getCountryName(response["origin"].toUpperCase());
                var ip = document.getElementById("ip");
                ip.innerHTML = "IP: "+response["ip"];
                var reportURL = document.getElementById("reportURL");
                reportURL.value = response["url"];
            }
        });
    }
getStream();







function showLoadingImg() {

    waitImg.onload = function() {
    ctx.canvas.width = waitImg.width/2
    ctx.canvas.height = waitImg.height/2
    ctx.scale(0.5,0.5);
    ctx.drawImage(waitImg, 0, 0);
    };
        waitImg.src = "/static/waitImg.png";
    waitRender = window.setInterval("waitRefresh()",5);
    
}
    function waitRefresh() {
            ctx.drawImage(waitImg,0,0);
        }


function next() {
        getStream();
}

//Rendering streams to canvas
var refresh = "";
function render(){
    img.onload = function() {
    ctx.canvas.width = img.width/2
    ctx.canvas.height = img.height/2
    ctx.scale(0.5,0.5);
    ctx.drawImage(img, 0, 0);
    };
refresh = window.setInterval("refreshCanvas()", 5);
}
function refreshCanvas() {
    try { 
    ctx.drawImage(img, 0, 0);
    }
    catch(err) {
        next(); // Fetch new camera in case of dead link or 401/403 response
    }
}; 
