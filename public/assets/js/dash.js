$(document).ready( function() {
    /*********** Menu ***********/
    $('.deroule_menu').click(function(){
        $(this).next().toggleClass('display_block');
    });
    /*********** /Menu ***********/

    /*********** /Theme ***********/
    $('.light').click(function() {
        $('.content').toggleClass('night');
        return false;
    });
    /*********** /Theme ***********/
});