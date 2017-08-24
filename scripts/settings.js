
function flagClicked(element) {
    if ($.cookie("flagSelected") == null) {
        $.cookie("flagSelected",element.id,{path:"/"});
        element.className += " selectedFlag";
        window.location = "/";
    }
    else if ($.cookie("flagSelected") == element.id) {
        element.classList.remove("selectedFlag");
        $.removeCookie("flagSelected",{path:"/"});
    }
    else {
        var currentlySelected = document.getElementById($.cookie("flagSelected"));
        currentlySelected.classList.remove("selectedFlag");
        $.cookie("flagSelected",element.id,{path:"/"});
        element.className += " selectedFlag";
        window.location = "/";
    }
}

var countryLog = [];
var countryCount = {};

 $.ajax ({
        type: "post",
        url:"../get_origins.php",
        data: "",
        dataType: "json",
        success: function(response) {

            for (var i = 0; i < response.length; i++) {
                var countryID = response[i][0];
                if (countryLog.indexOf(countryID) == -1) {
                    countryLog.push(countryID);
                    countryCount[countryID] = 1;
                    var countryName = getCountryName(countryID);
                    
                    var div = document.createElement("div");
                    div.className = "flag-item";
                    div.setAttribute("id",countryID);
                    div.onclick = function() {flagClicked(this);};

                    var img = document.createElement("img");
                    img.src = "/flag-icon-css-master/flags/4x3/"+countryID.toLowerCase()+".svg";
                    
                    var desc = document.createElement("p");
                    desc.className = "flag-desc";
                    desc.innerHTML = countryName+"<br/>";
                    
                    $("#container").append(div);
                    $(div).append(img);
                    $(div).append(desc);

              
                    

                }
                else {
                    countryCount[countryID] += 1;
                }
                

            }

            var items = container.getElementsByClassName("flag-item");
            for (var i = 0; i < items.length; i++) {
                var itemID = items[i].id;
                var amount = countryCount[itemID];
                var flagDesc = items[i].children[1];
                var text = amount+" streams";
                flagDesc.appendChild(document.createTextNode(text)); 
            }
            if ($.cookie("flagSelected") != null) {
                var element = document.getElementById($.cookie("flagSelected"));
                element.className += " selectedFlag";
            }
        
    }
        
        
    });


