
/* dropdown fade*/
$('.dropdown_open.d-fade').click(function(e){
    $(this).next('.dropdown_drop').fadeToggle();
    $(this).parent().toggleClass('active');
    e.preventDefault();
});
/* dropdown slide*/
$('.dropdown_open.d-slide').click(function(e){
    $(this).next('.dropdown_drop').slideToggle();
    $(this).parent().toggleClass('active');
    e.preventDefault();
});

$('.dropdown_open').click(function(e){
    e.stopPropagation();
});

    $('.dropdown_drop').click(function(e){
    e.stopPropagation();
});

$(document).click(function() {    
    $('.dropdown_drop').slideUp();
    $('.dropdown_open').parent().removeClass('active');
});


$('.calendar').datepicker({
    autoHide:true,
    format:'dd/mm/yyyy',
});

$(document).ready(function() {
  $('.nice-select').niceSelect();
});



 $('.num_counter').click(function(e) {
       e.preventDefault();
        var bu = $(this),
            parent = bu.parents('.mehsul_counter'),
            input = parent.find('.numeric'),
            min = parseInt(input.attr('min')),
            max = parseInt(input.attr('max')),
            old_value = parseInt(input.val()),
            new_value = (bu.hasClass('numeric_down')) ? (old_value > min) ? old_value -= 1 : old_value : (old_value < max) ? old_value += 1 : old_value;
        input.val(parseInt(new_value));
        return false;
 });

 $(function() {
    $("#di_table").DataTable({
        "responsive": true,
        "autoWidth": false,
        "searching": false,
        "lengthChange": false,
        "ordering": true,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});