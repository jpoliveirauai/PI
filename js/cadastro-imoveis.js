function openPage(idPagina, link){
    $(".tab").hide();      
    $("ul.navbar-nav li").removeClass("active");          

    $("#" + idPagina).fadeIn(500);     
    if (link != null)
      link.parentNode.className += " active";
}