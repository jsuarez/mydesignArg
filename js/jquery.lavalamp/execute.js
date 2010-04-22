function init_menus(){
    $("#lavaLampMenu").lavaLamp({
        fx: "backout",
        speed: 700,
        click: function(event, menuItem) {
            location.href = $(menuItem).find('a').attr('href');
            return false;
        }
    });
}