/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $('#idService').on('change', ajaxFilter);
    function ajaxFilter() {
        var url = $('form').attr('action');
        var idService = $('#idService').val();
                    alert(idService);
        $.post(url, {idService: idService}, function (data) {
            var tbody = $('#tbody');
            tbody.empty();
            $.each(data, function (key, values) {
                var tr = $('<tr></tr>');
                $.each(values, function (index, element) {
                    var td = $('<td></td>');
                    td.text(element);
                    tr.append(td);
                });
                tbody.append(tr);
            });
        }, 'json');
    }

})


