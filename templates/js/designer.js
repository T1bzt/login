var id;
$(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        var targeted_text = $(this).attr('id');
        saveId(targeted_text);
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
        // e.preventDefault();
        console.log(e.target.id);
        $('#input').attr("placeholder",$("#" + e.target.id).text());
        console.log("asd");
    });

    //----- CLOSE
    $('[data-popup-close]').on('click', function(e,id)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

        e.preventDefault();
    });

    $('[data-popup-save]').on('click', function (e) {
        var targeted_popup_class = jQuery(this).attr('data-popup-save');
        $("#"+getId()).text($("#input").val());
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
        e.preventDefault();
    });
});

function saveId(id) {
    this.id = id;
}
function getId() {
    return id;
}

function ajax() {
    var url;
    if ( location.pathname.split("/")[4] === "edit.php"){
        url = '_inc/edit-item.php';
    }else {
        url = '_inc/save.php';
    }
    var title = prompt("Please enter project name", "My Project");
    if (title != null) {
        $.ajax({
            type: "POST",
            url: url,
            data: {project_name: title, person_name: 'brt', company_name: $("#title").text(), introduction: $("#paragraph").text(),website_id: $_GET['id']},
            // success: function(data){
            //     alert(data);
            // }
            success: function(){
                window.location.replace(url);
            }
        });
    }


}




