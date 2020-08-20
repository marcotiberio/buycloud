// Manifesto Modal
$(document).ready(function(){
    $("#declaration").click(function(){
        $("#modalManifesto").show();
    });
    $("#closeManifesto").click(function(){
        $("#modalManifesto").hide();
    });
});

$(document).ready(function(){
    $("#declarationSoldout").click(function(){
        $("#modalManifestosoldout").show();
    });
    $("#closeManifestosoldout").click(function(){
        $("#modalManifestosoldout").hide();
    });
});


// Go Back One Page
function goBack() {
    window.history.back();
}