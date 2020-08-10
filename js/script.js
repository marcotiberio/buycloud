// Manifesto Modal
$(document).ready(function(){
    $("#declaration").click(function(){
        $("#modalManifesto").show();
    });
    $("#closeManifesto").click(function(){
        $("#modalManifesto").hide();
    });
});


// Go Back One Page
function goBack() {
    window.history.back();
}