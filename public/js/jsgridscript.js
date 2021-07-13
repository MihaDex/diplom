$(function() {

    $.ajax({
        type: "GET",
        url: "/admin/categories"
    }).done(function(categories) {
        categories.unshift({ id: "0", name: "" });

        $("#jsGrid").jsGrid({
            height: "70%",
            width: "100%",
            filtering: true,
            inserting: false,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            noDataContent: "Пусто",
            pagerFormat: "Страницы: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
            pagePrevText: "Предыдущая",
            pageNextText: "Следущая",
            pageFirstText: "Первая",
            pageLastText: "Последняя",
            deleteConfirm: "Вы действительно хотите удалить товар?",
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "/admin/products",
                        data: filter
                    });
                },
                updateItem: function(item) {
                    return $.ajax({
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/updateProduct/"+item.id,
                        data: item
                    });
                },
                deleteItem: function(item) {
                    console.log(item);
                    return $.ajax({
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/deleteProduct/"+item.id,
                        data: item
                    });
                }
            },
            fields: [
                { name: "title", title: "Заголовок", type: "text", width: 150 },
                { name: "description", title: "Описание", type: "textarea", width: 200 },
                { name: "price", title: "Цена", type: "number", width: 50 },
                { name: "categorie_id", title: "Категория", type: "select", width: 100, items: categories, valueField: "id", textField: "name" },
                { name: "image", title: "Изображение",
                    itemTemplate: function(val, item) {
                        var img = $("<img>").attr({"src": val,"height":"50","class":"tableImageUpdate"});
                        img.on("click",function () {
                            if(confirm('Изменить картинку?')){
                                location.replace("/admin/changeimage/"+item.id);
                            }
                        });
                        return img;
                    },
                    align: "center",
                    width: 70, sorting: false, filtering: false },
                { type: "control" }
            ]
        });

    });

});